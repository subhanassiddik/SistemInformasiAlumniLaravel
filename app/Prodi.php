<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $guarded = [];

    protected $table = 'prodi';

    public function jurusans()
    {
        return $this->hasMany('App\Jurusan','prodi_id');
    }
}
