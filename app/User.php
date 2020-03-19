<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'email', 'password', 'id_wali_santri'
    // ];
    // protected $fillable = [
    //     'username', 'email', 'password_hash', 'status', 'type_user'
    // ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function wali_santri(){
    //     return $this->hasOne('\App\WaliSantri','id','id_wali_santri');
    // }

    // public function wali_santri()
    // {
    //     return $this->hasOne("App\WaliSantri", "id", "id_wali_santri");
    // }
}
