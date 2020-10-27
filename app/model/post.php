<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table ='posts';
    protected $primaryKey ='id';
    protected $fillable=['id','title','content','section_id','user_id'];


    public  function  section(){
        return $this->belongsTo('App\model\Section','section_id');
    }


    public  function  user(){
        return $this->belongsTo('App\User','user_id');
    }


    public function comments(){
        return $this->hasMany('App\model\Comment','post_id');
    }

    public function photos()
    {
        return $this->belongsToMany('App\model\Photo', 'post_photos');
    }



}
