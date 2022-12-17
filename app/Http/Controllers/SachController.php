<?php

namespace App\Http\Controllers;

use App\Models\LoaiSach;
use App\Models\NhaXuatBan;
use App\Models\Sach;
use App\Models\TacGia;
use App\Models\TrangThaiSach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class SachController extends Controller
{
    public function getAll()
    {
        $book = DB::table('saches as S')
            ->join('tac_gias as T', 'T.ma_tac_gia', '=', 'S.ma_tac_gia')
            ->join('trang_thai_saches as TT', 'TT.ma_trang_thai', '=', 'S.ma_trang_thai')
            ->join('nha_xuat_bans as N', 'N.ma_nxb', '=', 'S.ma_nxb')
            ->join('loai_saches as LS', 'LS.ma_loai', '=', 'S.ma_loai')
            ->select([
                'S.*', 'T.ten_tac_gia', 'T.ma_tac_gia', 'TT.ten_trang_thai',
                'TT.ma_trang_thai', 'N.ten_nxb', 'N.ma_nxb', 'LS.ma_loai', 'LS.ten_loai_sach'
            ])
            ->get();

        return DataTables::of($book)->make(true);
    }
    public function index()
    {
        $tac_gia = TacGia::all();
        $trang_thai = TrangThaiSach::all();
        $nxb = NhaXuatBan::all();
        $loai_sach = LoaiSach::all();
        return view(
            'books',
            [
                'loai_sach' => $loai_sach,
                'tac_gia' => $tac_gia,
                'trang_thai' => $trang_thai,
                'nxb' => $nxb
            ]
        );
    }
    public function store(Request $request)
    {

        $exist = Sach::where('ma_sach', $request->ma_sach)->first();
        if (isset($exist)) {
            $msg = ['message' => 'Cập nhật sách thành công'];
        }else {
            $msg = ['message' => 'Thêm sách thành công'];
        }
        $sach =  Sach::updateOrCreate(['ma_sach' => $request->ma_sach], [
            'ten_sach' => $request->ten_sach,
            'ma_tac_gia' => $request->ma_tac_gia,
            'ma_trang_thai' => $request->ma_trang_thai,
            'ma_nxb' => $request->ma_nxb,
            'ma_loai' => $request->ma_loai,
            'gia_tri' => $request->gia_tri,
            'ma_nhan_vien' => "1",
            'create_by' => "1",
            'update_by' => "1",
        ]);


        return response()->json($msg);
    }
}
