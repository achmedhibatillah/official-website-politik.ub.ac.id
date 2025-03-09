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
            ['jabatan_id' => 10000000, 'jabatan_jabatan' => 'Tidak Ada'],
            ['jabatan_id' => 20000001, 'jabatan_jabatan' => 'Dekan'],
            ['jabatan_id' => 20000002, 'jabatan_jabatan' => 'Wakil Dekan'],
            ['jabatan_id' => 20000003, 'jabatan_jabatan' => 'Ketua Program Studi'],
        ]);
    }
}
