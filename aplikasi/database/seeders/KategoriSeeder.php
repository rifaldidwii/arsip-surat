<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori')->insert([
            [
                'nama' => 'Undangan',
                'created_at' => now(),
            ],
            [
                'nama' => 'Pengumuman',
                'created_at' => now(),
            ],
            [
                'nama' => 'Nota Dinas',
                'created_at' => now(),
            ],
            [
                'nama' => 'Pemberitahuan',
                'created_at' => now(),
            ],
        ]);
    }
}
