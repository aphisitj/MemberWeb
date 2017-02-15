<?php
$table = $obj_model->table;
$primaryKey = $obj_model->primaryKey;
$fillable = $obj_model->fillable;

$order_by = Input::get('order_by');
$sort_by = Input::get('sort_by');

$a_param = Input::all();
$str_param = $obj_fn->parameter($a_param);
$a_param_sort = Input::except(['order_by','sort_by']);
$str_param_sort = $obj_fn->parameter($a_param_sort);

?>
  @extends('host.layout.main-layout') @section('page-style') @endsection @section('more-style') @endsection @section('page-title') {{ $page_title }} @endsection @section('page-content')
  <div class="col-md-12">
    <div class="portlet light">
      <div class="portlet-body">
        <form action="{{ url()->to($path) }}" class="form-horizontal" method="GET">

          <table>
            <tr>
              <td>
                <img src="{{ url()->asset('assets/backend/img/desktop1.jpg') }}" alt="HTML5 Icon" style="width:480px;height:300px;">
              </td>

              <td class="text-left col-sm-6 col-md-6">
              @foreach($data as $key => $field)
                <h2>{{ $field->place_name }}</h2>
                <hr>

                <h4>สถานที่ตั้ง</h4>
                <p>
                  {{ $field->address }}
                </p>
                <h4>สิ่งอำนวยความสะดวก</h4>
                <p>
                  {{ $field-> facility }}
                </p>
                <h4>บริการที่มีอยู่</h4>
                <p>
                  {{ $field->service }}
                </p>
                <a href="{{ url()->to($path.'/'.$field->$primaryKey.'/edit?1'.$str_param) }}" class="btn btn-xs btn-circle green"><i class="fa fa-edit"></i></a> 
                @endforeach
              </td>

            </tr>
          </table>

        </form>
      </div>
    </div>
  </div>
  </div>
  @endsection @section('page-plugin') @endsection @section('more-script') @endsection