<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\posts;
use App\Repositories\PostsRepo;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(PostsRepo $posts)
    {
    	/*
            - creating repository to store the model calls, and calling it whenever needed.
            - Laravel inludes automatic dependency injection in controllers for all the functions
                Uses php reflection api to inject the object, This is called automatic resolution
                or automatic dependency injection (Passing arguments to function).

            - Laravel recursively creates the dependencies. Eg: If PostsRepo class has another object creation
            in constructor, it will create the instance of it.

        */
        $posts = $posts->all();

    	return view('blog.maincontent', compact('posts'));
    }

    public function create()
    {
    	return view('blog.create');
    }

    public function show(posts $post)
    {
    	//$post = posts::find($id);

    	return view('blog.show', compact('post'));
    }

    public function store()
    {
    	
    	$this->validate(request(), [
    		'title' => 'required',
    		'content' => 'required'
    	]);

    	$front = (request('front') == "on" ) ? 1 : 0;
    	
    	posts::create([
    		'title' => request('title'),
    		'content' => request('content'),
            'user_id' => auth()->id(),
    		'front' => $front
    	]);

        // auth()->user()->publish(new posts(request(['title', 'body']))); add Mutator for front.

    	return redirect('/');
    }
}
