<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Http\Controllers\LogicController;
use App\Models\Berita;

class BeritaController extends Controller
{
    public function add(Request $request)
    {
        if ($request->hasFile('berita_gambar')) {
            if (public_path('assets/uploads/berita/temporary.png')) {
                $oldFile = public_path('assets/uploads/berita/temporary.png');
                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
            } 
            if (public_path('assets/uploads/berita/temporary.jpg')) {
                $oldFile = public_path('assets/uploads/berita/temporary.jpg');
                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
            } 
            if (public_path('assets/uploads/berita/temporary.jpeg')) {
                $oldFile = public_path('assets/uploads/berita/temporary.jpeg');
                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
            }

            $extension = $request->file('berita_gambar')->getClientOriginalExtension();
            $filename = 'temporary.' . $extension;
            $request->file('berita_gambar')->move(public_path('assets/uploads/berita'), $filename);
            $originalname = $request->file('berita_gambar')->getClientOriginalName();
            session()->flash('berita_gambar_original', $originalname);
        } elseif ($request->berita_session) {
            session()->flash('berita_gambar_original', $request->berita_session);
        }

        $request->validate([
            'berita_judul_ID' => 'required|min:3|max:255',
            'berita_judul_EN' => 'required|min:3|max:255',
            'berita_slug' => 'required|min:3|max:355',
            'berita_isi_ID' => 'required|min:20',
            'berita_isi_EN' => 'required|min:20',
        ], [
            'berita_judul_ID.required' => 'Judul harus diisi.',
            'berita_judul_ID.min' => 'Minimal 3 karakter.',
            'berita_judul_ID.max' => 'Maksimal 255 karakter.',
            'berita_judul_EN.required' => 'Judul harus diisi.',
            'berita_judul_EN.min' => 'Minimal 3 karakter.',
            'berita_judul_EN.max' => 'Maksimal 255 karakter.',
            'berita_slug.required' => 'Slug harus diisi.',
            'berita_slug.min' => 'Minimal 3 karakter.',
            'berita_slug.max' => 'Maksimal 355 karakter.',

            'berita_isi_ID.required' => 'Konten berita harus diisi.',
            'berita_isi_ID.min' => 'Minimal 20 karakter.',
            'berita_isi_EN.required' => 'Konten berita harus diisi.',
            'berita_isi_EN.min' => 'Minimal 20 karakter.',
        ]);

        if (File::exists(public_path('assets/uploads/berita/temporary.png'))) {
            $tempFile = public_path('assets/uploads/berita/temporary.png');
            $extension = '.png';
        } elseif (File::exists(public_path('assets/uploads/berita/temporary.jpg'))) {
            $tempFile = public_path('assets/uploads/berita/temporary.jpg');
            $extension = '.jpg';
        } elseif (File::exists(public_path('assets/uploads/berita/temporary.jpeg'))) {
            $tempFile = public_path('assets/uploads/berita/temporary.jpeg');
            $extension = '.jpeg';
        } else {
            $tempFile = '';
        }

        $path = '';
        if (File::exists($tempFile)) {
            $slugName = $request->berita_slug . $extension;
            $path = 'assets/uploads/berita/' . $slugName;
            $newPath = public_path('assets/uploads/berita/' . $slugName);        
            File::move($tempFile, $newPath);
        }
        
        session()->forget(['berita_gambar_temp', 'berita_gambar_original']);

        $logic = new LogicController();
        $data = [
            'berita_id' => $logic->generateUniqueId('berita', 'berita_id'),
            'berita_judul_ID' => $request->berita_judul_ID,
            'berita_judul_EN' => $request->berita_judul_EN,
            'berita_slug' => $request->berita_slug,
            'berita_gambar' => $path,
            'berita_isi_ID' => $request->berita_isi_ID,
            'berita_isi_EN' => $request->berita_isi_EN,
            'berita_status' => 0,
        ];

        Berita::create($data);

        return redirect()->to('admin-berita')->with('success', 'Berita baru berhasil ditambah.');
    }

    public function update(Request $request)
    {
        if ($request->hasFile('berita_gambar')) {
            if (public_path('assets/uploads/berita/temporary.png')) {
                $oldFile = public_path('assets/uploads/berita/temporary.png');
                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
            } 
            if (public_path('assets/uploads/berita/temporary.jpg')) {
                $oldFile = public_path('assets/uploads/berita/temporary.jpg');
                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
            } 
            if (public_path('assets/uploads/berita/temporary.jpeg')) {
                $oldFile = public_path('assets/uploads/berita/temporary.jpeg');
                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
            }

            $extension = $request->file('berita_gambar')->getClientOriginalExtension();
            $filename = 'temporary.' . $extension;
            $request->file('berita_gambar')->move(public_path('assets/uploads/berita'), $filename);
            $originalname = $request->file('berita_gambar')->getClientOriginalName();
            session()->flash('berita_gambar_original', $originalname);
        } elseif ($request->berita_session) {
            session()->flash('berita_gambar_original', $request->berita_session);
        }

        $request->validate([
            'berita_judul_ID' => 'required|min:3|max:255',
            'berita_judul_EN' => 'required|min:3|max:255',
            'berita_slug' => 'required|min:3|max:355',
            'berita_isi_ID' => 'required|min:20',
            'berita_isi_EN' => 'required|min:20',
        ], [
            'berita_judul_ID.required' => 'Judul harus diisi.',
            'berita_judul_ID.min' => 'Minimal 3 karakter.',
            'berita_judul_ID.max' => 'Maksimal 255 karakter.',
            'berita_judul_EN.required' => 'Judul harus diisi.',
            'berita_judul_EN.min' => 'Minimal 3 karakter.',
            'berita_judul_EN.max' => 'Maksimal 255 karakter.',
            'berita_slug.required' => 'Slug harus diisi.',
            'berita_slug.min' => 'Minimal 3 karakter.',
            'berita_slug.max' => 'Maksimal 355 karakter.',

            'berita_isi_ID.required' => 'Konten berita harus diisi.',
            'berita_isi_ID.min' => 'Minimal 20 karakter.',
            'berita_isi_EN.required' => 'Konten berita harus diisi.',
            'berita_isi_EN.min' => 'Minimal 20 karakter.',
        ]);

        if (File::exists(public_path('assets/uploads/berita/temporary.png'))) {
            $tempFile = public_path('assets/uploads/berita/temporary.png');
            $extension = '.png';
        } elseif (File::exists(public_path('assets/uploads/berita/temporary.jpg'))) {
            $tempFile = public_path('assets/uploads/berita/temporary.jpg');
            $extension = '.jpg';
        } elseif (File::exists(public_path('assets/uploads/berita/temporary.jpeg'))) {
            $tempFile = public_path('assets/uploads/berita/temporary.jpeg');
            $extension = '.jpeg';
        } else {
            $tempFile = '';
        }

        $beritaData = Berita::where('berita_id', $request->berita_id)->first();

        $path = '';

        if (File::exists(public_path($beritaData->berita_gambar))) {
            $path = $beritaData->berita_gambar;        
        }

        if (File::exists(public_path($beritaData->berita_gambar)) && File::exists($tempFile)) {
            File::delete(public_path($beritaData->berita_gambar));
        }

        if (File::exists($tempFile)) {
            $slugName = $request->berita_slug . $extension;
            $path = 'assets/uploads/berita/' . $slugName;
            $savePath = public_path('assets/uploads/berita/' . $slugName);        
            File::move($tempFile, $savePath);
        }
        
        session()->forget(['dberita_gambar_temp', 'berita_gambar_original']);

        $data = [
            'berita_judul_ID' => $request->berita_judul_ID,
            'berita_judul_EN' => $request->berita_judul_EN,
            'berita_slug' => $request->berita_slug,
            'berita_gambar' => $path,
            'berita_isi_ID' => $request->berita_isi_ID,
            'berita_isi_EN' => $request->berita_isi_EN,
        ];

        Berita::where('berita_id', $request->berita_id)->update($data);

        return redirect()->to('admin-berita/' . $request->berita_id)->with('success', 'Berita berhasil diperbarui.');
    }

    public function activate($berita_id)
    {
        $data = [ 'berita_status' => 1 ];
        Berita::where('berita_id', $berita_id)->update($data);
        return redirect()->to('admin-berita#' . $berita_id);
    }

    public function deactivate($berita_id)
    {
        $data = [ 'berita_status' => 0 ];
        Berita::where('berita_id', $berita_id)->update($data);
        return redirect()->to('admin-berita#' . $berita_id);
    }

    public function delete($berita_id)
    {
        $beritaData = Berita::where('berita_id', $berita_id)->first();
        if (File::exists(public_path($beritaData->berita_gambar))) {
            File::delete(public_path($beritaData->berita_gambar));
        }

        Berita::where('berita_id', $berita_id)->delete();
        return redirect()->to('admin-berita')->with('success', 'Berita berhasil dihapus.');
    }
}