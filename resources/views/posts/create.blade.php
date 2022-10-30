@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{ isset($post) ? "Update post" : "Add a new post" }}
        </div>
        <div class="card-body">
            <form enctype="multipart/form-data" action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="POST">
                @csrf
                @if (isset($post))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="category">post title:</label>
                    <input type="text" name="title" class="@error('title') is-invalid @enderror form-control" placeholder="Add a title post" value="{{ isset($post) ? $post->title : "" }}">
                    <label for="category">description Name:</label>
                    <input type="text" name="description" class="@error('description') is-invalid @enderror form-control" placeholder="Add a new description" value="{{ isset($post) ? $post->content : "" }}">
                    <label for="category">post content:</label>
                    <input type="text" name="contents" class="@error('content') is-invalid @enderror form-control" placeholder="Add a new content" value="{{ isset($post) ? $post->description : "" }}">
                    <label for="category">post image:</label>
                    <input type="file" name="image" class="@error('image') is-invalid @enderror form-control" value="{{ isset($post) ? $post->image : "" }}">
                    <label for="category">post category:</label>
                    <select class="form-control form-control-sm" name="category" se>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <br>

                    <div class="form-group">
                        <label for="category">post tag:</label>
                        <select multiple class="form-control" id="category" name="tag[]">
                            @foreach($tags as $tags)
                            <option>{{$tags->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    @error('title')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-success">
                        {{ isset($post) ? "Update" : "Add" }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
