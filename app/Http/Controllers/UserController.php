<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function customerView(){
        if(Auth::check()){
            $user = Auth::user();
            if($user->role == 'employee' || $user->role == 'admin')
                return view('customer')->with('user', $user);
        }
        return redirect('login')->withSuccess('You are not allowed to access the page');
    }
    public function employeeView(){
        if(Auth::check()){
            $user = Auth::user();
            if($user->role == 'admin')
                return view('employee')->with('user', $user);
        }
        return redirect('login')->withSuccess('You are not allowed to access the page');
    }
}
