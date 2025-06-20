<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produks')->insert([
            [
                'nama_produk' => 'Kerupuk Udang Besar',
                'harga' => 5000,
                'stok' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Kerupuk Ikan Tenggiri',
                'harga' => 7000,
                'stok' => 40,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Kerupuk Kulit Sapi',
                'harga' => 4000,
                'stok' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Kerupuk Jengkol',
                'harga' => 5000,
                'stok' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Kerupuk Melinjo',
                'harga' => 6000,
                'stok' => 70,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Kerupuk Bawang Mini',
                'harga' => 8000,
                'stok' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Kerupuk Pedas Balado',
                'harga' => 6000,
                'stok' => 45,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Kerupuk Puli',
                'harga' => 7000,
                'stok' => 80,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Kerupuk Rambak',
                'harga' => 8000,
                'stok' => 35,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Kerupuk Kemplang Panggang',
                'harga' => 5000,
                'stok' => 55,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
