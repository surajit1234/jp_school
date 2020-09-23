<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Libraries\RestAPI;

class DashboardController extends Controller
{
    //protected $restAPI;

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
        
        return view('admin.dashboard');
    }

}
