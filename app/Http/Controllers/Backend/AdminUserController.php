<?php
namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Library\MainFunction;

use App\Models\User;
use App\Models\Place;
use App\Models\Place_User;
use App\Models\PlaceVoucher;
use DB;
use Input;
use Hash;

class AdminUserController extends Controller
{
    public function __construct()
    {
        // $this->model = 'App\Models\Admin'; // Model
        $this->model = 'App\Models\User';
        $this->obj_model = new $this->model; // Obj Model
        $this->obj_fn = new MainFunction(); // Obj Function
      
        $this->page_title = 'List User'; // Page Title
        $this->a_search = ['user_id','firstname','lastname','email','mobile','type']; // Array Search
        $this->path = '_admin/listuser'; // Url Path
        $this->view_path = 'backend.listuser.'; // View Path

        $this->user_id = session()->get('s_host_id');
        $this->user = Place_User::find($this->user_id);
        $this->session_id = $session_id = session()->getId();
    }

    // ------------------------------------ Show All List Page
    public function index()
    {
        $obj_fn = $this->obj_fn;
        $obj_model = $this->obj_model;

        $user = $this->user;
        $user_id = $this->user_id;

        $path = $this->path;
        $page_title = $this->page_title;
        $per_page = config()->get('constants.PER_PAGE');

        $order_by = Input::get('order_by');
        if(empty($order_by)) $order_by = $obj_model->primaryKey;
        $sort_by = Input::get('sort_by');
        if(empty($sort_by)) $sort_by = 'desc';

        $search = Input::get('search');

        $data = $obj_model;
        $count_data = $data->count();            
                         
        if(!empty($search))
        {
            $data = $data->where(function($query) use ($search){
               foreach($this->a_search as $field)
               {
                   $query = $query->orWhere($field,'like','%'.$search.'%');
               }
            });
        }
        
        $data = $data->orderBy($order_by,$sort_by);
        $data = $data->paginate($per_page);

        return view($this->view_path.'index',compact('page_title','count_data','data','path','obj_model','obj_fn'));
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
        

        $roles = User::all();

        return view($this->view_path.'create',compact('page_title','url_to','method','txt_manage','obj_model','obj_fn','roles'));
    }
    // ------------------------------------ Record Data
    public function store(Request $request)
    {
        $obj_model = $this->obj_model;
       

        $input = $request->all(); // Get all post from form
        $input['password'] = Hash::make($request->password);
    
        $data = $obj_model->create($input);
        $dataverify = str_random(30);
        $data->verification = 1 ;
        $data->verify_email = $dataverify;
        $data->save();

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

        $page_title = 'User detail';
        $url_to = $this->path.'/'.$id;
        $method = 'PUT';
        $txt_manage = 'Update';

        $data = $obj_model->find($id);

        $roles = User::all();

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