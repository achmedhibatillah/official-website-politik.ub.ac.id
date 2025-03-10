<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DosenToFr extends Model
{
    protected $table = 'dosen_to_fr';
    protected $primaryKey = 'relation_id';
    public $incrementing = false;
    protected $keyType = 'integer';
    public $timestamps = true;
    protected $fillable = [
        'relation_id',
        'dosen_id',
        'fr_id',
    ];
}
