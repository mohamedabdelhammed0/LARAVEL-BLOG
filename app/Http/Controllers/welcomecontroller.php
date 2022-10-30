<?php

namespace App\Http\Controllers;
use App\post;
use App\category;
use Illuminate\Http\Request;

class welcomecontroller extends Controller
{
    public function  index(){
        return view('welcome',[
            'posts'=>post::all(),
            'categories'=>category::all(),
        ]);
    }
}
