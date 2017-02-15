<?php
namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Library\MainFunction;


use App\Models\Place;

use Input;
use Hash;

class PlaceVoucherController extends Controller
{
    public function __construct()
    {
        // $this->model = 'App\Models\Admin'; // Model
        $this->model = 'App\Models\Place';
        // $this->model = 'App\Models\Host';
        $this->obj_model = new $this->model; // Obj Model
        $this->obj_fn = new MainFunction(); // Obj Function
        $this->place_id = 
        $this->page_title = 'Department'; // Page Title
        $this->a_search = ['place_id','place_name','detail','type']; // Array Search
        $this->path = '_host/department'; // Url Path
        $this->view_path = 'host.department.'; // View Path
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

        $data = $this->obj_model;
        if(!empty($search))
        {
            $data = $data->where(function($query) use ($search){
               foreach($this->a_search as $field)
               {
                   $query = $query->orWhere($field,'like','%'.$search.'%');
               }
            });
        }
        $count_data = $data->count();
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

        $roles = PlaceVoucher::all();

        return view($this->view_path.'update',compact('page_title','url_to','method','txt_manage','obj_model','obj_fn','roles'));
    }
    // ------------------------------------ Record Data
    public function store(Request $request)
    {
        $obj_model = $this->obj_model;

        $input = $request->all(); // Get all post from form
        $input['password'] = Hash::make($request->password);

        $data = $obj_model->create($input);
        //// เพิ่มหลายตาราง
        $obj_model = 'App\Models\Admin';
       $data = $obj_model->create($input);
       $input['id']

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

        $roles = PlaceVoucher::all();

        return view($this->view_path.'update',compact('page_title','data','url_to','method','txt_manage','obj_model','obj_fn','roles'));
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