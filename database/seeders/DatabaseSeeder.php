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
use App\Models\Setting;
use App\Models\TacGia;
use App\Models\TaiKhoan;
use App\Models\TrangThaiSach;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        TaiKhoan::create([
            'ten_tai_khoan' => 'admin',
            'mat_khau' => Hash::make('lsts@123'),
            'create_by' => 1, 'update_by' => 1,
            'trang_thai' => 1, 'ma_vai_tro' => 1,
            'ho_ten' => 'Administrator'
        ]);
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
        Setting::create([
            'ten' => 'Số tuổi tối đa',
            'ten_thay_the' => 'tuoi_toi_da',
            'gia_tri' => '35'
        ]);
        Setting::create([
            'ten' => 'Số tuổi tối thiểu',
            'ten_thay_the' => 'tuoi_toi_da',
            'gia_tri' => '18'
        ]);
        Setting::create([
            'ten' => 'Thời hạn giá trị của thẻ',
            'ten_thay_the' => 'gia_han_the',
            'gia_tri' => '6'
        ]);
        Setting::create([
            'ten' => 'Số sách đượn mượn tối đa',
            'ten_thay_the' => 'so_sach_muon_toi_da',
            'gia_tri' => '4'
        ]);
        Setting::create([
            'ten' => 'Số ngày được mượn tối đa',
            'ten_thay_the' => 'so_ngay_muon_toi_da',
            'gia_tri' => '5'
        ]);
    }
}
