<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    public function create()
    {
    	return view('registration.create');
    }

    public function store()
    {
    	$this->validate(request(), [
    		'name' => 'required|min:2',
    		'email' => 'required|email',
    		'password' => 'required|min:6|confirmed'
    	]);

    	$user = User::create(request(['name', 'email', 'password']));

    	// sign in the user.
    	auth()->login($user);

    	return redirect()->home();
    }
}
