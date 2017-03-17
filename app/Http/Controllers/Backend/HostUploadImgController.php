<?php
namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Library\MainFunction;

use App\Models\User;
use App\Models\Place;
use App\Models\Place_User;
use App\Models\Place_Picture;
use App\Models\Voucher;
use App\Models\Package;
use Input;
use Hash;
use DB;

class HostUploadImgController extends Controller{

    public function __construct()
    {
    
        $this->model = 'App\Models\Place';       
        $this->obj_model = new $this->model; // Obj Model
        $this->modelplaceuser = 'App\Models\Place_User';      
        $this->obj_modelplaceuser = new $this->modelplaceuser;
        $this->modelvoucher = 'App\Models\Voucher';      
        $this->obj_modelvoucher = new $this->modelvoucher;
        $this->modelpackage = 'App\Models\Package';      
        $this->obj_modelpackage = new $this->modelpackage;

        $this->obj_fn = new MainFunction(); // Obj Function

        $this->user_id = session()->get('s_host_id'); 
        $this->session_id = $session_id = session()->getId();

        $user_id = $this->user_id;
        $this->user = Place_User::find($user_id);
        $user = $this->user;
        
        
        
        $this->page_title = 'UploadImg Place'; // Page Title
       
        $this->path = '_host/uploadimg'; // Url Path
        $this->view_path = 'host.profile.'; // View Path

       
        
    }

    // ------------------------------------ Show All List Page
    public function index()
    {
        
       
    }
    // ------------------------------------ View Add Page
    public function create()
    {
       
    }
    // ------------------------------------ Record Data
    public function store(Request $request)
    {
       
    }
    // ------------------------------------ Show Data : ID
    public function show($id)
    {

    }
    // ------------------------------------ View Update Page
    public function edit($id)
    {
        $this->user_id = session()->get('s_host_id'); 
        $this->session_id = $session_id = session()->getId();
        $obj_fn = $this->obj_fn;
        $obj_model = $this->obj_model;



        $page_title = $this->page_title;
        $url_to = $this->path.'/'.$id;
        $method = 'PUT';
        $txt_manage = 'Update';

        $data = $obj_model->find($id);
        $images = Place_Picture::where('place_id',$id)->get();
        $roles = Place::all();
        $user_id = $this->user_id;
        $this->user = Place_User::find($user_id);
        $user = $this->user;        
        $user = DB::table('user_place')->where('user_id',$user_id)->first();
        $place_id = $user->place_id ;
        $images = Place_Picture::where('place_id',$place_id)->get();
        $images_count = Place_Picture::where('place_id',$place_id)->count();
        $path = $this->path;
 
       
    
        return view($this->view_path.'uploadimgplace',compact('path','images_count','place_id','page_title','images','data','url_to','method','txt_manage','obj_model','obj_fn','roles'));
    }

 
    // ------------------------------------ Record Update Data
    public function update(Request $request)
    {
        $this->user_id = session()->get('s_host_id'); 
        $this->session_id = $session_id = session()->getId();

        $user_id = $this->user_id;
        $this->user = Place_User::find($user_id);
        $user = $this->user;
        
        $user = DB::table('user_place')->where('user_id',$user_id)->first();
        $place_id = $user->place_id ;
        if($request->exists('btn-upload')){
            $file = $request->file('uploader');
            $path = 'assets/backend/img/place';
            $filename = $file->getClientOriginalName();
            $file->move('assets/backend/img/place',$file->getClientOriginalName());
            $image = new Place_Picture;
            $image->src = $filename;
            $image->place_id = $place_id;
            $image->save();
            echo 'Uploaded';
        }

        if($request->exists('btn-delete')){
         $delplaceuser = Place_Picture::where('place_id', $place_id)->delete();
            echo 'Delete';
        }
        $str_param = $request->str_param;
        //return redirect()->to($this->path.'?1'.$str_param);
        return redirect()->back();
        
    }
    // ------------------------------------ Delete Data
    public function destroy($id)
    {
        session()->put('ref_url',url()->previous());
        $this->model = 'App\Models\Place_Picture';       
        $this->obj_modelimg = new $this->model;
        $obj_modelimg = $this->obj_modelimg;
        //$obj_modelimg->find($id)->delete();
        $delplaceuser = Place_Picture::where('place_id', $id)->delete();

        return redirect()->to(session()->get('ref_url'));
    }
}
