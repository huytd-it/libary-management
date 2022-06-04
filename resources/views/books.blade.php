@extends('layout')
@section('css')
    <!-- Datatables css -->
    <link href="{{ asset('assets/css/vendor/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <button class="btn btn-success"> Thêm sách </button>
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

        $('#books').DataTable({
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
            columns:[
                {
                    data:'ten_sach'
                },
                {
                    data:'ten_loai_sach'
                },
                {
                    data:'ten_nxb'
                },
                {
                    data:'ten_trang_thai'
                },
                {
                    data:'ten_tac_gia'
                },
                {
                    data:'gia_tri'
                },
                {
                    data:null,
                    render:function(){
                        return '<button class="btn btn-success">Sửa</button>';
                    }
                }
            ],


        });
    </script>
@endsection
