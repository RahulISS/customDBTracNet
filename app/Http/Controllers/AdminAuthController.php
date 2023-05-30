<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Validator;

class AdminAuthController extends Controller
{
    //

    /**
     * Admin Login
     */
    public function login(){

        return view('adminlogin');

    }


    /**
     * Admin login function
     * @var $request
     */
    public function handleLogin(Request $request)
    {
        
        $fields = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($fields->fails()) {
           
            return back()->with('error',$fields->errors());       
        }
        $user = auth()->guard('admin')->user();
        dd($user);
        if(auth()->guard('admin')->attempt(['email' => $request->input('email'),  'password' => $request->input('password')])){
            
            $user = auth()->guard('admin')->user();
           
            if($user->is_admin == 1){
                return redirect()->route('adminDashboard')->with('success','You are Logged in sucessfully.');
            }
        }else {
            return back()->with('error','Whoops! invalid email and password.');
        }
    }

    public function adminLogout (Request $request){
        auth()->guard('admin')->logout();
        Session::flush();
        Session::put('success', 'You are logout sucessfully');
        return redirect(route('adminLogin'));
    }


}
