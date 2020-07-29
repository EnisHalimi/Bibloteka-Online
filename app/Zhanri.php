<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zhanri extends Model
{
    protected $fillable = ['titulli'];

    public function libris()
    {
        return $this->belongsToMany('App\Libri','libris_zhanris')->withTimeStamps();;
    }

    public function getCreatedAtAttribute($value)
    {
        return date('d/m/Y H:m:s',strtotime($value));
    }
}
