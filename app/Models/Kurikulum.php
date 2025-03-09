<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
    protected $table = 'kurikulum';
    protected $primaryKey = 'kurikulum_id';
    public $incrementing = false;
    protected $keyType = 'integer';
    public $timestamps = true;

    protected $fillable = [
        'kurikulum_id',
        'kurikulum_judul_ID',
        'kurikulum_judul_EN',
        'kurikulum_mulai',
        'kurikulum_silabus',
        'kurikulum_deskripsi_ID',
        'kurikulum_deskripsi_EN',
        'kurikulum_status'
    ];
}
 