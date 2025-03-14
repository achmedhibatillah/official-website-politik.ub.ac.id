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

    // Mengembalikan menu lengkap (tanpa filter lokal)
    public static function getDetailMenu($menu_id)
    {
        return self::with('kategori')->where('menu_id', $menu_id)->first();
    }

    // Mengembalikan menu yang sudah dilokalkan, termasuk kategori yang juga dilokalkan
    public static function getDetailMenuLocalized($menu_id, $locale = 'id')
    {
        $menu = self::with(['kategori' => function ($query) use ($locale) {
            $query->select([
                'kategori.kategori_id',
                'kategori.kategori_slug',
                'kategori.kategori_icon',
                'kategori.kategori_urutan',
                'kategori.kategori_status',
                'kategori.kategori_show',
                $locale === 'en' ? 'kategori.kategori_judul_EN as kategori_judul' : 'kategori.kategori_judul_ID as kategori_judul',
            ]);
        }])
        ->select([
            'menu.menu_id',
            'menu.menu_slug',
            'menu.menu_gambar',
            'menu.menu_urutan',
            'menu.menu_status',
            'menu.menu_show',
            $locale === 'en' ? 'menu.menu_judul_EN as menu_judul' : 'menu.menu_judul_ID as menu_judul',
            $locale === 'en' ? 'menu.menu_isi_EN as menu_isi' : 'menu.menu_isi_ID as menu_isi',
        ])
        ->where('menu.menu_id', $menu_id)
        ->first();

        return $menu ? self::formatMenu($menu, $locale) : null;
    }

    private static function formatMenu($menu, $locale)
    {
        return (object) [
            'menu_id' => $menu->menu_id,
            'menu_slug' => $menu->menu_slug,
            'menu_gambar' => $menu->menu_gambar,
            'menu_urutan' => $menu->menu_urutan,
            'menu_status' => $menu->menu_status,
            'menu_show' => $menu->menu_show,
            'menu_judul' => $menu->menu_judul,
            'menu_isi' => $menu->menu_isi,
            'kategori' => $menu->kategori, // Sudah difilter sesuai lokal
        ];
    }
}
