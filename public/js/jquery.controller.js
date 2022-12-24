function getData(url, callback) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });
    $.ajax({
        type: "GET",
        url: url,
        success: function(data) {
            callback(data);
        },
        error: function(data) {
            response_error(data);
        }
    });
}

function response_error(data) {

    var response = "";

    if (data.responseJSON.message) {

        response = data.responseJSON.message;
        Swal.fire({
            position: "center",
            icon: "error",
            title: response,
            showConfirmButton: true,

        });

    }
    Object.values(data.responseJSON.errors).forEach(element => {
        response += element + "<br>";
    });

    Swal.fire({
        position: "center",
        icon: "error",
        title: response,
        showConfirmButton: true,

    });

}

function init() {
    location.reload();
}

function saveData(data, url, callback = function(res) {
    console.log(res);
}) {
    try {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            success: function(res) {


                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: res.message,
                    showConfirmButton: false,
                    timer: 1500
                });

                callback(res);
                $(".modal").modal("hide");
            },
            error: function(data) {
                response_error(data);
            }
        });
    } catch (err) {
        alert(err);
    }
}

function saveDataTable(data, url, table, callback = function() {}) {
    try {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            success: function(data) {
                // Swal.fire({
                //     position: "top-end",
                //     icon: "success",
                //     title: data.message,
                //     showConfirmButton: false,
                //     timer: 1500
                // });
                // table.ajax.reload();
                callback(data);
                $(".modal").modal("hide");
            },
            error: function(data) {
                response_error(data);
            }
        });
    } catch (err) {
        alert(err);
    }
}

function saveFormData(url, form_data, callback = function(res) {}) {
    try {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });
        $.ajax({
            type: "POST",
            url: url,
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                // Swal.fire({
                //     position: "top-end",
                //     icon: "warning",
                //     title: data.message,
                //     showConfirmButton: false,
                //     timer: 1500
                // });

                callback(data);
                $(".modal").modal("hide");
            },
            error: function(data) {
                response_error(data);
            }
        });
    } catch (err) {
        alert(err);
    }
}

function update(url, form_data, callback = init()) {
    try {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });
        $.ajax({
            type: "PUT",
            url: url,
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                console.log(data);
                Swal.fire("Successfull", data.message, "success");

                callback();
                $(".modal").modal("hide");
            },
            error: function(data) {
                response_error(data);
            }
        });
    } catch (err) {
        alert(err);
    }
}
//note: api method is DELETE
function deleteModel(url, id, category = "category", callback = function() {}) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then(result => {
        if (result.value) {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });
            $.ajax({
                type: "DELETE",
                url: url,
                success: function(data) {
                    Swal.fire("Successfull", data.message, "success");
                    $("#" + category + "-" + id).remove();
                },
                error: function(data) {
                    response_error(data);
                }
            });
        }
    });
}

function clickEditForm(form_edit_id, button, table) {
    console.log(table.rows().data());
    console.log($(button).closest("tr"));
    category = table.row($(button).closest("tr")).data();
    console.log(category);
    for (const [key, value] of Object.entries(category)) {
        if (key !== "password") {
            $("#" + form_edit_id + " [name=" + key + "]").val(value);
        }
    }

    $("#" + form_edit_id + " select").select2();
}

function setDatatable(
    option = {
        table_selector: "table",
        columns: [],
        sort: [
            [1, "desc"]
        ],
        url: "",
        filter,
        callback
    }
) {
    option.callback = option.callback ? option.callback : function() {};
    option.sort = option.sort ? option.sort : [
        [0, "desc"]
    ];

    return $(option.table_selector).DataTable({
        retrieve: true,
        processing: true,
        serverSide: true,
        dom: "Plfrtip",
        ajax: {
            url: option.url,
            type: "POST",
            dataSrc: function(json) {
                console.log(json);
                return json.data;
            },
            data: function(data) {
                data._token = $("input[name=_token]").val();
                data.filter = option.filter;
            }
        },
        columns: option.columns,
        aaSorting: option.sort,
        drawCallback: option.callback
    });
}
