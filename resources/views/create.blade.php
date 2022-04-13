@extends('layout')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
              New Post
            </div>
            <div class="card-body">
                <form action="/posts" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter name">
                    </div>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description"  cols="30" rows="10" class="form-control" placeholder="Enter description"></textarea>
                    </div>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <select class="form-control mb-3" name="category_id">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="/posts" class="btn btn-success ">Back</a>
                </form>
            </div>
        </div>
    </div>

@endsection

