<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MkSeeder extends Seeder
{
    /**
     * Jalankan seeder database.
     */
    public function run(): void
    {
        DB::table('mk')->insert([
            [
                'mk_id' => 'FIS20800',
                'mk_mk_ID' => 'Dasar-Dasar Ilmu Sosial',
                'mk_mk_EN' => 'Social Science Basic',
                'mk_deskripsi_ID' => 'Mata kuliah ini membahas konsep dasar ilmu sosial dan perannya dalam masyarakat.',
                'mk_deskripsi_EN' => 'This course discusses the basic concepts of social sciences and their role in society.',
                'mk_semester' => 1,
                'mk_sks' => 3,
            ],
            [
                'mk_id' => 'UB789760',
                'mk_mk_ID' => 'Kewirausahaan',
                'mk_mk_EN' => 'Entrepreneurship',
                'mk_deskripsi_ID' => 'Mata kuliah ini mengajarkan dasar-dasar kewirausahaan dan pengembangan bisnis.',
                'mk_deskripsi_EN' => 'This course teaches the basics of entrepreneurship and business development.',
                'mk_semester' => 2,
                'mk_sks' => 2,
            ],
            [
                'mk_id' => 'POL98805',
                'mk_mk_ID' => 'Analisis Kebijakan Publik',
                'mk_mk_EN' => 'Public Policy Analysis',
                'mk_deskripsi_ID' => 'Mata kuliah ini membahas teori dan metode analisis kebijakan publik.',
                'mk_deskripsi_EN' => 'This course discusses theories and methods of public policy analysis.',
                'mk_semester' => 3,
                'mk_sks' => 3,
            ],
            [
                'mk_id' => 'POL89087',
                'mk_mk_ID' => 'Partai Politik',
                'mk_mk_EN' => 'Political Parties',
                'mk_deskripsi_ID' => 'Mata kuliah ini membahas peran dan fungsi partai politik dalam sistem pemerintahan.',
                'mk_deskripsi_EN' => 'This course discusses the role and function of political parties in the government system.',
                'mk_semester' => 4,
                'mk_sks' => 3,
            ],
        ]);
    }
}
