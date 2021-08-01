<?php

namespace Database\Factories;

use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\Golongan;
use App\Models\JenisKelamin;
use Illuminate\Database\Eloquent\Factories\Factory;

class PegawaiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pegawai::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nip' => rand(100, 200),
            'nama_pegawai' => $this->faker->name,
            'jabatan_id' => function(){
                return Jabatan::all()->random();
            },
            'golongan_id' => function(){
                return Golongan::all()->random();
            },
            'jenis_kelamin_id' => function(){
                return JenisKelamin::all()->random();
            },
            'telepon' => rand(1000, 2000)
        ];
    }
}
