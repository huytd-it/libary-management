<?php

namespace App\Http\Controllers;

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
        ->get();
        return DataTables::of($book)->make(true);
    }
    public function index()
    {
        return view('books');
    }
}
