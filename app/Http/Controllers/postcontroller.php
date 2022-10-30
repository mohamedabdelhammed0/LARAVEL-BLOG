<?php

namespace App\Http\Controllers;
use App\post;
use App\tags;
use App\category;
use Illuminate\Http\Request;

class postcontroller extends Controller
{
    public  function __construct()
    {
        return $this->middleware('checkcategory')->only('create');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::all();
        return view('posts.index')->withposts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = \App\category::all();
        $tags = \App\tags::all();
        return view('posts.create')->with('categories',$categories)->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post=new post();
        $post->title = $request->title;
        $post->description=$request->description;
        $post->content=$request->contents;
        $post->category_id=$request->category;
        $post->image=$request->image->store('images','public');

//        dd($request);
        $post->save();
        $post->tags()->attach($request->tag);

        session()->flash('success','post created successfully');
        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $post  = post::find($id);
        $tags  = tags::all();
        $cats  = category::all();
        return  view('posts.show')->with('post',$post)->with('tags',$tags)->with('cats',$cats);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post  = post::find($id);
        $categories = \App\category::all();
        $tags = \App\tags::all();

        return view('posts.create')->with('post', $post)->with('categories',$categories)->with('tags',$tags);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,post $post)
        {

        $post->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'content'=>$request->contents,
            'category_id'=>$request->category,
            'image'=>$request->image->store('images','public'),
        ]);
        $post->tags()->attach($request->tags);
        session()->flash('success','post updated successfully');

        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $data = post::find($id);
       $data->delete();
        session()->flash('success','post deleted successfully');

        return redirect('posts');
    }
    public function trashed()
    {
        $id = \App\post::onlyTrashed()->get();
        return view('posts.index')->with('posts', $id);
    }
}
