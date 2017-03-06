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
use DB;
use Input;
use Hash;

class AdminPackageDetailController extends Controller
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
      
        $this->page_title = 'Package'; // Page Title
        $this->a_search = ['package_name','price','fee','package_id']; // Array Search
        $this->path = '_admin/place/package'; // Url Path
        $this->view_path = 'backend.place.'; // View Path

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
        $this->model = 'App\Models\Voucher';
        $this->obj_modelvoucher = new $this->model;      
        
        $this->modelpackage = 'App\Models\Package';
        $this->obj_modelpackage = new $this->modelpackage; 
        $obj_modelpackage = $this->obj_modelpackage;

        $obj_fn = $this->obj_fn;
        $obj_modelvoucher = $this->obj_modelvoucher;

        $page_title = $this->page_title;
        $url_to = $this->path.'/'.$id;
        $method = 'PUT';
        $txt_manage = 'Update';


        $data = $obj_modelvoucher->find($id);

        $datapackage = $obj_modelpackage->where('package_id',$data->package_id);
        
        


       
        
        $order_by = Input::get('order_by');


        if(empty($order_by)) $order_by = $obj_modelpackage->primaryKey;
        $sort_by = Input::get('sort_by');
        if(empty($sort_by)) $sort_by = 'desc';
         $search = Input::get('search');

        if(!empty($search)) {
            $datapackage = $datapackage->where(function($query) use ($search){
               foreach($this->a_search as $field)
               {
                   $query = $query->orWhere($field,'like','%'.$search.'%');
               }
            });
        }
        $per_page = config()->get('constants.PER_PAGE');
        $datapackage = $datapackage->orderBy($order_by,$sort_by);
        $datapackage = $datapackage->paginate($per_page);
        $package_count = $datapackage->count();
        return view($this->view_path.'packagedetail',compact('page_title','package_count','datapackage','data','url_to','method','txt_manage','obj_modelvoucher','obj_fn'));
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
