<?php

namespace App\Http\Controllers;

use App\Models\LoaiSach;
use App\Models\NhaXuatBan;
use App\Models\TacGia;
use App\Models\TaiKhoan;
use App\Models\TrangThaiSach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class TaiKhoanController extends Controller
{
    public function index()
    {
        $tac_gia = TacGia::all();
        $trang_thai = TrangThaiSach::all();
        $nxb = NhaXuatBan::all();
        $loai_sach = LoaiSach::all();
        return view(
            'tai-khoan',
            [
                'loai_sach' => $loai_sach,
                'tac_gia' => $tac_gia,
                'trang_thai' => $trang_thai,
                'nxb' => $nxb
            ]
        );
    }

    public function getAll()
    {
        $tk = DB::table('tai_khoans as T')

            ->join('tai_khoans as T2', 'T.create_by', '=', 'T2.ma_tai_khoan')
            ->select(['T.ma_tai_khoan', 'T.ten_tai_khoan', 'T.ho_ten', 'T.created_at', 'T.updated_at', 'T.ma_vai_tro', 'T.trang_thai', 'T2.ten_tai_khoan as nguoi_tao'])
            ->get();

        
        return DataTables::of($tk)->make(true);
    }
    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'ten_tai_khoan' => 'required',
            'ho_ten' => 'required',
            'trang_thai' => 'required',
            'ma_vai_tro' => 'required',
        ]);
        if(count($validator->errors()) > 0) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $data = [
            'ten_tai_khoan' => $request->ten_tai_khoan,
            'ho_ten' => $request->ho_ten,
            'trang_thai' => $request->trang_thai,
            'ma_vai_tro' => $request->ma_vai_tro
        ];



        $exist = TaiKhoan::where('ma_tai_khoan', $request->ma_tai_khoan)->first();
        if (isset($exist)) {
            $data['update_by'] = Auth::user()->ma_tai_khoan;
            if(isset($request->mat_khau) && $request->mat_khau != '') {
                $data['mat_khau'] = Hash::make($request->mat_khau);
            }
            $msg = ['message' => 'Cập nhật tài khoản thành công'];
        }else {
            if(isset($request->mat_khau) && $request->mat_khau != '') {
                $data['mat_khau'] = Hash::make($request->mat_khau);
            }else {
                return response()->json(['errors' => ['mat_khau' => 'Mật khẩu không được bỏ trống']], 400);
            }
            if(isset($request->ten_tai_khoan)) {
                $tai_khoan = TaiKhoan::where('ten_tai_khoan', $request->ten_tai_khoan)->first();
                if(isset($tai_khoan->ma_tai_khoan)){
                    return response()->json(['errors' => ['ten_tai_khoan' => 'Tên tài khoản đã tồn tại']], 400);
                }
            }
            $data['update_by'] = Auth::user()->ma_tai_khoan;
            $data['create_by'] = Auth::user()->ma_tai_khoan;
            $msg = ['message' => 'Thêm tài khoản thành công'];
        }


        $tai_khoan =  TaiKhoan::updateOrCreate(['ma_tai_khoan' => $request->ma_tai_khoan], $data);


        return response()->json($msg);
    }
}
