<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libri extends Model
{
    protected $fillable = ['ISBN','titull','stoku','foto'];
    protected $table = "libris";

    public function autors()
    {
        return $this->belongsToMany('App\Autor','autors_libris')->withTimeStamps();;
    }

    public function zhanris()
    {
        return $this->belongsToMany('App\Zhanri','libris_zhanris')->withTimeStamps();;
    }

    public function users()
    {
        return $this->belongsToMany('App\User','kartoni')->withPivot(['data_e_marrjes','afati','kthyer','id'])->withTimeStamps();
    }
}
