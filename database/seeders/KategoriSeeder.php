<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_kategori')->truncate();
        $data = [
            [
                'kategori_id' => 1,
                'kategori_kode' => 'YN001',
                'kategori_nama' => 'Furniture ruang tamu',
            ],
            [
                'kategori_id' => 2,
                'kategori_kode' => 'YN002',
                'kategori_nama' => 'Furniture kamar tidur',
            ],
            [
                'kategori_id' => 3,
                'kategori_kode' => 'YN003',
                'kategori_nama' => 'Furniture ruang makan',
            ],
            [
                'kategori_id' => 4,
                'kategori_kode' => 'YN004',
                'kategori_nama' => 'Furniture dapur',
            ],
            [
                'kategori_id' => 5,
                'kategori_kode' => 'YN005',
                'kategori_nama' => 'Furniture ruang kerja',
            ]
        ];
        DB::table('m_kategori')->insert($data);
    }
}
