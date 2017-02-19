<?php

namespace App;
// Slug start
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
// Slug end
use Illuminate\Database\Eloquent\Model;
 
class Post extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;
 
    /**
     * Sluggable configuration.
     *
     * @var array
     */
    public function sluggable() {
        return [
            'slug' => [
                'source' => 'title',
                'separator' => '-',
                'onUpdate' => true
            ]
                
        ];
    }
    
       protected $fillable = ['title', 'body', 'category_id', 'photo_id'];

    
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


