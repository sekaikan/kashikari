<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'user_id', 'name', 'content', 'status', 'reward', 'photo','group_id',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
     public function group()
    {
        return $this->belongsTo(Group::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class)->paginate(20);
    }
}
