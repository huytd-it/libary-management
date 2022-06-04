<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TrangThaiSachFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ten_trang_thai' => $this->faker->lastName(),
            'create_by' => $this->faker->numberBetween(1, 15),
            'update_by' => $this->faker->numberBetween(1, 15)
        ];
    }
}
