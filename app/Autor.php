<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $fillable = ['name','periudha'];

    public function libris()
    {
        return $this->belongsToMany('App\Libri','autors_libris');
    }

}
