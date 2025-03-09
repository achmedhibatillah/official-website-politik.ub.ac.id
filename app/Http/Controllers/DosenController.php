<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'dosen_nama' => 'required|min:3|max:255',
            'dosen_email' => 'required|min:3|max:255',
            'dosen_deskripsi' => 'required|min:30|max:1200',
        ], [
            'dosen_nama.required' => 'Nama lengkap harus diisi.',
            'dosen_nama.min' => 'Minimal 3 karakter.',
            'dosen_nama.max' => 'Maksimal 255 karakter.',

            'dosen_email.required' => 'Alamat email harus diisi.',
            'dosen_email.min' => 'Minimal 3 karakter.',
            'dosen_email.max' => 'Maksimal 255 karakter.',

            'dosen_deskripsi.required' => 'Deskripi harus diisi.',
            'dosen_deskripsi.min' => 'Minimal 30 karakter.',
            'dosen_deskripsi.max' => 'Maksimal 1200 karakter.',
        ]);     
    }
}
