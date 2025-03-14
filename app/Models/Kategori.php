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

    // Relasi menu untuk mengembalikan semua atribut (untuk getDetailKategori)
    public function menu()
    {
        return $this->belongsToMany(Menu::class, 'kategori_to_menu', 'kategori_id', 'menu_id')
                    ->orderBy('menu.menu_urutan', 'asc');
    }

    // Mengembalikan semua menu tanpa filter lokal
    public static function getDetailKategori($kategori_id)
    {
        return self::with(['menu' => function ($query) {
            $query->orderBy('menu_urutan', 'asc');
        }])->where('kategori_id', $kategori_id)->first();
    }

    // Mengembalikan kategori dengan menu yang sudah difilter berdasarkan lokal
    public static function getKategoriLocal($perPage = 0, $locale = 'id')
    {
        $query = self::with(['menu' => function ($query) use ($locale) {
            $query->select([
                'menu.menu_id',
                'menu.menu_slug',
                'menu.menu_status',
                'menu.menu_show',
                $locale === 'en' ? 'menu.menu_judul_EN as menu_judul' : 'menu.menu_judul_ID as menu_judul',
            ])
            ->orderBy('menu.menu_urutan', 'asc');
        }])
        ->where('kategori.kategori_show', 1)
        ->orderBy('kategori.kategori_urutan', 'asc');

        if ($perPage == 0) {
            return $query->get()->map(fn($item) => self::formatKategori($item, $locale));
        } else {
            return $query->paginate($perPage)->through(fn($item) => self::formatKategori($item, $locale));
        }
    }
    
    // Mengembalikan detail kategori dengan menu yang sudah difilter berdasarkan lokal
    public static function getKategoriLocalDetail($kategori_slug, $locale = 'id')
    {
        $kategori = self::with(['menu' => function ($query) use ($locale) {
            $query->select([
                'menu.menu_id',
                'menu.menu_slug',
                'menu.menu_status',
                'menu.menu_show',
                $locale === 'en' ? 'menu.menu_judul_EN as menu_judul' : 'menu.menu_judul_ID as menu_judul',
            ])
            ->orderBy('menu.menu_urutan', 'asc');
        }])
        ->where('kategori.kategori_slug', $kategori_slug)
        ->first();
        
        return $kategori ? self::formatKategori($kategori, $locale) : null;
    }
    
    private static function formatKategori($item, $locale)
    {
        return (object) [
            'kategori_id' => $item->kategori_id,
            'kategori_slug' => $item->kategori_slug,
            'kategori_icon' => $item->kategori_icon,
            'kategori_urutan' => $item->kategori_urutan,
            'kategori_status' => $item->kategori_status,
            'kategori_judul' => $locale === 'en' ? $item->kategori_judul_EN : $item->kategori_judul_ID,
            'kategori_show' => $item->kategori_show,
            'menu' => $item->menu,
        ];
    }
}
