<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\EmailTemplates;
//use App\PageContentDetails;

use Illuminate\Support\Facades\Storage;

class EmailTemplateController extends Controller
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
        $email_templates = EmailTemplates::get();
        //echo "<pre>";print_r($page_contents);die();
        
        return view('admin.email_templates.index',compact('email_templates'));
    }    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {         
        $email_template = EmailTemplates::where('id', $id)->first(); 
        //dd($email_template);      

        return view('admin.email_templates.edit',compact('email_template'));
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
            'template_title' => 'required'
        ]);

        EmailTemplates::find($id)->update(
            array(
                'template_title'=>$request->input('template_title'),
                'template_content'=>$request->input('template_content'),
                'updated_at'=>date("Y-m-d h:i:s")
            )
        );

        return redirect()->route('admin.email_templates.index')
                        ->with('success','Template updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EmailTemplate::find($id)->delete();
        return redirect()->route('email_template.index')->with('success','Template deleted successfully');

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