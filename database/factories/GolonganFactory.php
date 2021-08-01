<?php

namespace Database\Factories;

use App\Models\Golongan;
use Illuminate\Database\Eloquent\Factories\Factory;

class GolonganFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Golongan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kode_golongan' => rand(100, 200),
            'uang_makan' => rand(100000, 200000),
            'uang_lembur' => rand(100000, 200000),
            'asuransi_kesehatan' => rand(100000, 200000)
        ];
    }
}
