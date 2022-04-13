@extends('layout')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
              Content
            </div>
                <div class="card-body">
                    <h5 class="card-title">{{$post->name}}</h5>
                    <p class="card-text">{{$post->description}}</p>
                    <p class="card-text">{{$post->category->name}}</p>
                    <div class="d-flex">
                        <a href="/posts" class="btn btn-primary mx-1">Back</a>
                        <a href="/posts/{{$post->id}}/edit" class="btn btn-warning mx-1">Edit</a>
                        <form action="/posts/{{$post->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger mx-1" type="submit">Delete</button>
                        </form>
                    </div>
                </div> 
        </div>
    </div>

@endsection
