<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Dosen;
use App\Models\FokusRiset;
use App\Models\Kurikulum;
use App\Models\MataKuliah;
use App\Models\TenagaPendidik;
use App\Models\Berita;
use App\Models\Kategori;
use App\Models\Pengumuman;
use App\Models\Menu;

class AdminController extends Controller
{
    public function index()
    {
        $sideData = Kategori::get();
        $data = [
            'title' => 'Dashboard Admin',
            'status' => '0',
            'page' => '',
            'side' => $sideData,
        ];
        
        return
        view('templates/header', $data) . 
        view('templates/sidebar-admin', $data) . 
        view('admin/index') . 
        view('templates/footbar-admin') .
        view('templates/footer');
    }

    public function kategori($kategori_slug)
    {
        $kategoriData = Kategori::where('kategori_slug', $kategori_slug)->first();
        $kategoriData = Kategori::getDetailKategori($kategoriData->kategori_id);
        $sideData = Kategori::get();
        $menuData = Kategori::getDetailKategori($kategoriData->kategori_id);

        $data = [
            'title' => $kategoriData->kategori_judul_ID,
            'status' => $kategoriData->kategori_slug,
            'page' => [
                [ 'name' => $kategoriData->kategori_judul_ID, 'url' => url('admin-kategori-' . $kategoriData->kategori_slug) ]
            ],
            'side' => $sideData,
        ];

        return
        view('templates/header', $data) . 
        view('templates/sidebar-admin', $data) . 
        view('admin/kategori', [
            'kategori' => $kategoriData,
            'menu' => $menuData,
        ]) . 
        view('templates/footbar-admin') .
        view('templates/footer');
    }

    public function update_menu($menu_slug)
    {
        $menuModel = new Menu();
        $menuData = $menuModel->where('menu_slug', $menu_slug)->first();
        $menuData = $menuModel->getDetailMenu($menuData->menu_id);
        $kategori_slug = $menuData->kategori[0]->kategori_slug;
        $sideData = Kategori::get();

        $data = [
            'title' => $menuData->menu_judul_ID,
            'status' => $kategori_slug,
            'page' => [
                [ 'name' => $menuData->kategori[0]->kategori_judul_ID, 'url' => url('admin-kategori-' . $menuData->kategori[0]->kategori_slug) ],
                [ 'name' => $menuData->menu_judul_ID, 'url' => url('admin-dependen-' . $menuData->menu_slug) ],
            ],
            'side' => $sideData
        ];
        
        return
        view('templates/header', $data) . 
        view('templates/sidebar-admin', $data) . 
        view('admin/menu-edit', [
            'data' => $menuData,
            'page' => 'admin-' . $menuData->menu_slug,
        ]) . 
        view('templates/footbar-admin') .
        view('templates/footer');
    }

    public function kurikulum($kurikulum_id = '')
    {
        if ($kurikulum_id !== '') {
            $kurikulumData = Kurikulum::where('kurikulum_id', $kurikulum_id)->first();
            $view = 'admin/kurikulum-detail';
            $page = [ 
                [ 'name' => 'Akademik', 'url' => url('admin-menu-akademik') ],
                [ 'name' => 'Kurikulum', 'url' => url('admin-kurikulum') ], 
                [ 'name' => $kurikulumData->kurikulum_judul_ID, 'url' => url('admin-kurikulum/' . $kurikulum_id) ] 
            ];
        } else {
            $kurikulumData = Kurikulum::get();
            $view = 'admin/kurikulum';
            $page = [ 
                [ 'name' => 'Akademik', 'url' => url('admin-menu-akademik') ],
                [ 'name' => 'Kurikulum', 'url' => url('admin-kurikulum') ], 
            ];
        }

        $data = [
            'title' => 'Kurikulum',
            'status' => '2',
            'page' => $page,
        ];

        return
        view('templates/header', $data) . 
        view('templates/sidebar-admin', $data) . 
        view($view, [
            'kurikulum' => $kurikulumData,
        ]) . 
        view('templates/footbar-admin') .
        view('templates/footer');
    }

    public function kurikulum_tambah()
    {
        $page = [
            [ 'name' => 'Akademik', 'url' => url('admin-menu-akademik') ],
            [ 'name' => 'Kurikulum', 'url' => url('admin-kurikulum') ],
            [ 'name' => 'Tambah Kurikulum', 'url' => url('admin-tambah-kurikulum') ],
        ];

        $data = [
            'title' => 'Tambah Kurikulum',
            'status' => '2',
            'page' => $page,
        ];

        $kurikulumData = Kurikulum::orderBy('kurikulum_mulai', 'asc')->get();

        return
        view('templates/header', $data) . 
        view('templates/sidebar-admin', $data) . 
        view('admin/kurikulum-tambah') . 
        view('templates/footbar-admin') .
        view('templates/footer');
    }

    public function kurikulum_edit($kurikulum_id)
    {
        $kurikulumData = Kurikulum::where('kurikulum_id', $kurikulum_id)->first();

        $page = [
            [ 'name' => 'Akademik', 'url' => url('admin-menu-akademik') ],
            [ 'name' => 'Kurikulum', 'url' => url('admin-kurikulum') ],
            [ 'name' => $kurikulumData->kurikulum_judul_ID, 'url' => url('admin-kurikulum/' . $kurikulum_id) ],
            [ 'name' => 'Edit', 'url' => url('admin-edit-kurikulum/' . $kurikulum_id) ],
        ];

        $data = [
            'title' => 'Edit Kurikulum',
            'status' => '2',
            'page' => $page,
        ];

        return
        view('templates/header', $data) . 
        view('templates/sidebar-admin', $data) . 
        view('admin/kurikulum-edit', [
            'kurikulum' => $kurikulumData,
        ]) . 
        view('templates/footbar-admin') .
        view('templates/footer');
    }

    public function matkul(Request $request)
    {
        $page = [
            [ 'name' => 'Akademik', 'url' => url('admin-menu-akademik') ],
            [ 'name' => 'Mata Kuliah', 'url' => url('admin-mata-kuliah') ],
        ];

        $data = [
            'title' => 'Mata Kuliah',
            'status' => '2',
            'page' => $page,
        ];

        $k = $request->query('k', '');
        $s = $request->semester;

        $mkData = MataKuliah::orderBy('mk_semester', 'asc')->orderBy('mk_id', 'asc');

        if (!empty($s)) {
            $mkData = $mkData->where('mk_semester', $s);
        }

        if (!empty($k)) {
            $mkData = $mkData->where('mk_mk_ID', 'like', "%$k%")->orWhere('mk_id', 'like', "%$k%");
        }
    
        $mkData = $mkData->get();
    
        if ($request->ajax()) {
            return view('admin.matkul-list', ['mk' => $mkData]);
        }

        return
        view('templates/header', $data) . 
        view('templates/sidebar-admin', $data) . 
        view('admin/matkul', [
            'mk' => $mkData,
        ]) . 
        view('templates/footbar-admin') .
        view('templates/footer');
    }

    public function matkul_detail($mk_id)
    {
        $mkData = MataKuliah::getDetailMk($mk_id);
        $dosenData = Dosen::get();

        $page = [
            [ 'name' => 'Akademik', 'url' => url('admin-menu-akademik') ],
            [ 'name' => 'Mata Kuliah', 'url' => url('admin-mata-kuliah') ],
            [ 'name' => $mkData->mk_mk_ID . ' (' . $mkData->mk_id . ')', 'url' => url('admin-mata-kuliah/' . $mkData->mk_id) ],
        ];

        $data = [
            'title' => 'Mata Kuliah',
            'status' => '2',
            'page' => $page,
        ];

        return
        view('templates/header', $data) . 
        view('templates/sidebar-admin', $data) . 
        view('admin/matkul-detail', [
            'mk' => $mkData,
            'dosen' => $dosenData,
        ]) . 
        view('templates/footbar-admin') .
        view('templates/footer');
    }

    public function matkul_tambah()
    {
        $page = [
            [ 'name' => 'Akademik', 'url' => url('admin-menu-akademik') ],
            [ 'name' => 'Mata Kuliah', 'url' => url('admin-mata-kuliah') ],
            [ 'name' => 'Tambah', 'url' => url('admin-tambah-matkul') ],
        ];

        $data = [
            'title' => 'Tambah Mata Kuliah',
            'status' => '2',
            'page' => $page,
        ];

        $kurikulumData = Kurikulum::get();

        return
        view('templates/header', $data) . 
        view('templates/sidebar-admin', $data) . 
        view('admin/matkul-tambah', [
            'kurikulum' => $kurikulumData,
        ]) . 
        view('templates/footbar-admin') .
        view('templates/footer');
    }

    public function matkul_edit($mk_id)
    {
        $mkData = MataKuliah::getDetailSelectedMk($mk_id);

        $page = [
            [ 'name' => 'Akademik', 'url' => url('admin-menu-akademik') ],
            [ 'name' => 'Mata Kuliah', 'url' => url('admin-mata-kuliah') ],
            [ 'name' => $mkData->mk_mk_ID . ' (' . $mkData->mk_id . ')', 'url' => url('admin-mata-kuliah/' . $mkData->mk_id) ],
            [ 'name' => 'Edit', 'url' => url('admin-edit-matkul/' . $mkData->mk_id) ],        
        ];

        $data = [
            'title' => 'Edit Mata Kuliah',
            'status' => '2',
            'page' => $page,
        ];

        $kurikulumData = Kurikulum::get();

        return
        view('templates/header', $data) . 
        view('templates/sidebar-admin', $data) . 
        view('admin/matkul-edit', [
            'mk' => $mkData,
            'kurikulum' => $kurikulumData,
        ]) . 
        view('templates/footbar-admin') .
        view('templates/footer');
    }

    public function dosen()
    {
        $page = [
            [ 'name' => 'Profil', 'url' => url('admin-kategori-profil') ],
            [ 'name' => 'Data Dosen', 'url' => url('admin-dosen') ],
        ];

        $data = [
            'title' => 'Data Dosen',
            'status' => 'profil',
            'page' => $page,
            'side' => Kategori::get(),
        ];

        $dosenData = Dosen::orderBy('dosen_nama', 'asc')->get();

        return
        view('templates/header', $data) . 
        view('templates/sidebar-admin', $data) . 
        view('admin/dosen', [
            'dosen' => $dosenData,
        ]) . 
        view('templates/footbar-admin') .
        view('templates/footer');
    }

    public function dosen_detail($dosen_id)
    {
        $dosenData = Dosen::getDetailDosen($dosen_id);

        $page = [
            [ 'name' => 'Profil', 'url' => url('admin-kategori-profil') ],
            [ 'name' => 'Data Dosen', 'url' => url('admin-dosen') ],
            [ 'name' => $dosenData->dosen_nama, 'url' => url('admin-dosen/' . $dosenData->dosen_id) ],
        ];

        $data = [
            'title' => 'Data Dosen',
            'status' => 'profil',
            'page' => $page,
            'side' => Kategori::get(),
        ];

        return
        view('templates/header', $data) . 
        view('templates/sidebar-admin', $data) . 
        view('admin/dosen-detail', [
            'dosen' => $dosenData,
        ]) . 
        view('templates/footbar-admin') .
        view('templates/footer');
    }

    public function dosen_tambah()
    {
        $page = [
            [ 'name' => 'Profil', 'url' => url('admin-kategori-profil') ],
            [ 'name' => 'Data Dosen', 'url' => url('admin-dosen') ],
            [ 'name' => 'Tambah', 'url' => url('admin-tambah-dosen') ],
        ];

        $data = [
            'title' => 'Tambah Data Dosen',
            'status' => 'profil',
            'page' => $page,
            'side' => Kategori::get(),
        ];

        $dosenData = Dosen::get();
        $frData = FokusRiset::get();

        return
        view('templates/header', $data) . 
        view('templates/sidebar-admin', $data) . 
        view('admin/dosen-tambah', [
            'dosen' => $dosenData,
            'fr' => $frData
        ]) . 
        view('templates/footbar-admin') .
        view('templates/footer');
    }

    public function dosen_tambah_step2($dosen_id)
    {
        $page = [
            [ 'name' => 'Profil', 'url' => url('admin-kategori-profil') ],
            [ 'name' => 'Data Dosen', 'url' => url('admin-dosen') ],
            [ 'name' => 'Tambah', 'url' => url('admin-tambah-dosen') ],
        ];

        $data = [
            'title' => 'Tambah Data Dosen',
            'status' => 'profil',
            'page' => $page,
            'side' => Kategori::get(),
        ];

        $dosenData = Dosen::where('dosen_id', $dosen_id)->first();
        $frData = FokusRiset::get();

        return
        view('templates/header', $data) . 
        view('templates/sidebar-admin', $data) . 
        view('admin/dosen-tambah-step2', [
            'dosen' => $dosenData,
            'fr' => $frData
        ]) . 
        view('templates/footbar-admin') .
        view('templates/footer');
    }

    public function dosen_tambah_step3($dosen_id)
    {
        $page = [
            [ 'name' => 'Profil', 'url' => url('admin-kategori-profil') ],
            [ 'name' => 'Data Dosen', 'url' => url('admin-dosen') ],
            [ 'name' => 'Tambah', 'url' => url('admin-tambah-dosen') ],
        ];

        $data = [
            'title' => 'Tambah Data Dosen',
            'status' => 'profil',
            'page' => $page,
            'side' => Kategori::get(),
        ];

        $dosenData = Dosen::where('dosen_id', $dosen_id)->first();
        $frData = FokusRiset::get();

        return
        view('templates/header', $data) . 
        view('templates/sidebar-admin', $data) . 
        view('admin/dosen-tambah-step3', [
            'dosen' => $dosenData,
            'fr' => $frData
        ]) . 
        view('templates/footbar-admin') .
        view('templates/footer');
    }

    public function dosen_edit($dosen_id)
    {
        $dosenData = Dosen::where('dosen_id', $dosen_id)->first();

        $page = [
            [ 'name' => 'Profil', 'url' => url('admin-kategori-profil') ],
            [ 'name' => 'Data Dosen', 'url' => url('admin-dosen') ],
            [ 'name' => $dosenData->dosen_nama, 'url' => url('admin-dosen/' . $dosenData->dosen_id) ],
            [ 'name' => 'Edit', 'url' => url('admin-edit-dosen/' . $dosenData->dosen_id) ],
        ];

        $data = [
            'title' => 'Edit Data Dosen',
            'status' => 'profil',
            'page' => $page,
            'side' => Kategori::get(),
        ];

        $frData = FokusRiset::get();

        return
        view('templates/header', $data) . 
        view('templates/sidebar-admin', $data) . 
        view('admin/dosen-edit', [
            'dosen' => $dosenData,
            'fr' => $frData
        ]) . 
        view('templates/footbar-admin') .
        view('templates/footer');
    }

    public function dosen_edit_profil_akademik($dosen_id)
    {
        $dosenData = Dosen::where('dosen_id', $dosen_id)->first();

        $page = [
            [ 'name' => 'Profil', 'url' => url('admin-kategori-profil') ],
            [ 'name' => 'Data Dosen', 'url' => url('admin-dosen') ],
            [ 'name' => $dosenData->dosen_nama, 'url' => url('admin-dosen/' . $dosenData->dosen_id) ],
            [ 'name' => 'Edit Profil Akademik', 'url' => url('admin-edit-profil-akademik-dosen/' . $dosenData->dosen_id) ],
        ];

        $data = [
            'title' => 'Edit Profil Akademik Dosen',
            'status' => 'profil',
            'page' => $page,
            'side' => Kategori::get(),
        ];

        $dosenData = Dosen::where('dosen_id', $dosen_id)->first();
        $frData = FokusRiset::get();

        return
        view('templates/header', $data) . 
        view('templates/sidebar-admin', $data) . 
        view('admin/dosen-edit-step2', [
            'dosen' => $dosenData,
            'fr' => $frData
        ]) . 
        view('templates/footbar-admin') .
        view('templates/footer');
    }

    public function dosen_edit_fokus_riset($dosen_id)
    {
        $dosenData = Dosen::where('dosen_id', $dosen_id)->first();

        $page = [
            [ 'name' => 'Profil', 'url' => url('admin-kategori-profil') ],
            [ 'name' => 'Data Dosen', 'url' => url('admin-dosen') ],
            [ 'name' => $dosenData->dosen_nama, 'url' => url('admin-dosen/' . $dosenData->dosen_id) ],
            [ 'name' => 'Edit Fokus Riset', 'url' => url('admin-edit-fokus-riset-dosen/' . $dosenData->dosen_id) ],
        ];

        $data = [
            'title' => 'Edit Fokus Riset Dosen',
            'status' => 'profil',
            'page' => $page,
            'side' => Kategori::get(),
        ];

        $dosenData = Dosen::getDetailSelectedDosen($dosen_id);
        $frData = FokusRiset::get();

        return
        view('templates/header', $data) . 
        view('templates/sidebar-admin', $data) . 
        view('admin/dosen-edit-step3', [
            'dosen' => $dosenData,
            'fr' => $frData
        ]) . 
        view('templates/footbar-admin') .
        view('templates/footer');
    }

    public function dosen_atur_mata_kuliah($dosen_id)
    {
        $dosenData = Dosen::where('dosen_id', $dosen_id)->first();

        $page = [
            [ 'name' => 'Profil', 'url' => url('admin-kategori-profil') ],
            [ 'name' => 'Data Dosen', 'url' => url('admin-dosen') ],
            [ 'name' => $dosenData->dosen_nama, 'url' => url('admin-dosen/' . $dosenData->dosen_id) ],
            [ 'name' => 'Atur Mata Kuliah', 'url' => url('admin-atur-mata-kuliah-dosen/' . $dosenData->dosen_id) ],
        ];

        $data = [
            'title' => 'Atur Mata Kuliah',
            'status' => 'profil',
            'page' => $page,
            'side' => Kategori::get(),
        ];

        $dosenData = Dosen::getDetailSelectedDosen($dosen_id);
        $frData = FokusRiset::get();

        return
        view('templates/header', $data) . 
        view('templates/sidebar-admin', $data) . 
        view('admin/dosen-edit-matkul', [
            'dosen' => $dosenData,
            'fr' => $frData
        ]) . 
        view('templates/footbar-admin') .
        view('templates/footer');
    }

    public function dosen_fokus_riset()
    {
        $page = [
            [ 'name' => 'Akademik', 'url' => url('admin-menu-akademik') ],
            [ 'name' => 'Fokus Riset', 'url' => url('admin-fokus-riset') ],
        ];

        $data = [
            'title' => 'Fokus Riset',
            'status' => 'akademik',
            'page' => $page,
            'side' => Kategori::get(),
        ];

        $dosenData = Dosen::get();
        $frData = FokusRiset::get();

        return
        view('templates/header', $data) . 
        view('templates/sidebar-admin', $data) . 
        view('admin/dosen-fr', [
            'dosen' => $dosenData,
            'fr' => $frData,
        ]) . 
        view('templates/footbar-admin') .
        view('templates/footer');
    }
    
    public function tendik()
    {
        $page = [
            [ 'name' => 'Profil', 'url' => url('admin-kategori-profil') ],
            [ 'name' => 'Data Tenaga Pendidik', 'url' => url('admin-tenaga-pendidik') ],
        ];

        $data = [
            'title' => 'Data Tenaga Pendidik',
            'status' => 'profil',
            'page' => $page,
            'side' => Kategori::get(),
        ];

        $tendikData = TenagaPendidik::orderBy('tendik_nama', 'asc')->get();

        return
        view('templates/header', $data) . 
        view('templates/sidebar-admin', $data) . 
        view('admin/tendik', [
            'tendik' => $tendikData,
        ]) . 
        view('templates/footbar-admin') .
        view('templates/footer');
    }

    public function tendik_tambah()
    {
        $page = [
            [ 'name' => 'Profil', 'url' => url('admin-kategori-profil') ],
            [ 'name' => 'Data Tenaga Pendidik', 'url' => url('admin-tenaga-pendidik') ],
            [ 'name' => 'Tambah', 'url' => url('admin-tambah-tendik') ],
        ];

        $data = [
            'title' => 'Tambah Tenaga Pendidik',
            'status' => 'profil',
            'page' => $page,
            'side' => Kategori::get(),
        ];

        return
        view('templates/header', $data) . 
        view('templates/sidebar-admin', $data) . 
        view('admin/tendik-tambah') . 
        view('templates/footbar-admin') .
        view('templates/footer');
    }

    public function tendik_edit($tendik_id)
    {
        $tendikData = TenagaPendidik::where('tendik_id', $tendik_id)->first();
        $page = [
            [ 'name' => 'Profil', 'url' => url('admin-kategori-profil') ],
            [ 'name' => 'Data Tenaga Pendidik', 'url' => url('admin-tenaga-pendidik') ],
            [ 'name' => 'Edit (' . $tendikData->tendik_nama . ')', 'url' => url('admin-edit-tendik/' . $tendikData->tendik_id) ],
        ];

        $data = [
            'title' => 'Edit Tenaga Pendidik',
            'status' => 'profil',
            'page' => $page,
            'side' => Kategori::get(),
        ];

        return
        view('templates/header', $data) . 
        view('templates/sidebar-admin', $data) . 
        view('admin/tendik-edit', [
            'tendik' => $tendikData,
        ]) . 
        view('templates/footbar-admin') .
        view('templates/footer');
    }

    public function berita()
    {
        $page = [
            [ 'name' => 'Berita', 'url' => url('admin-berita') ],
        ];

        $data = [
            'title' => 'Berita',
            'status' => 'informasi',
            'page' => $page,
            'side' => Kategori::get(),
        ];

        $beritaData = Berita::orderBy('created_at', 'desc')->get();

        return
        view('templates/header', $data) . 
        view('templates/sidebar-admin', $data) . 
        view('admin/berita', [
            'berita' => $beritaData,
        ]) . 
        view('templates/footbar-admin') .
        view('templates/footer');
    }

    public function berita_tambah()
    {
        $page = [
            [ 'name' => 'Berita', 'url' => url('admin-berita') ],
            [ 'name' => 'Tambah', 'url' => url('admin-tambah-berita') ],
        ];

        $data = [
            'title' => 'Tambah Berita',
            'status' => 'informasi',
            'page' => $page,
            'side' => Kategori::get(),
        ];

        return
        view('templates/header', $data) . 
        view('templates/sidebar-admin', $data) . 
        view('admin/berita-tambah') . 
        view('templates/footbar-admin') .
        view('templates/footer');
    }

    public function berita_detail($berita_id)
    {
        $beritaData = Berita::where('berita_id', $berita_id)->first();

        $page = [
            [ 'name' => 'Berita', 'url' => url('admin-berita') ],
            [ 'name' => $beritaData->berita_judul_ID, 'url' => url('admin-berita/' . $beritaData->berita_judul_ID) ],
        ];

        $data = [
            'title' => 'Detail Berita',
            'status' => 'informasi',
            'page' => $page,
            'side' => Kategori::get(),
        ];

        return
        view('templates/header', $data) . 
        view('templates/sidebar-admin', $data) . 
        view('admin/berita-detail', [
            'berita' => $beritaData,
        ]) . 
        view('templates/footbar-admin') .
        view('templates/footer');
    }

    public function berita_edit($berita_id)
    {
        $beritaData = Berita::where('berita_id', $berita_id)->first();

        $page = [
            [ 'name' => 'Berita', 'url' => url('admin-berita') ],
            [ 'name' => $beritaData->berita_judul_ID, 'url' => url('admin-berita/' . $beritaData->berita_id) ],
            [ 'name' => 'Edit', 'url' => url('admin-edit-berita/' . $beritaData->berita_judul_ID) ],
        ];

        $data = [
            'title' => 'Edit Berita',
            'status' => 'informasi',
            'page' => $page,
            'side' => Kategori::get(),
        ];

        return
        view('templates/header', $data) . 
        view('templates/sidebar-admin', $data) . 
        view('admin/berita-edit', [
            'berita' => $beritaData,
        ]) . 
        view('templates/footbar-admin') .
        view('templates/footer');
    }

    public function pengumuman()
    {
        $page = [
            [ 'name' => 'Pengumuman', 'url' => url('admin-pengumuman') ],
        ];

        $data = [
            'title' => 'Pengumuman',
            'status' => 'informasi',
            'page' => $page,
            'side' => Kategori::get(),
        ];

        $pengumumanData = Pengumuman::orderBy('created_at', 'desc')->get();

        return
        view('templates/header', $data) . 
        view('templates/sidebar-admin', $data) . 
        view('admin/pengumuman', [
            'pengumuman' => $pengumumanData,
        ]) . 
        view('templates/footbar-admin') .
        view('templates/footer');
    }

    public function pengumuman_tambah()
    {
        $page = [
            [ 'name' => 'Pengumuman', 'url' => url('admin-pengumuman') ],
            [ 'name' => 'Tambah', 'url' => url('admin-tambah-pengumuman') ],
        ];

        $data = [
            'title' => 'Tambah Pengumuman',
            'status' => 'informasi',
            'page' => $page,
            'side' => Kategori::get(),
        ];

        return
        view('templates/header', $data) . 
        view('templates/sidebar-admin', $data) . 
        view('admin/pengumuman-tambah') . 
        view('templates/footbar-admin') .
        view('templates/footer');
    }

    public function pengumuman_detail($pengumuman_id)
    {
        $pengumumanData = Pengumuman::where('pengumuman_id', $pengumuman_id)->first();

        $page = [
            [ 'name' => 'Pengumuman', 'url' => url('admin-pengumuman') ],
            [ 'name' => $pengumumanData->pengumuman_judul_ID, 'url' => url('admin-pengumuman/' . $pengumumanData->pengumuman_judul_ID) ],
        ];

        $data = [
            'title' => 'Detail Pengumuman',
            'status' => 'informasi',
            'page' => $page,
            'side' => Kategori::get(),
        ];

        return
        view('templates/header', $data) . 
        view('templates/sidebar-admin', $data) . 
        view('admin/pengumuman-detail', [
            'pengumuman' => $pengumumanData,
        ]) . 
        view('templates/footbar-admin') .
        view('templates/footer');
    }

    public function pengumuman_edit($pengumuman_id)
    {
        $pengumumanData = Pengumuman::where('pengumuman_id', $pengumuman_id)->first();

        $page = [
            [ 'name' => 'Pengumuman', 'url' => url('admin-pengumuman') ],
            [ 'name' => $pengumumanData->pengumuman_judul_ID, 'url' => url('admin-pengumuman/' . $pengumumanData->pengumuman_id) ],
            [ 'name' => 'Edit', 'url' => url('admin-edit-pengumuman/' . $pengumumanData->pengumuman_judul_ID) ],
        ];

        $data = [
            'title' => 'Edit Pengumuman',
            'status' => 'informasi',
            'page' => $page,
            'side' => Kategori::get(),
        ];

        return
        view('templates/header', $data) . 
        view('templates/sidebar-admin', $data) . 
        view('admin/pengumuman-edit', [
            'pengumuman' => $pengumumanData,
        ]) . 
        view('templates/footbar-admin') .
        view('templates/footer');
    }
}
