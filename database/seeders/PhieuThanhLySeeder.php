<?php

namespace Database\Seeders;

use App\Models\PhieuThanhLy;
use Illuminate\Database\Seeder;

class PhieuThanhLySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PhieuThanhLy::factory()->count(200)->create();
    }
}
