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
            'loai_doc_gia' => $this->faker->numberBetween(1, 5),
            'ngay_sinh' => $this->faker->dateTime(),
            'dia_chi' => $this->faker->address(1, 5),
            'email' => $this->faker->email(),
            'create_by' => $this->faker->numberBetween(1, 5),
            'update_by' => $this->faker->numberBetween(1, 5)
        ];
    }
}
