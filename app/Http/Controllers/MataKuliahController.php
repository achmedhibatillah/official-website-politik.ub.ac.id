<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\LogicController;
use App\Models\Kurikulum;
use App\Models\MataKuliah;
use App\Models\KurikulumToMataKuliah;

class MataKuliahController extends Controller
{
    public function add(Request $request)
    {   
        $request->validate([
            'mk_id' => 'required|min:3|max:10|unique:mk,mk_id',
            'mk_mk_ID' => 'required|min:5|max:255',
            'mk_mk_EN' => 'required|min:5|max:255',
            'mk_sks' => 'required|integer|between:1,20',
            'mk_semester' => 'required',
            'mk_deskripsi_ID' => 'required|min:20|max:350',
            'mk_deskripsi_EN' => 'required|min:20|max:350',
        ], [
            'mk_id.required' => 'Kode MK harus diisi.',
            'mk_id.min' => 'Minimal 3 karakter.',
            'mk_id.max' => 'Maksimal 10 karakter.',
            'mk_id.unique' => 'Kode MK sudah digunakan.',
            'mk_mk_ID.required' => 'Mata kuliah harus diisi.',
            'mk_mk_ID.min' => 'Minimal 5 karakter.',
            'mk_mk_ID.max' => 'Maksimal 255 karakter.',
            'mk_mk_EN.required' => 'Mata kuliah harus diisi.',
            'mk_mk_EN.min' => 'Minimal 5 karakter.',
            'mk_mk_EN.max' => 'Maksimal 255 karakter.',
            'mk_sks.required' => 'Jumlah SKS harus diisi.',
            'mk_sks.integer' => 'Harus berupa angka.',
            'mk_sks.between' => 'Maksimal jumlah SKS adalah 20.',
            'mk_semester.required' => 'Semester harus diisi.',
            'mk_deskripsi_ID.required' => 'Deskripsi harus diisi.',
            'mk_deskripsi_ID.min' => 'Minimal 20 karakter.',
            'mk_deskripsi_ID.max' => 'Maksimal 350 karakter.',
            'mk_deskripsi_EN.required' => 'Deskripsi harus diisi.',
            'mk_deskripsi_EN.min' => 'Minimal 20 karakter.',
            'mk_deskripsi_EN.max' => 'Maksimal 350 karakter.',
        ]); 

        $data = [
            'mk_id' => $request->mk_id,
            'mk_mk_ID' => $request->mk_mk_ID,
            'mk_mk_EN' => $request->mk_mk_EN,
            'mk_sks' => $request->mk_sks,
            'mk_semester' => $request->mk_semester,
            'mk_deskripsi_ID' => $request->mk_deskripsi_ID,
            'mk_deskripsi_EN' => $request->mk_deskripsi_EN,
        ];
        
        $logic = new LogicController();
        $mk = MataKuliah::create($data);
        $sessionKurikulum = session('session_kurikulum');

        if ($mk) {    
            if (session()->has('session_kurikulum')) {
                foreach ($sessionKurikulum as $kurikulum) {
                    if ($kurikulum['selected']) {
                        KurikulumToMataKuliah::updateOrCreate(
                            [
                                'relation_id' => $logic->generateUniqueId('kurikulum_to_mk', 'relation_id'),
                                'kurikulum_id' => $kurikulum['kurikulum_id'],
                                'mk_id' => $mk['mk_id']
                            ],
                            []
                        );
                    }
                }
            }
    
            return redirect()->to('admin-mata-kuliah')->with('success', 'Mata kuliah baru berhasil ditambah.');
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan.');
        }
    }

    public function update(Request $request)
    {   
        $request->validate([
            'mk_mk_ID' => 'required|min:5|max:255',
            'mk_mk_EN' => 'required|min:5|max:255',
            'mk_sks' => 'required|integer|between:1,20',
            'mk_semester' => 'required',
            'mk_deskripsi_ID' => 'required|min:20|max:350',
            'mk_deskripsi_EN' => 'required|min:20|max:350',
        ], [
            'mk_mk_ID.required' => 'Mata kuliah harus diisi.',
            'mk_mk_ID.min' => 'Minimal 5 karakter.',
            'mk_mk_ID.max' => 'Maksimal 255 karakter.',
            'mk_mk_EN.required' => 'Mata kuliah harus diisi.',
            'mk_mk_EN.min' => 'Minimal 5 karakter.',
            'mk_mk_EN.max' => 'Maksimal 255 karakter.',
            'mk_sks.required' => 'Jumlah SKS harus diisi.',
            'mk_sks.integer' => 'Harus berupa angka.',
            'mk_sks.between' => 'Maksimal jumlah SKS adalah 20.',
            'mk_semester.required' => 'Semester harus diisi.',
            'mk_deskripsi_ID.required' => 'Deskripsi harus diisi.',
            'mk_deskripsi_ID.min' => 'Minimal 20 karakter.',
            'mk_deskripsi_ID.max' => 'Maksimal 350 karakter.',
            'mk_deskripsi_EN.required' => 'Deskripsi harus diisi.',
            'mk_deskripsi_EN.min' => 'Minimal 20 karakter.',
            'mk_deskripsi_EN.max' => 'Maksimal 350 karakter.',
        ]); 

        $data = [
            'mk_mk_ID' => $request->mk_mk_ID,
            'mk_mk_EN' => $request->mk_mk_EN,
            'mk_sks' => $request->mk_sks,
            'mk_semester' => $request->mk_semester,
            'mk_deskripsi_ID' => $request->mk_deskripsi_ID,
            'mk_deskripsi_EN' => $request->mk_deskripsi_EN,
        ];
        
        $logic = new LogicController();
        $mk_id = $request->mk_id;
        $mk = MataKuliah::where('mk_id', $mk_id)->update($data);
        $sessionKurikulum = session('session_kurikulum');

        if ($mk) {    
            if (session()->has('session_kurikulum')) {
                KurikulumToMataKuliah::where('mk_id', $mk_id)->delete();
                foreach ($sessionKurikulum as $kurikulum) {
                    if ($kurikulum['selected']) {
                        KurikulumToMataKuliah::updateOrCreate(
                            [
                                'relation_id' => $logic->generateUniqueId('kurikulum_to_mk', 'relation_id'),
                                'kurikulum_id' => $kurikulum['kurikulum_id'],
                                'mk_id' => $mk_id
                            ],
                            []
                        );
                    }
                }
            }
    
            return redirect()->to('admin-mata-kuliah/' . $mk_id)->with('success', 'Mata kuliah berhasil diedit.');
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan.');
        }
    }

    public function session_kurikulum(Request $request)
    {
        $selectedKurikulum = $request->input('kurikulum', []);

        $kurikulum = Kurikulum::get()->map(function ($item) use ($selectedKurikulum) {
            return [
                'kurikulum_id' => $item->kurikulum_id,
                'kurikulum_judul_ID' => $item->kurikulum_judul_ID,
                'kurikulum_judul_EN' => $item->kurikulum_judul_EN,
                'kurikulum_mulai' => $item->kurikulum_mulai,
                'kurikulum_silabus' => $item->kurikulum_silabus,
                'kurikulum_deskripsi_ID' => $item->kurikulum_deskripsi_ID,
                'kurikulum_deskripsi_EN' => $item->kurikulum_deskripsi_EN,
                'kurikulum_status' => $item->kurikulum_status,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
                'selected' => in_array($item->kurikulum_id, $selectedKurikulum),
            ];
        })->toArray();

        session(['session_kurikulum' => $kurikulum]);

        $html = view('admin/matkul-tambah-kurikulum', compact('kurikulum'))->render();

        return response()->json([
            'success' => true,
            'html' => $html
        ]);
    }
   
    public function delete($mk_id)
    {
        $delete = MataKuliah::where('mk_id', $mk_id)->delete();
        return redirect()->to('admin-mata-kuliah')->with('success', 'Data mata kuliah berhasil dihapus.');
    }
}
