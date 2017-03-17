<?php
namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Library\MainFunction;

use App\Models\User;
use App\Models\Place;
use App\Models\Order_voucher;
use App\Models\Order_package;
use App\Models\Place_User;
use App\Models\Orders;
use App\Models\Package;
use App\Models\Voucher;
use DB;
use Input;
use Hash;

class HostPaymentController extends Controller
{
    public function __construct()
    {
        // $this->model = 'App\Models\Admin'; // Model
        $this->modelplace = 'App\Models\Place';
        $this->obj_modelplace = new $this->modelplace; // Obj Model
        $this->modeluser = 'App\Models\User';
        $this->obj_modeluser = new $this->modeluser;
        $this->modelplaceuser = 'App\Models\Place_User';
        $this->obj_modelplaceuser = new $this->modelplaceuser;

        $this->obj_fn = new MainFunction(); // Obj Function
      
        $this->page_title = 'Payment'; // Page Title
        $this->a_search = ['order_id']; // Array Search
        $this->path = '_admin/payment'; // Url Path
        $this->view_path = 'host.payment.'; // View Path

        $this->user_id = session()->get('s_host_id');
        $this->user = Place_User::find($this->user_id);
        $this->session_id = $session_id = session()->getId();
    }

    // ------------------------------------ Show All List Page
    public function index()
    {
        $this->modelplace = 'App\Models\Place';
        $this->obj_modelplace = new $this->modelplace;
        $this->modeluser = 'App\Models\User';
        $this->obj_modeluser = new $this->modeluser;
        $this->modelorder = 'App\Models\Orders';
        $this->obj_modelorder = new $this->modelorder;
         // Obj Model
        $obj_fn = $this->obj_fn;
        $obj_modelplace = $this->obj_modelplace;
        $obj_modeluser = $this->obj_modeluser;
        $obj_modelorder = $this->obj_modelorder;

        $this->user_id = session()->get('s_host_id'); 
        $this->session_id = $session_id = session()->getId();

        $user_id = $this->user_id;
        $this->user = Place_User::find($user_id);
        $user = $this->user;        
        $user = DB::table('user_place')->where('user_id',$user_id)->first();
        $place_id = $user->place_id ;
        $user = $this->user;
        $user_id = $this->user_id;
        $data_order = DB::table('orders')
            ->join('order_package', 'orders.order_id', '=', 'order_package.order_package_id')
            ->join('order_voucher', 'order_package.order_package_id', '=', 'order_voucher.order_voucher_id')
            ->join('voucher', 'voucher.voucher_id', '=', 'order_voucher.voucher_id')
            ->join('package', 'package.package_id', '=', 'order_package.package_id')
            ->join('place', 'place.place_id', '=', 'package.place_id')            
            ->Where('place.place_id',$place_id)                      
            ->get();
        $order_count = DB::table('orders')
            ->join('order_package', 'orders.order_id', '=', 'order_package.order_package_id')
            ->join('order_voucher', 'order_package.order_package_id', '=', 'order_voucher.order_voucher_id')
            ->join('voucher', 'voucher.voucher_id', '=', 'order_voucher.voucher_id')
            ->join('package', 'package.package_id', '=', 'order_package.package_id')
            ->join('place', 'place.place_id', '=', 'package.place_id')            
            ->Where('place.place_id',$place_id)   
            ->count();        
        $data = $obj_modelorder;
        $count_data = $data->count();  



        $path = $this->path;
        $page_title = $this->page_title;
        $per_page = config()->get('constants.PER_PAGE');

        $order_by = Input::get('order_by');
        if(empty($order_by)) $order_by = $obj_modelorder->primaryKey;
        $sort_by = Input::get('sort_by');
        if(empty($sort_by)) $sort_by = 'desc';

        $search = Input::get('search');

                 
                         
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

        return view($this->view_path.'index',compact('data_order','order_count','page_title','count_data','data','path','obj_modelorder','obj_fn'));
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
