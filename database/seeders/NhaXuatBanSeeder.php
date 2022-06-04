<?php

namespace Database\Seeders;

use App\Models\NhaXuatBan;
use Illuminate\Database\Seeder;

class NhaXuatBanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NhaXuatBan::factory()->count(50)->create();
    }
}
