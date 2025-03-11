<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Berita;

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
}