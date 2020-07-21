<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libri extends Model
{
    protected $fillable = ['ISBN','titull','stoku'];

    public function autors()
    {
        return $this->belongsToMany('App\Autor','autors_libris');
    }

    public function zhanris()
    {
        return $this->belongsToMany('App\Zhanri','libris_zhanris');
    }

    public function users()
    {
        return $this->belongsToMany('App\User','kartoni')->wherePivot('data_e_marrjes','afati');
    }
}
