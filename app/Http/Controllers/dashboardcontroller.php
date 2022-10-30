<?php

namespace App\Http\Controllers;
use App\User;
use App\category;
use App\post;
use Illuminate\Http\Request;

class dashboardcontroller extends Controller
{
    public function index(){
        $count = User::all()->count();
        $count2 = category::all()->count();
        $count3 = post::all()->count();
        return view('dashboard.index')->withusers($count)->withcategories($count2)->withposts($count3);
    }
}
