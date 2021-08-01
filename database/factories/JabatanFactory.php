<?php

namespace Database\Factories;

use App\Models\Jabatan;
use Illuminate\Database\Eloquent\Factories\Factory;

class JabatanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Jabatan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kode_jabatan' => rand(001,100),
            'nama_jabatan' => $this->faker->name,
            'gaji_pokok' => 5500000,
            'tunjangan_jabatan' => 2500000
        ];
    }
}
