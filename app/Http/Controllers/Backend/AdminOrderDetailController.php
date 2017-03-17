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
use App\Models\Package;
use App\Models\Voucher;
use App\Models\Orders;
use App\Models\Order_package;
use App\Models\Order_voucher;
use DB;
use Input;
use Hash;

class AdminOrderDetailController extends Controller
{
    public function __construct()
    {
        // $this->model = 'App\Models\Admin'; // Model
        $this->modelplace = 'App\Models\Place';
        $this->obj_modelplace = new $this->modelplace; // Obj Model
        $this->modeluser = 'App\Models\User';
        $this->obj_modeluser = new $this->modeluser;
     	$this->modelorder = 'App\Models\Orders';
        $this->obj_modelorder = new $this->modelorder;
        $this->obj_fn = new MainFunction(); // Obj Function
      
        $this->page_title = 'Orders'; // Page Title
        $this->a_search = ['order_id']; // Array Search
        $this->path = '_admin/listuser/order'; // Url Path
        $this->view_path = 'backend.listuser.'; // View Path

        $this->user_id = session()->get('s_host_id');
        $this->user = Place_User::find($this->user_id);
        $this->session_id = $session_id = session()->getId();
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
    public function edit($id){
        $this->modeluser = 'App\Models\User';
        $this->obj_modeluser = new $this->modeluser;      
        $this->modelorders = 'App\Models\Orders';
        $this->obj_modelorders = new $this->modelorders; 


        $obj_fn = $this->obj_fn;
        $obj_modeluser = $this->obj_modeluser;
        $obj_modelorders  = $this->obj_modelorders ;

        $page_title = $this->page_title;
        $url_to = $this->path.'/'.$id;
        $method = 'PUT';
        $txt_manage = 'Detail';


        $dataorders = $obj_modelorders->Where('user_id',$id) ;
        $order_count = $dataorders->count();
        $data = $obj_modeluser->find($id);
        $datauser = DB::table('orders')
                    ->Where('user_id',$id)
                    ->get();


        if(empty($order_by)) $order_by = $obj_modelorders->primaryKey;
        $sort_by = Input::get('sort_by');
        if(empty($sort_by)) $sort_by = 'desc';
         $search = Input::get('search');

        if(!empty($search)) {
            $dataorders  = $dataorders->where(function($query) use ($search){
               foreach($this->a_search as $field)
               {
                   $query = $query->orWhere($field,'like','%'.$search.'%');
               }
            });
        }


        
        $dataorders = $dataorders->orderBy($order_by,$sort_by);
        $dataorders = $dataorders->paginate($per_page);
        $per_page = config()->get('constants.PER_PAGE');            
      
        

        return view($this->view_path.'order',compact('page_title','data','data_order','dataorders','order_count','datauser','url_to','method','txt_manage','obj_modeluser','obj_fn'));
    }



   

    // ------------------------------------ Record Update Data
    public function update(Request $request,$id)
    {
        $obj_modelplace = $this->obj_modelplace;

        $input = $request->except(['_token','_method','str_param']); // Get all post from form
        $input['password'] = Hash::make($request->password);
        $data = $obj_modelplace->find($id)->update($input);

        $str_param = $request->str_param;

        return redirect()->to($this->path.'?1'.$str_param);
    }
    // ------------------------------------ Delete Data
    public function destroy($id)
    {
        session()->put('ref_url',url()->previous());
        $obj_modelplace = $this->obj_modelplace;
        $obj_modelplace->find($id)->delete();

        return redirect()->to(session()->get('ref_url'));
    }
}
