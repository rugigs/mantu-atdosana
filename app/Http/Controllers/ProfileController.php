<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function show(User $user)
    {

        return view('profile.show',[
            'posts' =>  $user->posts()->paginate(6),
            'user' => $user
        ]);
    }

    public function edit(User $user)
    {
        return view('profile.edit', [
            'user' => $user
        ]);
    }

    public function update(User $user)
    {
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
        auth()->logout();
        $user->delete();

        return redirect('/')->with('success', 'Profils izdzēsts!');
    }
}
