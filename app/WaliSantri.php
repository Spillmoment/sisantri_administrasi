<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WaliSantri extends Model
{
    protected $table = 'wali_santri';
    protected $fillable = [
        'id_wali_santri','id','nama_suami','tgl_suami','pendidikan_suami','pekerjaan_suami','penghasilan_suami','nama_istri','tgl_istri','pendidikan_istri','pekerjaan_istri','penghasilan_istri',
    ];
    // protected $guarded = ['creat_at','update_by','update_at','create_by'];
    // protected $guarded = [];
    public $timestamps = false;
    
    public function users()
    {
        return $this->belongsTo("App\Users");
    }

    public function santri(){
        return $this->hasMany("App\Santri", "id_wali_santri", "id_wali_santri");
    }
}
