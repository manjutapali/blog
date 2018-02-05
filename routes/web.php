<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*

GET /posts

GET /posts/create - blog form

POST /posts

GET /posts/{id}/edit

GET /posts/{id}

PATCH /posts/{id}

DELETE /posts/{id}

*/


Route::get('/', 'PostsController@index');

Route::get('/posts/create', 'PostsController@create');

Route::get('/posts/{post}', 'PostsController@show');

Route::post('/posts', 'PostsController@store');


// Route::get('about', function() {
// 	return view('about');
// });


