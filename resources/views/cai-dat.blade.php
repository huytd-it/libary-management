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
                <h4 class="page-title">Cài đặt</h4>
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
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="simpleinput">Mã độc giả</label>
                                    <input type="text" id="ma_doc_gia" name="ma_doc_gia" class="form-control">
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
                    {{-- <button type="button" class="btn btn-primary" id="save_form">Save changes</button> --}}
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div id="setting" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="fullWidthModalLabel">Độc giả</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="" id="setting">
                        <div class="row">
                            @csrf
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="simpleinput">Mã độc giả</label>
                                    <input type="text" id="ma_doc_gia" name="ma_doc_gia" class="form-control">
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






                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary" id="save_form">Save changes</button> --}}
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">

                    <div class="row mb-2">
                        {{-- <div class="col-sm-4">
                            <button class="btn btn-success" data-toggle="modal" id="add"
                                data-target="#full-width-modal"><i class="mdi mdi-plus-circle mr-2"></i> Setting
                            </button>


                        </div> --}}
                        {{-- <div class="col-sm-8">
                            <div class="text-sm-right">
                                <button type="button" class="btn btn-success mb-2 mr-1" data-toggle="modal"
                                    data-target="#setting"><i class="mdi mdi-settings"></i></button>
                                <button type="button" class="btn btn-light mb-2 mr-1">Import</button>
                                <button type="button" class="btn btn-light mb-2">Export</button>
                            </div>
                        </div><!-- end col--> --}}
                    </div>
                    <form  id="cai-dat">
                        <div class="row">
                            @csrf
                            @foreach ($cai_dat as $item)

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="simpleinput">{{ $item->ten }}</label>
                                        <input type="text" id="{{ $item->ma_cai_dat }}" name="{{ $item->ma_cai_dat }}"
                                            class="form-control" value="{{ $item->gia_tri }}">
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </form>
                    <button type="button" class="btn btn-primary" id="save_form">Save changes</button>
                    {{-- <table id="basic-datatable" class="table dt-responsive nowrap ">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Họ tên</th>
                                <th>Ngày sinh</th>
                                <th>Loại độc giả</th>


                                <th>Ngày tạo</th>



                            </tr>
                        </thead>

                    </table> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!-- Datatable Init js -->
    <script type="text/javascript">
        $(document).ready(function() {




            $('#save_form').click(function() {
                var form_data = new FormData($("#cai-dat")[0]);
                var url = "{{ route('admin.cai-dat.store') }}";
                saveFormData(url, form_data, function(res) {
               
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
