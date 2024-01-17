<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\Authenticate;

class SessionController extends Controller
{
    public function destroy(){
        auth()->logout(); // para destruir la sesión del usuario que inició ses
        return redirect('/')->with('success', ' Goodbye');
    }

    public function create(){
        return view('session.create');
    }

    public function store(){
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if(auth()->attempt($attributes)){
            session()->regenerate();  //crea una nueva sesion y guarda el id
            var_dump(auth()->user()->name);
            return redirect('/')->with('success', "Welcome back " . auth()->user()->name);

        }
        
        return back()
                ->withInput()
                ->withErrors(['email'=>'Email or password incorrect']);
        
    }
}
