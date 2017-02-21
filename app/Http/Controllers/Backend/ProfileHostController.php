<?php
namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Library\MainFunction;

use App\Models\User;
use App\Models\Place;
use App\Models\Place_User;
use Input;
use Hash;
use DB;

class ProfileHostController extends Controller
{
    public function __construct()
    {
    
        $this->model = 'App\Models\Place';
       
        $this->obj_model = new $this->model; // Obj Model
        $this->obj_fn = new MainFunction(); // Obj Function

        $this->user_id = session()->get('s_host_id');
        $this->user = Place_User::find($this->user_id);
        $this->session_id = $session_id = session()->getId();

        $user = $this->user;
        $user_id = $this->user_id;
        
        
        $this->page_title = 'Profile'; // Page Title
        $this->a_search = ['place_id','place_name','address','facility','service','type']; // Array Search
        $this->path = '_host'; // Url Path
        $this->view_path = 'host.profile.'; // View Path

       
        
    }

    // ------------------------------------ Show All List Page
    public function index()
    {
        $obj_fn = $this->obj_fn;
        $obj_model = $this->obj_model;

        $path = $this->path;
        $page_title = $this->page_title;
        
        $user = $this->user;
        $user_id = $this->user_id;
       
        $data = DB::table('place')
                    ->join('user_place', function ($join) {
                        $join->on('place.place_id', '=', 'user_place.place_id');
                    })
                    ->where('user_place.user_id', $user_id)
                    ->get();

       

        return view($this->view_path.'index',compact('page_title','data','path','obj_model','obj_fn'));
    }
    // ------------------------------------ View Add Page
    public function create()
    {
        $obj_fn = $this->obj_fn;
        $obj_model = $this->obj_model;

        $page_title = $this->page_title;
        $url_to = $this->path;
        $method = 'POST';
        $txt_manage = "Add";

        $roles = Place::all();

        return view($this->view_path.'update',compact('page_title','url_to','method','txt_manage','obj_model','obj_fn','roles'));
    }
    // ------------------------------------ Record Data
    public function store(Request $request)
    {
        $obj_model = $this->obj_model;

        $input = $request->all(); // Get all post from form
        $input['password'] = Hash::make($request->password);

        $data = $obj_model->create($input);

        return redirect()->to($this->path);
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

        $roles = Place::all();

        return view($this->view_path.'update',compact('page_title','data','url_to','method','txt_manage','obj_model','obj_fn','roles'));
    }
    // ------------------------------------ Record Update Data
    public function update(Request $request,$id)
    {
        $obj_model = $this->obj_model;

        $input = $request->except(['_token','_method','str_param']); // Get all post from form
        $input['password'] = Hash::make($request->password);

        $data = $obj_model->find($id)->update($input);

        $str_param = $request->str_param;
        return redirect()->to($this->path.'?1'.$str_param);
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
