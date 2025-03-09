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

    // Relasi Many-to-Many ke Kurikulum
    public function kurikulum()
    {
        return $this->belongsToMany(Kurikulum::class, 'kurikulum_to_mk', 'mk_id', 'kurikulum_id');
    }

    // Relasi Many-to-Many ke Dosen
    public function dosen()
    {
        return $this->belongsToMany(Dosen::class, 'dosen_to_mk', 'mk_id', 'dosen_id');
    }

    // Function untuk mengambil detail MK + relasi
    public static function getDetailMk($mk_id)
    {
        return self::with(['kurikulum', 'dosen'])->where('mk_id', $mk_id)->first();
    }
}
