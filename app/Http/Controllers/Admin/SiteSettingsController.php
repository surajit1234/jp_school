<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\SiteSettings;

use Illuminate\Support\Facades\Storage;

class SiteSettingsController extends Controller
{
    public function __construct(){
        //$this->middleware('auth:admin');        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = 1;
        $siteSettings = SiteSettings::where('id', $id)->first();   
        return view('admin.settings.edit',compact('siteSettings'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /* 
    public function create()
    {
        return view('admin.clients.create');
    }
    */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*
    public function store(Request $request)
    {
        request()->validate([
            'logo' => 'required'
        ]);

        $filename = "";
        if($request->hasFile('logo')){
            $clientLogo = $request->file('logo'); 
            $filename = 'client_logo_'.time().'_'.$clientLogo->getClientOriginalExtension(); 
            Storage::disk('public')->put('client_logo_/'.$filename,file_get_contents($clientLogo));
        }
       
        try{
            $clientLogo = new ClientLogo;            
            $clientLogo->status =   $request->input("status");
            $clientLogo->logo =   $filename;
            $clientLogo->save();
        } catch(\Exception $e){
           // do task when error           
           return redirect()->route('clients.create')
                        ->with('error',$e->getMessage());
        }  

        return redirect()->route('clients.index')
                        ->with('success','Client Logo created successfully');
    }  
    */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {         
        $siteSettings = SiteSettings::where('id', $id)->first();   
        return view('admin.settings.edit',compact('siteSettings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            SiteSettings::find($id)->update(
                array(
                    'title'=>$request->input('site_title'),
                    'meta_desc'=>$request->input('meta_desc'),
                    'meta_key'=>$request->input('meta_key')
                )
            );
        } catch(\Exception $e){
           // do task when error
           //dd($e->getMessage());           
           return redirect()->route('admin.settings.index',$id)
                        ->with('error',$e->getMessage());
        }  
        return redirect()->route('admin.settings.index',$id)
                        ->with('success','Site Settings updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function destroy($id)
    {
        $clientLogo = ClientLogo::find($id);
        $clientLogo->delete();
        return redirect()->route('clients.index')
                        ->with('success','Client Logo deleted successfully');
    }*/    

}