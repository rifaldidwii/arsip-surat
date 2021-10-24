<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('surat')->insert([
            [
                'nomor_surat' => '2020/PD3/TU/001',
                'id_kategori' => 2,
                'judul' => 'Undangan Rapat',
                'file_surat' => '21-60-1-10-20180905.pdf',
                'created_at' => now(),
            ],
            [
                'nomor_surat' => '2020/PD1/TU/022',
                'id_kategori' => 1,
                'judul' => 'Pengumuman Wisuda',
                'file_surat' => '89-386-1-PB.pdf',
                'created_at' => now(),
            ],
            [
                'nomor_surat' => '2020/PD1/TU/014',
                'id_kategori' => 3,
                'judul' => 'Nota Dinas WFH',
                'file_surat' => '199-194-1-PB.pdf',
                'created_at' => now(),
            ],
        ]);
    }
}
