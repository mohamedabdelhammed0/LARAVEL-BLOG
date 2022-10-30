@extends('layouts.app')

@section('content')
    <div class="clearfix">
        <a href="{{ route('users.create') }}"
           class="btn float-right btn-success"
           style="margin-bottom: 10px">
            Add user
        </a>
    </div>
    <div class="card card-default">
        <div class="card-header">All users</div>
        @if ($users->count() > 0)
            <table class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>username</th>
                        <th>role</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
{{--                                <img src="{{ asset('storage/'.$user->image) }}" alt="" width="100px" height="50px">--}}
                            test
                            </td>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                {{ $user->role }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @else
                    <div class="card-body">
                        <h1 class="text-center">
                            No Posts Yet.
                        </h1>
                    </div>
        @endif
    </div>
    </div>
@endsection
