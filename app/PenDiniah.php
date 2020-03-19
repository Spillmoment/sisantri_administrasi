<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenDiniah extends Model
{
    protected $table = 'jp_diniah';
    
    public function santri() {
        return $this->hasMany("App\Santri","kd_jp_diniah","kd_jp_diniah");
    }
}
