<?php

namespace App\Models;
use App\Models\Category;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    function category(){
        return $this->belongsTo(Category::class);
    }

    function user(){
        return $this->belongsTo(User::class);
    }
}
