<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'mk';
    protected $primaryKey = 'mk_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'mk_id',
        'mk_mk_ID',
        'mk_mk_EN',
        'mk_deskripsi_ID',
        'mk_deskripsi_EN',
        'mk_semester',
        'mk_sks',
    ];
    public $timestamps = true; 

    public function kurikulum()
    {
        return $this->belongsToMany(Kurikulum::class, 'kurikulum_to_mk', 'mk_id', 'kurikulum_id');
    }

    public function dosen()
    {
        return $this->belongsToMany(Dosen::class, 'dosen_to_mk', 'mk_id', 'dosen_id');
    }

    public static function getDetailMk($mk_id)
    {
        return self::with(['kurikulum', 'dosen'])->where('mk_id', $mk_id)->first();
    }

    public static function getDetailSelectedMk($mk_id)
    {
        $mataKuliah = self::with(['kurikulum', 'dosen'])->where('mk_id', $mk_id)->first();

        if (!$mataKuliah) {
            return null;
        }

        $allKurikulum = Kurikulum::all()->map(function ($kurikulum) use ($mataKuliah) {
            $kurikulum->kurikulum_selected = $mataKuliah->kurikulum->contains('kurikulum_id', $kurikulum->kurikulum_id);
            return $kurikulum;
        });

        $allDosen = Dosen::all()->map(function ($dosen) use ($mataKuliah) {
            $dosen->dosen_selected = $mataKuliah->dosen->contains('dosen_id', $dosen->dosen_id);
            return $dosen;
        });

        $mataKuliah->kurikulum = $allKurikulum;
        $mataKuliah->dosen = $allDosen;

        return $mataKuliah;
    }

    public static function getAllMataKuliahLocalized($lang)
    {
        $name_field = 'mk_mk_' . strtoupper($lang);
        $desc_field = 'mk_deskripsi_' . strtoupper($lang);

        return self::select([
            'mk_id',
            $name_field . ' as mk_name',
            $desc_field . ' as mk_deskripsi',
            'mk_semester',
            'mk_sks',
        ])->get();
    }

    /**
     * Mengembalikan detail mata kuliah berdasarkan ID dalam bahasa yang dipilih.
     */
    public static function getDetailMataKuliahLocalized($lang, $mk_id)
    {
        $name_field = 'mk_mk_' . strtoupper($lang);
        $desc_field = 'mk_deskripsi_' . strtoupper($lang);

        return self::select([
            'mk_id',
            $name_field . ' as mk_name',
            $desc_field . ' as mk_deskripsi',
            'mk_semester',
            'mk_sks',
        ])->where('mk_id', $mk_id)->first();
    }
}
