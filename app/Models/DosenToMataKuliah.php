<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenToMataKuliah extends Model
{
    use HasFactory;

    protected $table = 'dosen_to_mk';
    protected $primaryKey = 'relation_id';
    public $incrementing = false;
    protected $keyType = 'integer';
    public $timestamps = true;
    protected $fillable = [
        'relation_id',
        'dosen_id',
        'mk_id',
    ];
}
