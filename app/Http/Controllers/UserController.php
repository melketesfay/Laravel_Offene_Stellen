<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Show user register form

    public function create()
    {
        return view('users.register');
    }

    // create new user
    public function store(Request $request)
    {
        $inputData = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6']
        ]);

        // hash password

        $inputData['password'] = bcrypt($inputData['password']);

        // create user
        $user = User::create($inputData);

        // login directly after creating new user

        auth()->login($user);

        return redirect('/')->with('message', 'User ' . $inputData['name'] . ' created succesfuly and logen in');
    }


    // logout user

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'you have been loggen out!');
    }


    // show login form

    public function login()
    {
        return view('users.login');
    }


    //  Authenticat user

    public function authenticate(Request $request)
    {
        $inputData = $request->validate([

            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        // hash password

        // $inputData['password'] = bcrypt($inputData['password']);



        // try login user

        if (auth()->attempt($inputData)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'You are now loggen in!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');

        // auth()->login($user);

        // return redirect('/')->with('message', 'User ' . $inputData['name'] . ' created succesfuly and logen in');
    }
}
