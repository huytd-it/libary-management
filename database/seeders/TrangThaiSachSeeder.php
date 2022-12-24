<?php

namespace Database\Seeders;

use App\Models\TrangThaiSach;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class TrangThaiSachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        TrangThaiSach::create([
            'ten_trang_thai' => 'A',
            'create_by' => 1,
            'update_by' => 1,
        ]);
        TrangThaiSach::create([
            'ten_trang_thai' => 'B',
            'create_by' => 1,
            'update_by' => 1,

        ]);
        TrangThaiSach::create([
            'ten_trang_thai' => 'C',
            'create_by' => 1,
            'update_by' => 1,
        ]);
    }
}
