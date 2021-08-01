<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\Jabatan::factory(10)->create();
        // \App\Models\Golongan::factory(10)->create();
        \App\Models\Pegawai::factory(10)->create();
    }
}
