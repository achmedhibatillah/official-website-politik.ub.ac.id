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
            ['fr_id' => 10000000, 'fr_fr' => 'Tidak Ada'],
            ['fr_id' => 20000001, 'fr_fr' => 'Politik Indonesia'],
            ['fr_id' => 20000002, 'fr_fr' => 'Gerakan Sosial Politik'],
            ['fr_id' => 20000003, 'fr_fr' => 'Kebijakan Publik'],
        ]);
    }
}
