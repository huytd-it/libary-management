<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DocGiaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ten_doc_gia' => $this->faker->name(),
            'ma_loai' => $this->faker->numberBetween(1, 2),
            'ngay_sinh' => $this->faker->dateTimeBetween("-35 year", "-18 year"),
            'dia_chi' => $this->faker->address(1, 100),
            'email' => $this->faker->email(),
            'create_by' => $this->faker->numberBetween(1, 2),
            'update_by' => $this->faker->numberBetween(1, 2)
        ];
    }
}
