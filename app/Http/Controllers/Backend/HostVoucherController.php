<?php
namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Library\MainFunction;

use App\Models\User;
use App\Models\Place;
use App\Models\Place_User;
use App\Models\Voucher;
use App\Models\Voucher_Picture;
use App\Models\Package;
use DB;
use Input;
use Hash;

class HostVoucherController extends Controller
{
    public function __construct()
    {
        // $this->model = 'App\Models\Admin'; // Model
        $this->model = 'App\Models\Voucher';
        // $this->model = 'App\Models\Host';
        $this->obj_model = new $this->model; // Obj Model
        $this->modelpackage = 'App\Models\Package';        
        $this->obj_modelpackage = new $this->modelpackage; 
        $this->obj_fn = new MainFunction(); // Obj Function
      
        $this->page_title = 'Voucher'; // Page Title
        $this->a_search = ['voucher_id','place_id','voucher_name','allot','package_id']; // Array Search
        $this->a_searchpackage = ['package_id','package_name'];
        $this->path = '_host/voucher'; // Url Path
        $this->view_path = 'host.voucher.'; // View Path

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
        $data = $obj_model->where('place_id', $place_id);
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
        
       
        $roles = Voucher::all();

        return view($this->view_path.'create',compact('page_title','url_to','method','txt_manage','obj_model','obj_fn','roles'));
    }
    // ------------------------------------ Record Data
    public function store(Request $request )
    {
        $obj_model = $this->obj_model;

        $input = $request->all(); // Get all post from form
        $input['password'] = Hash::make($request->password);
        $user_id = $this->user_id;
        $user = DB::table('user_place')->where('user_id',$user_id)->first();
        $place_id = $user->place_id ;


        $data = $obj_model->create($input);
        $data->place_id = $place_id ;
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
        $obj_modelpackage = $this->obj_modelpackage;

        
        $per_page = config()->get('constants.PER_PAGE');
        $page_title = $this->page_title;
        $url_to = $this->path.'/'.$id;
        $method = 'PUT';
        $txt_manage = 'Update';
        $path = $this->path;

        $order_by = Input::get('order_by');
        if(empty($order_by)) $order_by = $obj_modelpackage->primaryKey;
        $sort_by = Input::get('sort_by');
        if(empty($sort_by)) $sort_by = 'desc';

        $search = Input::get('search');

       
        $user_id = $this->user_id;
        $userplace = DB::table('user_place')->where('user_id',$user_id)->first();
        $place_id = $userplace->place_id ;     
        $datapackage = $obj_modelpackage->where('place_id', $place_id)->where('public', 1);
        $count_data = $datapackage->count();          
        $data = $obj_model->find($id);
        $roles = Voucher::all();
        $images = Voucher_Picture::where('voucher_id',$id)->get();
        $images_count = Voucher_Picture::where('voucher_id',$id)->count(); 
                        
        if(!empty($search))
        {
            $datapackage = $datapackage->where(function($query) use ($search){
               foreach($this->a_searchpackage as $field)
               {
                   $query = $query->orWhere($field,'like','%'.$search.'%');
               }
            });
        }

        
        $datapackage = $datapackage->orderBy($order_by,$sort_by);
        $datapackage = $datapackage->paginate($per_page);
        


        return view($this->view_path.'update',compact('obj_modelpackage','images','count_data','datapackage','path','images_count','page_title','data','url_to','method','txt_manage','obj_model','obj_fn','roles'));
    }
    // ------------------------------------ Record Update Data
    public function update(Request $request,$id)
    {
        $obj_model = $this->obj_model;

        $input = $request->except(['_token','_method','str_param']); // Get all post from form
        $input['password'] = Hash::make($request->password);

        $data = $obj_model->find($id)->update($input);

          if($request->exists('btn-upload')){
            $file = $request->file('uploader');
            $path = 'assets/backend/img/voucher';
            if($file === null){
                 return redirect()->back();
            }
            $filename = $file->getClientOriginalName();
            $file->move('assets/backend/img/voucher',$file->getClientOriginalName());
            $image = new Voucher_Picture;
            $image->src = $filename;
            $image->voucher_id = $id;
            $image->save();
            echo 'Uploaded';
            return redirect()->back();
        }

        if($request->exists('btn-delete')){
         $delplaceuser = Place_Picture::where('voucher_id', $id)->delete();
            echo 'Delete';
            return redirect()->back();
        }
        if($request->exists('btn-add')){
        $obj_model = $this->obj_model;

        $input = $request->except(['_token','_method','str_param']); 
        $input['password'] = Hash::make($request->password);

        $data = $obj_model->find($id)->update($input);
            return redirect()->back();
        }

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
