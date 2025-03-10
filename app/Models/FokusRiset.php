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
}