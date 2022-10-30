<?php

namespace App;
use App\post;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = ['name'];
    public function posts()
    {
        return $this->hasMany(post::class);
    }
    public function mido(){
        echo 'hi';
    }
}
