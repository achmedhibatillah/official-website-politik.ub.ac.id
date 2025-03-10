<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';
    protected $primaryKey = 'berita_id';
    public $incrementing = false;
    protected $keyType = 'integer';
    public $timestamps = true;

    protected $fillable = [
        'berita_id',
        'berita_judul_ID',
        'berita_judul_EN',
        'berita_slug',
        'berita_gambar',
        'berita_isi_ID',
        'berita_isi_EN',
        'berita_status',
        'berita_views',
    ];
}
