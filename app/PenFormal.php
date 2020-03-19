<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenFormal extends Model
{
    protected $table = 'jp_pendidikan_formal';
    
    public function santri() {
        return $this->hasMany("App\Santri","kd_jp_formal","kd_jp_formal");
    }
}
