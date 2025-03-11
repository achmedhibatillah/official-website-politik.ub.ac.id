<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Http\Controllers\LogicController;
use App\Models\Pengumuman;

class PengumumanController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'pengumuman_judul_ID' => 'required|min:3|max:255',
            'pengumuman_judul_EN' => 'required|min:3|max:255',
            'pengumuman_slug' => 'required|min:3|max:355',
            'pengumuman_isi_ID' => 'required|min:20',
            'pengumuman_isi_EN' => 'required|min:20',
        ], [
            'pengumuman_judul_ID.required' => 'Judul harus diisi.',
            'pengumuman_judul_ID.min' => 'Minimal 3 karakter.',
            'pengumuman_judul_ID.max' => 'Maksimal 255 karakter.',
            'pengumuman_judul_EN.required' => 'Judul harus diisi.',
            'pengumuman_judul_EN.min' => 'Minimal 3 karakter.',
            'pengumuman_judul_EN.max' => 'Maksimal 255 karakter.',
            'pengumuman_slug.required' => 'Slug harus diisi.',
            'pengumuman_slug.min' => 'Minimal 3 karakter.',
            'pengumuman_slug.max' => 'Maksimal 355 karakter.',

            'pengumuman_isi_ID.required' => 'Konten pengumuman harus diisi.',
            'pengumuman_isi_ID.min' => 'Minimal 20 karakter.',
            'pengumuman_isi_EN.required' => 'Konten pengumuman harus diisi.',
            'pengumuman_isi_EN.min' => 'Minimal 20 karakter.',
        ]);

        $logic = new LogicController();
        $data = [
            'pengumuman_id' => $logic->generateUniqueId('pengumuman', 'pengumuman_id'),
            'pengumuman_judul_ID' => $request->pengumuman_judul_ID,
            'pengumuman_judul_EN' => $request->pengumuman_judul_EN,
            'pengumuman_slug' => $request->pengumuman_slug,
            'pengumuman_isi_ID' => $request->pengumuman_isi_ID,
            'pengumuman_isi_EN' => $request->pengumuman_isi_EN,
            'pengumuman_status' => 0,
        ];

        Pengumuman::create($data);

        return redirect()->to('admin-pengumuman')->with('success', 'Pengumuman baru berhasil ditambah.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'pengumuman_judul_ID' => 'required|min:3|max:255',
            'pengumuman_judul_EN' => 'required|min:3|max:255',
            'pengumuman_slug' => 'required|min:3|max:355',
            'pengumuman_isi_ID' => 'required|min:20',
            'pengumuman_isi_EN' => 'required|min:20',
        ], [
            'pengumuman_judul_ID.required' => 'Judul harus diisi.',
            'pengumuman_judul_ID.min' => 'Minimal 3 karakter.',
            'pengumuman_judul_ID.max' => 'Maksimal 255 karakter.',
            'pengumuman_judul_EN.required' => 'Judul harus diisi.',
            'pengumuman_judul_EN.min' => 'Minimal 3 karakter.',
            'pengumuman_judul_EN.max' => 'Maksimal 255 karakter.',
            'pengumuman_slug.required' => 'Slug harus diisi.',
            'pengumuman_slug.min' => 'Minimal 3 karakter.',
            'pengumuman_slug.max' => 'Maksimal 355 karakter.',

            'pengumuman_isi_ID.required' => 'Konten pengumuman harus diisi.',
            'pengumuman_isi_ID.min' => 'Minimal 20 karakter.',
            'pengumuman_isi_EN.required' => 'Konten pengumuman harus diisi.',
            'pengumuman_isi_EN.min' => 'Minimal 20 karakter.',
        ]);

        $data = [
            'pengumuman_judul_ID' => $request->pengumuman_judul_ID,
            'pengumuman_judul_EN' => $request->pengumuman_judul_EN,
            'pengumuman_slug' => $request->pengumuman_slug,
            'pengumuman_isi_ID' => $request->pengumuman_isi_ID,
            'pengumuman_isi_EN' => $request->pengumuman_isi_EN,
        ];

        Pengumuman::where('pengumuman_id', $request->pengumuman_id)->update($data);

        return redirect()->to('admin-pengumuman/' . $request->pengumuman_id)->with('success', 'Pengumuman berhasil diperbarui.');
    }

    public function activate($pengumuman_id)
    {
        $data = [ 'pengumuman_status' => 1 ];
        Pengumuman::where('pengumuman_id', $pengumuman_id)->update($data);
        return redirect()->to('admin-pengumuman#' . $pengumuman_id);
    }

    public function deactivate($pengumuman_id)
    {
        $data = [ 'pengumuman_status' => 0 ];
        Pengumuman::where('pengumuman_id', $pengumuman_id)->update($data);
        return redirect()->to('admin-pengumuman#' . $pengumuman_id);
    }

    public function delete($pengumuman_id)
    {
        Pengumuman::where('pengumuman_id', $pengumuman_id)->delete();
        return redirect()->to('admin-pengumuman')->with('success', 'Pengumuman berhasil dihapus.');
    }
}