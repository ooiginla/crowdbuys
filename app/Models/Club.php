<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function campaigns(){
        return $this->hasMany('App\Models\Campaign');
    }

    public function members(){
        return $this->hasMany('App\Models\User');
    }
    
    
}
