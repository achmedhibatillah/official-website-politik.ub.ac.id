<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DosenSeeder extends Seeder
{
    public function run()
    {
        DB::table('dosen')->insert([
            [
                'dosen_id' => 1,
                'dosen_nama' => 'Dr. Ahmad Fauzi',
                'dosen_slug' => 'dr-ahmad-fauzi',
                'dosen_email' => 'ahmad.fauzi@example.com',
                'dosen_foto' => 'ahmad_fauzi.jpg',
                'dosen_deskripsi_ID' => 'Dosen bidang Teknik Informatika.',
                'dosen_deskripsi_EN' => 'Lecturer in Informatics Engineering.',
                'jabatan_id' => 1,
                'konsentrasi_id' => 2,
                'fr_id_1' => null,
                'fr_id_2' => null,
                'dosen_keahlian_ID' => 'Artificial Intelligence, Machine Learning',
                'dosen_keahlian_EN' => 'Artificial Intelligence, Machine Learning',
                'dosen_scholar' => 'https://scholar.google.com/citations?user=XXXXX',
                'dosen_orcid' => 'https://orcid.org/0000-0001-XXXX-XXXX',
                'dosen_scopus' => 'https://www.scopus.com/authid/detail.uri?authorId=XXXXX',
                'dosen_sinta' => 'https://sinta.kemdikbud.go.id/authors/detail?id=XXXXX',
                'dosen_s1' => 'Universitas A',
                'dosen_s2' => 'Universitas B',
                'dosen_s3' => 'Universitas C',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dosen_id' => 2,
                'dosen_nama' => 'Prof. Budi Santoso',
                'dosen_slug' => 'prof-budi-santoso',
                'dosen_email' => 'budi.santoso@example.com',
                'dosen_foto' => 'budi_santoso.jpg',
                'dosen_deskripsi_ID' => 'Dosen bidang Rekayasa Perangkat Lunak.',
                'dosen_deskripsi_EN' => 'Lecturer in Software Engineering.',
                'jabatan_id' => 2,
                'konsentrasi_id' => 3,
                'fr_id_1' => 1,
                'fr_id_2' => null,
                'dosen_keahlian_ID' => 'Software Engineering, Web Development',
                'dosen_keahlian_EN' => 'Software Engineering, Web Development',
                'dosen_scholar' => 'https://scholar.google.com/citations?user=YYYYY',
                'dosen_orcid' => 'https://orcid.org/0000-0002-YYYY-YYYY',
                'dosen_scopus' => 'https://www.scopus.com/authid/detail.uri?authorId=YYYYY',
                'dosen_sinta' => 'https://sinta.kemdikbud.go.id/authors/detail?id=YYYYY',
                'dosen_s1' => 'Universitas X',
                'dosen_s2' => 'Universitas Y',
                'dosen_s3' => 'Universitas Z',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
