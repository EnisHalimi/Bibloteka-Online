<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zhanri extends Model
{
    protected $fillable = ['titulli'];

    public function libris()
    {
        return $this->belongsToMany('App\Libri','libris_zhanris');
    }
}
