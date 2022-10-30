@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{session()->get('error')}}
            </div>
        @endif
    </div>
    <div class="card card-default">
        <div class="card-header">
            {{ isset($tag) ? "Update tag" : "Add a new tag" }}
        </div>
        <div class="card-body">
            <form action="{{ isset($tag) ? route('tags.update', $tag->id) : route('tags.store') }}" method="POST">
                @csrf
                @if (isset($tag))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="tags">tag Name:</label>
                    <input type="text" name="name" class="@error('name') is-invalid @enderror form-control" placeholder="Add a new tag" value="{{ isset($tag) ? $tag->name : "" }}">
                    @error('name')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-success">
                        {{ isset($tag) ? "Update" : "Add" }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
