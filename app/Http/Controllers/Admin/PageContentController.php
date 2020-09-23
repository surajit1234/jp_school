<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\PageContents;
//use App\PageContentDetails;
//use App\Language;
use Illuminate\Support\Facades\Storage;

class PageContentController extends Controller
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
        $page_contents = PageContents::get();
        return view('admin.page_contents.index',compact('page_contents'));
    }    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {         
        $page_content = PageContents::where('id', $id)
                        ->first();                
		
        //dd($page_content);      
		
        return view('admin.page_contents.edit',compact('page_content'));
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
        $this->validate($request,[
            'page_title' => 'required'
        ]);

        //dd($request->all());

        PageContents::find($id)->update(
            array(
                'content_title'=>$request->input('page_title'),
                'short_desc'=>$request->input('short_desc'),
                'long_desc'=>$request->input('long_desc'),
                'updated_at'=>date("Y-m-d h:i:s")
            )
        ); 

        return redirect()->route('admin.page_contents.index')
                        ->with('success','Content Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PageContents::find($id)->delete();
        return redirect()->route('admin.page_contents.index')
                        ->with('success','Content deleted successfully');

    }
	  

    /**
     * Tinymce Image Upload.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function uploadImage(Request $request)
    {
        if($request->hasFile('file')){
            $image = $request->file('file'); 
            $filename = 'image_'.time().'_'.$image->getClientOriginalExtension(); 
            Storage::disk('public')->put('tinymce_editor/'.$filename,file_get_contents($image));
            return json_encode(['location' => Storage::disk('public')->url('tinymce_editor/'.$filename)]);
        }
    }

}