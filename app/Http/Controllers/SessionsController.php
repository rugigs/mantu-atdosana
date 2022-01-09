<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes = request()->validate([     /*Validate the input data*/
            'email' => 'required',
            'password' => 'required'
        ]);

        if(! auth()->attempt($attributes))      /*Validate the authentication*/
        {
            return back()
                ->withInput()
                ->withErrors(['email' => 'Jūsu epasts vai parole ir nepareizs.']);
        }
        session()->regenerate();

        return redirect('/')->with('success', 'Welcome back!');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Atslēgšanās no sistēmas veiksmīga!');
    }
}
