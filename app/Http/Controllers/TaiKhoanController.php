<?php

namespace App\Http\Controllers;

use App\Models\LoaiSach;
use App\Models\NhaXuatBan;
use App\Models\TacGia;
use App\Models\TrangThaiSach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
