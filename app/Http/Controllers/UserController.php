<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use Redirect;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function customerView(){
        if(Auth::check()){
            $user = Auth::user();
            $customers = User::where('role', 'customer')->paginate(15);
            if($user->role == 'employee' || $user->role == 'admin')
                return view('customer')
                ->with('user', $user)
                ->with('customers', $customers);
        }
        return redirect('login')->withSuccess('You are not allowed to access the page');
    }
    public function userEdit(Request $request, $user_id){
        if(Auth::check()){
            $admin = Auth::user();
            if($admin->role == 'employee' || $admin->role == 'admin'){
                $user = User::find($user_id);
                return view('user_edit')
                    ->with('user', $user)
                    ->with('admin', $admin);
            }
            return redirect('dashboard')->withSuccess('You are not allowed to access the page');
        }
        return redirect('login')->withSuccess('You are not allowed to access the page');
    }
    public function userSave(Request $request, $user_id){
        if(Auth::check()){
            $admin = Auth::user();
            if($admin->role == 'employee' || $admin->role == 'admin'){
                $request->validate([
                    'name' => 'required|min:3',
                    'email' => 'required|email',
                    'phone' => 'required|regex:/(01)[0-9]{9}/',
                    'password' => 'required|min:6',
                    'description' => 'required|min:5',
                ]);
                $user = User::find($user_id);
                $user->name = $request->name;
                $user->phone = $request->phone;
                $user->password = Hash::make($request->password);
                $user->description = $request->description;

                $user->save();
                return Redirect::back()->withSuccess('User edited successfully');
            }
            else{
                return redirect('dashboard')->withSuccess('You are not allowed to access the page');
            }
        }

        return redirect('login')->withSuccess('You are not allowed to access the page');
    }
    public function employeeView(){
        if(Auth::check()){
            $user = Auth::user();
            $customers = User::where('role', 'employee')->paginate(15);
            if($user->role == 'admin')
                return view('customer')
                ->with('user', $user)
                ->with('customers', $customers);
        }
        return redirect('login')->withSuccess('You are not allowed to access the page');
    }
    public function archiveUser(Request $request){
        if(Auth::check()){
            $employee = Auth::user();
            if($employee->role == 'employee'){
                $user = User::find($request->customer_id);
                if($user->status == 'archive'){
                    $user->status = 'active';
                }
                else{
                    $user->status = 'archive';
                }

                $user->save();
                return Redirect::back()->withSuccess("Customer archived successfully");
            }
        }
        return redirect($request->url())->withSuccess("Your are not allowed to perform this operation");
    }

    public function deleteUser(Request $request){
        if(Auth::check()){
            $employee = Auth::user();
            if($employee->role == 'admin'){
                $user = User::find($request->customer_id);
                $user->delete();
                return Redirect::back()->withSuccess("Customer archived successfully");
            }
        }
        return redirect($request->url())->withSuccess("Your are not allowed to perform this operation");
    }
}
