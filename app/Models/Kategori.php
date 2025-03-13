<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $primaryKey = 'kategori_id';
    public $incrementing = false;
    protected $keyType = 'integer';
    public $timestamps = true;

    protected $fillable = [
        'kategori_id',
        'kategori_judul_ID',
        'kategori_judul_EN',
        'kategori_icon',
        'kategori_urutan', 
        'kategori_status',
        'kategori_slug',
        'kategori_show',
    ];
    
    public function menu()
    {
        return $this->belongsToMany(Menu::class, 'kategori_to_menu', 'kategori_id', 'menu_id')
                    ->orderBy('menu_urutan', 'asc'); // orderBy dipanggil di sini
    }

    public static function getDetailKategori($kategori_id)
    {
        return self::with(['menu' => function ($query) {
            $query->orderBy('menu_urutan', 'asc'); // Terapkan orderBy dalam with()
        }])->where('kategori_id', $kategori_id)->first();
    }
}
