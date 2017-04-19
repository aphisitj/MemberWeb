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
use App\Models\Orders;
use App\Models\Order_package;
use App\Models\Order_voucher;
use App\Models\Place_Type;
use App\Models\Voucher;
use App\Models\Package;
use Input;
use Hash;
use DB;

class ProfileHostController extends Controller
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
        
        
        
        $this->page_title = 'Profile'; // Page Title
        $this->a_search = ['place_id','place_name','address','facility','service','type']; // Array Search
        $this->path = '_host'; // Url Path
        $this->view_path = 'host.profile.'; // View Path

       
        
    }

    // ------------------------------------ Show All List Page
    public function index()
    {
        
        $obj_fn = $this->obj_fn;
        $obj_modelplaceuser = $this->obj_modelplaceuser;
        $obj_model = $this->obj_model;
        $obj_modelvoucher = $this->obj_modelvoucher;
        $obj_modelpackage = $this->obj_modelpackage;

        $path = $this->path;
        $page_title = $this->page_title;
        
       
        $user_id = $this->user_id;
        $user = DB::table('user_place')->where('user_id',$user_id)->first();
        $place_id = $user->place_id ;

        $count_package = $obj_modelpackage->where('place_id',$place_id)->count();
        $count_voucher = $obj_modelvoucher->where('place_id',$place_id)->count();


        $wow = $obj_modelvoucher->where('place_id',$place_id)->count();
        $data = DB::table('place')                    
                    ->join('user_place', 'place.place_id', '=', 'user_place.place_id')
                    ->join('place_type', 'place_type.place_type_id', '=', 'place.place_type')
                    ->where('user_place.user_id', $user_id)
                    ->get();

        $img_place = DB::table('place_picture')->where('place_id', $place_id)
                    ->get();
        $img_count = DB::table('place_picture')->where('place_id', $place_id)
                    ->count();
        $dataplacetype = DB::table('place_type')->get();

        $datapopularvr = Order_voucher::join('voucher', 'voucher.voucher_id', '=', 'order_voucher.voucher_id')
                    ->join('place', 'place.place_id', '=', 'voucher.place_id')
                    ->select('*', DB::raw('COUNT(order_voucher.voucher_id) as count'))
                    ->where('place.place_id', $place_id)
                    ->groupBy('order_voucher.voucher_id')
                    ->orderBy('count', 'desc')
                    ->take(5)->get();

        $dataprice = $obj_model
                    ->leftJoin('package', 'place.place_id', '=', 'package.place_id')
                    ->join('order_package', 'package.package_id', '=', 'order_package.package_id')
                    ->join('orders', 'order_package.order_id', '=', 'orders.order_id')
                    ->select('*', DB::raw('SUM(orders.price_total) as sumprice'),DB::raw('SUM(orders.fee_total) as sumfee')) 
                    ->where('place.place_id', $place_id)                
                    ->groupBy('place.place_id')
                    ->get();


        $ratingvoucher = 1;
                    


        return view($this->view_path.'index',compact('dataprice','ratingvoucher','datapopularvr','dataplacetype','page_title','img_place','img_count','count_package','count_voucher','data','path','obj_model','obj_fn','dddd'));
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
        $images = Place_Picture::where('place_id',$id)->get();
        $roles = Place::all();
        $dataplacetype = DB::table('place_type')->get();
                
 
       
    
        return view($this->view_path.'update',compact('dataplacetype','page_title','images','data','url_to','method','txt_manage','obj_model','obj_fn','roles'));
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
