<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    protected $fillable = ['commment_id', 'is_active', 'author', 'email', 'body'];
    
    public function commment(){
        
        return $this->belongsTo('App\Comment');
        
    }
}
