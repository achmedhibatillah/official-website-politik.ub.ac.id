<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KurikulumToMataKuliah extends Model
{
    use HasFactory;

    protected $table = 'kurikulum_to_mk';
    protected $primaryKey = 'relation_id';
    public $incrementing = false;
    protected $keyType = 'integer';
    public $timestamps = true;
    protected $fillable = [
        'relation_id',
        'kurikulum_id',
        'mk_id',
    ];
}
