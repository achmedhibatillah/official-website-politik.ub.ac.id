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
        'dosen_slug',
        'dosen_email',
        'dosen_foto', 
        'dosen_deskripsi',
        'konsentrasi_id',
        'dosen_keahlian',

        'fr_id_1',
        'fr_id_2',

        'dosen_mk_ganjil',
        'dosen_mk_genap',

        'dosen_scholar',
        'dosen_orcid',
        'dosen_scopus',
        'dosen_sinta',
        
        'dosen_s1',
        'dosen_s2',
        'dosen_s3'
    ];

    // Method untuk mengambil semua data dosen
    public static function getAllDosen()
    {
        return self::all();
    }

    // Method untuk mengambil data dosen berdasarkan ID
    public static function getDosen($id)
    {
        return self::find($id);
    }
}
