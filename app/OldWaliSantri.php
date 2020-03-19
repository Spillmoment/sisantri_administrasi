<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WaliSantri extends Model
{
    protected $table = 'wali_santri';
    protected $fillable = ['nama_ayah','alamat'];
    public function santri(){
        return $this->hasMany('\App\Santri','id_wali_santri','id');
    }

    // public function user() {
    //     return $this->belongsTo(\App\User::class);
    // }

    public function user()
    {
        return $this->belongsTo("App\User");
    }
}
