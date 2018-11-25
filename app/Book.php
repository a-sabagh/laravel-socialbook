<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable=['name','pages','isbn','price','published_at'];
    protected $hidden=[];
}