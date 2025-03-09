<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Dosen;
use App\Models\FokusRiset;
use App\Models\Jabatan;
use App\Models\Konsentrasi;
use App\Models\Kurikulum;
use App\Models\MataKuliah;

class AdminController extends Controller
{
    public function index()
    {

        $data = [
            'title' => 'Dashboard Admin',
            'status' => 'dashboard',
            'page' => ''
        ];

        return
        view('templates/header', $data) . 
        view('templates/sidebar-admin', $data) . 
        view('admin/index') . 
        view('templates/footbar-admin') .
        view('templates/footer');
    }

    public function kurikulum($kurikulum_id = '')
    {
        if ($kurikulum_id !== '') {
            $kurikulumData = Kurikulum::where('kurikulum_id', $kurikulum_id)->first();
            $view = 'admin/kurikulum-detail';
            $page = [ [ 'name' => 'Kurikulum', 'url' => url('admin-kurikulum') ], [ 'name' => $kurikulumData->kurikulum_judul_ID, 'url' => url('admin-kurikulum/' . $kurikulum_id) ] ];
        } else {
            $kurikulumData = Kurikulum::get();
            $view = 'admin/kurikulum';
            $page = [ [ 'name' => 'Kurikulum', 'url' => url('admin-kurikulum') ], ];
        }

        $data = [
            'title' => 'Kurikulum',
            'status' => 'kurikulum',
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
            [ 'name' => 'Kurikulum', 'url' => url('admin-kurikulum') ],
            [ 'name' => 'Tambah Kurikulum', 'url' => url('admin-tambah-kurikulum') ],
        ];

        $data = [
            'title' => 'Tambah Kurikulum',
            'status' => 'kurikulum',
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
            [ 'name' => 'Kurikulum', 'url' => url('admin-kurikulum') ],
            [ 'name' => $kurikulumData->kurikulum_judul_ID, 'url' => url('admin-kurikulum/' . $kurikulum_id) ],
            [ 'name' => 'Edit', 'url' => url('admin-edit-kurikulum/' . $kurikulum_id) ],
        ];

        $data = [
            'title' => 'Edit Kurikulum',
            'status' => 'kurikulum',
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
            [ 'name' => 'Mata Kuliah', 'url' => url('admin-mata-kuliah') ],
        ];

        $data = [
            'title' => 'Mata Kuliah',
            'status' => 'mata-kuliah',
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

        $page = [
            [ 'name' => 'Mata Kuliah', 'url' => url('admin-mata-kuliah') ],
            [ 'name' => $mkData->mk_mk_ID . ' (' . $mkData->mk_id . ')', 'url' => url('admin-mata-kuliah/' . $mkData->mk_id) ],
        ];

        $data = [
            'title' => 'Mata Kuliah',
            'status' => 'mata-kuliah',
            'page' => $page,
        ];

        return
        view('templates/header', $data) . 
        view('templates/sidebar-admin', $data) . 
        view('admin/matkul-detail', [
            'mk' => $mkData,
        ]) . 
        view('templates/footbar-admin') .
        view('templates/footer');
    }

    public function matkul_tambah()
    {
        $page = [
            [ 'name' => 'Mata Kuliah', 'url' => url('admin-mata-kuliah') ],
            [ 'name' => 'Tambah', 'url' => url('admin-tambah-matkul') ],
        ];

        $data = [
            'title' => 'Tambah Mata Kuliah',
            'status' => 'mata-kuliah',
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

    public function dosen()
    {
        $page = [
            [ 'name' => 'Data Dosen', 'url' => url('admin-dosen') ],
        ];

        $data = [
            'title' => 'Data Dosen',
            'status' => 'dosen',
            'page' => $page,
        ];

        $dosenData = Dosen::getAllDosen();
        $fokusRisetData = FokusRiset::get();
        $jabatan = Jabatan::get();
        $konsentrasi = Konsentrasi::get();

        return
        view('templates/header', $data) . 
        view('templates/sidebar-admin', $data) . 
        view('admin/dosen', [
            'dosen' => $dosenData,
            'fr' => $fokusRisetData,
            'jabatan' => $jabatan,
            'konsentrasi' => $konsentrasi,
        ]) . 
        view('templates/footbar-admin') .
        view('templates/footer');
    }
}
