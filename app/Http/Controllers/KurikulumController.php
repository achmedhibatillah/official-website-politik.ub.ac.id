<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Watson\Validating\ValidatingTrait;

use App\Http\Controllers\LogicController;
use App\Models\Kurikulum;

class KurikulumController extends Controller
{
    public function add(Request $request)
    {
        if ($request->hasFile('kurikulum_silabus')) {
            if (public_path('assets/uploads/silabus/temporary.pdf')) {
                $oldFile = public_path('assets/uploads/silabus/' . session('kurikulum_silabus_temp'));
                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
            }

            $filename = 'temporary.pdf';
            $request->file('kurikulum_silabus')->move(public_path('assets/uploads/silabus'), $filename);
            $originalname = $request->file('kurikulum_silabus')->getClientOriginalName();
            session()->flash('kurikulum_silabus_original', $originalname);
        }

        if ($request->kurikulum_session) {
            session()->flash('kurikulum_silabus_original', $request->kurikulum_session);
        }
        
        $request->validate([
            'kurikulum_judul_ID' => 'required|min:3|max:255',
            'kurikulum_judul_EN' => 'required|min:3|max:255',
            'kurikulum_mulai' => 'required',
            'kurikulum_deskripsi_ID' => 'required|min:3|max:2000',
            'kurikulum_deskripsi_EN' => 'required|min:3|max:2000'
        ], [
            'kurikulum_judul_ID.required' => 'Judul harus diisi.',
            'kurikulum_judul_ID.min' => 'Minimal 3 karakter.',
            'kurikulum_judul_ID.max' => 'Maksimal 255 karakter.',
            'kurikulum_judul_EN.required' => 'Judul harus diisi.',
            'kurikulum_judul_EN.min' => 'Minimal 3 karakter.',
            'kurikulum_judul_EN.max' => 'Maksimal 255 karakter.',

            'kurikulum_mulai.required' => 'Waktu dimulai harus diisi.',

            'kurikulum_deskripsi_ID.required' => 'Deskripsi harus diisi.',
            'kurikulum_deskripsi_ID.min' => 'Minimal 3 karakter.',
            'kurikulum_deskripsi_ID.max' => 'Maksimal 2000 karakter.',
            'kurikulum_deskripsi_EN.required' => 'Deskripsi harus diisi.',
            'kurikulum_deskripsi_EN.min' => 'Minimal 3 karakter.',
            'kurikulum_deskripsi_EN.max' => 'Maksimal 2000 karakter.',
        ]);
        
        $tempFile = public_path('assets/uploads/silabus/temporary.pdf');
        $path = '';
        if (File::exists($tempFile)) {
            $slugName = Str::slug($request->kurikulum_judul_ID, '-') . '.pdf';
            $path = 'assets/uploads/silabus/' . $slugName;
            $newPath = public_path('assets/uploads/silabus/' . $slugName);        
            File::move($tempFile, $newPath);
        }
        
        session()->forget(['kurikulum_silabus_temp', 'kurikulum_silabus_original']);
        
        $logic = new LogicController();
        $data = [
            'kurikulum_id' => $logic->generateUniqueId('kurikulum', 'kurikulum_id'),
            'kurikulum_judul_ID' => $request->kurikulum_judul_ID,
            'kurikulum_judul_EN' => $request->kurikulum_judul_EN,
            'kurikulum_mulai' => $request->kurikulum_mulai,
            'kurikulum_deskripsi_ID' => $request->kurikulum_deskripsi_ID,
            'kurikulum_deskripsi_EN' => $request->kurikulum_deskripsi_EN,
            'kurikulum_silabus' => $path,
            'kurikulum_status' => 0,
        ];
        
        $kurikulum = Kurikulum::create($data);
        
        if ($kurikulum) {
            return redirect()->to('admin-kurikulum')->with('success', 'Kurikulum baru berhasil ditambah.');
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan.');
        }
    }

    public function activate(Request $request)
    {
        $kurikulum_id = $request->kurikulum_id;
        $kurikulum_status = $request->kurikulum_status;

        if ($kurikulum_status == 1) {
            Kurikulum::where('kurikulum_status', 1)->update(['kurikulum_status' => 0]);
        }

        Kurikulum::where('kurikulum_id', $kurikulum_id)->update([
            'kurikulum_status' => $kurikulum_status,
        ]);

        return redirect()->back();
    }

    public function update(Request $request)
    {
        if ($request->hasFile('kurikulum_silabus')) {
            if (public_path('assets/uploads/silabus/temporary.pdf')) {
                $oldFile = public_path('assets/uploads/silabus/' . session('kurikulum_silabus_temp'));
                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
            }

            $filename = 'temporary.pdf';
            $request->file('kurikulum_silabus')->move(public_path('assets/uploads/silabus'), $filename);
            $originalname = $request->file('kurikulum_silabus')->getClientOriginalName();
            session()->flash('kurikulum_silabus_original', $originalname);
        }

        if ($request->kurikulum_session) {
            session()->flash('kurikulum_silabus_original', $request->kurikulum_session);
        }
        
        $request->validate([
            'kurikulum_judul_ID' => 'required|min:3|max:255',
            'kurikulum_judul_EN' => 'required|min:3|max:255',
            'kurikulum_mulai' => 'required',
            'kurikulum_deskripsi_ID' => 'required|min:3|max:2000',
            'kurikulum_deskripsi_EN' => 'required|min:3|max:2000'
        ], [
            'kurikulum_judul_ID.required' => 'Judul harus diisi.',
            'kurikulum_judul_ID.min' => 'Minimal 3 karakter.',
            'kurikulum_judul_ID.max' => 'Maksimal 255 karakter.',
            'kurikulum_judul_EN.required' => 'Judul harus diisi.',
            'kurikulum_judul_EN.min' => 'Minimal 3 karakter.',
            'kurikulum_judul_EN.max' => 'Maksimal 255 karakter.',

            'kurikulum_mulai.required' => 'Waktu dimulai harus diisi.',

            'kurikulum_deskripsi_ID.required' => 'Deskripsi harus diisi.',
            'kurikulum_deskripsi_ID.min' => 'Minimal 3 karakter.',
            'kurikulum_deskripsi_ID.max' => 'Maksimal 2000 karakter.',
            'kurikulum_deskripsi_EN.required' => 'Deskripsi harus diisi.',
            'kurikulum_deskripsi_EN.min' => 'Minimal 3 karakter.',
            'kurikulum_deskripsi_EN.max' => 'Maksimal 2000 karakter.',
        ]);
        
        $kurikulumData = Kurikulum::where('kurikulum_id', $request->kurikulum_id)->first();
        $tempFile = public_path('assets/uploads/silabus/temporary.pdf');
        $path = $kurikulumData->kurikulum_silabus;
        if (File::exists(public_path($kurikulumData->kurikulum_silabus)) && File::exists($tempFile)) {
            File::delete(public_path($kurikulumData->kurikulum_silabus));
        }
        if (File::exists($tempFile)) {
            $slugName = Str::slug($request->kurikulum_judul_ID, '-') . '.pdf';
            $path = 'assets/uploads/silabus/' . $slugName;
            $newPath = public_path('assets/uploads/silabus/' . $slugName);        
            File::move($tempFile, $newPath);
        }
        
        session()->forget(['kurikulum_silabus_temp', 'kurikulum_silabus_original']);
        
        $logic = new LogicController();
        $data = [
            'kurikulum_judul_ID' => $request->kurikulum_judul_ID,
            'kurikulum_judul_EN' => $request->kurikulum_judul_EN,
            'kurikulum_mulai' => $request->kurikulum_mulai,
            'kurikulum_deskripsi_ID' => $request->kurikulum_deskripsi_ID,
            'kurikulum_deskripsi_EN' => $request->kurikulum_deskripsi_EN,
            'kurikulum_silabus' => $path,
        ];
        
        $kurikulum = Kurikulum::where('kurikulum_id', $kurikulumData->kurikulum_id)->update($data);
        
        if ($kurikulum) {
            return redirect()->to('admin-kurikulum/' . $kurikulumData->kurikulum_id)->with('success', 'Data kurikulum berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan.');
        }
    }

    public function delete($kurikulum_id)
    {
        $kurikulumData = Kurikulum::where('kurikulum_id', $kurikulum_id)->first();
        if (File::exists(public_path($kurikulumData->kurikulum_silabus))) {
            File::delete(public_path($kurikulumData->kurikulum_silabus));
        }
        $delete = Kurikulum::where('kurikulum_id', $kurikulum_id)->delete();
        return redirect()->to('admin-kurikulum')->with('success', 'Data kurikulum berhasil dihapus.');
    }
}
