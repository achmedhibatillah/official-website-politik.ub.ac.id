<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Facades\App;

class HomePengumumanController extends Controller
{
    public function index()
    {
        $data = [
            'title_main' => __('header.title_main.informasi'),
            'title' => __('header.title.pengumuman'),
            'status_main' => 'informasi',
            'status' => 'pengumuman',
            'menu_lain' => Kategori::getKategoriLocalDetail('informasi', App::getLocale()),
            'nav' => Kategori::getKategoriLocal(1000, App::getLocale())
        ];
    
        $k = request()->query('k', '');
    
        if (!empty($k)) {
            $pengumumanData = Pengumuman::where('pengumuman_judul_ID', 'like', "%$k%")
                ->orderBy('created_at', 'desc')
                ->paginate(10)
                ->through(fn($item) => Pengumuman::formatPengumuman($item));
        } else {
            $pengumumanData = Pengumuman::getPengumuman(10);
        }        
    
        return 
            view('templates/header', $data) . 
            view('templates/navbar-home', $data) .
            view('templates/container-top', $data) . 
            view('home/pengumuman', [
                'k' => $k,
                'pengumuman' => $pengumumanData,
            ]) . 
            view('templates/container-bottom') .
            view('templates/footbar-home') .
            view('templates/footer');
    }

    public function detail($pengumuman_slug)
    {

        $data = [
            'title_main' => __('header.title_main.informasi'),
            'title' => __('header.title.pengumuman'),
            'status_main' => 'informasi',
            'status' => 'pengumuman',
            'menu_lain' => Kategori::getKategoriLocalDetail('informasi', App::getLocale()),
            'nav' => Kategori::getKategoriLocal(1000, App::getLocale()),
            'pengumuman_lain' => Pengumuman::getPengumuman(5),
        ];

        
        $pengumumanData = Pengumuman::getDetailPengumuman($pengumuman_slug, App::getLocale());
    
        return 
            view('templates/header', $data) . 
            view('templates/navbar-home', $data) .
            view('templates/container-top', $data) . 
            view('home/pengumuman-detail', [
                'pengumuman' => $pengumumanData,
            ]) . 
            view('templates/container-bottom') .
            view('templates/footbar-home') .
            view('templates/footer');
    }
}
