<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategori')->insert([
            ['nama_kategori' => 'Toner'],
            ['nama_kategori' => 'Moisturizer'],
            ['nama_kategori' => 'Serum'],
            ['nama_kategori' => 'Sunscreen'],
        ]);
    }
}
