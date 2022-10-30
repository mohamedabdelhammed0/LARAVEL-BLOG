<?php

namespace App;
use \App\post;
use Illuminate\Database\Eloquent\Model;

class tags extends Model
{
    protected $fillable = ['name'];

    public  function post(){
        return $this->belongsToMany(posts::class);
    }
}
