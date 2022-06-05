@extends('layout')
@section('css')
    <!-- Datatables css -->
    <link href="{{ asset('assets/css/vendor/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <!-- Full width modal -->

    <div id="full-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-full-width">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="fullWidthModalLabel">Sách</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="" id="sach">
                        <div class="row">
                            @csrf
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="simpleinput">Mã sách</label>
                                    <input type="text" id="ma_sach" name="ma_sach" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="simpleinput">Tên sách</label>
                                    <input type="text" id="ten_sach" name="ten_sach" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="simpleinput">Giá trị</label>
                                    <input type="text" id="gia_tri" name="gia_tri" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="simpleinput">Nhà xuất bản</label>
                                    <input type="text" id="ma_nxb" name="ma_nxb" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="simpleinput">Loại sách</label>
                                    <input type="text" id="ma_loai" name="ma_loai" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="simpleinput">Trạng thái</label>
                                    <input type="text" id="ma_trang_thai" name="ma_trang_thai" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="simpleinput">Tac Gia</label>
                                    <input type="text" id="ma_tac_gia" name="ma_tac_gia" class="form-control">
                                </div>
                            </div>



                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save_form">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <button class="btn btn-success" data-toggle="modal" data-target="#full-width-modal"> Thêm sách </button>
                    <table id="books" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Tên Sách</th>
                                <th>Tên tác giả</th>
                                <th>Trạng thái</th>
                                <th>Loại sách</th>
                                <th>Nhà xuất bản</th>
                                <th>Giá tiền</th>
                                <th></th>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!-- Datatables js -->
    <script src="{{ asset('assets/js/vendor/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/responsive.bootstrap4.min.js') }}"></script>

    <!-- Datatable Init js -->
    <script type="text/javascript">
        var table = $('#books').DataTable({
            retrieve: true,
            processing: true,
            serverSide: true,
            dom: "Bfrtip",
            select: true,
            ajax: {
                url: "{{ route('book.all') }}",
                type: "GET",
                dataSrc: function(json) {
                    console.log(json);
                    return json.data;
                },
                data: function(data) {
                    data._token = $("input[name=_token]").val();
                    data.parent_id = $("#parent_id_filter").val();
                    data.language = $("#language_filter").val();
                    data.school_key = $("#school_key_filter").val();
                    data.deleted_at = $("#deleted_at_filter").val();
                },
            },
            columns: [{
                    data: 'ten_sach'
                },
                {
                    data: 'ten_loai_sach'
                },
                {
                    data: 'ten_nxb'
                },
                {
                    data: 'ten_trang_thai'
                },
                {
                    data: 'ten_tac_gia'
                },
                {
                    data: 'gia_tri'
                },
                {
                    data: null,
                    render: function() {
                        return '<button class="btn btn-success"  data-toggle="modal" data-target="#full-width-modal">Sửa</button>';
                    }
                }
            ],


        });
        $('#save_form').click(function() {
            var form_data = new FormData($("#sach")[0]);

            var url = "{{ route('book.store') }}";
            saveFormData(url, form_data, function(res) {
                table.ajax.reload();
                $.toast({
                    heading: res.msg,
                    icon: 'success',
                    loader: true, // Change it to false to disable loader
                    loaderBg: '#9EC600', // To change the background
                    position: 'top-center'
                });
            });
        });

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
            console.log(data);
            var response = "";

            if (data.responseJSON.message) {
                Swal.fire("Error", data.responseJSON.message, "error");
            }
            Object.values(data.responseJSON.error).forEach(element => {
                response += element + "<br>";
            });

            Swal.fire("Error", response, "error");
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
                        $.toast({
                            heading: 'Error',
                            icon: 'danger',
                            text:data.message,
                            loader: true, // Change it to false to disable loader
                            loaderBg: '#9EC600', // To change the background
                            position: 'top-center'
                        });
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
    </script>
@endsection
