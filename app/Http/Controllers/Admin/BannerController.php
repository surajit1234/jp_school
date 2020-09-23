<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
//use App\Language;
use App\Banners;
//use App\BannerDetails;

use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
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
        $banners = Banners::get();
        //echo "<pre>";print_r($banners);die();      
        return view('admin.banners.index',compact('banners'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		    //$languages = Language::all();
        return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'banner_title' => 'required'
        ]);

        $filename = "";
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = 'home_banner_'.time().'.'.$image->getClientOriginalExtension();
            Storage::disk('public')->put('home_banner/'.$filename,file_get_contents($image));
        }       

        try{
            $banners = new Banners;      
            $banners->title =   $request->input("banner_title");
            $banners->status =   $request->input("status");
            $banners->image =   $filename;
            $banners->created_at =   date('Y-m-d h:i:s');
            $banners->save();

            /*for($i=0;$i<2;$i++) {
                $banner_details = new BannerDetails; 
                $banner_details->banner_id =  $banners->id;           
                $banner_details->lang_id =  ($i+1);
                $banner_details->title =  $request->input("banner_title.".($i+1));
                $banner_details->save();
            }*/

        } catch(\Exception $e){
           // do task when error
           return redirect()->route('admin.banners.create')->with('error',$e->getMessage());
        }

        return redirect()->route('admin.banners.index')->with('success','Banner created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        //$languages = Language::all();
        $banner = Banners::where('id', $id)->first();  
        //dd($banner);    
        return view('admin.banners.edit',compact('banner'));
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
            'banner_title' => 'required'
        ]);

        $filename = "";
        if($request->hasFile('image')){
            $image = $request->file('image'); 
            $filename = 'home_banner_'.time().'.'.$image->getClientOriginalExtension(); 
            Storage::disk('public')->put('home_banner/'.$filename,file_get_contents($image));
        }    

        try{
            Banners::find($id)->update(
                array(
                    'status'=>$request->input('status'),
                    'title'=>$request->input("banner_title"),
                    'image'=>($filename==""?$request->input("old_banner_image"):$filename),
                    'updated_at'=>date("Y-m-d h:i:s")
                )
            );

            /*for($i=0;$i<2;$i++) {
                BannerDetails::where('lang_id', '=', ($i+1))
                    ->where('banner_id', '=', $id)
                    ->update(
                        array(
                            'title'=>$request->input('banner_title.'.($i+1))
                        )
                    );
            }*/

        } catch(\Exception $e){
           // do task when error
           //dd($e->getMessage());  
           return redirect()->route('admin.banners.edit',$id)->with('error',$e->getMessage());
        }

        return redirect()->route('admin.banners.edit',$id)->with('success','Banner updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $banner = Banners::find($id);
        //$banner->banner_details()->delete();
        $banner->delete();

        return redirect()->route('admin.banners.index')->with('success','Banner deleted successfully');
    }

    //File Upload from TinyMCE Editor
    public static function uploadFile()
    {
        //echo "dfgdfgdfg";die();
        /***************************************************
           * Only these origins are allowed to upload images *
        ***************************************************/
        $accepted_origins = array("http://localhost", "http://192.168.1.1", "http://example.com");

        /*********************************************
           * Change this line to set the upload folder *
        *********************************************/
        $imageFolder = public_path()."/home_page_video/";

        reset ($_FILES);
        $temp = current($_FILES);
        if (is_uploaded_file($temp['tmp_name'])){
            if (isset($_SERVER['HTTP_ORIGIN'])) {
              // same-origin requests won't set an origin. If the origin is set, it must be valid.
              if (in_array($_SERVER['HTTP_ORIGIN'], $accepted_origins)) {
                header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
              } else {
                header("HTTP/1.1 403 Origin Denied");
                return;
              }
            }

            /*
              If your script needs to receive cookies, set images_upload_credentials : true in
              the configuration and enable the following two headers.
            */
            // header('Access-Control-Allow-Credentials: true');
            // header('P3P: CP="There is no P3P policy."');

            // Sanitize input
            if (preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])) {
                header("HTTP/1.1 400 Invalid file name.");
                return;
            }

            // Verify extension
            if (!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "png", "mp4"))) {
                header("HTTP/1.1 400 Invalid extension.");
                return;
            }

            // Accept upload if there was no origin, or if it is an accepted origin
            $filetowrite = $imageFolder . $temp['name'];
            $file_url = url('/').'/public/home_page_video/'.$temp['name'];

            move_uploaded_file($temp['tmp_name'], $filetowrite);

            // Respond to the successful upload with JSON.
            // Use a location key to specify the path to the saved image resource.
            // { location : '/your/uploaded/image/file'}
            echo json_encode(array('location' => $file_url));
        } else {
            // Notify editor that the upload failed
            header("HTTP/1.1 500 Server Error");
        }
    }

}