<?php

namespace App\Models;
use App\Models\Book;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['name', 'description'];

   // one to many --> book -->belongs to category  

   function books(){
        return $this->hasMany(Book::class);
   }

}
