<?php

namespace App\Http\Middleware;

use Closure;

class checkcategory
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $count =  \App\category::all()->count();
        $count2 =  \App\category::all()->count();

        if( $count == 0){
            session()->flash('error','there should be at least one category');
            return redirect(route('categories.create'));
        }
        if( $count2 == 0){
            session()->flash('error','there should be at least one tag');
            return redirect(route('tags.create'));
        }
        return $next($request);
    }
}
