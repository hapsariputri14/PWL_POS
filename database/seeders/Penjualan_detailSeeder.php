<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Penjualan_detailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'detail_id' => 1,
                'penjualan_id' => 101,
                'barang_id' => 1,
                'harga' => 7500000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 2,
                'penjualan_id' => 102,
                'barang_id' => 2,
                'harga' => 1000000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 3,
                'penjualan_id' => 103,
                'barang_id' => 3,
                'harga' => 6000000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 4,
                'penjualan_id' => 104,
                'barang_id' => 4,
                'harga' => 15000000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 5,
                'penjualan_id' => 105,
                'barang_id' => 5,
                'harga' => 450000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 6,
                'penjualan_id' => 106,
                'barang_id' => 6,
                'harga' => 465000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 7,
                'penjualan_id' => 107,
                'barang_id' => 7,
                'harga' => 4500000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 8,
                'penjualan_id' => 108,
                'barang_id' => 8,
                'harga' => 2100000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 9,
                'penjualan_id' => 109,
                'barang_id' => 9,
                'harga' => 4200000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 10,
                'penjualan_id' => 110,
                'barang_id' => 10,
                'harga' => 2100000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 11,
                'penjualan_id' => 110,
                'barang_id' => 10,
                'harga' => 2100000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 12,
                'penjualan_id' => 109,
                'barang_id' => 9,
                'harga' => 4200000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 13,
                'penjualan_id' => 108,
                'barang_id' => 8,
                'harga' => 2100000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 14,
                'penjualan_id' => 107,
                'barang_id' => 7,
                'harga' => 4500000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 15,
                'penjualan_id' => 106,
                'barang_id' => 6,
                'harga' => 465000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 16,
                'penjualan_id' => 105,
                'barang_id' => 5,
                'harga' =>  450000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 17,
                'penjualan_id' => 104,
                'barang_id' => 4,
                'harga' => 15000000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 18,
                'penjualan_id' => 103,
                'barang_id' => 3,
                'harga' => 6000000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 19,
                'penjualan_id' => 102,
                'barang_id' => 2,
                'harga' => 1000000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 20,
                'penjualan_id' => 101,
                'barang_id' => 1,
                'harga' => 7500000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 21,
                'penjualan_id' => 102,
                'barang_id' => 2,
                'harga' => 7500000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 22,
                'penjualan_id' => 102,
                'barang_id' => 2,
                'harga' => 1000000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 23,
                'penjualan_id' => 103,
                'barang_id' => 3,
                'harga' => 6000000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 24,
                'penjualan_id' => 106,
                'barang_id' => 4,
                'harga' => 15000000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 25,
                'penjualan_id' => 105,
                'barang_id' => 5,
                'harga' => 450000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 26,
                'penjualan_id' => 106,
                'barang_id' => 6,
                'harga' => 465000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 27,
                'penjualan_id' => 107,
                'barang_id' => 7,
                'harga' => 4500000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 28,
                'penjualan_id' => 108,
                'barang_id' => 8,
                'harga' => 2100000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 29,
                'penjualan_id' => 109,
                'barang_id' => 9,
                'harga' => 4200000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 30,
                'penjualan_id' => 110,
                'barang_id' => 10,
                'harga' => 2100000,
                'jumlah' => 3,
            ],
        ];
        DB::table('t_penjualan_detail')->insert($data);
    }
}
