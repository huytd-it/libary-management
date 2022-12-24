<?php

namespace Database\Seeders;

use App\Models\BangCap;
use App\Models\ChucVu;
use App\Models\DocGia;
use App\Models\LoaiDocGia;
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
        DocGia::factory()->count(100)->create();
        Sach::factory()->count(500)->create();
        TaiKhoan::factory()->count(5)->create();
        PhieuMuonTra::factory()->count(100)->create();
        NhaXuatBan::factory()->count(50)->create();
        TacGia::factory()->count(50)->create();
        LoaiSach::create([
            'ten_loai_sach' => 'A',
            'create_by' => 1,
            'update_by' => 1,
        ]);
        LoaiSach::create([
            'ten_loai_sach' => 'B',
            'create_by' => 1,
            'update_by' => 1,
        ]);
        LoaiSach::create([
            'ten_loai_sach' => 'C',
            'create_by' => 1,
            'update_by' => 1,
        ]);
        TrangThaiSach::create([
            'ten_trang_thai' => 'Đã mất',
            'create_by' => 1,
            'update_by' => 1,
        ]);
        TrangThaiSach::create([
            'ten_trang_thai' => 'Đã hết hạn',
            'create_by' => 1,
            'update_by' => 1,

        ]);
        TrangThaiSach::create([
            'ten_trang_thai' => 'Đã thanh lý',
            'create_by' => 1,
            'update_by' => 1,
        ]);
    }
}
