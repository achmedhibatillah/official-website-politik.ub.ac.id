<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FokusRiset extends Model
{
    use HasFactory;

    protected $table = 'fr';
    protected $primaryKey = 'fr_id';
    public $incrementing = false;
    protected $keyType = 'integer';
    public $timestamps = true;

    protected $fillable = [
        'fr_id',
        'fr_fr_ID',
        'fr_fr_EN',
        'fr_deskripsi_ID',
        'fr_deskripsi_EN',
    ];

        /**
     * Mengembalikan daftar semua fokus riset dengan data yang sudah difilter berdasarkan bahasa
     */
    public static function getAllFokusRisetLocalized($lang)
    {
        $name_field = 'fr_fr_' . strtoupper($lang);
        $desc_field = 'fr_deskripsi_' . strtoupper($lang);

        return self::select([
            'fr_id',
            $name_field . ' as fr_name',
            $desc_field . ' as fr_deskripsi'
        ])->get();
    }

    /**
     * Mengembalikan detail fokus riset berdasarkan ID dengan data yang sudah difilter berdasarkan bahasa
     */
    public static function getDetailFokusRisetLocalized($lang, $fr_id)
    {
        $name_field = 'fr_fr_' . strtoupper($lang);
        $desc_field = 'fr_deskripsi_' . strtoupper($lang);

        return self::select([
            'fr_id',
            $name_field . ' as fr_name',
            $desc_field . ' as fr_deskripsi'
        ])->where('fr_id', $fr_id)->first();
    }
}