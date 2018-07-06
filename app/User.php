<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password', 'content', 'photo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function items()
    {
        return $this->hasMany(Item::class);
    }
    
    public function chats()
    {
        return $this->hasMany(Chat::class);
    }
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
    
    public function groups()
    {
        return $this->belongsToMany(Group::class)->withTimestamps();
    }
}
