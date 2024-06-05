<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MerkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('merk')->insert([
            ['nama_merk' => 'Wardah', 'gambar' => 'img/logo_wardah.png'],
            ['nama_merk' => 'Scarlett', 'gambar' => 'img/logo_scarlett.png'],
            ['nama_merk' => 'Skintific', 'gambar' => 'img/logo_skintific.png'],
        ]);
    }
}
