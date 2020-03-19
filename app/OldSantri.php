<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    protected $table = 'santri';
    // protected $fillable = ['id_wali_santri','nama','gender','nisn','tempat_lahir'];
    protected $guarded = [];

    
    public function wali_santri() {
        return $this->belongsTo(\App\WaliSantri::class,'id_wali_santri','id');
    }

    public function JenjangPendidikan(){
        return $this->hasMany('\App\JenjangPendidikan','id_santri','id');
    }
}
