 <?php
$table = $obj_modelplace->table;
$primaryKey = $obj_modelplace->primaryKey;
$fillable = $obj_modelplace->fillable;



$a_param = Input::all();
$str_param = $obj_fn->parameter($a_param);


if(isset($data)) {
    foreach($fillable as $value){
        $$value = $data->$value;
    }
} else {
    foreach($fillable as $value){
        $$value = "";
    }
}
?>
@extends('backend.layout.main-layout') 
 @section('page-style') 
 {{ Html::style('assets/global/plugins/vendors/animate.css/animate.css')}} 
 @endsection 
 @section('more-style') 
 @endsection 
 @section('page-title')
 @endsection
@section('page-content')
  <div class="col-md-12">
    <div class="portlet light">
      <div class="portlet-body">
        <form action="" class="form-horizontal" method="GET">

          <table>
            <tr>
              <td>
                <img src="{{ url()->asset('assets/backend/img/desktop1.jpg') }}" alt="HTML5 Icon" style="width:480px;height:300px;">
              </td>
              
            
              <td class="text-left col-sm-6 col-md-6">
              
                <h2>{{$place_name}}</h2>
                <hr>

                <h4>สถานที่ตั้ง</h4> 

                @if( $address === NULL)
                  <p> - </p>
                @else
                  <p>
                   {{$address}}
                  </p>
                @endif


                <h4>สิ่งอำนวยความสะดวก</h4>

                @if( $service === NULL)
                  <p> - </p>
                @else
                  <p>
                   {{$service}}
                  </p>
                @endif

                <h4>บริการที่มีอยู่</h4>
                              
                @if( $facility === NULL)
                  <p> - </p>
                @else
                  <p>
                   {{$facility}}
                  </p>
                @endif
              </td>


            </tr>
          </table>

        </form>
      </div>
    </div>
  </div>



<div class="col-md-12">
  <div class="portlet light">
    <div class="form-search">
      <form action="" class="form-horizontal" method="GET">
        <div class="form-group">
          <label class="control-label col-md-1">Search</label>
          <div class="col-md-3">
            <input class="form-control" type="text" name="search" value="">
            <span class="help-block">Search by Package Id, Package name</span>
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
        <span class="caption-subject font-green-sharp bold">Found {{$package_count}} Record(s).</span>
      </div>
    </div>
    <div class="portlet-body">
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
          <thead>

            <tr>
              <th></th>
              <th>Package name</th>
              <th>Price</th>             
              <th>Fee Amount</th>              
            </tr>

          </thead>

          <tbody>
            @if($package_count > 0)
              @foreach($data_package as $key => $field)
                <tr>
                  <td class="text-center">{{ $field->$primaryKey }}</td>                  
                  <td>{{ $field->package_name }}</td>
                  <td>{{ $field->price }}</td>
                  <td>{{ $field->fee }}</td>
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
@endsection 
@section('page-plugin')
@endsection 
@section('more-script') 
@endsection