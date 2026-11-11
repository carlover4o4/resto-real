<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function postlogin(Request $request){
        $cek = $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        if(Auth::attempt($cek)){
            $user = Auth::user();
            if($user->role == 'admin'){
                return redirect()->route('admin');
            }
            else{
                return redirect()->route('menu');
            }
        }
        return back()->with('error','Email atau Password salah!');
    }

    public function register(){
        return view('register');
    }

    public function postregister(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'password'=>'required'
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password
        ]);
        return redirect()->route('login');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
