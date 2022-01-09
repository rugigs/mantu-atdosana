<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {

        return view('profile.index',[
            'users' => User::paginate(15)
        ]);
    }

    public function show(User $user)
    {

        return view('profile.show',[
            'posts' =>  $user->posts()->paginate(6),
            'user' => $user
        ]);
    }

    public function edit(User $user)
    {
        if(auth()->user()->id !== $user->id && auth()->user()->cannot('admin'))
        {
            abort('403');
        }

        return view('profile.edit', [
            'user' => $user
        ]);
    }

    public function update(User $user)
    {
        if(auth()->user()->id !== $user->id && auth()->user()->cannot('admin'))
        {
            abort('403');
        }

        $attributes = request()->validate([
            'username' => ['required', 'max:255', Rule::unique('users','username')->ignore($user->id)],
            'phone_nr' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
            'email' =>  ['required', 'email', 'max:255', Rule::unique('users','email')->ignore($user->id)]
        ]);

        $user->update($attributes);

        return redirect('/' )->with('success', 'Dati rediģēti!');
    }

    public function destroy(User $user)
    {
        if(auth()->user()->id !== $user->id && auth()->user()->cannot('admin'))
        {
            abort('403');
        }

        auth()->logout();
        $user->delete();

        return redirect('/')->with('success', 'Profils izdzēsts!');
    }

    public function destroyAdmin(User $user)
    {
        if(auth()->user()->id !== $user->id && auth()->user()->cannot('admin'))
        {
            abort('403');
        }

        $user->delete();

        return back()->with('success', 'Lietotājs izdzēsts!');
    }
}
