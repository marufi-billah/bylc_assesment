<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view("login");
    }
    public function register(){
        return view("register");
    }
    public function login(Rrequest $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials, $request->remember)){
            return redirect()->intended('dashboard')-withSuccess('Signed In');
        }

        return redirect('login')->withSuccess('Invalid login details');
    }
    public function createAccount(Request $request){
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'phone' => 'required|regex:/(01)[0-9]{9}/',
            'password' => 'required|min:6',
        ]);
        $data = $request->only('name', 'email', 'phone', 'password');
        $check = $this->create($data);
        return redirect('dashboard')->withSuccess('You have signed in');
    }
    private function create(array $data){
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'status' => 'active',
            'role' => 'customer',
            'password' => Hash::make($data['password'])
        ]);
    }

    public function dashboard(){
        if(Auth::check()){
            return view('dashboard');
        }

        return redirect('login')->withSuccess('You are not allowed to access the page');
    }

    public function signOut(){
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}
