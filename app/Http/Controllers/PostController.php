<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('user_id',auth()->id())->get();
        return view('home',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:10',
            'category_id' => 'required'
        ],[
            'name.required' => 'Name is required OK?',
            'description.required' => 'Description is required OK?',
            'category_id.required' => 'Category is required OK?'
        ]);                                                                                     //customize error message
        Post::create($validatedData);
        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $this->authorize('view',$post);                                      //authorizein PostPolicy
        return view('show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Post $post)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:10',
            'category_id' => 'required'
        ],[
            'name.required' => 'Name is required OK?',
            'description.required' => 'Description is required OK?',
            'category_id.required' => 'Category is required OK?'
        ]);
        $post->update($validatedData);
        return redirect('posts');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('posts');

    }
}
