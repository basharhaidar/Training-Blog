<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $table = 'photos';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'path'];


    public function posts()
    {
        return $this->belongsToMany('App\model\post', 'post_photos');
    }

}