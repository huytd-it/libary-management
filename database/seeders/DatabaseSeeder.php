<?php

namespace Database\Seeders;

use App\Models\BangCap;
use App\Models\ChucVu;
use App\Models\DocGia;
use App\Models\LoaiSach;
use App\Models\NhanVien;
use App\Models\NhaXuatBan;
use App\Models\PhieuMuonTra;
use App\Models\PhieuPhatTien;
use App\Models\PhieuThanhLy;
use App\Models\PhongBan;
use App\Models\Sach;
use App\Models\TacGia;
use App\Models\TaiKhoan;
use App\Models\TrangThaiSach;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        BangCap::factory()->count(10)->create();
        ChucVu::factory()->count(5)->create();
        DocGia::factory()->count(100)->create();
        LoaiSach::factory()->count(50)->create();
        NhanVien::factory()->count(50)->create();
        NhaXuatBan::factory()->count(50)->create();
        PhieuMuonTra::factory()->count(500)->create();
        PhieuPhatTien::factory()->count(500)->create();
        PhieuThanhLy::factory()->count(500)->create();
        PhongBan::factory()->count(10)->create();
        Sach::factory()->count(300)->create();
        TacGia::factory()->count(100)->create();
        TaiKhoan::factory()->count(10)->create();
        TrangThaiSach::factory()->count(100)->create();
    }
}
