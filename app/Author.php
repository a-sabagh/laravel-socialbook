<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['name','birthdate'];

    public function books()
    {
        return $this->belongsToMany('App\Book');
    }
}
