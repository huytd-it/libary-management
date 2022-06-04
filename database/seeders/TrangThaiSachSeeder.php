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
     TrangThaiSach::factory()->count(10)->create();
    }
}
