<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

use App\Http\Controllers\LogicController;
use App\Models\Dosen;
use App\Models\DosenToFr;
use App\Models\DosenToMataKuliah;
use App\Models\FokusRiset;

class DosenController extends Controller
{
    public function add(Request $request)
    {
        if ($request->hasFile('dosen_foto')) {
            if (public_path('assets/uploads/sdm/dosen/temporary.png')) {
                $oldFile = public_path('assets/uploads/sdm/dosen/temporary.png');
                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
            } 
            if (public_path('assets/uploads/sdm/dosen/temporary.jpg')) {
                $oldFile = public_path('assets/uploads/sdm/dosen/temporary.jpg');
                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
            } 
            if (public_path('assets/uploads/sdm/dosen/temporary.jpeg')) {
                $oldFile = public_path('assets/uploads/sdm/dosen/temporary.jpeg');
                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
            }

            $extension = $request->file('dosen_foto')->getClientOriginalExtension();
            $filename = 'temporary.' . $extension;
            $request->file('dosen_foto')->move(public_path('assets/uploads/sdm/dosen'), $filename);
            $originalname = $request->file('dosen_foto')->getClientOriginalName();
            session()->flash('dosen_foto_original', $originalname);
        } elseif ($request->dosen_session) {
            session()->flash('dosen_foto_original', $request->dosen_session);
        }

        $request->validate([
            'dosen_nama' => 'required|min:3|max:255',
            'dosen_email' => 'required|min:3|max:255',
            'dosen_nomor' => 'required|numeric|digits_between:12,16',
            'dosen_deskripsi_ID' => 'required|min:30|max:1200',
            'dosen_deskripsi_EN' => 'required|min:30|max:1200',
        ], [
            'dosen_nama.required' => 'Nama lengkap harus diisi.',
            'dosen_nama.min' => 'Minimal 3 karakter.',
            'dosen_nama.max' => 'Maksimal 255 karakter.',

            'dosen_nomor.required' => 'NIP harus diisi.',
            'dosen_nomor.numeric' => 'NIP harus berupa angka.',
            'dosen_nomor.digits_between' => 'Masukkan 12-16 digit.',

            'dosen_email.required' => 'Alamat email harus diisi.',
            'dosen_email.min' => 'Minimal 3 karakter.',
            'dosen_email.max' => 'Maksimal 255 karakter.',

            'dosen_deskripsi_ID.required' => 'Deskripi harus diisi.',
            'dosen_deskripsi_ID.min' => 'Minimal 30 karakter.',
            'dosen_deskripsi_ID.max' => 'Maksimal 1200 karakter.',
            'dosen_deskripsi_EN.required' => 'Deskripi harus diisi.',
            'dosen_deskripsi_EN.min' => 'Minimal 30 karakter.',
            'dosen_deskripsi_EN.max' => 'Maksimal 1200 karakter.',
        ]);

        if (File::exists(public_path('assets/uploads/sdm/dosen/temporary.png'))) {
            $tempFile = public_path('assets/uploads/sdm/dosen/temporary.png');
            $extension = '.png';
        } elseif (File::exists(public_path('assets/uploads/sdm/dosen/temporary.jpg'))) {
            $tempFile = public_path('assets/uploads/sdm/dosen/temporary.jpg');
            $extension = '.jpg';
        } elseif (File::exists(public_path('assets/uploads/sdm/dosen/temporary.jpeg'))) {
            $tempFile = public_path('assets/uploads/sdm/dosen/temporary.jpeg');
            $extension = '.jpeg';
        } else {
            $tempFile = '';
        }

        $path = '';
        if (File::exists($tempFile)) {
            $slugName = Str::slug($request->dosen_nama, '-') . $extension;
            $path = 'assets/uploads/sdm/dosen/' . $slugName;
            $newPath = public_path('assets/uploads/sdm/dosen/' . $slugName);        
            File::move($tempFile, $newPath);
        }
        
        session()->forget(['dosen_foto_temp', 'dosen_foto_original']);
        
        $logic = new LogicController();
        $data = [
            'dosen_id' => $logic->generateUniqueId('dosen', 'dosen_id'),
            'dosen_nama' => $request->dosen_nama,
            'dosen_nomor' => $request->dosen_nomor,
            'dosen_slug' => Str::slug($request->dosen_nama),
            'dosen_email' => $request->dosen_email,
            'dosen_deskripsi_ID' => $request->dosen_deskripsi_ID,
            'dosen_deskripsi_EN' => $request->dosen_deskripsi_EN ,
            'dosen_foto' => $path,
            'dosen_konsentrasi_ID' => '',
            'dosen_konsentrasi_EN' => '',
            'dosen_keahlian_ID' => '',
            'dosen_keahlian_EN' => '',
        ];

        Dosen::create($data);

        return redirect()->to('admin-tambah-dosen/step-2/' . $data['dosen_id'])->with('success', 'Data dosen berhasil ditambah.');
    }

    public function add_step2(Request $request)
    {
        $request->validate([
            'dosen_konsentrasi_ID' => 'required|min:3|max:255',
            'dosen_konsentrasi_EN' => 'required|min:3|max:255',
            'dosen_keahlian_ID' => 'required|min:3|max:255',
            'dosen_keahlian_EN' => 'required|min:3|max:255',
            'dosen_scholar' => 'nullable|url|max:255',
            'dosen_orcid' => 'nullable|url|max:255',
            'dosen_scopus' => 'nullable|url|max:255',
            'dosen_sinta' => 'nullable|url|max:255',
            'dosen_s1' => 'max:255',
            'dosen_s2' => 'max:255',
            'dosen_s3' => 'max:255',
        ], [
            'dosen_konsentrasi_ID.required' => 'Konsentrasi harus diisi.',
            'dosen_konsentrasi_ID.min' => 'Minimal 3 karakter.',
            'dosen_konsentrasi_ID.max' => 'Maksimal 255 karakter.',
            'dosen_konsentrasi_EN.required' => 'Konsentrasi harus diisi.',
            'dosen_konsentrasi_EN.min' => 'Minimal 3 karakter.',
            'dosen_konsentrasi_EN.max' => 'Maksimal 255 karakter.',
            'dosen_keahlian_ID.required' => 'Keahlian harus diisi.',
            'dosen_keahlian_ID.min' => 'Minimal 3 karakter.',
            'dosen_keahlian_ID.max' => 'Maksimal 255 karakter.',
            'dosen_keahlian_EN.required' => 'Keahlian harus diisi.',
            'dosen_keahlian_EN.min' => 'Minimal 3 karakter.',
            'dosen_keahlian_EN.max' => 'Maksimal 255 karakter.',
            'dosen_scholar.url' => 'Masukkan url yang valid.',
            'dosen_scholar.max' => 'Maksimal 255 karakter.',
            'dosen_orcid.url' => 'Masukkan url yang valid.',
            'dosen_orcid.max' => 'Maksimal 255 karakter.',
            'dosen_scopus.url' => 'Masukkan url yang valid.',
            'dosen_scopus.max' => 'Maksimal 255 karakter.',
            'dosen_sinta.url' => 'Masukkan url yang valid.',
            'dosen_sinta.max' => 'Maksimal 255 karakter.',
            'dosen_s1.max' => 'Maksimal 255 karakter.',
            'dosen_s2.max' => 'Maksimal 255 karakter.',
            'dosen_s3.max' => 'Maksimal 255 karakter.',
        ]);

        $data = [
            'dosen_konsentrasi_ID' => $request->dosen_konsentrasi_ID,
            'dosen_konsentrasi_EN' => $request->dosen_konsentrasi_EN,
            'dosen_keahlian_ID' => $request->dosen_keahlian_ID,
            'dosen_keahlian_EN' => $request->dosen_keahlian_EN,
            'dosen_scholar' => $request->dosen_scholar,
            'dosen_orcid' => $request->dosen_orcid,
            'dosen_scopus' => $request->dosen_scopus,
            'dosen_sinta' => $request->dosen_sinta,    
            'dosen_s1' => $request->dosen_s1,
            'dosen_s2' => $request->dosen_s2,
            'dosen_s3' => $request->dosen_s3,    
        ];

        $dosen_id = $request->dosen_id;

        Dosen::where('dosen_id', $dosen_id)->update($data);

        if ($request->redirect_page == 'edit') {
            return redirect()->to('admin-dosen/' . $dosen_id)->with('success', 'Data profil akademik dosen berhasil diperbarui.');
        }

        return redirect()->to('admin-tambah-dosen/step-3/' . $dosen_id);
    }

    public function add_step3(Request $request)
    {
        $logic = new LogicController();
    
        $frIds = $request->input('fr_id', []);
    
        DosenToFr::where('dosen_id', $request->dosen_id)->delete();
        if (is_array($frIds)) {
            foreach ($frIds as $frId) {
                DosenToFr::create([
                    'relation_id' => $logic->generateUniqueId('dosen_to_fr', 'relation_id'),
                    'fr_id' => $frId,
                    'dosen_id' => $request->dosen_id,
                ]);
            }
        }
    
        if ($request->redirect_page == 'edit') {
            return redirect()->to('admin-dosen/' . $request->dosen_id)->with('success', 'Fokus riset berhasil diperbarui.');
        }

        return redirect()->to('admin-dosen')->with('success', 'Data dosen berhasil ditambah.');
    }

    public function mk_update(Request $request)
    {
        $logic = new LogicController();
    
        $mkIds = $request->input('mk_id', []);
    
        DosenToMataKuliah::where('dosen_id', $request->dosen_id)->delete();
        if (is_array($mkIds)) {
            foreach ($mkIds as $mkId) {
                DosenToMataKuliah::create([
                    'relation_id' => $logic->generateUniqueId('dosen_to_mk', 'relation_id'),
                    'mk_id' => $mkId,
                    'dosen_id' => $request->dosen_id,
                ]);
            }
        }

        return redirect()->to('admin-dosen/' . $request->dosen_id)->with('success', 'Mata kuliah dosen berhasil diperbarui.');
    }

    public function update(Request $request)
    {
        if ($request->hasFile('dosen_foto')) {
            if (public_path('assets/uploads/sdm/dosen/temporary.png')) {
                $oldFile = public_path('assets/uploads/sdm/dosen/temporary.png');
                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
            } 
            if (public_path('assets/uploads/sdm/dosen/temporary.jpg')) {
                $oldFile = public_path('assets/uploads/sdm/dosen/temporary.jpg');
                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
            } 
            if (public_path('assets/uploads/sdm/dosen/temporary.jpeg')) {
                $oldFile = public_path('assets/uploads/sdm/dosen/temporary.jpeg');
                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
            }

            $extension = $request->file('dosen_foto')->getClientOriginalExtension();
            $filename = 'temporary.' . $extension;
            $request->file('dosen_foto')->move(public_path('assets/uploads/sdm/dosen'), $filename);
            $originalname = $request->file('dosen_foto')->getClientOriginalName();
            session()->flash('dosen_foto_original', $originalname);
        } elseif ($request->dosen_session) {
            session()->flash('dosen_foto_original', $request->dosen_session);
        }

        $request->validate([
            'dosen_nama' => 'required|min:3|max:255',
            'dosen_email' => 'required|min:3|max:255',
            'dosen_nomor' => 'required|numeric|digits_between:12,16',
            'dosen_deskripsi_ID' => 'required|min:30|max:1200',
            'dosen_deskripsi_EN' => 'required|min:30|max:1200',
        ], [
            'dosen_nama.required' => 'Nama lengkap harus diisi.',
            'dosen_nama.min' => 'Minimal 3 karakter.',
            'dosen_nama.max' => 'Maksimal 255 karakter.',

            'dosen_nomor.required' => 'NIP harus diisi.',
            'dosen_nomor.numeric' => 'NIP harus berupa angka.',
            'dosen_nomor.digits_between' => 'Masukkan 12-16 digit.',

            'dosen_email.required' => 'Alamat email harus diisi.',
            'dosen_email.min' => 'Minimal 3 karakter.',
            'dosen_email.max' => 'Maksimal 255 karakter.',

            'dosen_deskripsi_ID.required' => 'Deskripi harus diisi.',
            'dosen_deskripsi_ID.min' => 'Minimal 30 karakter.',
            'dosen_deskripsi_ID.max' => 'Maksimal 1200 karakter.',
            'dosen_deskripsi_EN.required' => 'Deskripi harus diisi.',
            'dosen_deskripsi_EN.min' => 'Minimal 30 karakter.',
            'dosen_deskripsi_EN.max' => 'Maksimal 1200 karakter.',
        ]);

        if (File::exists(public_path('assets/uploads/sdm/dosen/temporary.png'))) {
            $tempFile = public_path('assets/uploads/sdm/dosen/temporary.png');
            $extension = '.png';
        } elseif (File::exists(public_path('assets/uploads/sdm/dosen/temporary.jpg'))) {
            $tempFile = public_path('assets/uploads/sdm/dosen/temporary.jpg');
            $extension = '.jpg';
        } elseif (File::exists(public_path('assets/uploads/sdm/dosen/temporary.jpeg'))) {
            $tempFile = public_path('assets/uploads/sdm/dosen/temporary.jpeg');
            $extension = '.jpeg';
        } else {
            $extension = '';
            $tempFile = '';
        }

        $dosenData = Dosen::where('dosen_id', $request->dosen_id)->first();

        $path = '';

        if (File::exists(public_path($dosenData->dosen_foto))) {
            $path = $dosenData->dosen_foto;        
        }

        if (File::exists(public_path($dosenData->dosen_foto)) && File::exists($tempFile)) {
            File::delete(public_path($dosenData->dosen_foto));
        }

        if (File::exists($tempFile)) {
            $slugName = Str::slug($request->dosen_nama, '-') . $extension;
            $path = 'assets/uploads/sdm/dosen/' . $slugName;
            $savePath = public_path('assets/uploads/sdm/dosen/' . $slugName);        
            File::move($tempFile, $savePath);
        }
        
        session()->forget(['dosen_foto_temp', 'dosen_foto_original']);
        
        $logic = new LogicController();
        $data = [
            'dosen_nama' => $request->dosen_nama,
            'dosen_nomor' => $request->dosen_nomor,
            'dosen_slug' => Str::slug($request->dosen_nama),
            'dosen_email' => $request->dosen_email,
            'dosen_deskripsi_ID' => $request->dosen_deskripsi_ID,
            'dosen_deskripsi_EN' => $request->dosen_deskripsi_EN ,
            'dosen_foto' => $path,
        ];

        Dosen::where('dosen_id', $request->dosen_id)->update($data);

        return redirect()->to('admin-dosen/' . $request->dosen_id)->with('success', 'Data dosen berhasil diperbarui.');
    }

    public function fr_add(Request $request)
    {
        $request->validate([
            'fr_fr_ID' => 'required|min:3|max:255',
            'fr_fr_EN' => 'required|min:3|max:255',
            'fr_deskripsi_ID' => 'required',
            'fr_deskripsi_EN' => 'required',
        ], [
            'fr_fr_ID.required' => 'Fokus riset harus diisi.',
            'fr_fr_ID.min' => 'Minimal 3 karakter.',
            'fr_fr_ID.max' => 'Maksimal 255 karakter.',
            'fr_fr_EN.required' => 'Fokus riset harus diisi.',
            'fr_fr_EN.min' => 'Minimal 3 karakter.',
            'fr_fr_EN.max' => 'Maksimal 255 karakter.',
            'fr_deskripsi_ID.required' => 'Deskripsi harus diisi.',
            'fr_deskripsi_EN.required' => 'Deskripsi harus diisi.',
        ]); 

        $logic = new LogicController();
        $data = [
            'fr_id' => $logic->generateUniqueId('fr', 'fr_id'),
            'fr_fr_ID' => $request->fr_fr_ID,
            'fr_fr_EN' => $request->fr_fr_EN,
            'fr_deskripsi_ID' => $request->fr_deskripsi_ID,
            'fr_deskripsi_EN' => $request->fr_deskripsi_EN,
        ];

        FokusRiset::create($data);
        return redirect()->back()->with('success', 'Fokus riset baru berhasil ditambah.');
    }

    public function fr_delete($fr_id)
    {
        FokusRiset::where('fr_id', $fr_id)->delete();
        return redirect()->back()->with('success', 'Fokus riset berhasil dihapus.');
    }

    public function delete($dosen_id)
    {
        $dosenData = Dosen::where('dosen_id', $dosen_id)->first();
        if (File::exists(public_path($dosenData->dosen_foto))) {
            File::delete(public_path($dosenData->dosen_foto));
        }

        Dosen::where('dosen_id', $dosen_id)->delete();
        return redirect()->to('admin-dosen')->with('success', 'Data dosen berhasil dihapus.');
    }
}
