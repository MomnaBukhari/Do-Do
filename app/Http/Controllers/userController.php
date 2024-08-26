<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    public function register(){
        return view('register');
    }

    public function registerSave(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        // Encrypt the password before creating the user
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        if ($user) {
            return redirect()->route('login');
        } else {
            return redirect()->back()->withInput()->withErrors(['Failed to register user.']);
        }
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (auth()->attempt($credentials)) {
            return redirect()->route('tasks');
        }
        else{
            return redirect()->route('login');
        }

    }
    public function dashboardpage(){
        if(Auth::check()){
            return redirect()->route('tasks');
        }
        else{
            return redirect()->route('login');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }

}
