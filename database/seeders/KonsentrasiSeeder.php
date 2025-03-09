<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KonsentrasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('konsentrasi')->delete();

        DB::table('konsentrasi')->insert([
            ['konsentrasi_id' => 10000000, 'konsentrasi_konsentrasi' => 'Tidak Ada'],
            ['konsentrasi_id' => 20000001, 'konsentrasi_konsentrasi' => 'Politik Indonesia'],
            ['konsentrasi_id' => 20000002, 'konsentrasi_konsentrasi' => 'Demokrasi dan Politik Elektoral'],
            ['konsentrasi_id' => 20000003, 'konsentrasi_konsentrasi' => 'Kewirausahaan Politik dan Kebijakan'],
        ]);
    }
}
