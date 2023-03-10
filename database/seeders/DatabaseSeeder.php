<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'password' => bcrypt('1234qwer'),
            'role' => 1
        ]);
        
        DB::table('users')->insert([
            'username' => 'babu',
            'password' => bcrypt('1234qwer'),
            'role' => 2
        ]);

        DB::table('units')->insert([
            'jurusan' => 'Universitas Universal'
        ]);
        DB::table('units')->insert([
            'jurusan' => 'Seni Tari'
        ]);
        DB::table('units')->insert([
            'jurusan' => 'Seni Musik'
        ]);
        DB::table('units')->insert([
            'jurusan' => 'Manajemen'
        ]);
        DB::table('units')->insert([
            'jurusan' => 'Akuntansi'
        ]);
        DB::table('units')->insert([
            'jurusan' => 'Pendidikan Bahasa Mandarin'
        ]);
        DB::table('units')->insert([
            'jurusan' => 'Teknik Informatika'
        ]);
        DB::table('units')->insert([
            'jurusan' => 'Sistem Informasi'
        ]);
        DB::table('units')->insert([
            'jurusan' => 'Teknik Perangkat Lunak'
        ]);
        DB::table('units')->insert([
            'jurusan' => 'Teknik Industri'
        ]);
        DB::table('units')->insert([
            'jurusan' => 'Teknik Lingkungan'
        ]);


        DB::table('pengajuans')->insert([
            'dok_no' => 'IMB0001',
            'dok_tipe' => 'MOU',
            'mitra_nama' => 'John',
            'mitra_deskripsi' => 'John the mechanic',
            'mitra_alamat' => 'John street',
            'ks_judul' => 'How to kys',
            'ks_detail' => 'rope is one of the easiest method',
            'tingkat' => '1',
            'pdt' => 'Bapaknya John',
            'pdt_jb' => 'Rektor',
            'pdt_mitra' => 'Jeff Bezos',
            'pdt_mitrajb' => 'Botak Amazon',
            'pdt_lokasi' => 'Sungai Siak',
            'dt_start' => Carbon::create('2020', '01', '01'),
            'dt_end' => Carbon::create('2024', '01', '01'),
            'status' => '1',
            'jurusan' => 'Universitas Universal'

        ]);

        DB::table('unitassigns')->insert([
            'unit_id' => 1,
            // 'kerjasama_id' => 1,
            'pengajuan_id' => 1
        ]);
    }
}
