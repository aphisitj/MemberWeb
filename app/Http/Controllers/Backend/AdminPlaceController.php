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
use App\Models\Package;
use DB;
use Input;
use Validator;
use Hash;

class AdminPlaceController extends Controller
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
      
        $this->page_title = 'Place'; // Page Title
        $this->a_search = ['package_name','price','fee','package_id']; // Array Search
        $this->a_searchplace = ['place_id','place_name','mobile','place_type']; // Array Search
        $this->path = '_admin/place'; // Url Path
        $this->view_path = 'backend.place.'; // View Path

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
         // Obj Model
        $obj_fn = $this->obj_fn;
        $obj_modelplace = $this->obj_modelplace;
        $obj_modeluser = $this->obj_modeluser;


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
        
        
        // $data = $this->obj_model;
        $data = $obj_modelplace;
                    
                         
        if(!empty($search))
        {
            $data = $data->where(function($query) use ($search){
               foreach($this->a_searchplace as $field)
               {
                   $query = $query->orWhere($field,'like','%'.$search.'%');
               }
            });
        }
        $count_data = $data->count();
        $data = $data->orderBy($order_by,$sort_by);
        $data = $data->paginate($per_page);

        return view($this->view_path.'index',compact('page_title','count_data','data','path','obj_modelplace','obj_fn'));
    }
    // ------------------------------------ View Add Page
    public function create()
    {


        $obj_fn = $this->obj_fn;
        $obj_modelplace = $this->obj_modelplace;
        $obj_modeluser = $this->obj_modeluser;
        $page_title = $this->page_title;
        $url_to = $this->path;
        $method = 'POST';
        $txt_manage = "Add";
        

        // $roles = Place::all();

        $roles = DB::table('user_place')
                ->join('user', 'user.user_id', '=', 'user_place.user_id')
                ->join('place', 'place.place_id', '=', 'user_place.place_id')
                ->get();



        return view($this->view_path.'create',compact('page_title','url_to','method','txt_manage','obj_modeluser','obj_modelplace','user_model','obj_fn','roles'));
    }
    // ------------------------------------ Record Data
    public function store(Request $request)
    {
        $obj_modelplace = $this->obj_modelplace;
        $obj_modeluser = $this->obj_modeluser;
        $obj_modelplaceuser = $this->obj_modelplaceuser;

      
        $input = $request->all();

        $dataplace = $obj_modelplace->create($input);
        $datauser = $obj_modeluser->create($input);
        $dataplaceuser = $obj_modelplaceuser->create($input);




        $this->modeluser = 'App\Models\User';
        $this->obj_modeluser = new $this->modeluser;        
        $datauser->firstname = $request->firstname;
        $datauser->lastname = $request->lastname;
        $datauser->email = $request->email;
        $datauser->verification = 1 ;
        $dataverify = str_random(30);
        $datauser->verify_email = $dataverify ;
        $datauser['password'] = Hash::make($request->password);   
        $datauser->mobile = $request->mobile;
        $datauser->save();

        


        $this->modelplace = 'App\Models\Place';
        $this->obj_modelplace = new $this->modelplace;        
        $dataplace->place_name = $request->place_name;
        $dataplace->place_type = $request->placetype;
        $dataplace->mobile = $request->mobile;
        $dataplace->save();



        $this->modelplaceuser = 'App\Models\Place_User';
        $this->obj_modelplaceuser = new $this->modelplaceuser;                
        $dataplaceuser->user_id = $datauser->user_id;
        $dataplaceuser->place_id = $dataplace->place_id ;      
        $dataplaceuser->save();

       
        return redirect()->to($this->path);
    }
    // ------------------------------------ Show Data : ID
    public function show($id)
    {
    
    }
    // ------------------------------------ View Update Page
    public function edit($id){
        $this->model = 'App\Models\Place';
        $this->obj_modelplace = new $this->model;      
        $this->modelpackage = 'App\Models\Package';
        $this->obj_modelpackage = new $this->modelpackage; 
        $obj_modelpackage = $this->obj_modelpackage;

        $obj_fn = $this->obj_fn;
        $obj_modelplace = $this->obj_modelplace;
        
        $per_page = config()->get('constants.PER_PAGE');
        $page_title = $this->page_title;
        $url_to = $this->path.'/'.$id;
        $method = 'PUT';
        $txt_manage = 'Update';

        $datapackage = $obj_modelpackage->where('place_id',$id);

        $data = $obj_modelplace->find($id);

        // $roles = Place::all();
        $roles = DB::table('user_place')
                ->join('user', 'user.user_id', '=', 'user_place.user_id')
                ->join('place', 'place.place_id', '=', 'user_place.place_id')
                ->get();

        $path = $this->path;
        
       

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

        $datapackage = $datapackage->orderBy($order_by,$sort_by);
        $datapackage = $datapackage->paginate($per_page);
        $package_count = $datapackage->count();
        return view($this->view_path.'detail',compact('path','page_title','datapackage','package_count','data','url_to','method','txt_manage','obj_modelplace','obj_fn','roles'));
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
