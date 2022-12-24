<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SachFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'ten_sach' => $this->faker->name(),
           'ma_tac_gia' => $this->faker->numberBetween(1, 15),
           'ma_trang_thai' => $this->faker->numberBetween(1, 3),
           'ma_nxb' => $this->faker->numberBetween(1, 15),
           'nam_xuat_ban' => $this->faker->dateTimeBetween("-8 year"),
           'ma_loai' => $this->faker->numberBetween(1, 3),
           'gia_tri' => $this->faker->numberBetween(1, 3)*100000,
           'ma_nhan_vien' => $this->faker->numberBetween(1, 3),
           'create_by' => $this->faker->numberBetween(1, 15),
           'update_by' => $this->faker->numberBetween(1, 15)

        ];
    }
}
