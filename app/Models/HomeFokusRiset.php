<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class HomeFokusRiset extends Model
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

    public function getNameAttribute()
    {
        $locale = App::getLocale();
        return $this->{'fr_fr_' . strtoupper($locale)};
    }

    public function getDeskripsiAttribute()
    {
        $locale = App::getLocale();
        return $this->{'fr_deskripsi_' . strtoupper($locale)};
    }
}
