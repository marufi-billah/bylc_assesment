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
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials, $request->remember)){
            return redirect()->intended('dashboard')->withSuccess('Signed In');
        }

        return redirect('login')->withSuccess('Invalid login details');
    }
    public function createAccount(Request $request){
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'phone' => 'required|regex:/(01)[0-9]{9}/',
            'password' => 'required|min:6',
            'agreement' => 'accepted',
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
            $user = Auth::user();
            $customer_count = User::where('role', 'customer')->count();
            $employee_count = User::where('role', 'employee')->count();
            return view('dashboard')
            -> with('user', $user)
            -> with('customer_count', $customer_count)
            -> with('employee_count', $employee_count);
        }

        return redirect('login')->withSuccess('You are not allowed to access the page');
    }
    public function profile(){
        if(Auth::check()){
            $user = Auth::user();
            return view('profile')
            -> with('user', $user);
        }

        return redirect('login')->withSuccess('You are not allowed to access the page');
    }
    public function profileEdit(){
        if(Auth::check()){
            $user = Auth::user();
            return view('profile_edit')
            -> with('user', $user);
        }

        return redirect('login')->withSuccess('You are not allowed to access the page');
    }

    public function profileSave(Request $request){
        if(Auth::check()){
            $user = Auth::user();
            $request->validate([
                'name' => 'required|min:3',
                'email' => 'required|email',
                'phone' => 'required|regex:/(01)[0-9]{9}/',
                'password' => 'required|min:6',
                'description' => 'required|min:5',
            ]);
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->password = $request->password;
            $user->description = Hash::make($request->description);

            $user->save();
            return redirect('profile')->withSuccess('Profile saved successfully');
        }

        return redirect('login')->withSuccess('You are not allowed to access the page');
    }

    public function signOut(){
        Session::flush();
        Auth::logout();

        return redirect('login');
    }

    public function profileDelete(){
        if(Auth::check()){
            $user = Auth::user();
            $user->delete();
            $this->signout();
        }
        return redirect('login')->withSuccess('You are not allowed to access the page');
    }
}
