<?php
namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Library\MainFunction;
use Mail;
use App\Models\User;
use App\Models\Place;
use App\Models\Place_User;
use App\Models\PlaceVoucher;
use App\Models\Place_Picture;
use App\Models\Package;
use App\Models\Order_voucher;
use App\Models\Order_package;
use App\Models\Orders;
use DB;
use Input;
use Validator;
use Hash;

class AdminCirculationController extends Controller
{
    public function __construct()
    {
        // $this->model = 'App\Models\Admin'; // Model
        $this->model = 'App\Models\Orders';
        $this->obj_model = new $this->model; // Obj Model
        $this->modelplace = 'App\Models\Place';
        $this->obj_modelplace = new $this->modelplace;
      

        $this->obj_fn = new MainFunction(); // Obj Function
      
        $this->page_title = 'Circulation'; // Page Title
        $this->a_search = ['place.place_name','place.place_id']; // Array Search
   
        $this->path = '_admin/circulation'; // Url Path
        $this->view_path = 'backend.circulation.'; // View Path

        $this->user_id = session()->get('s_host_id');
        $this->user = Place_User::find($this->user_id);
        $this->session_id = $session_id = session()->getId();
    }

    // ------------------------------------ Show All List Page
    public function index()
    {
        
         
        $obj_fn = $this->obj_fn;
        $obj_model = $this->obj_model;
        $obj_modelplace = $this->obj_modelplace;
      


        $path = $this->path;
        $page_title = $this->page_title;
        $per_page = config()->get('constants.PER_PAGE');

        $order_by = Input::get('order_by');
        if(empty($order_by)) $order_by = $obj_modelplace->primaryKey;

        $sort_by = Input::get('sort_by');
        if(empty($sort_by)) $sort_by = 'desc';

        $search = Input::get('search');

        $user = $this->user;
        $user_id = $this->user_id;
        // $data = $obj_model
        //          ->join('order_package', 'orders.order_id', '=', 'order_package.order_id')
        //             ->join('package', 'order_package.package_id', '=', 'package.package_id')
        //             ->join('place', 'package.place_id', '=', 'place.place_id')
        //             ->select('*', DB::raw('SUM(orders.price_total) as sumprice'),DB::raw('SUM(orders.fee_total) as sumfee'))                 
        //             ->groupBy('place.place_id');
        $data = $obj_modelplace
                    ->leftJoin('package', 'place.place_id', '=', 'package.place_id')
                    ->join('order_package', 'package.package_id', '=', 'order_package.package_id')
                    ->join('orders', 'order_package.order_id', '=', 'orders.order_id')
                    ->select('*', DB::raw('SUM(orders.price_total) as sumprice'),DB::raw('SUM(orders.fee_total) as sumfee'))                 
                    ->groupBy('place.place_id');

                

    
                
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
       
        //$data = $data->orderBy($order_by,$sort_by);
        $data = $data->paginate($per_page);

        return view($this->view_path.'index',compact('page_title','count_data','data','path','obj_model','obj_fn'));
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
    public function edit($id){
       
    }
   

    // ------------------------------------ Record Update Data
    public function update(Request $request,$id)
    {
       
    }
    // ------------------------------------ Delete Data
    public function destroy($id)
    {
        
    }
}
