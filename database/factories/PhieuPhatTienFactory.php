<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PhieuPhatTienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ma_doc_gia' => $this->faker->numberBetween(1, 5),
            'ma_nhan_vien' => $this->faker->numberBetween(1, 15),
            'ma_sach' => $this->faker->numberBetween(1, 15),
            'so_tien_thu' => $this->faker->numberBetween(1, 15)*10000,
            'create_by' => $this->faker->numberBetween(1, 5),
            'update_by' => $this->faker->numberBetween(1, 5)
        ];
    }
}
