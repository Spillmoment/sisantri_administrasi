<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenJurusan extends Model
{
    protected $table = 'jurusan';
    
    public function santri() {
        return $this->hasMany("App\Santri","kd_jurusan","kd_jurusan");
    }
}
