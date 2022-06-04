<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PhieuThanhLyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ngay_thanh_li' => $this->faker->dateTime(),
            'ma_doc_gia' => $this->faker->numberBetween(1, 15),
            'create_by' => $this->faker->numberBetween(1, 5),
            'update_by' => $this->faker->numberBetween(1, 5)
        ];
    }
}
