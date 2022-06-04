<?php

namespace Database\Seeders;

use App\Models\BangCap;
use Illuminate\Database\Seeder;

class BangCapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       BangCap::factory()->count(10)->create();
    }
}
