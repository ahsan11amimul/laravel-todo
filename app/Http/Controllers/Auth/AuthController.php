<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
        if($request->isMethod('POST'))
        {
           // dd($request->all());
           $validateData=request()->validate([
               'name'=>'required',
               'password'=>'required|min:6',
               'email'=>'required|email'
           ]);
           $validateData['password']=Hash::make($validateData['password']);
           User::create($validateData);
           return redirect('/login');
        }else{
            return view('auth.register');
        }
    }
     public function login(Request $request)
    {
        if($request->isMethod('POST'))
        {
           // dd($request->all());
           $credentials=$request->only('email','password');
           if(Auth::attempt($credentials))
           {
            return redirect('/dashboard');
           }else{
               return redirect('/login')->with('error','Invalid Credentials');
           }
        }else{
            return view('auth.login');
        }
    }
    public function dashboard()
    {
        return view('auth.dashboard');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
