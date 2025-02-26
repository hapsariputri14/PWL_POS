<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'penjualan_id' => 101,
                'user_id' => 2,
                'pembeli' => 'Yogianna Nur',
                'penjualan_kode' => '01',
                'penjualan_tanggal' => '2024-02-25',
            ],
            [
                'penjualan_id' => 102,
                'user_id' => 3,
                'pembeli' => 'Masitha',
                'penjualan_kode' => '02',
                'penjualan_tanggal' => '2024-02-26',
            ],
            [
                'penjualan_id' => 103,
                'user_id' => 1,
                'pembeli' => 'Azzhra',
                'penjualan_kode' => '03',
                'penjualan_tanggal' => '2024-02-27',
            ],
            [
                'penjualan_id' => 104,
                'user_id' => 1,
                'pembeli' => 'Naruto',
                'penjualan_kode' => '04',
                'penjualan_tanggal' => '2024-02-28',
            ],
            [
                'penjualan_id' => 105,
                'user_id' => 2,
                'pembeli' => 'Chintia',
                'penjualan_kode' => '05',
                'penjualan_tanggal' => '2024-03-01',
            ],
            [
                'penjualan_id' => 106,
                'user_id' => 3,
                'pembeli' => 'Aprilia',
                'penjualan_kode' => '06',
                'penjualan_tanggal' => '2024-03-02',
            ],
            [
                'penjualan_id' => 107,
                'user_id' => 1,
                'pembeli' => 'Mail',
                'penjualan_kode' => '07',
                'penjualan_tanggal' => '2024-03-03',
            ],
            [
                'penjualan_id' => 108, 
                'user_id' => 2,
                'pembeli' => 'Budi',
                'penjualan_kode' => '08',
                'penjualan_tanggal' => '2024-03-04',
            ],
            [
                'penjualan_id' => 109,
                'user_id' => 3,
                'pembeli' => 'Ratnasari',
                'penjualan_kode' => '09',
                'penjualan_tanggal' => '2024-03-05',
            ],
            [
                'penjualan_id' => 110,
                'user_id' => 1,
                'pembeli' => 'Surya',
                'penjualan_kode' => '10',
                'penjualan_tanggal' => '2024-03-06',
            ],
        ];
        DB::table('t_penjualan')->insert($data);
    }
}
