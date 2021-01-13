<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function club(){
        return $this->belongsTo('App\Models\Club');
    }

    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }

    public function backers(){
        return $this->hasMany('App\Models\Backer');
    }

    public function resources(){
        return $this->hasMany('App\Models\Resource');
    }

    public function announcements(){
        return $this->hasMany('App\Models\Announcement');
    }
    
}
