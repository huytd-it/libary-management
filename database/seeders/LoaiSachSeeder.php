<?php

namespace Database\Seeders;

use App\Models\LoaiSach;
use Illuminate\Database\Seeder;

class LoaiSachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LoaiSach::factory()->count(50)->create();
    }
}
