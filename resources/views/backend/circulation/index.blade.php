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
//dd($data);
?>

  @extends('backend.layout.main-layout') 

  @section('page-style') 
  @endsection 

  @section('more-style') 
  @endsection 

  @section('page-title') 
  {{ $page_title }} 
  @endsection 

  @section('page-content')
  <div class="col-md-12">
    <div class="portlet light">
      <div class="form-search">
        <form action="{{ url()->to($path) }}" class="form-horizontal" method="GET">
          <div class="form-group">
            <label class="control-label col-md-1">Search</label>
            <div class="col-md-3">
              <input class="form-control" type="text" name="search" value="{{ Input::get('search') }}">
              <span class="help-block">Search by Place Id, Place Name</span>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-offset-1 col-md-3 ">
              <button class="btn blue btn-sm" type="submit"><i class="fa fa-search"></i> Search</button>
            </div>
          </div>
        </form>
        <hr>
      </div>

      <div class="portlet-title">
        <div class="caption">
          <i class="fa fa-database font-green-sharp"></i>
          <span class="caption-subject font-green-sharp bold">Found {{ $count_data }} Record(s).</span>
        </div>
      </div>
      <div class="portlet-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th class="text-center col-sm-2">{!! $obj_fn->sorting('place id','place.place_id',$order_by,$sort_by,$str_param_sort,'') !!}</th>
                <th>{!! $obj_fn->sorting('place Name','place.place_name',$order_by,$sort_by,$str_param_sort,'') !!}</th>
                <th>Total payment</th>
                <th>Total Fee</th>
                
              </tr>
            </thead>
            <tbody>
              @if($count_data > 0)
               @foreach($data as $key => $field)
              <tr>
                <td class="text-center">{{ $field->place_id }}</td>
                <td>{{ $field->firstname }}  {{ $field->place_name }}</a></td>               
                <td>{{ $field->sumprice }}</td>
                <td>{{ $field->sumfee }}</td>                
               
              </tr>
              @endforeach @else
              <tr>
                <td class="text-center" colspan="9">No Result.</td>
              </tr>
              @endif

            </tbody>
          </table>
        </div>
        {!! $data->appends(Input::except('page'))->render() !!}
      </div>
    </div>
  </div>
  @endsection 
  
  @section('page-plugin')
  @endsection 

  @section('more-script') 
  @endsection