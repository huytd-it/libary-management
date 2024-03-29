<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PhieuMuonTraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ma_doc_gia' => $this->faker->numberBetween(1, 100),
            'ma_sach' => $this->faker->numberBetween(1, 100),
            'ngay_muon' => $this->faker->dateTime(),
            'ma_trang_thai' => $this->faker->numberBetween(1, 3),
            'ngay_tra' => $this->faker->dateTime(),
            'tien_phat_ky_nay' => $this->faker->numberBetween(1, 335)*10000,
            'create_by' => $this->faker->numberBetween(1, 5),
            'update_by' => $this->faker->numberBetween(1, 5)

        ];
    }
}
