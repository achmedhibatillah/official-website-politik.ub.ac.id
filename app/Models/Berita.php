<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    /**
     * Ambil semua berita dengan format sesuai lokal
     */
    public static function getBerita($perPage = 0, $locale = 'id')
    {
        $query = self::orderBy('created_at', 'desc')->where('berita_status', 1);
    
        if ($perPage == 0) {
            // Tanpa pagination (pakai get dan map)
            return $query->get()->map(fn($item) => self::formatBerita($item, $locale));
        } else {
            // Dengan pagination (pakai paginate dan through)
            return $query->paginate($perPage)->through(fn($item) => self::formatBerita($item, $locale));
        }
    }    

    /**
     * Ambil detail berita berdasarkan ID dengan format sesuai lokal
     */
    public static function getDetailBerita($berita_slug, $locale = 'id')
    {
        $berita = self::where('berita_slug', $berita_slug)->first();
        return $berita ? self::formatBerita($berita, $locale) : null;
    }

    /**
     * Format berita sesuai lokal dan kembalikan sebagai object
     */
    public static function formatBerita($item, $locale = 'id')
    {
        return (object) [
            'berita_id'      => $item->berita_id,
            'berita_slug'    => $item->berita_slug,
            'berita_gambar'  => $item->berita_gambar,
            'berita_status'  => $item->berita_status,
            'berita_views'   => $item->berita_views,
            'berita_judul'   => $locale === 'en' ? $item->berita_judul_EN : $item->berita_judul_ID,
            'berita_isi'     => $locale === 'en' ? $item->berita_isi_EN : $item->berita_isi_ID,
            'created_at_tgl' => self::formatTanggal($item->created_at, $locale),
            'created_at_jam' => $item->created_at ? $item->created_at->format('H:i') : null,
            'updated_at_tgl' => self::formatTanggal($item->updated_at, $locale),
            'updated_at_jam' => $item->updated_at ? $item->updated_at->format('H:i') : null,
        ];
    }

    /**
     * Format tanggal sesuai lokal
     */
    private static function formatTanggal($date, $locale)
    {
        if (!$date) return null;

        $bulanID = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        $bulanEN = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];

        $bulan = $locale === 'en' ? $bulanEN : $bulanID;
        $bulanIndex = $date->format('n') - 1;

        return $date->format('d') . ' ' . $bulan[$bulanIndex] . ' ' . $date->format('Y');
    }
}
