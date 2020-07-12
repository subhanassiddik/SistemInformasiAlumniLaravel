<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $guarded = [];

    protected $table = 'jurusan';

    public function prodi()
    {
        return $this->belongsTo('App\Prodi');
    }
}
