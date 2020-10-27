<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table ='comments';
    protected $primaryKey ='id';
    protected $fillable=['id','content','user_id','post_id'];

    public  function  post(){
        return $this->belongsTo('App\model\post','post_id');
    }


    public  function  user(){
        return $this->belongsTo('App\User','user_id');
    }
}
