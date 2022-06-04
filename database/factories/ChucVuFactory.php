<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ChucVuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ten_chuc_vu' => $this->faker->firstName(),
            'create_by' => $this->faker->numberBetween(1, 5),
            'update_by' => $this->faker->numberBetween(1, 5)
        ];
    }
}
