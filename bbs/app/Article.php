<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'description'
    ];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function replies()
    {
        return $this->hasMany('App\Reply');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
