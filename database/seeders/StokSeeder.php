<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'stok_id' => 111,
                'barang_id' => 1,
                'user_id' => 1,
                'stok_tanggal' => '2024-02-25',
                'stok_jumlah' => 25,
            ],
            [
                'stok_id' => 112,
                'barang_kode' => 2,
                'user_id' => 2,
                'stok_tanggal' => '2024-02-25',
                'stok_jumlah' => 30,
            ],
            [
                'stok_id' => 113,
                'barang_kode' => 3,
                'user_id' => 3,
                'stok_tanggal' => '2024-02-25',
                'stok_jumlah' => 17,
            ],
            [
                'stok_id' => 114,
                'barang_kode' => 4,
                'user_id' => 1,
                'stok_tanggal' => '2024-02-25',
                'stok_jumlah' => 30,
            ],[
                'stok_id' => 115,
                'barang_kode' => 5,
                'user_id' => 2,
                'stok_tanggal' => '2024-02-25',
                'stok_jumlah' => 32,
            ],
            [
                'stok_id' => 116,
                'barang_kode' => 6,
                'user_id' => 1,
                'stok_tanggal' => '2024-02-25',
                'stok_jumlah' => 18,
            ],
            [
                'stok_id' => 117,
                'barang_kode' => 7,
                'user_id' => 3,
                'stok_tanggal' => '2024-02-25',
                'stok_jumlah' => 19,
            ],
            [
                'stok_id' => 118,
                'barang_kode' => 8,
                'user_id' => 1,
                'stok_tanggal' => '2024-02-25',
                'stok_jumlah' => 15,
            ],
            [
                'stok_id' => 119,
                'barang_kode' => 9,
                'user_id' => 2,
                'stok_tanggal' => '2024-02-25',
                'stok_jumlah' => 30,
            ],
            [
                'stok_id' => 121,
                'barang_kode' => 10,
                'user_id' => 2,
                'stok_tanggal' => '2024-02-25',
                'stok_jumlah' => 35,
            ],
        ];
        DB::table('t_stok')->insert($data);
    }
}
