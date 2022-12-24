@extends('layout')
@section('css')

@endsection
@section('content')
    <!-- Full width modal -->

    <div id="full-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="fullWidthModalLabel">Sách</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="" id="sach">
                        <div class="row">
                            @csrf
                            <div class="col-sm-6" style="display:none">
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
                                    <select type="text" id="ma_nxb" name="ma_nxb" class="form-control">
                                        @foreach ($nxb as $item)
                                            <option value="{{ $item->ma_nxb }}">{{ $item->ten_nxb }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="simpleinput">Loại sách</label>
                                    <select type="text" id="ma_loai" name="ma_loai" class="form-control">
                                        @foreach ($loai_sach as $item)
                                            <option value="{{ $item->ma_loai }}">{{ $item->ten_loai_sach }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="simpleinput">Trạng thái</label>
                                    <select type="text" id="ma_trang_thai" name="ma_trang_thai" class="form-control">
                                        @foreach ($trang_thai as $item)
                                            <option value="{{ $item->ma_trang_thai }}">{{ $item->ten_trang_thai }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="simpleinput">Tác giả</label>
                                    <select type="text" id="ma_tac_gia" name="ma_tac_gia" class="form-control">
                                        @foreach ($tac_gia as $item)
                                            <option value="{{ $item->ma_tac_gia }}">{{ $item->ten_tac_gia }}
                                            </option>
                                        @endforeach
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
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <form class="form-inline">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-light"
                                    id="dash-daterange">
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
                <h4 class="page-title">Sách</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">

                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <button class="btn btn-success" data-toggle="modal" id="add" data-target="#full-width-modal"><i
                                    class="mdi mdi-plus-circle mr-2"></i> Thêm sách </button>


                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-right">
                                <button type="button" class="btn btn-success mb-2 mr-1"><i
                                        class="mdi mdi-settings"></i></button>
                                <button type="button" class="btn btn-light mb-2 mr-1">Import</button>
                                <button type="button" class="btn btn-light mb-2">Export</button>
                            </div>
                        </div><!-- end col-->
                    </div>
                    <table id="books" class="table dt-responsive nowrap ">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Tên Sách</th>
                                <th>Tên tác giả</th>
                                <th>Trạng thái</th>
                                <th>Loại sách</th>
                                <th>Nhà xuất bản</th>
                                <th>Giá tiền</th>
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
        var table = $('#books').DataTable({
            retrieve: true,
            processing: true,
            serverSide: true,
            dom: "Bfrtip",
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
            ],
            pageLength: 0,
            select: true,
            ajax: {
                url: "{{ route('admin.sach.all') }}",
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
                [7, 'desc']
            ],
            "lengthChange": true,
            columns: [{
                    data: null,
                    render: function() {
                        return '<button class="btn btn-success btn-edit"><i class="mdi mdi-square-edit-outline btn-edit"></i></button>';
                    }
                }, {
                    data: 'ten_sach'
                },
                {
                    data: 'ten_tac_gia'
                },
                {
                    data: 'ten_trang_thai',
                    render: function(data, meta, row) {
                        if (row.ma_trang_thai % 2 == 0) {
                            return '<span class="badge badge-danger-lighten">' + data + '</span>';
                        } else {
                            return '<span class=" badge badge-info-lighten">' + data + '</span>';

                        }
                    }
                },
                {
                    data: 'ten_loai_sach',

                },
                {
                    data: 'ten_nxb'
                },


                {
                    data: 'gia_tri',
                    render: function(data) {
                        return new Intl.NumberFormat('vi-VN', {
                            style: 'currency',
                            currency: 'VND',
                        }).format(data);
                    }
                },
                {
                    data: 'created_at'
                },

            ],
            drawCallback: function() {
                $('#sach select').select2();
                $(document).on('click', '.btn-edit', function() {

                    $('#full-width-modal').modal('show');
                    var data = table.row($(this).closest("tr")).data();
                    console.log(data);
                    for (const [key, value] of Object.entries(data)) {
                        $('#sach [name=' + key + "]").val(value);
                    }
                });
                $('#add').click(function() {
                    $('#sach')[0].trigger('reset');
                });
            }



        });


        $('#save_form').click(function() {
            var form_data = new FormData($("#sach")[0]);

            var url = "{{ route('admin.sach.store') }}";
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
    </script>
    <script src="{{ asset('assets/js/pages/demo.datatable-init.js') }}"></script>
@endsection
