<?php

namespace Database\Seeders;

use App\Models\TacGia;
use Illuminate\Database\Seeder;

class TacGiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TacGia::factory()->count(50)->create();
    }
}
