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

class HostUploadimgController extends Controller
{
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
        $obj_fn = $this->obj_fn;
        $obj_model = $this->obj_model;



        $page_title = $this->page_title;
        $url_to = $this->path.'/'.$id;
        $method = 'PUT';
        $txt_manage = 'Update';

        $data = $obj_model->find($id);
        $images = Place_Picture::where('place_id',$id)->get();
        $roles = Place::all();
         
        $this->user_id = session()->get('s_host_id'); 
        $this->session_id = $session_id = session()->getId();

        $user_id = $this->user_id;
        $this->user = Place_User::find($user_id);
        $user = $this->user;
        
        $user = DB::table('user_place')->where('user_id',$user_id)->first();
        $place_id = $user->place_id ;

        $images = Place_Picture::get();
        
 
       
    
        return view($this->view_path.'uploadimgplace',compact('page_title','images','data','url_to','method','txt_manage','obj_model','obj_fn','roles'));
    }
    // ------------------------------------ Record Update Data
    public function update(Request $request)
    {
        if($request->exists('btn-upload')){
            $file = $request->file('uploader');
            $path = 'images/uploads';
            $filename = $file->getClientOriginalName();
            $file->move('images/uploads',$file->getClientOriginalName());
            $image = new Place_Picture;
            $image->image_name = $filename;
            $image->save();
            echo 'Uploaded';
 
        }
        return redirect()->to($this->path.'?1'.$str_param);
        //return redirect()->back();
        
    }
    // ------------------------------------ Delete Data
    public function destroy($id)
    {
        session()->put('ref_url',url()->previous());
        $obj_model = $this->obj_model;
        $obj_model->find($id)->delete();

        return redirect()->to(session()->get('ref_url'));
    }
}
