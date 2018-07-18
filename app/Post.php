<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'content', 'status', 'group_id',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
     public function group()
    {
        return $this->belongsTo(Group::class);
    }
    
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
