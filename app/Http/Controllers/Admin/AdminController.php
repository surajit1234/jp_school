<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Libraries\RestAPI;
use Illuminate\Support\Facades\Storage;

use App\Admin;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */    
    public function __construct()
    {
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = Admin::get();
        return view('admin.admins.index',compact('users'));
    }
 

    public function showProfile()
    {       
        $user = Admin::where("id",\Auth::guard('admin')->user()->id)->first();
        //dd($user);
        return view('admin.admins.my_profile',compact('user'));
    } 

    public function updateProfile(Request $request)
    {
        try{       
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required | email| unique:users,email,' .\Auth::guard('admin')->user()->id,
                'company_name' => 'required',
                'profile_picture' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($validator->fails()) {
                return redirect(route('admin.admin.profile'))->withErrors($validator,'profile')->withInput();
            }

            $filename = \Auth::guard('admin')->user()->profile_picture;
            if($request->hasFile('profile_picture')){
                $profile_picture = $request->file('profile_picture'); 
                //dd($profile_picture);
                $filename = 'profile_picture_'.time().'.'.$profile_picture->getClientOriginalExtension(); 
                Storage::disk('public')->put('profile_picture/'.$filename,file_get_contents($profile_picture));
            }

            //echo $filename;die();

            Admin::where("id",\Auth::guard('admin')->user()->id)->update(
                array(                    
                    'name' => $request->input("name"),
                    'email'=>$request->input("email"),
                    'company_name' => $request->input("company_name"),
                    'profile_picture' => $filename,
                    'updated_at'=>date("Y-m-d h:i:s")
                )
            );
            return redirect()->route('admin.admin.profile')->with('success',"Record updated Successfully");
        } catch(\Exception $e){                   
           return redirect()->route('admin.admin.profile')->with('error',$e->getMessage());
        } 

    }

    public function changePassword(Request $request) 
    {
        $user =Admin::find(\Auth::guard('admin')->user()->id);
        $validator =Validator::make($request->all(), [
            'old_pass' => [
                'required', function ($attribute, $value, $fail) {
                if (!Hash::check($value, \Auth::guard('admin')->user()->password)) {
                    $fail('Old Password didn\'t match');
                }
            }],    
            'new_pass' => 'required |different:old_pass',
            'confirmed' => 'required | same:new_pass',
        ]);

        if ($validator->fails()) {            
            return redirect(route('admin.admin.profile'))->withErrors($validator,'profile')->withInput();
        }
        
        //$user = User::find(\Auth::user()->id);
        $user->password = Hash::make($request->get('new_pass'));
        $user->save();

        return redirect()->route('admin.admin.profile')->with('success','Password changed Successfully');
    }

}
