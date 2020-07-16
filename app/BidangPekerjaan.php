<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BidangPekerjaan extends Model
{
    protected $guarded = [];
    protected $table = 'bidang_pekerjaan';

    public function alumni()
    {
        return $this->hasMany('App\Alumni','pekerjaan_id');
    }
}
