<?php

use Illuminate\Database\Seeder;

class JurusanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jurusan = [
            ['name' => 'Teknik Sipil'],
            ['name' => 'Teknik Mesin'],
            ['name' => 'Teknik Refrigerasi dan Tata Udara'],
            ['name' => 'Teknik Konversi Energi'],
            ['name' => 'Teknik Elektro'],
            ['name' => 'Teknik Kimia'],            
            ['name' => 'Akuntansi'],
            ['name' => 'Administrasi Niaga'],
            ['name' => 'Bahasa Inggris'],            
        ];

        foreach($jurusan as $jurusanItem){
    		App\Department::create($jurusanItem);
		}
    }
}
