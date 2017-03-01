<?php
namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Library\MainFunction;

use App\Models\User;
use App\Models\Place;
use App\Models\Place_User;
use App\Models\Package;
use App\Models\Orders;
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
        $this->model_package = 'App\Models\Package';
        $this->obj_model_package = new $this->model_package;
        $this->model_orders = 'App\Models\Orders';
        $this->obj_model_orders = new $this->model_orders;

        $this->obj_fn = new MainFunction(); // Obj Function
      
        $this->page_title = 'List User'; // Page Title
        $this->a_search = ['firstname','lastname','email','password','mobile','type']; // Array Search
        $this->path = '_admin'; // Url Path
        $this->view_path = 'backend.home.'; // View Path

        $this->user_id = session()->get('s_host_id');
        //$this->user = Place_User::find($this->user_id);
        $this->session_id = $session_id = session()->getId();  
    }

    // ------------------------------------ Show All List Page
    public function index()
    {
        $obj_fn = $this->obj_fn;
        $obj_model = $this->obj_model;
        $obj_place =$this->obj_model_place;
        $obj_package =$this->obj_model_package;
        $obj_orders =$this->obj_model_orders;

        $path = $this->path;
        $page_title = $this->page_title;
        $per_page = config()->get('constants.PER_PAGE');

    
        $data = $obj_model;
        $data_place = $obj_place;            
        $data_package = $obj_package;                  
        $data_orders = $obj_orders;


        $count_data = $data->count();
        $count_place = $data_place->count();
        $count_package = $data_package->count();
        $count_orders = $data_orders->count();
        $sum_fee = $data_orders->sum('fee_total');
        $sum_price = $data_orders->sum('price_total');



        $data = $data->paginate($per_page);
        
        return view($this->view_path.'index',compact('page_title','sum_price','sum_fee','count_orders','count_package','count_place','count_data','data','path','obj_model','obj_fn'));
    }
    
}