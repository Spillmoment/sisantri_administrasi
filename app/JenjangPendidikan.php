<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenjangPendidikan extends Model
{
    protected $table = 'jenjang_pendidikan';
    protected $fillable = ['pendidikan','program_studi'];
    public function santri() {
        return $this->belongsTo(\App\Santri::class,'id_santri','id');
    }
}
