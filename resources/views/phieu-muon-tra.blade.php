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
                    <h4 class="modal-title" id="fullWidthModalLabel">Mượn sách</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="" id="sach">
                        <div class="row">
                            @csrf
                            <div class="col-lg-6" >
                                <div class="form-group">
                                    <label for="simpleinput">Mã phiếu</label>
                                    <input type="text" id="ma_phieu" name="ma_phieu" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="simpleinput">Sách</label>
                                    <select type="text" id="ma_sach" name="ma_sach" class="form-control">
                                        @foreach ($sachs as $item)
                                            <option value="{{ $item->ma_sach }}">{{ $item->ma_sach }} -
                                                {{ $item->ten_sach }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="simpleinput">Người mượn</label>
                                    <select type="text" id="ma_doc_gia" name="ma_doc_gia" class="form-control">
                                        @foreach ($doc_gias as $item)
                                            <option value="{{ $item->ma_doc_gia }}">{{ $item->ma_doc_gia }} -
                                                {{ $item->ten_doc_gia }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="simpleinput">Tiền phạt</label>
                                    <input type="text" id="tien_phat_ky_nay" name="tien_phat_ky_nay"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="simpleinput">Trạng thái</label>
                                    <select type="text" id="trang_thai" name="trang_thai" class="form-control">
                                        <option value="0">Đã trả</option>
                                        <option value="1">Mượn</option>
                                        <option value="2">Đã mất</option>
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
                <h4 class="page-title">Mượn trả</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">

                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <button class="btn btn-success" data-toggle="modal" id="add"
                                data-target="#full-width-modal"><i class="mdi mdi-plus-circle mr-2"></i> Mượn sách </button>


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
                    <table id="basic-datatable" class="table dt-responsive nowrap ">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Người mượn</th>
                                <th>Tên sách</th>
                                <th>Ngày mượn</th>

                                <th>Ngày trả</th>
                                <th>Tiền phạt kỳ này</th>
                                <th>Người tạo phiếu</th>
                                <th>Người cập nhật cuối</th>


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
                dom: "Bfrtip",
                select: {
                    style: "multi"
                },

                language: {
                    paginate: {
                        previous: "<i class='mdi mdi-chevron-left'>",
                        next: "<i class='mdi mdi-chevron-right'>",
                    },
                },
                ajax: {
                    url: "{{ route('admin.phieu-muon-tra.all') }}",
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
                        data: 'ma_phieu',
                        render: function() {
                            return '<button class="btn btn-success btn-edit"><i class="mdi mdi-square-edit-outline "></i></button>';
                        }
                    },
                    {
                        data: 'ten_doc_gia'
                    },
                    {
                        data: 'ten_sach'
                    },

                    {
                        data: 'ngay_muon',
                        render: function(data) {
                            return data?  moment(data).format('DD/MM/YYYY') : '';
                        }
                    },
                    {
                        data: 'ngay_tra',
                        render: function(data) {
                            return data?  moment(data).format('DD/MM/YYYY') : '';
                        }
                        // render: function(data, meta, row) {
                        //     if (row.ma_trang_thai % 2 == 0) {
                        //         return '<span class="badge badge-danger-lighten">' + data +
                        //             '</span>';
                        //     } else {
                        //         return '<span class=" badge badge-info-lighten">' + data +
                        //             '</span>';

                        //     }
                        // }
                    },
                    {
                        data: 'tien_phat_ky_nay',
                        render: function(data) {
                            return new Intl.NumberFormat('vi-VN', {
                                style: 'currency',
                                currency: 'VND',
                            }).format(data);
                        }

                    },
                    {
                        data: 'nguoi_tao'
                    },


                    {
                        data: 'nguoi_cap_nhat',

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

                            $('#sach select[name=' + key + "]").select2();
                        }

                    });
                    $('#add').click(function() {
                        $('#sach').trigger('reset');
                        $('#sach [name=trang_thai]').val(1);
                        $('#sach select').select2();
                    });
                }



            });


            $('#save_form').click(function() {
                var form_data = new FormData($("#sach")[0]);

                var url = "{{ route('admin.phieu-muon-tra.store') }}";
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
