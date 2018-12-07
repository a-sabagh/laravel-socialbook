<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable=['name','pages','isbn','price','published_at'];
    protected $hidden=[];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function authors()
    {
        return $this->belongsToMany('App\Author');
    }
}