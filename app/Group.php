<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'name',
    ];
    
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
    
     public function items()
    {
        return $this->hasMany(Item::class)->paginate(20);
    }
    
     public function posts()
    {
        return $this->hasMany(Post::class)->paginate(20);
    }
}

