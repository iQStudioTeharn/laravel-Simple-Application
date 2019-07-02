<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    //
    protected $fillable = [
        'body',
        'author',
        'email',
        'is_active',
        'comment_id',
    ];

    public function comment(){
        return $this->belongsTo('App\Comment');
    }
}
