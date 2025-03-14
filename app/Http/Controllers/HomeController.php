<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kategori;
use App\Models\Berita;
use App\Models\Dosen;
use App\Models\DosenToFr;
use App\Models\FokusRiset;
use App\Models\Pengumuman;
use App\Models\Menu;
use App\Models\HomeDosen;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function setLocale($lang)
    {
        if(in_array($lang, ['id', 'en'])) {
            App::setLocale($lang);
            Session::put('locale', $lang);
        }

        return redirect()->back();
    }

    public function index()
    {
        $kategoriData = Kategori::getKategoriLocal(1000, App::getLocale());

        $data = [
            'title' => 'Home',
            'status_main' => 'home',
            'status' => 'home',
            'nav' => $kategoriData,
        ];

        $beritaData = Berita::orderBy('created_at', 'desc')->get();
        $dosen = Dosen::getAllDosenLocalized(App::getLocale());
        $dosen_to_fr = DosenToFr::get();
        $fr = FokusRiset::getAllFokusRisetLocalized(App::getLocale());
        $dosenData = $dosen->map(function ($d) use ($dosen_to_fr, $fr) {
            $d->fr_names = $fr
                ->whereIn('fr_id', $dosen_to_fr->where('dosen_id', $d->dosen_id)->pluck('fr_id'))
                ->map(function ($item) {
                    return [
                        'id' => $item->fr_id,
                        'name' => $item->fr_name
                    ];
                });
            return $d;
        });

        return 
        view('templates/header') . 
        view('templates/navbar-home', $data) . 
        view('home/index', [
            'berita' => $beritaData,
            'pengumuman' => Pengumuman::getPengumuman(6, App::getLocale()),
            'dosen' => $dosenData,
        ]) . 
        view('templates/footbar-home') .
        view('templates/footer');
    }

    public function menu($menu_slug)
    {
        $menuData = Menu::where('menu_slug', $menu_slug)->first();

        if (!isset($menuData)) {
            return '404';
        }

        $menuData = Menu::getDetailMenuLocalized($menuData->menu_id, App::getLocale());

        $local = 'id';
        $kategoriData = Kategori::getKategoriLocal(1000, App::getLocale());
        $data = [
            'title_main' => $menuData->kategori[0]->kategori_judul,
            'title' => $menuData->menu_judul,
            'status_main' => $menuData->kategori[0]->kategori_slug,
            'status' => $menuData->menu_slug,
            'menu_lain' => Kategori::getKategoriLocalDetail($menuData->kategori[0]->kategori_slug, App::getLocale()),
            'pengumuman_lain' => Pengumuman::getPengumuman(5, App::getLocale()),
            'nav' => $kategoriData,
        ];

        return 
        view('templates/header') . 
        view('templates/navbar-home', $data) . 
        view('templates/container-top', $data) . 
        view('home/menu-detail', [
            'menu' => $menuData,
        ]) . 
        view('templates/footbar-home') .
        view('templates/footbar-home') .
        view('templates/footer');
    }
}