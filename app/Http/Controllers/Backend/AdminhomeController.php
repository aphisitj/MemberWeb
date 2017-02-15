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

class AdminhomeController extends Controller
{
    public function __construct()
    {
    
        // $this->model = 'App\Models\Admin'; // Model
        $this->model = 'App\Models\User';
        $this->obj_model = new $this->model; // Obj Model
        $this->model_place = 'App\Models\Place';
        $this->obj_model_place = new $this->model_place; // Obj Model
      
        $this->obj_fn = new MainFunction(); // Obj Function
      
        $this->page_title = 'List User'; // Page Title
        $this->a_search = ['firstname','lastname','email','password','mobile','type']; // Array Search
        $this->path = '_admin'; // Url Path
        $this->view_path = 'backend.home.'; // View Path

        $this->user_id = session()->get('s_host_id');
        $this->user = Place_User::find($this->user_id);
        $this->session_id = $session_id = session()->getId();  
    }

    // ------------------------------------ Show All List Page
    public function index()
    {
           $obj_fn = $this->obj_fn;
        $obj_model = $this->obj_model;
        $obj_place =$this->obj_model_place;
      
        $path = $this->path;
        $page_title = $this->page_title;
        $per_page = config()->get('constants.PER_PAGE');

        $order_by = Input::get('order_by');
        if(empty($order_by)) $order_by = $obj_model->primaryKey;
        $sort_by = Input::get('sort_by');
        if(empty($sort_by)) $sort_by = 'desc';

        $search = Input::get('search');

        $user = $this->user;
        $user_id = $this->user_id;
        
        
        // $data = $this->obj_model;
        $data = $obj_model;
        $data_place = $obj_place;            
                         
   
        $count_data = $data->count();
        $count_place = $data_place->count();
        $data = $data->orderBy($order_by,$sort_by);
        $data = $data->paginate($per_page);
        
        return view($this->view_path.'index',compact('page_title','count_place','count_data','data','path','obj_model','obj_fn'));
    }
    
}