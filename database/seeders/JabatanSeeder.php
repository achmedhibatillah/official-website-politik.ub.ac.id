<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jabatan')->delete();

        DB::table('jabatan')->insert([
            ['jabatan_id' => 10000000, 'jabatan_jabatan_ID' => 'Tidak Ada', 'jabatan_jabatan_EN' => 'Nothing'],
            ['jabatan_id' => 20000001, 'jabatan_jabatan_ID' => 'Dekan', 'jabatan_jabatan_EN' => 'Dean'],
            ['jabatan_id' => 20000002, 'jabatan_jabatan_ID' => 'Wakil Dekan', 'jabatan_jabatan_EN' => 'Vice Dean'],
            ['jabatan_id' => 20000003, 'jabatan_jabatan_ID' => 'Ketua Program Studi', 'jabatan_jabatan_EN' => 'Head of Study Program'],
        ]);
    }
}
