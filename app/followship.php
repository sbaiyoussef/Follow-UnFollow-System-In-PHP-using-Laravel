<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class followship extends Model
{
    public function user1(){
        return $this->belongsTo(User::class,'user_id1','id');
    }
    public function user2(){
        return $this->belongsTo(User::class,'user_id2','id');
    }
        
    
}
