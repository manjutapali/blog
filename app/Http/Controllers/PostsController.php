<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\posts;

class PostsController extends Controller
{
    public function index()
    {
    	$posts = posts::where('front', 1)->latest()->get();

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
    		'front' => $front
    	]);

    	return redirect('/');
    }
}
