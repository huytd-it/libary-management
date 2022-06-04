<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PhongBanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ten_phong_ban' => $this->faker->lastName(),
            'ma_nhan_vien' => $this->faker->numberBetween(1, 5),
            'create_by' => $this->faker->numberBetween(1, 5),
            'update_by' => $this->faker->numberBetween(1, 5)
        ];
    }
}
