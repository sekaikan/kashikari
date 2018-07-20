<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'user_id', 'post_id', 'recipient_id','content','item_id', 'type',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
   
   
}
