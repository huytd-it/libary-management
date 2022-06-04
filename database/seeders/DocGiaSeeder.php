<?php

namespace Database\Seeders;

use App\Models\DocGia;
use Illuminate\Database\Seeder;

class DocGiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DocGia::factory()->count(100)->create();
    }
}
