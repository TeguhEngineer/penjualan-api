<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MitraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mitras')->insert([
            [
                'nama' => 'Toko Sumber Rejeki',
                'alamat' => 'Jl. Merdeka No. 10, Bandung',
                'no_hp' => '081234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Warung Bu Tini',
                'alamat' => 'Jl. Kalasan No. 23, Yogyakarta',
                'no_hp' => '082112345678',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Toko Pak Slamet',
                'alamat' => 'Jl. Sudirman No. 5, Semarang',
                'no_hp' => '085612345432',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Toko Laris Manis',
                'alamat' => 'Jl. Pahlawan No. 45, Surabaya',
                'no_hp' => '087712341234',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Agen Kerupuk Mbak Sari',
                'alamat' => 'Jl. Anggrek No. 2, Malang',
                'no_hp' => '081322334455',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Warung Pak Darto',
                'alamat' => 'Jl. Siliwangi No. 9, Cirebon',
                'no_hp' => '082167894532',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Toko Maju Lancar',
                'alamat' => 'Jl. Diponegoro No. 17, Bogor',
                'no_hp' => '083823456789',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Warung Nenek Rina',
                'alamat' => 'Jl. Mawar No. 3, Solo',
                'no_hp' => '085678901234',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Kios Murah Jaya',
                'alamat' => 'Jl. Imam Bonjol No. 19, Jakarta',
                'no_hp' => '087812341212',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Agen Toko Sentosa',
                'alamat' => 'Jl. Melati No. 8, Bekasi',
                'no_hp' => '089901234567',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
