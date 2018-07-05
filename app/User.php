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
        'name', 'email', 'password', 'content', 'photo',
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
    
    public function chats()
    {
        return $this->hasMany(Chat::class)->paginate(100);
    }
    
    public function posts()
    {
        return $this->hasMany(Post::class)->paginate(20);
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
