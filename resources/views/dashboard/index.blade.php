@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row text-center">
                    <div class="col-md-4">
                            <div class="card text-white bg-info">
                                <div class="card-header">users</div>
                                <div class="card-body">{{$users}}</div>
                            </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-danger">
                            <div class="card-header">posts</div>
                            <div class="card-body">{{$posts}}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-success">
                            <div class="card-header">categories</div>
                            <div class="card-body">{{$categories}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
