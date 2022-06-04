<?php

namespace Database\Seeders;

use App\Models\PhieuPhatTien;
use Illuminate\Database\Seeder;

class PhieuPhatTienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PhieuPhatTien::factory()->count(200)->create();
    }
}
