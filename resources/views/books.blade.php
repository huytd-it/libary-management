@extends('layout')
@section('css')
@endsection
@section('content')
    <!-- Full width modal -->
    @php
        $user = Auth::user();
    @endphp
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
                            <div class="col-sm-6" hidden>
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
                                    <label for="simpleinput">Năm xuất bản</label>
                                    <input type="text" id="nam_xuat_ban" name="nam_xuat_ban" class="form-control">
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
                <h4 class="page-title">Sách</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">

                    <div class="row mb-2">
                       @auth
                       <div class="col-sm-4">
                        <button class="btn btn-success" data-toggle="modal" id="add"
                            data-target="#full-width-modal"><i class="mdi mdi-plus-circle mr-2"></i> Thêm sách
                        </button>


                    </div>
                       @endauth





                        {{-- <div class="col-sm-8">
                            <div class="text-sm-right">
                                <button type="button" class="btn btn-success mb-2 mr-1"><i
                                        class="mdi mdi-settings"></i></button>
                                <button type="button" class="btn btn-light mb-2 mr-1">Import</button>
                                <button type="button" class="btn btn-light mb-2">Export</button>
                            </div>
                        </div><!-- end col--> --}}
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="simpleinput">Loại sách</label>
                                <select type="text" id="ma_loai_filter" name="ma_loai" class="form-control">
                                    <option value="">-- Chọn ---</option>
                                    @foreach ($loai_sach as $item)
                                        <option value="{{ $item->ma_loai }}">{{ $item->ten_loai_sach }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <table id="books" class="table dt-responsive nowrap ">
                        <thead>
                            <tr>
                               @auth
                               <th></th>
                               @endauth


                                <th>Tên Sách</th>
                                <th>Tên tác giả</th>
                                <th>Trạng thái</th>
                                <th>Loại sách</th>
                                <th>Nhà xuất bản</th>
                                <th>Năm xuất bản</th>
                                <th>Giá tiền</th>
                                <th>Ngày tạo</th>
                                <th>Ngày cập nhật</th>

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
                url: "{{ route('sach.all') }}",
                type: "GET",
                dataSrc: function(json) {
                    console.log(json);
                    return json.data;
                },
                data: function(data) {
                    data._token = $("input[name=_token]").val();
                    data.ma_loai = $("#ma_loai_filter").val();
                },
            },

            order: [
                [8, 'desc']
            ],

            "lengthChange": true,
            columns: [
                @auth {
                    data: null,
                    render: function() {
                        return '<button class="btn btn-success btn-edit"><i class="mdi mdi-square-edit-outline btn-edit"></i></button>' +
                            ' <button class="btn btn-danger btn-delete"><i class="mdi mdi-delete-outline "></i></button>';
                    }
                },
            @endauth

            {
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
                data: 'nam_xuat_ban',
                render: function(data) {
                    return data ? moment(data).format('DD/MM/YYYY') : '';
                }
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
            {
                data: 'updated_at'
            },

        ],
        drawCallback: function() {
            $('#sach select, [name=ma_loai]').select2();

            $(document).on('click', '.btn-edit', function() {

                $('#full-width-modal').modal('show');
                var data = table.row($(this).closest("tr")).data();
                console.log(data);
                for (const [key, value] of Object.entries(data)) {
                    $('#sach [name=' + key + "]").val(value);
                }
                $('#nam_xuat_ban').data('daterangepicker').setStartDate(new Date(data
                    .nam_xuat_ban));
            });
            $('#add').click(function() {
                $('#sach')[0].trigger('reset');
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
                            "{{ route('admin.sach.destroy', ['sach' => ':id']) }}";
                        url = url.replace(':id', data.ma_sach);
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
        }



        });
        $('#ma_loai_filter').change(function() {
            table.ajax.reload();
        });
        $('#nam_xuat_ban').daterangepicker({
            "singleDatePicker": true,
            "autoApply": true,
            "startDate": moment(),
            locale: {
                format: 'DD/MM/YYYY'
            },
        });

        $('#save_form').click(function() {
            var form_data = new FormData($("#sach")[0]);
            form_data.set('nam_xuat_ban', $('#nam_xuat_ban').data('daterangepicker').startDate.format(
                'YYYY-MM-DD hh:mm:ss'));
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
