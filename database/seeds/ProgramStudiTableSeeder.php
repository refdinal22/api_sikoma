<?php

use Illuminate\Database\Seeder;

class ProgramStudiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $programStudi = [
            ['name' => 'D3-Teknik Konstruksi Gedung', 'department_id' => 4],
            ['name' => 'D3-Teknik Konstruksi Sipil', 'department_id' => 4],
            ['name' => 'D4-Teknik Perancangan Jalan Dan Jembatan', 'department_id' => 4],
            ['name' => 'D4-Teknik Perawatan dan Perbaikan Gedung', 'department_id' => 4],
            ['name' => 'D3-Teknik Mesin', 'department_id' => 5],
            ['name' => 'D3-Aeronautika', 'department_id' => 5],
            ['name' => 'D4-Teknik Perancangan dan Konstruksi Mesin', 'department_id' => 5],
            ['name' => 'D4-Proses Manufaktur', 'department_id' => 5],
            ['name' => 'D3-Teknik Pendingin dan Tata Udara', 'department_id' => 6],
            ['name' => 'D4-Teknik Pendingin dan Tata Udara', 'department_id' => 6],
            ['name' => 'D3-Teknik Konversi Energi', 'department_id' => 7],
            ['name' => 'D4-Teknologi Pembangkit Tenaga Listrik', 'department_id' => 7],
            ['name' => 'D4-Teknik Konservasi Energi', 'department_id' => 7],
            ['name' => 'D3-Teknik Elektronika', 'department_id' => 8],
            ['name' => 'D3-Teknik Listrik', 'department_id' => 8],
            ['name' => 'D3-Teknik Telekomunikasi', 'department_id' => 8],
            ['name' => 'D4-Teknik Elektronika', 'department_id' => 8],
            ['name' => 'D4-Teknik Otomasi Industri', 'department_id' => 8],
            // ['name' => 'D4-Teknik Telekomunikasi', 'department_id' => 5],
            ['name' => 'D3-Teknik Kimia', 'department_id' => 9],
            ['name' => 'D3-Analis Kimia', 'department_id' => 9],
            ['name' => 'D4-Teknik Kimia Produksi Bersih', 'department_id' => 9],          
            ['name' => 'D3-Akuntansi', 'department_id' => 10],
            ['name' => 'D3-Keuangan dan Perbankan', 'department_id' => 10],
            ['name' => 'D4-Akuntansi Manajemen Pemerintahan', 'department_id' => 10],
            ['name' => 'D4-Keuangan Syariah', 'department_id' => 10],
            ['name' => 'D4-Akuntansi', 'department_id' => 10],
            ['name' => 'D3-Administrasi Bisnis', 'department_id' => 11],
            ['name' => 'D3-Usaha Perjalanan Wisata', 'department_id' => 11],
            ['name' => 'D3-Manajemen Pemasaran', 'department_id' => 11],
            ['name' => 'D4-Administrasi Bisnis', 'department_id' => 11],
            ['name' => 'D4-Manajemen Aset', 'department_id' => 11],
            ['name' => 'D4-Manajemen Pemasaran', 'department_id' => 11],
            ['name' => 'D3-Bahasa Inggris', 'department_id' => 12],
        ];

        foreach($programStudi as $programStudiItem){
    		App\SProgram::create($programStudiItem);
		}
    }
}
