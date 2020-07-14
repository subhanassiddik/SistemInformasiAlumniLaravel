<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Alumni extends Authenticatable
{
    use Notifiable;


    protected $guarded = [];
    
    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $table = 'alumni';

    public function jurusan()
    {
        return $this->belongsTo('App\Jurusan');
    }

}
