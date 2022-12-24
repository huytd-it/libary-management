@extends('layout')
@section('css')
@endsection
@section('content')
    <!-- Full width modal -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <form class="form-inline">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-light" id="dash-daterange">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-success border-success text-white">
                                        <i class="mdi mdi-calendar-range font-13"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <a href="javascript: void(0);" class="btn btn-success ml-2">
                            <i class="mdi mdi-autorenew"></i>
                        </a>
                    </form>
                </div>
                <h4 class="page-title">Độc giả</h4>
            </div>
        </div>
    </div>
    <div id="full-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="fullWidthModalLabel">Độc giả</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="" id="sach">
                        <div class="row">
                            @csrf
                            <div class="col-lg-6" hidden>
                                <div class="form-group">
                                    <label for="simpleinput">Mã độc giả</label>
                                    <input type="text" id="ma_doc_gia"   name="ma_doc_gia" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="simpleinput">Tên độc giả</label>
                                    <input type="text" id="ten_doc_gia" name="ten_doc_gia" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="simpleinput">Ngày sinh</label>
                                    <input type="text" id="ngay_sinh" name="ngay_sinh" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="simpleinput">Địa chỉ </label>
                                    <input type="text" id="dia_chi" name="dia_chi" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="simpleinput">Email </label>
                                    <input type="email" id="email" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="simpleinput">Ngày lập thẻ </label>
                                    <input type="text" id="created_at" name="created_at" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="simpleinput">Loại độc giả</label>
                                    <select type="text" id="ma_loai" name="ma_loai" class="form-control">
                                        <option value="1">Loại X</option>
                                        <option value="2">Loại Y</option>
                                        {{-- @foreach ($doc_gias as $item)
                                            <option value="{{ $item->ma_doc_gia }}">{{ $item->ma_doc_gia }} -
                                                {{ $item->ten_doc_gia }}
                                            </option>
                                        @endforeach --}}
                                    </select>
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

                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <button class="btn btn-success" data-toggle="modal" id="add"
                                data-target="#full-width-modal"><i class="mdi mdi-plus-circle mr-2"></i> Thêm độc giả
                            </button>


                        </div>
                        {{-- <div class="col-sm-8">
                            <div class="text-sm-right">
                                <button type="button" class="btn btn-success mb-2 mr-1" data-toggle="modal"
                                    data-target="#setting"><i class="mdi mdi-settings"></i></button>
                                <button type="button" class="btn btn-light mb-2 mr-1">Import</button>
                                <button type="button" class="btn btn-light mb-2">Export</button>
                            </div>
                        </div><!-- end col--> --}}
                    </div>
                    <table id="basic-datatable" class="table dt-responsive nowrap ">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Họ tên</th>
                                <th>Ngày sinh</th>
                                <th>Loại độc giả</th>
                                <th>Địa chỉ</th>
                                <th>Người tạo</th>
                                <th>Ngày tạo</th>



                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!-- Datatable Init js -->
    <script type="text/javascript">
        $(document).ready(function() {

            var table = $('#basic-datatable').DataTable({
                retrieve: true,
                processing: true,
                serverSide: true,
                language: {
                    paginate: {
                        previous: "<i class='mdi mdi-chevron-left'>",
                        next: "<i class='mdi mdi-chevron-right'>",
                    },
                },
                ajax: {
                    url: "{{ route('admin.doc-gia.all') }}",
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
                order: [
                    [0, 'desc']
                ],
                columns: [{
                        data: 'ma_doc_gia',
                        render: function() {
                            return '<button class="btn btn-success btn-edit"><i class="mdi mdi-square-edit-outline "></i></button>' +
                                ' <button class="btn btn-danger btn-delete"><i class="mdi mdi-delete-outline "></i></button>';
                        },
                    }, {
                        data: 'ten_doc_gia'
                    },
                    {
                        data: 'ngay_sinh',
                        render: function(data) {
                            return data ? moment(data).format('DD/MM/YYYY') : '';
                        }
                    },
                    {
                        data: 'ma_loai',
                        render: function(data) {
                            return data == 1 ? 'Loại X' : 'Loại Y';
                        }

                    },
                    {
                        data: 'dia_chi',

                    },

                    {
                        data: 'email'
                    },

                    {
                        data: 'created_at',
                        render: function(data) {
                            return data ? moment(data).format('DD/MM/YYYY') : '';
                        }
                    },


                ],
                drawCallback: function() {

                    $('#sach select').select2();
                    $(document).on('click', '.btn-edit', function() {
                        $('#full-width-modal').modal('show');
                        $('#sach').trigger('reset');
                        var data = table.row($(this).closest("tr")).data();

                        for (const [key, value] of Object.entries(data)) {
                            $('#sach [name=' + key + "]").val(value);

                            $('#sach select[name=' + key + "]").select2();
                        }


                        $('#ngay_sinh').data('daterangepicker').setStartDate(new Date(data
                            .ngay_sinh));
                        $('#created_at').data('daterangepicker').setStartDate(new Date(data
                            .created_at));

                    });
                    $(document).on('click', '.btn-delete', function() {

                        var data = table.row($(this).closest("tr")).data();
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
                                        "X-CSRF-TOKEN": $(
                                                'meta[name="csrf-token"]')
                                            .attr(
                                                "content")
                                    }
                                });

                                var url =
                                    "{{ route('admin.doc-gia.destroy', ['doc_gium' => ':id']) }}";
                                url = url.replace(':id', data.ma_doc_gia);
                                $.ajax({
                                    type: "DELETE",
                                    url: url,
                                    data: data,
                                    success: function(data) {
                                        Swal.fire("Successfull", data
                                            .message, "success");
                                        table.ajax.reload();
                                    },
                                    error: function(data) {
                                        response_error(data);
                                    }
                                });
                            }
                        });


                    });
                    // $('#add').click(function() {
                    //     $('#sach').trigger('reset');
                    //     $('#sach [name=trang_thai]').val(1);
                    //     $('#sach select').select2();
                    // });
                }



            });
            $('#full-width-modal').on('show.bs.modal', function(e) {
                $('#sach').trigger('reset');
                $('#sach [name=trang_thai]').val(1);
                $('#sach select').select2();
                $('#ngay_sinh').daterangepicker({
                    "singleDatePicker": true,
                    "autoApply": true,
                    locale: {
                        format: 'DD/MM/YYYY'
                    },
                });
                $('#created_at').daterangepicker({
                    "singleDatePicker": true,
                    "autoApply": true,
                    "startDate": moment(),
                    locale: {
                        format: 'DD/MM/YYYY'
                    },
                });

            });

            $('#save_form').click(function() {
                var form_data = new FormData($("#sach")[0]);
                form_data.set('created_at', $('#created_at').data('daterangepicker').startDate.format(
                    'YYYY-MM-DD hh:mm:ss'));
                form_data.set('ngay_sinh', $('#ngay_sinh').data('daterangepicker').startDate.format(
                    'YYYY-MM-DD hh:mm:ss'));
                var url = "{{ route('admin.doc-gia.store') }}";
                saveFormData(url, form_data, function(res) {
                    table.ajax.reload();
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: res.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                });
            });
        })
    </script>
@endsection
