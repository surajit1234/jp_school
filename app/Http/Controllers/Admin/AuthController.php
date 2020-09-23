<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Auth;

class AuthController extends Controller
{
    use AuthenticatesUsers;
    

    public function __construct()
    {        
        //defining our middleware for this controller       
        $this->middleware('guest:admin',['except' => ['logout']]);
    }
    
    public function showLoginForm()
    {        
        if (auth()->guard('admin')->user()) 
            return redirect()->route('admin.dashboard');        

        return view('admin.auth.admin_login');
    }

    //function to login admins
    public function login(Request $request) {        
        $errors = new MessageBag;

        //validate the form data
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);        

        //attempt to login the admins in        
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {            
            //if successful redirect to admin dashboard                              
            //return redirect()->intended(route('admin.dashboard'));  
            //return redirect('admin/dashboard');                      
        } else {
            $errors = new MessageBag(['email' => ['These credentials do not match our records.']]);
        }

        //if unsuccessfull redirect back to the login for with form data
        return redirect()->back()
                        ->withErrors($errors)
                        ->withInput($request->only('email','remember'));
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()->route('show.admin.login');
    }    
}
