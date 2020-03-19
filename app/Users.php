<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Users extends Authenticatable
{
    protected $table = 'user';
    
    protected $fillable = [
        'username', 'email', 'password_hash', 'status', 'type_user','auth_key',
    ];

    public $timestamps = false; 

    protected $hidden = [
        'password_hash', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function wali_santri()
    {
        return $this->hasOne("App\WaliSantri", "id", "id");
    }
}
