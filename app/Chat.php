<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = [
        'user_id', 'content','group_id',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
      public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
