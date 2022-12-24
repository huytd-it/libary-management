<?php

namespace App\Http\Controllers;

use App\Models\LoaiSach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class LoaiSachController extends Controller
{
    public function index()
    {


        return view('loai-sach');
    }
    public function getAll()
    {
        $book = DB::table('loai_saches as L')
            ->whereNull('L.deleted_at')
            ->join('tai_khoans as T2', 'T2.ma_tai_khoan', '=', 'L.create_by')
            ->join('tai_khoans as T', 'T.ma_tai_khoan', '=', 'L.update_by')
            ->select(['L.*', 'T2.ten_tai_khoan as nguoi_tao', 'T.ten_tai_khoan as nguoi_cap_nhat'])
            ->get();


        return DataTables::of($book)->make(true);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ten_loai_sach' => 'required',

        ]);
        if (count($validator->errors()) > 0) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $exist = LoaiSach::where('ten_loai_sach', $request->ten_loai_sach)->first();
        if (isset($exist)) {
            $msg = ['message' => 'Tên loại sách đã tồn tại'];
            return response()->json($msg, 400);
        }
        $user = Auth::user();
        $exist = LoaiSach::where('ma_loai', $request->ma_loai)->first();
        if (isset($exist)) {
            $msg = ['message' => 'Cập nhật thể loại thành công'];
        } else {
            $msg = ['message' => 'Thêm  thể loại thành công'];
        }


        $loai_sach = LoaiSach::updateOrCreate(['ma_loai' => $request->ma_loai], [
            'ten_loai_sach' => $request->ten_loai_sach,
            'create_by' => $user->ma_tai_khoan,
            'update_by' => $user->ma_tai_khoan,
        ]);

        return response()->json($msg);
    }
    public function destroy(LoaiSach $loaiSach)
    {

        $loaiSach->delete();
        return response()->json(['message' => 'Xoá thành công']);

    }
}
