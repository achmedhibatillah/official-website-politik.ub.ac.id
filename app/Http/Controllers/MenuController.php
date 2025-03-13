<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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

    public function update_gambar(Request $request)
    {
        $request->validate([
            'menu_gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'menu_gambar.required' => 'Gambar wajib diunggah.',
            'menu_gambar.image' => 'File harus berupa gambar.',
            'menu_gambar.mimes' => 'Format yang diperbolehkan: jpeg, png, jpg, gif, svg.',
            'menu_gambar.max' => 'Ukuran maksimum foto adalah 2MB.',
        ]);

        if ($request->hasFile('menu_gambar')) {
            if (public_path('assets/images/dynamic/temporary.png')) {
                $oldFile = public_path('assets/images/dynamic/temporary.png');
                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
            } 
            if (public_path('assets/images/dynamic/temporary.jpg')) {
                $oldFile = public_path('assets/images/dynamic/temporary.jpg');
                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
            } 
            if (public_path('assets/images/dynamic/temporary.jpeg')) {
                $oldFile = public_path('assets/images/dynamic/temporary.jpeg');
                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
            }

            $extension = $request->file('menu_gambar')->getClientOriginalExtension();
            $filename = 'temporary.' . $extension;
            $request->file('menu_gambar')->move(public_path('assets/images/dynamic'), $filename);
            $originalname = $request->file('menu_gambar')->getClientOriginalName();
            session()->flash('menu_gambar_original', $originalname);
        } elseif ($request->menu_session) {
            session()->flash('menu_gambar_original', $request->menu_session);
        }

        if (File::exists(public_path('assets/images/dynamic/temporary.png'))) {
            $tempFile = public_path('assets/images/dynamic/temporary.png');
            $extension = '.png';
        } elseif (File::exists(public_path('assets/images/dynamic/temporary.jpg'))) {
            $tempFile = public_path('assets/images/dynamic/temporary.jpg');
            $extension = '.jpg';
        } elseif (File::exists(public_path('assets/images/dynamic/temporary.jpeg'))) {
            $tempFile = public_path('assets/images/dynamic/temporary.jpeg');
            $extension = '.jpeg';
        } else {
            $tempFile = '';
        }

        $menuData = Menu::where('menu_id', $request->menu_id)->first();

        $path = '';

        if (File::exists(public_path($menuData->menu_gambar)) && File::exists($tempFile)) {
            File::delete(public_path($menuData->menu_gambar));
        }

        if (File::exists($tempFile)) {
            $slugName = $request->menu_slug . $extension;
            $path = 'assets/images/dynamic/' . $slugName;
            $savePath = public_path('assets/images/dynamic/' . $slugName);        
            File::move($tempFile, $savePath);
        }
        
        session()->forget(['menu_gambar_temp', 'menu_gambar_original']);

        $data = [
            'menu_gambar' => $path,
        ];

        Menu::where('menu_id', $request->menu_id)->update($data);
        return redirect()->to($request->redirect)->with('success', $request->message);
    }
}
