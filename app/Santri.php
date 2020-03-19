<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    protected $table = 'santri';
    protected $fillable = ['nis','id_wali_santri','nama','no_kamar','foto_kk'];
    // protected $guarded = ['updated_at'];
    public $timestamps = false; 
    public function setUpdatedAt($value)
    {
      return NULL;
    }

    
    public function wali_santri() {
        return $this->belongsTo("App\WaliSantri");
    }

    public function wilayah(){
        return $this->belongsTo(\App\Wilayah::class,'id_wilayah','id_wilayah');
    }
    public function pen_formal(){
        return $this->belongsTo("App\PenFormal");
    }
    public function pen_diniah(){
        return $this->belongsTo("App\PenDiniah");
    }
    public function pen_jurusan(){
        return $this->belongsTo("App\PenJurusan");
    }
}
