<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class TaiKhoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ten_tai_khoan' => $this->faker->userName(),
            'mat_khau' => Hash::make('lsts@123'),
            'create_by' => $this->faker->numberBetween(1, 15),
            'update_by' => $this->faker->numberBetween(1, 15)
        ];
    }
}
