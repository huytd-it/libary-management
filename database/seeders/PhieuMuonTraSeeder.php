<?php

namespace Database\Seeders;

use App\Models\PhieuMuonTra;
use Illuminate\Database\Seeder;

class PhieuMuonTraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PhieuMuonTra::factory()->count(100)->create();
    }
}
