<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeDosen extends Model
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
}
