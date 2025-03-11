<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pengumuman extends Model
{
    use HasFactory;

    protected $table = 'pengumuman';
    protected $primaryKey = 'pengumuman_id';
    public $incrementing = false;
    protected $keyType = 'integer';
    public $timestamps = true;

    protected $fillable = [
        'pengumuman_id',
        'pengumuman_judul_ID',
        'pengumuman_judul_EN',
        'pengumuman_slug',
        'pengumuman_isi_ID',
        'pengumuman_isi_EN',
        'pengumuman_status',
        'pengumuman_views',
    ];

    /**
     * Ambil semua pengumuman dengan format sesuai lokal
     */
    public static function getPengumuman($perPage = 0, $locale = 'id')
    {
        $query = self::orderBy('created_at', 'desc')->where('pengumuman_status', 1);
    
        if ($perPage == 0) {
            // Tanpa pagination (pakai get dan map)
            return $query->get()->map(fn($item) => self::formatPengumuman($item, $locale));
        } else {
            // Dengan pagination (pakai paginate dan through)
            return $query->paginate($perPage)->through(fn($item) => self::formatPengumuman($item, $locale));
        }
    }    

    /**
     * Ambil detail pengumuman berdasarkan ID dengan format sesuai lokal
     */
    public static function getDetailPengumuman($pengumuman_slug, $locale = 'id')
    {
        $pengumuman = self::where('pengumuman_slug', $pengumuman_slug)->first();
        return $pengumuman ? self::formatPengumuman($pengumuman, $locale) : null;
    }

    /**
     * Format pengumuman sesuai lokal dan kembalikan sebagai object
     */
    public static function formatPengumuman($item, $locale = 'id')
    {
        return (object) [
            'pengumuman_id'      => $item->pengumuman_id,
            'pengumuman_slug'    => $item->pengumuman_slug,
            'pengumuman_status'  => $item->pengumuman_status,
            'pengumuman_views'   => $item->pengumuman_views,
            'pengumuman_judul'   => $locale === 'en' ? $item->pengumuman_judul_EN : $item->pengumuman_judul_ID,
            'pengumuman_isi'     => $locale === 'en' ? $item->pengumuman_isi_EN : $item->pengumuman_isi_ID,
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
