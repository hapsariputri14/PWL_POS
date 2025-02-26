<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'barang_id' => 1,
                'kategori_id' => 1,
                'barang_kode' => '011',
                'barang_nama' => 'Sofa',
                'harga_beli' => 1000000,
                'harga_jual' => 2500000,
            ],
            [
                'barang_id' => 2,
                'kategori_id' => 1,
                'barang_kode' => '012',
                'barang_nama' => 'Hiasan Dinding',
                'harga_beli' => 600000,
                'harga_jual' => 1000000,
            ],
            [
                'barang_id' => 3,
                'kategori_id' => 2,
                'barang_kode' => '021',
                'barang_nama' => 'Kasur',
                'harga_beli' => 1500000,
                'harga_jual' => 2000000,
            ],
            [
                'barang_id' => 4,
                'kategori_id' => 2,
                'barang_kode' => '022',
                'barang_nama' => 'Lemari',
                'harga_beli' => 3000000,
                'harga_jual' => 5000000,
            ],
            [
                'barang_id' => 5,
                'kategori_id' => 3,
                'barang_kode' => '031',
                'barang_nama' => 'Piring',
                'harga_beli' => 100000,
                'harga_jual' => 150000,
            ],
            [
                'barang_id' => 6,
                'kategori_id' => 3,
                'barang_kode' => '032',
                'barang_nama' => 'Gelas',
                'harga_beli' => 100000,
                'harga_jual' => 155000,
            ],
            [
                'barang_id' => 7,
                'kategori_id' => 4,
                'barang_kode' => '041',
                'barang_nama' => 'Kompor Elektric',
                'harga_beli' => 800000,
                'harga_jual' => 1500000,
            ],
            [
                'barang_id' => 8,
                'kategori_id' => 4,
                'barang_kode' => '042',
                'barang_nama' => 'Wastafel',
                'harga_beli' => 300000,
                'harga_jual' => 700000,
            ],
            [
                'barang_id' => 9,
                'kategori_id' => 5,
                'barang_kode' => '051',
                'barang_nama' => 'Meja',
                'harga_beli' => 800000,
                'harga_jual' => 1050000,
            ],
            [
                'barang_id' => 10,
                'kategori_id' => 5,
                'barang_kode' => '052',
                'barang_nama' => 'Lampu',
                'harga_beli' => 500000,
                'harga_jual' => 700000,
            ],
        ];
        DB::table('m_barang')->insert($data);
    }
}
