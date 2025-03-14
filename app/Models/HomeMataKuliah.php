<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class HomeMataKuliah extends Model
{
    use HasFactory;

    protected $table = 'mk';
    protected $primaryKey = 'mk_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;

    protected $fillable = [
        'mk_id',
        'mk_mk_ID',
        'mk_mk_EN',
        'mk_deskripsi_ID',
        'mk_deskripsi_EN',
        'mk_semester',
        'mk_sks',
    ];

    public function getNameAttribute()
    {
        $locale = App::getLocale();
        return $this->{'mk_mk_' . strtoupper($locale)};
    }

    public function getDeskripsiAttribute()
    {
        $locale = App::getLocale();
        return $this->{'mk_deskripsi_' . strtoupper($locale)};
    }
}
