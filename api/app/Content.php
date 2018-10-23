<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    //
    protected $fillable = [
        'title', 'text', 'image', 'date'
    ];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /** 
     * Relacionamentos entre tabelas
     * 
     * */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->belongsToMany('App\User', 'likes', 'content_id', 'user_id');
    }
    
}
