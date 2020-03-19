<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    protected $table = 'wilayah';
    
    public function santri() {
        return $this->hasMany(\App\Santri::class,"id_wilayah","id_wilayah");
    }
}
