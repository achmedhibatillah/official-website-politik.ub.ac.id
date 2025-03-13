<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Berita;
use App\Models\Pengumuman;
use App\Models\Menu;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home',
            'status_main' => 'home',
            'status' => 'home',
        ];

        $beritaData = Berita::orderBy('created_at', 'desc')->get();

        return 
        view('templates/header') . 
        view('templates/navbar-home', $data) . 
        view('home/index', [
            'berita' => $beritaData,
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

        $menuData = Menu::getDetailMenu($menuData->menu_id);

        $data = [
            'status_main' => 'home',
            'status' => 'home',
            'title_main' => 'Kategori',
            'title' => $menuData->menu_judul_ID,
            'status_main' => 'informasi',
            'status' => 'profil',
            'pengumuman_lain' => Pengumuman::getPengumuman(5),
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