<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Menu;

class MenuController extends Controller
{
    public function update_konten(Request $request)
    {
        $request->validate([
            'menu_isi_ID' => 'required',
            'menu_isi_EN' => 'required',
        ], [
            'menu_isi_ID.required' => 'Konten tidak boleh kosong.',
            'menu_isi_EN.required' => 'Konten tidak boleh kosong.',
        ]);
        $data = [
            'menu_isi_ID' => $request->menu_isi_ID,
            'menu_isi_EN' => $request->menu_isi_EN,
        ];

        Menu::where('menu_id', $request->menu_id)->update($data);
        return redirect()->to($request->redirect)->with('success', 'Konten menu berhasil diperbarui');
    }

    public function update_status(Request $request)
    {
        $data = [
            'menu_status' => $request->menu_status,
        ];

        Menu::where('menu_id', $request->menu_id)->update($data);
        // dd($request);
        return redirect()->to($request->redirect)->with('success', 'Tampilan menu berhasil diperbarui.');
    }

    public function update_show(Request $request)
    {
        $data = [
            'menu_show' => $request->menu_show,
        ];

        $message = ($request->menu_show == 1) ? 'Menu berhasil ditampilkan.' : 'Menu berhasil disembunyikan.' ;

        Menu::where('menu_id', $request->menu_id)->update($data);
        return redirect()->to($request->redirect)->with('success', $message);
    }
}
