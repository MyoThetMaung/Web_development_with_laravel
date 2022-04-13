@extends('layout')
@section('content')
    <div class="container">
        <h3 class="float-end">{{Auth::user()->name}}</h3>
        <div class="d-flex">
            <a href="posts/create" class="btn btn-success mb-3">New Post</a>
            <a href="logout" class="btn btn-danger mb-3">Logout</a> 
        </div>
        <div class="card">
            <div class="card-header text-center">
              Contents
            </div>
                @foreach ($posts as $post)  
                    <div class="card-body">
                        <h5 class="card-title">{{$post->name}}</h5>
                        <p class="card-text">{{$post->description}}</p>
                        <div class="d-flex">
                            <a href="/posts/{{$post->id}}" class="btn btn-primary mx-1">View detail</a>
                            <a href="/posts/{{$post->id}}/edit" class="btn btn-warning mx-1">Edit</a>
                            <form action="/posts/{{$post->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger mx-1" type="submit">Delete</button>
                            </form>
                        </div>
                    </div> <hr>
                @endforeach
        </div>
    </div>

@endsection
