<?php

namespace App;
use App\category;
use App\tags;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class post extends Model
{
    use SoftDeletes;
    protected $fillable = ['title','description','content','image','category_id','user_id'];

    public function category()
    {
        return $this->belongsTo(category::class);
    }
    public  function tags(){
        return $this->belongsToMany(tags::class);
    }
    public function user(){
        return $this->hasMany(post::class);
    }

}
