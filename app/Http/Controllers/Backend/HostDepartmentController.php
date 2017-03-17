<?php
namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Library\MainFunction;

use App\Models\User;
use App\Models\Place;
use App\Models\Place_User;
use DB;
use Input;
use Hash;

class HostDepartmentController extends Controller
{
    public function __construct()
    {
        // $this->model = 'App\Models\Admin'; // Model
        $this->model = 'App\Models\Place';
        // $this->model = 'App\Models\Host';
        $this->obj_model = new $this->model; // Obj Model
        $this->obj_fn = new MainFunction(); // Obj Function
        $this->modeluser = 'App\Models\User';
        $this->obj_modeluser = new $this->modeluser;
        $this->modelplaceuser = 'App\Models\Place_User';
        $this->obj_modelplaceuser = new $this->modelplaceuser;
      
        $this->page_title = 'Department'; // Page Title
        $this->a_search = ['place_name','place_id']; // Array Search
        $this->path = '_host/department'; // Url Path
        $this->view_path = 'host.department.'; // View Path

        $this->user_id = session()->get('s_host_id');
        $this->user = Place_User::find($this->user_id);
        $this->session_id = $session_id = session()->getId();
    }

    // ------------------------------------ Show All List Page
    public function index()
    {
        $obj_fn = $this->obj_fn;
        $obj_model = $this->obj_model;

        $path = $this->path;
        $page_title = $this->page_title;
        $per_page = config()->get('constants.PER_PAGE');

        $order_by = Input::get('order_by');
        if(empty($order_by)) $order_by = $obj_model->primaryKey;
        $sort_by = Input::get('sort_by');
        if(empty($sort_by)) $sort_by = 'desc';

        $search = Input::get('search');

       
        $user_id = $this->user_id;
        $user = DB::table('user_place')->where('user_id',$user_id)->first();
        $place_id = $user->place_id ;
        $data = $obj_model->where('department_id', $place_id);
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
        $obj_modeluser = $this->obj_modeluser;

        $page_title = $this->page_title;
        $url_to = $this->path;
        $method = 'POST';
        $txt_manage = "Add";
        $dataplacetype = DB::table('place_type')->get();

        $roles = Place_User::all();

        return view($this->view_path.'update',compact('page_title','dataplacetype','url_to','method','obj_modeluser','txt_manage','obj_model','obj_fn','roles'));
    }
    // ------------------------------------ Record Data
    public function store(Request $request )
    {
   

        $input = $request->all(); // Get all post from form
        $input['password'] = Hash::make($request->password);
        $user_id = $this->user_id;
        $user = DB::table('user_place')->where('user_id',$user_id)->first();
        $place_id = $user->place_id ;


        $obj_modelplace = $this->obj_model;
        $obj_modeluser = $this->obj_modeluser;
        $obj_modelplaceuser = $this->obj_modelplaceuser;     
   

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
        $datauser->type = 2 ; 
        $datauser['password'] = Hash::make($request->password);   
        $datauser->mobile = $request->mobile;
        $datauser->save();

        


        $this->modelplace = 'App\Models\Place';
        $this->obj_modelplace = new $this->modelplace;        
        $dataplace->place_name = $request->place_name;
        $dataplace->place_type = $request->placetype;
        $dataplace->department_id = $place_id ;
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
    public function edit($id)
    {
        $obj_fn = $this->obj_fn;
        $obj_model = $this->obj_model;
		$obj_modeluser = $this->obj_modeluser;

        $page_title = $this->page_title;
        $url_to = $this->path.'/'.$id;
        $method = 'PUT';
        $txt_manage = 'Update';
        $user_id = $this->user_id;
        $user_id = $roles->user_id ;


        $dataplacetype = DB::table('place_type')->get();
        $roles = Place_User::where('place_id',$id)->first();        
        $data = $obj_model->find($id);
        $datauser = $obj_modeluser->find($user_id);

        return view($this->view_path.'update',compact('user','dataplacetype','datauser','obj_modeluser','page_title','data','url_to','method','txt_manage','obj_model','obj_fn','roles'));
    }
    // ------------------------------------ Record Update Data
    public function update(Request $request,$id)
    {
        $obj_model = $this->obj_model;
        $obj_modeluser = $this->obj_modeluser;

        $input = $request->except(['_token','_method','str_param']); // Get all post from form
        $input['password'] = Hash::make($request->password);        
        
        $roles = Place_User::where('place_id',$id)->first();
        $user_id = $roles->user_id ;

		$data = $obj_model->find($id)->update($input);
		$user = $obj_modeluser->find($user_id)->update($input);

        $str_param = $request->str_param;
        return redirect()->to($this->path.'?1'.$str_param);
    }
    // ------------------------------------ Delete Data
    public function destroy($id)
    {
        session()->put('ref_url',url()->previous());
        $obj_model = $this->obj_model;
        $obj_model->find($id)->delete();
        $placeuser = Place_user::where('place_id', $id)->first();
        $userid = $placeuser->user_id ;

        $delplaceuser = Place_user::where('place_id', $id)->delete();
        $delplaceuser = user::where('user_id', $userid)->delete();



        return redirect()->to(session()->get('ref_url'));
    }
}
