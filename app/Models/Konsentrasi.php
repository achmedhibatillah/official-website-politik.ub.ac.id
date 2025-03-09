<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsentrasi extends Model
{
    use HasFactory;

    protected $table = 'konsentrasi';
    protected $primaryKey = 'konsentrasi_id';
    public $incrementing = false;
    protected $keyType = 'integer';
    public $timestamps = true;

    protected $fillable = [
        'konsentrasi_id',
        'konsentrasi_konsentrasi',
    ];
}