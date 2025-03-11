<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Berita;

class BeritaHomeController extends Controller
{
    public function index()
    {
        $data = [
            'title_main' => __('header.title_main.berita'),
            'title' => __('header.title.berita_prodi'),
            'status_main' => 'berita',
            'status' => 'berita',
        ];
    
        $k = request()->query('k', '');
    
        if (!empty($k)) {
            $beritaData = Berita::where('berita_judul_ID', 'like', "%$k%")
                ->orderBy('created_at', 'desc')
                ->paginate(10)
                ->through(fn($item) => Berita::formatBerita($item));
        } else {
            $beritaData = Berita::getBerita(10);
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
            'title_main' => __('header.title_main.berita'),
            'title' => __('header.title.berita_prodi'),
            'status_main' => 'berita',
            'status' => 'berita',
            'berita_lain' => Berita::getBerita(5),
        ];

        
        $beritaData = Berita::getDetailBerita($berita_slug);
    
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
