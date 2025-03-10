<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';
    protected $primaryKey = 'dosen_id';
    public $incrementing = false;
    protected $keyType = 'integer';
    public $timestamps = true;

    protected $fillable = [
        'dosen_id',
        'dosen_nama',
        'dosen_nomor',
        'dosen_slug',
        'dosen_email',
        'dosen_foto',
        'dosen_deskripsi_ID',
        'dosen_deskripsi_EN',
        'dosen_konsentrasi_ID',
        'dosen_konsentrasi_EN',
        'dosen_keahlian_ID',
        'dosen_keahlian_EN',
        'dosen_scholar',
        'dosen_orcid',
        'dosen_scopus',
        'dosen_sinta',
        'dosen_s1',
        'dosen_s2',
        'dosen_s3',
    ];

    public function fr()
    {
        return $this->belongsToMany(FokusRiset::class, 'dosen_to_fr', 'dosen_id', 'fr_id');
    }    

    public function mk()
    {
        return $this->belongsToMany(MataKuliah::class, 'dosen_to_mk', 'dosen_id', 'mk_id');
    }    

    public static function getDetailDosen($dosen_id)
    {
        return self::with(['fr', 'mk'])->where('dosen_id', $dosen_id)->first();
    }
    
    public static function getDetailSelectedDosen($dosen_id)
    {
        $dosen = self::with(['fr', 'mk'])->where('dosen_id', $dosen_id)->first();
    
        if (!$dosen) {
            return null;
        }
    
        $allFr = FokusRiset::orderBy('fr_fr_ID', 'asc')->get()->map(function ($fr) use ($dosen) {
            $fr->fr_selected = $dosen->fr->contains('fr_id', $fr->fr_id);
            return $fr;
        });
    
        $allMk = MataKuliah::orderBy('mk_mk_ID', 'asc')->get()->map(function ($mk) use ($dosen) {
            $mk->mk_selected = $dosen->mk->contains('mk_id', $mk->mk_id);
            return $mk;
        });
    
        $dosen->fr_list = $allFr;
        $dosen->mk_list = $allMk;
    
        return $dosen;
    }
      
}
