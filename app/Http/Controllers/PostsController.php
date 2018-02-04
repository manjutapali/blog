<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\posts;

class PostsController extends Controller
{
    public function index()
    {
    	return view('blog.maincontent');
    }

    public function create()
    {
    	return view('blog.create');
    }

    public function store()
    {
    	$front = (request('front') == "on" ) ? 1 : 0;
    	
    	posts::create([
    		'title' => request('title'),
    		'content' => request('content'),
    		'front' => $front
    	]);

    	return redirect('/');
    }
}
