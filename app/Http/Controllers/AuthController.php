<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        return view('dashboard');
    }


    public function login(){
        return view('auth.login');
    }
    public function register(){
        return view('auth.register');
    }
    //Register
    public function postRegister(Request $request){
        $request->validate([
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:5',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        if($user->save()){
            return redirect()->route('login')->with("success", "Berhasil Register");
        }
        return redirect()->route('register')->with("error", "Gagal Register");
    }
    //Login
    public function postLogin(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $login = $request->only('username', 'password');
        if(Auth::attempt($login)){
            return redirect()->intended(route('dashboard'));
        }
        return redirect()->route('login')->with('error', 'Login gagal, Username atau Password salah');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
