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
        'post_id',
    ];

    public function replies(){
        return $this->hasMany('App\CommentReply');
    }
}
