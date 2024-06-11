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
            ['nama_merk' => 'Wardah'],
            ['nama_merk' => 'Scarlett'],
            ['nama_merk' => 'Skintific'],
        ]);
    }
}
