<?php

namespace Database\Seeders;

use App\Models\Sach;
use Database\Factories\SachFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Sach::factory()->count(200)->create();
    }
}
