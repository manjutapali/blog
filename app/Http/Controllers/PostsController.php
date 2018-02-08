<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\posts;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
    	$posts = posts::latest();

        if(request(['month', 'year'])) {
            $posts->filter(request(['month', 'year']));
        }   
        
        $posts = $posts->get();

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
