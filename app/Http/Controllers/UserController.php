<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request){
        $data =  $request->validate([
            'name' =>'required',
            'email' =>'required|email',
            'age' =>'required|numeric',
            'password' =>'required|confirmed',
            'role' =>'required',
        ]);
        $user = User::create($data);
        if($user){
            return redirect()->route('login');
        }
    }
    public function login(Request $request){
        $credentials =  $request->validate([
            'email' =>'required|email',
            'password' =>'required'
        ]);
        if(Auth::attempt($credentials)){
            return redirect()->route('dashboard');
        }
    }
    public function dashboardPage(){
            return view('dashbord');
    }
    public function innerPage(){
            return view('inner');
    }
    public function logout(){
      Auth::logout();
      return view('login');
    }
}
