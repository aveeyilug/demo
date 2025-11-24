<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function showRegister(){
        return view('pages.register');
    }

    public function showLogin(){
        return view('pages.login');
    }

    public function register(Request $request){

        $data = $request->validate([
            'username' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'patronymic' => 'required|string|max:255',
            'login' => 'required|string|unique:users,login',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        User::create($data);

        return redirect()->route('view.login');
    }

    public function login(Request $request){
        $data = $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        if(auth()->attempt($data)){
            $request->session()->regenerate();
            return redirect()->route('view.orders');
        }

        return back()->withErrors(['login' => 'Не верные данные']);
    }

    public function logout(){
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('view.register');
    }
}
