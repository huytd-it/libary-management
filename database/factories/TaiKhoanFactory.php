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
            'ho_ten' => $this->faker->name(),
            'ma_vai_tro' => $this->faker->numberBetween(1, 2),
            'trang_thai' => $this->faker->numberBetween(1, 2),
            'mat_khau' => Hash::make('lsts@123'),
            'create_by' => $this->faker->numberBetween(1, 1),
            'update_by' => $this->faker->numberBetween(1, 2)
        ];
    }
}
