<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class usercontroller extends Controller
{
   public function index(){
       return view('users.index')->with('users',User::all());
   }
    public function create(){
        return view('users.create');
    }
}
