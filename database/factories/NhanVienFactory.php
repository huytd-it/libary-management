<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NhanVienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ten_nhan_vien' => $this->faker->name(),
            'ma_chuc_vu' => $this->faker->numberBetween(1, 5),
            'ma_bang_cap' => $this->faker->numberBetween(1, 5),
            'ten_tai_khoan' => $this->faker->numberBetween(1, 100),
            'create_by' => $this->faker->numberBetween(1, 5),
            'update_by' => $this->faker->numberBetween(1, 5)
        ];
    }
}
