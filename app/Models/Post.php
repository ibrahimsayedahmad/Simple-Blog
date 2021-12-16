<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public static function booted () {
        static::addGlobalScope('userposts',function (Builder $builder){
            if(auth()->check())
            {
                $userid=auth()->id();
                $builder->where('user_id','=',$userid);
            }
        });
    }
}
