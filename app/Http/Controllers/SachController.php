<?php

namespace App\Http\Controllers;

use App\Models\Sach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class SachController extends Controller
{
    public function getAll()
    {
        $book = DB::table('saches as S')
        ->join('tac_gias as T', 'T.ma_tac_gia' , '=', 'S.ma_tac_gia')
        ->join('trang_thai_saches as TT', 'TT.ma_trang_thai' , '=', 'S.ma_trang_thai')
        ->join('nha_xuat_bans as N', 'N.ma_nxb' , '=', 'S.ma_nxb')
        ->join('loai_saches as LS', 'LS.ma_loai' , '=', 'S.ma_loai')
        ->orderByDesc('S.ma_sach')
        ->get();
        return DataTables::of($book)->make(true);
    }
    public function index()
    {
        
        return view('books');
    }
    public function store(Request $request)
    {

        Sach::updateOrCreate(['ma_sach' => $request->ma_sach],[
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
    }
}
