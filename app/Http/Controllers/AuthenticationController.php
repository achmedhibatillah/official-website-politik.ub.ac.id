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

    public function authentication_admin(Request $request)
    {
        $request->validate([
            'auth_token' => 'required',
        ], [
            'auth_token.required' => 'Masukkan token.'
        ]);

        if ($request->auth_token === env('ADMIN_TOKEN')) {
            $request->session()->put('admin_authenticated', true);
            return redirect('admin-dashboard'); // Sesuaikan dengan route dashboard admin
        }

        return redirect('login-admin')->with('error', 'Token tidak valid.');
    }
}
 