<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Support\Facades\App;

class HomeBeritaController extends Controller
{
    public function index()
    {
        $data = [
            'title_main' => __('header.title_main.informasi'),
            'title' => __('header.title.berita_prodi'),
            'status_main' => 'informasi',
            'status' => 'berita',
            'menu_lain' => Kategori::getKategoriLocalDetail('informasi', App::getLocale()),
            'nav' => Kategori::getKategoriLocal(1000, App::getLocale())
        ];
    
        $k = request()->query('k', '');
    
        if (!empty($k)) {
            $beritaData = Berita::where('berita_judul_ID', 'like', "%$k%")
                ->orderBy('created_at', 'desc')
                ->paginate(10)
                ->through(fn($item) => Berita::formatBerita($item));
        } else {
            $beritaData = Berita::getBerita(10, App::getLocale());
        }        
     
        return 
            view('templates/header', $data) . 
            view('templates/navbar-home', $data) .
            view('templates/container-top', $data) . 
            view('home/berita', [
                'k' => $k,
                'berita' => $beritaData,
            ]) . 
            view('templates/container-bottom') .
            view('templates/footbar-home') .
            view('templates/footer');
    }

    public function detail($berita_slug)
    {

        $data = [
            'title_main' => __('header.title_main.informasi'),
            'title' => __('header.title.berita_prodi'),
            'status_main' => 'informasi',
            'status' => 'berita',
            'menu_lain' => Kategori::getKategoriLocalDetail('informasi', App::getLocale()),
            'berita_lain' => Berita::getBerita(5, App::getLocale()),
            'nav' => Kategori::getKategoriLocal(1000, App::getLocale())
        ];

        
        $beritaData = Berita::getDetailBerita($berita_slug, App::getLocale());
    
        return 
            view('templates/header', $data) . 
            view('templates/navbar-home', $data) .
            view('templates/container-top', $data) . 
            view('home/berita-detail', [
                'berita' => $beritaData,
            ]) . 
            view('templates/container-bottom') .
            view('templates/footbar-home') .
            view('templates/footer');
    }
}
