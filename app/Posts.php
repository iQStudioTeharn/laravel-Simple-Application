<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    //
    protected $fillable = [
        'title','body','category_id','user_id','photo_id','status'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function photo(){
        return $this->belongsTo('App\Photo');

    }
    public function category(){
        return $this->belongsTo('App\Category');

    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
