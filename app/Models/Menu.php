<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu';
    protected $primaryKey = 'menu_id';
    public $incrementing = false;
    protected $keyType = 'integer';
    public $timestamps = true;

    protected $fillable = [
        'menu_id',
        'menu_judul_ID',
        'menu_judul_EN',
        'menu_slug',
        'menu_gambar',
        'menu_isi_ID',
        'menu_isi_EN',
        'menu_urutan',
        'menu_status',
        'menu_as',
        'menu_show',
    ];

    public function kategori()
    {
        return $this->belongsToMany(Kategori::class, 'kategori_to_menu', 'menu_id', 'kategori_id');
    }

    public static function getDetailMenu($menu_id)
    {
        return self::with('kategori')->where('menu_id', $menu_id)->first();
    }
}