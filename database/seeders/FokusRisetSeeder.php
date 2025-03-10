<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FokusRisetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fr')->delete();

        DB::table('fr')->insert([
            ['fr_id' => 10000000, 'fr_fr_ID' => 'Tidak Ada', 'fr_fr_EN' => 'Nothing'],
            ['fr_id' => 20000001, 'fr_fr_ID' => 'Politik Indonesia', 'fr_fr_EN' => 'Indonesian Politics'],
            ['fr_id' => 20000002, 'fr_fr_ID' => 'Gerakan Sosial Politik', 'fr_fr_EN' => 'Social Political Movements'],
            ['fr_id' => 20000003, 'fr_fr_ID' => 'Kebijakan Publik', 'fr_fr_EN' => 'Public Policy'],
        ]);
    }
}
