<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\LogicController;

class DefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $logic = new LogicController();

        DB::table('kategori')->insert([
            [ // Profil
                'kategori_id' => 1, 
                'kategori_judul_ID' => 'Profil', 
                'kategori_judul_EN' => 'Profile',
                'kategori_icon' => '<i class="fas fa-school"></i>',
                'kategori_urutan' => 1,
                'kategori_status' => 1,
            ],
            [ // Akademik
                'kategori_id' => 2, 
                'kategori_judul_ID' => 'Akademik', 
                'kategori_judul_EN' => 'Academic',
                'kategori_icon' => '<i class="fas fa-graduation-cap"></i>',
                'kategori_urutan' => 2,
                'kategori_status' => 1,
            ], 
            [ // Kemahasiswaan & Alumni
                'kategori_id' => 3, 
                'kategori_judul_ID' => 'Kemahasiswaan & Alumni', 
                'kategori_judul_EN' => 'Student Affairs & Alumni',
                'kategori_icon' => '<i class="fa-solid fa-user-tie"></i>',
                'kategori_urutan' => 3,
                'kategori_status' => 1,
            ],
            [ // Penelitian & Pengabdian
                'kategori_id' => 4, 
                'kategori_judul_ID' => 'Penelitian & Pengabdian', 
                'kategori_judul_EN' => 'Research & Community Service',
                'kategori_icon' => '<i class="fas fa-atom"></i>',
                'kategori_urutan' => 4,
                'kategori_status' => 1,
            ],
            [ // Jaminan Mutu
                'kategori_id' => 5, 
                'kategori_judul_ID' => 'Jaminan Mutu', 
                'kategori_judul_EN' => 'Quality Assurance',
                'kategori_icon' => '<i class="fas fa-medal"></i>',
                'kategori_urutan' => 5,
                'kategori_status' => 1,
            ],
            [ // Berita
                'kategori_id' => 6, 
                'kategori_judul_ID' => 'Berita', 
                'kategori_judul_EN' => 'News',
                'kategori_icon' => '<i class="fa-solid fa-newspaper"></i>',
                'kategori_urutan' => 6,
                'kategori_status' => 1,
            ],
            [ // Kontak
                'kategori_id' => 7, 
                'kategori_judul_ID' => 'Kontak', 
                'kategori_judul_EN' => 'Contact',
                'kategori_icon' => '<i class="fa-solid fa-phone"></i>',
                'kategori_urutan' => 7,
                'kategori_status' => 1,
            ],
        ]);
        DB::table('menu')->insert([
            [ // Sejarah
                'menu_id' => 1,
                'menu_judul_ID' => 'Sejarah',
                'menu_judul_EN' => 'History',
                'menu_slug' => 'sejarah',
                'menu_gambar' => null,
                'menu_isi_ID' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam magni, accusamus quo tempore recusandae, blanditiis iusto necessitatibus voluptate quaerat sunt sit. Dicta, quasi possimus ad natus ducimus inventore modi expedita.',
                'menu_isi_EN' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis id eum possimus dignissimos accusamus voluptatibus, aut eaque deleniti soluta ut maiores magnam, veritatis voluptatum, quibusdam asperiores fugiat eligendi laudantium dolore?',
                'menu_urutan' => 1,
                'menu_status' => 0,
                'menu_as' => 1,
                'menu_show' => 1,
            ], 
            [ // Visi, Misi, & Tujuan Kompetensi
                'menu_id' => 2,
                'menu_judul_ID' => 'Visi, Misi, & Tujuan Kompetensi',
                'menu_judul_EN' => 'Vision, Mission, & Competency Goals',
                'menu_slug' => 'visi-misi-tujuan-kompetensi',
                'menu_gambar' => null,
                'menu_isi_ID' => 'Isi tentang visi, misi, dan tujuan kompetensi dalam bahasa Indonesia.',
                'menu_isi_EN' => 'Content about vision, mission, and competency goals in English.',
                'menu_urutan' => 2,
                'menu_status' => 0,
                'menu_as' => 1,
                'menu_show' => 1,
            ],
            [ // Visi Keilmuan
                'menu_id' => 3,
                'menu_judul_ID' => 'Visi Keilmuan',
                'menu_judul_EN' => 'Scientific Vision',
                'menu_slug' => 'visi-keilmuan',
                'menu_gambar' => null,
                'menu_isi_ID' => 'Isi tentang visi keilmuan dalam bahasa Indonesia.',
                'menu_isi_EN' => 'Content about scientific vision in English.',
                'menu_urutan' => 3,
                'menu_status' => 0,
                'menu_as' => 1,
                'menu_show' => 1,
            ],
            [ // Struktur Organisasi
                'menu_id' => 4,
                'menu_judul_ID' => 'Struktur Organisasi',
                'menu_judul_EN' => 'Organizational Structure',
                'menu_slug' => 'struktur-organisasi',
                'menu_gambar' => null,
                'menu_isi_ID' => 'Isi tentang struktur organisasi dalam bahasa Indonesia.',
                'menu_isi_EN' => 'Content about organizational structure in English.',
                'menu_urutan' => 4,
                'menu_status' => 0,
                'menu_as' => 0,
                'menu_show' => 1,
            ],
            [ // Renstra & Proker
                'menu_id' => 5,
                'menu_judul_ID' => 'Renstra & Proker',
                'menu_judul_EN' => 'Strategic Plan & Work Program',
                'menu_slug' => 'renstra-proker',
                'menu_gambar' => null,
                'menu_isi_ID' => 'Isi tentang rencana strategis dan program kerja dalam bahasa Indonesia.',
                'menu_isi_EN' => 'Content about strategic plan and work program in English.',
                'menu_urutan' => 5,
                'menu_status' => 0,
                'menu_as' => 1,
                'menu_show' => 1,
            ],
            [ // Dosen
                'menu_id' => 6,
                'menu_judul_ID' => 'Dosen',
                'menu_judul_EN' => 'Lecturers',
                'menu_slug' => 'dosen',
                'menu_gambar' => null,
                'menu_isi_ID' => 'Isi tentang daftar dosen dalam bahasa Indonesia.',
                'menu_isi_EN' => 'Content about list of lecturers in English.',
                'menu_urutan' => 6,
                'menu_status' => 0,
                'menu_as' => 0,
                'menu_show' => 1,
            ],
            [ // Tenaga Pendidik
                'menu_id' => 7,
                'menu_judul_ID' => 'Tenaga Pendidik',
                'menu_judul_EN' => 'Educational Staff',
                'menu_slug' => 'tenaga-pendidik',
                'menu_gambar' => null,
                'menu_isi_ID' => 'Isi tentang tenaga pendidik dalam bahasa Indonesia.',
                'menu_isi_EN' => 'Content about educational staff in English.',
                'menu_urutan' => 7,
                'menu_status' => 0,
                'menu_as' => 0,
                'menu_show' => 1,
            ],
        ]);
        DB::table('kategori_to_menu')->insert([
            [
                'relation_id' => $logic->generateUniqueId('kategori_to_menu', 'relation_id'),
                'kategori_id' => 1,
                'menu_id' => 1,
            ],
            [
                'relation_id' => $logic->generateUniqueId('kategori_to_menu', 'relation_id'),
                'kategori_id' => 1,
                'menu_id' => 2,
            ],
            [
                'relation_id' => $logic->generateUniqueId('kategori_to_menu', 'relation_id'),
                'kategori_id' => 1,
                'menu_id' => 3,
            ],
            [
                'relation_id' => $logic->generateUniqueId('kategori_to_menu', 'relation_id'),
                'kategori_id' => 1,
                'menu_id' => 4,
            ],
            [
                'relation_id' => $logic->generateUniqueId('kategori_to_menu', 'relation_id'),
                'kategori_id' => 1,
                'menu_id' => 5,
            ],
            [
                'relation_id' => $logic->generateUniqueId('kategori_to_menu', 'relation_id'),
                'kategori_id' => 1,
                'menu_id' => 6,
            ],
            [
                'relation_id' => $logic->generateUniqueId('kategori_to_menu', 'relation_id'),
                'kategori_id' => 1,
                'menu_id' => 7,
            ],
        ]);
    }
}
