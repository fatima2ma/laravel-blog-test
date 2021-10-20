<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        // $posts = Post::latest()->with(['category','author']);       
        return view('welcome' , [
            'posts' => Post::latest()->with(['category','author'])
                ->filter(request(['search', 'category', 'author']))
                ->paginate(6)->withQueryString()
        ]);
    }

    public function show(Post $post){
        return view('post', [
            'post' => $post
        ]);
    }

    public function create(){
        
        return view('posts.create');
    }

    public function store(){
        
        // $path = request()->file('thumbnail')->store('thumbnails');
        // ddd($path);
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => ['required', 'image'],
            'slug'  => ['required', Rule::unique('posts', 'slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')] 
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        
        Post::create($attributes);

        return redirect('/');
    }
}
// index, show, create, store, edit, update, destroy