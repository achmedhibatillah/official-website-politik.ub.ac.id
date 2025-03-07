<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return 
        view('templates/header') . 
        view('templates/navbar-home') . 
        view('home/index') . 
        view('templates/footbar-home') .
        view('templates/footer');
    }
}