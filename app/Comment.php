<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

    protected $fillable = [
        'body',
        'author',
        'email',
        'is_active',
        'posts_id',
    ];

    public function replies(){
        return $this->hasMany('App\CommentReply');
    }
    
    public function posts(){
        return $this->belongsTo('App\Posts');
    }
}
