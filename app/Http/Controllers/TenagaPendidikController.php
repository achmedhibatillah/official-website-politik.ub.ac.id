<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Http\Controllers\LogicController;
use App\Models\TenagaPendidik;

class TenagaPendidikController extends Controller
{
    public function add(Request $request)
    {
        if ($request->hasFile('tendik_foto')) {
            if (public_path('assets/uploads/sdm/tenaga-pendidik/temporary.png')) {
                $oldFile = public_path('assets/uploads/sdm/tenaga-pendidik/temporary.png');
                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
            } 
            if (public_path('assets/uploads/sdm/tenaga-pendidik/temporary.jpg')) {
                $oldFile = public_path('assets/uploads/sdm/tenaga-pendidik/temporary.jpg');
                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
            } 
            if (public_path('assets/uploads/sdm/tenaga-pendidik/temporary.jpeg')) {
                $oldFile = public_path('assets/uploads/sdm/tenaga-pendidik/temporary.jpeg');
                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
            }

            $extension = $request->file('tendik_foto')->getClientOriginalExtension();
            $filename = 'temporary.' . $extension;
            $request->file('tendik_foto')->move(public_path('assets/uploads/sdm/tenaga-pendidik'), $filename);
            $originalname = $request->file('tendik_foto')->getClientOriginalName();
            session()->flash('tendik_foto_original', $originalname);
        } elseif ($request->tendik_session) {
            session()->flash('tendik_foto_original', $request->tendik_session);
        }

        $request->validate([
            'tendik_nama' => 'required|min:3|max:255'
        ], [
            'tendik_nama.required' => 'Nama harus diisi.',
            'tendik_nama.min' => 'Minimal 3 karakter.',
            'tendik_nama.max' => 'Maksimal 255 karakter.',
        ]);

        if (File::exists(public_path('assets/uploads/sdm/tenaga-pendidik/temporary.png'))) {
            $tempFile = public_path('assets/uploads/sdm/tenaga-pendidik/temporary.png');
            $extension = '.png';
        } elseif (File::exists(public_path('assets/uploads/sdm/tenaga-pendidik/temporary.jpg'))) {
            $tempFile = public_path('assets/uploads/sdm/tenaga-pendidik/temporary.jpg');
            $extension = '.jpg';
        } elseif (File::exists(public_path('assets/uploads/sdm/tenaga-pendidik/temporary.jpeg'))) {
            $tempFile = public_path('assets/uploads/sdm/tenaga-pendidik/temporary.jpeg');
            $extension = '.jpeg';
        } else {
            $extension = '';
            $tempFile = '';
        }

        $path = '';
        if (File::exists($tempFile)) {
            $slugName = Str::slug($request->tendik_nama, '-') . $extension;
            $path = 'assets/uploads/sdm/tenaga-pendidik/' . $slugName;
            $newPath = public_path('assets/uploads/sdm/tenaga-pendidik/' . $slugName);        
            File::move($tempFile, $newPath);
        }
        
        session()->forget(['tendik_foto_temp', 'tendik_foto_original']);

        $logic = new LogicController();

        $data = [
            'tendik_id' => $logic->generateUniqueId('tendik', 'tendik_id'),
            'tendik_nama' => $request->tendik_nama,
            'tendik_slug' => Str::slug($request->tendik_nama),
            'tendik_foto' => $path,
        ];

        TenagaPendidik::create($data);

        return redirect()->to('admin-tenaga-pendidik')->with('success', 'Data tenaga pendidik baru berhasil ditambah.');
    }

    public function update(Request $request)
    {
        if ($request->hasFile('tendik_foto')) {
            if (public_path('assets/uploads/sdm/tenaga-pendidik/temporary.png')) {
                $oldFile = public_path('assets/uploads/sdm/tenaga-pendidik/temporary.png');
                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
            } 
            if (public_path('assets/uploads/sdm/tenaga-pendidik/temporary.jpg')) {
                $oldFile = public_path('assets/uploads/sdm/tenaga-pendidik/temporary.jpg');
                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
            } 
            if (public_path('assets/uploads/sdm/tenaga-pendidik/temporary.jpeg')) {
                $oldFile = public_path('assets/uploads/sdm/tenaga-pendidik/temporary.jpeg');
                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
            }

            $extension = $request->file('tendik_foto')->getClientOriginalExtension();
            $filename = 'temporary.' . $extension;
            $request->file('tendik_foto')->move(public_path('assets/uploads/sdm/tenaga-pendidik'), $filename);
            $originalname = $request->file('tendik_foto')->getClientOriginalName();
            session()->flash('tendik_foto_original', $originalname);
        } elseif ($request->tendik_session) {
            session()->flash('tendik_foto_original', $request->tendik_session);
        }

        $request->validate([
            'tendik_nama' => 'required|min:3|max:255'
        ], [
            'tendik_nama.required' => 'Nama harus diisi.',
            'tendik_nama.min' => 'Minimal 3 karakter.',
            'tendik_nama.max' => 'Maksimal 255 karakter.',
        ]);

        if (File::exists(public_path('assets/uploads/sdm/tenaga-pendidik/temporary.png'))) {
            $tempFile = public_path('assets/uploads/sdm/tenaga-pendidik/temporary.png');
            $extension = '.png';
        } elseif (File::exists(public_path('assets/uploads/sdm/tenaga-pendidik/temporary.jpg'))) {
            $tempFile = public_path('assets/uploads/sdm/tenaga-pendidik/temporary.jpg');
            $extension = '.jpg';
        } elseif (File::exists(public_path('assets/uploads/sdm/tenaga-pendidik/temporary.jpeg'))) {
            $tempFile = public_path('assets/uploads/sdm/tenaga-pendidik/temporary.jpeg');
            $extension = '.jpeg';
        } else {
            $extension = '';
            $tempFile = '';
        }

        $tendikData = TenagaPendidik::where('tendik_id', $request->tendik_id)->first();

        $path = '';

        if (File::exists(public_path($tendikData->tendik_foto))) {
            $path = $tendikData->tendik_foto;        
        }

        if (File::exists(public_path($tendikData->tendik_foto)) && File::exists($tempFile)) {
            File::delete(public_path($tendikData->tendik_foto));
        }

        if (File::exists($tempFile)) {
            $slugName = Str::slug($request->tendik_nama, '-') . $extension;
            $path = 'assets/uploads/sdm/tenaga-pendidik/' . $slugName;
            $savePath = public_path('assets/uploads/sdm/tenaga-pendidik/' . $slugName);        
            File::move($tempFile, $savePath);
        }
        
        session()->forget(['tendik_foto_temp', 'tendik_foto_original']);

        $data = [
            'tendik_nama' => $request->tendik_nama,
            'tendik_slug' => Str::slug($request->tendik_nama),
            'tendik_foto' => $path,
        ];

        TenagaPendidik::where('tendik_id', $request->tendik_id)->update($data);

        return redirect()->to('admin-tenaga-pendidik')->with('success', 'Data tenaga pendidik berhasil diperbarui.');
    }

    public function delete($tendik_id)
    {
        $tendikData = TenagaPendidik::where('tendik_id', $tendik_id)->first();
        if (File::exists(public_path($tendikData->tendik_foto))) {
            File::delete(public_path($tendikData->tendik_foto));
        }

        TenagaPendidik::where('tendik_id', $tendik_id)->delete();
        return redirect()->to('admin-tenaga-pendidik')->with('success', 'Data tenaga pendidik berhasil dihapus.');
    }
}
