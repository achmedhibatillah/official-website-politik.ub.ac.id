<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function index()
    {

        $data = [
            'title' => 'Login Admin',
            'status' => 'login',
            'page' => ''
        ];

        return
        view('templates/header', $data) . 
        view('auth/login-admin') . 
        view('templates/footer');
    }
}
 