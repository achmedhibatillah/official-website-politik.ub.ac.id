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
            ['konsentrasi_id' => 10000000, 'konsentrasi_konsentrasi_ID' => 'Tidak Ada', 'konsentrasi_konsentrasi_EN' => 'Nothing'],
            ['konsentrasi_id' => 20000001, 'konsentrasi_konsentrasi_ID' => 'Politik Indonesia', 'konsentrasi_konsentrasi_EN' => 'Indonesian Politics'],
            ['konsentrasi_id' => 20000002, 'konsentrasi_konsentrasi_ID' => 'Demokrasi dan Politik Elektoral', 'konsentrasi_konsentrasi_EN' => 'Democracy and Electoral Politics'],
            ['konsentrasi_id' => 20000003, 'konsentrasi_konsentrasi_ID' => 'Kewirausahaan Politik dan Kebijakan', 'konsentrasi_konsentrasi_EN' => 'Political Entrepreneurship and Policy'],
        ]);
    }
}
