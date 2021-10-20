<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public function store(){
        $attributes = request()->validate([
            'name' => ['required', 'max:255' ],
            'username' => ['required', 'max:255' , 'min:3', Rule::unique('users', 'username')],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'min:7', 'max:255']
        ]);

        // $attributes['password'] = bcrypt($attributes['password']);
        $user = User::create($attributes);

        auth()->login($user);

        session()->flash('success', 'Your acount has been created');
        return redirect('/');
        // or return redirect('/')->with('success', 'Your acount has been created');;
    }
}
