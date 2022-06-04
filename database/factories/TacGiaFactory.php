<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TacGiaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ten_tac_gia' => $this->faker->name(),
            'gioi_thieu' => $this->faker->paragraph(5),
            'create_by' => $this->faker->numberBetween(1, 15),
            'update_by' => $this->faker->numberBetween(1, 15)
        ];
    }
}
