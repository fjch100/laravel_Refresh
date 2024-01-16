<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public function store(){
    
        //store a user
        $attributes = request()->validate([
            'name' => 'required|max:50',
            'username' => 'required|min:3|max:60|unique:users,username',
            'email' => 'required|email|max:60|unique:users,email',
            'password' => 'required|max:60|min:7',
        ]);
        $attributes['password'] = bcrypt($attributes['password']);
        User::create($attributes);
    
        return redirect('/')->with('success', 'your account has been created.');
    }
}
