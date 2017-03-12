<?php
$table = $obj_modelorder->table;
$primaryKey = $obj_modelorder->primaryKey;
$fillable = $obj_modelorder->fillable;

$order_by = Input::get('order_by');
$sort_by = Input::get('sort_by');

$a_param = Input::all();
$str_param = $obj_fn->parameter($a_param);
$a_param_sort = Input::except(['order_by','sort_by']);
$str_param_sort = $obj_fn->parameter($a_param_sort);

//dd($data_order);
?>
@extends('host.layout.main-layout') @section('page-style') @endsection @section('more-style') @endsection @section('page-title') Payment @endsection @section('page-content')
<div class="col-md-12">
  <div class="portlet light">
    <div class="form-search">
      <form action="" class="form-horizontal" method="GET">
        <div class="form-group">
          <label class="control-label col-md-1">Search</label>
          <div class="col-md-3">
            <input class="form-control" type="text" name="search" value="{{ Input::get('search') }}">
            <span class="help-block">Search by Orders Id </span>
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
        <span class="caption-subject font-green-sharp bold">Found {{ $order_count }} Record(s).</span>
      </div>
    </div>
    <div class="portlet-body">
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th class="text-center col-sm-2">{!! $obj_fn->sorting('Orders Id','order_id',$order_by,$sort_by,$str_param_sort,'') !!}</th>
              <th> Voucher name </th>
              <th> Package name </th>
              <th> Quantity </th>             
              <th> Price </th>              
              <th> Price Total </th>
            </tr>
          </thead>
          <tbody>
            @if($order_count > 0)
              @foreach($data_order as $key => $field)
            <tr>
              <td class="text-center"> {{ $field->order_id }} </td>
              <td>{{ $field->voucher_name }}</td>
              <td>{{ $field->package_name }}</td>
              <td>{{ $field->quantity }}</td>
              <td>{{ $field->price }}</td>
              <td>{{ $field->price_total }}</td>
            </tr>

             @endforeach
                @else
                  <tr>
                    <td class="text-center" colspan="9">No Result.</td>
                     </tr>
              @endif
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>
@endsection @section('page-plugin') @endsection @section('more-script') @endsection