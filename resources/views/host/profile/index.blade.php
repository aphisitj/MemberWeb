<?php
$table = $obj_model->table;
$primaryKey = $obj_model->primaryKey;
$fillable = $obj_model->fillable;
//dd($place_id);

$a_param = Input::all();
$str_param = $obj_fn->parameter($a_param);
?>
  @extends('host.layout.main-layout') 
  @section('page-style')
  {{ Html::style('assets/global/plugins/vendors/animate.css/animate.css')}} 
   @endsection 
   @section('more-style') 
   @endsection 
   @section('page-title') 
   HOST
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
              
              @foreach( $data as $key => $field )
                 <h2>{{ $field->place_name }}</h2>
                <hr>

                <h4>สถานที่ตั้ง</h4> 

                @if( $field->address === '')
                  <p> - </p>
                @else
                  <p>
                   {{ $field->address }}
                  </p>
                @endif


                <h4>สิ่งอำนวยความสะดวก</h4>

                @if( $field->service === NULL)
                  <p> - </p>
                @else
                  <p>
                   {{ $field->service }}
                  </p>
                @endif

                <h4>บริการที่มีอยู่</h4>
                              
                @if( $field->facility === NULL)
                  <p> - </p>
                @else
                  <p>
                   {{ $field->facility }}
                  </p>
                @endif

                <a href="{{ url()->to($path.'/'.$field->$primaryKey.'/edit?1'.$str_param) }}" class="btn btn-xs btn-circle green"><i class="fa fa-edit"></i></a> 
              
              @endforeach
               
              </td> 

            </tr>
          </table>

        </form>        
      </div>
    </div>

    <div class="divmargin portlet light animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <div class="tile-stats">
                      <i class="glyphicon glyphicon-credit-card"></i>
                      <h1>4785</h1>
                      <h4>Total Payment</h4>
                      <p></p>
                  </div>
                  <hr class="colorhr">
                  <div class="tile-stats">
                      <i class="glyphicon glyphicon-gift"></i>
                      <h1>{{ $count_voucher }}</h1>
                      <h4>Voucher</h4>
                      <p></p>
                  </div>
                  
                  
              </div>

              <div class="divmargin portlet light animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                        <i class="glyphicon glyphicon-inbox"></i>
                        <h1>44</h1>
                        <h4>Fee</h4>
                        <p></p>
                    </div>
                    <hr>
                    <div class="tile-stats">
                        <i class="glyphicon glyphicon-piggy-bank"></i>
                        <h1>{{ $count_package }}</h1>
                        <h4>Package</h4>
                        <p></p>
                    </div>
                                     
              </div>

              

              <div class="divmargin portlet light animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Popular<small>package</small></h2>
                   <hr>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <article class="media event">
                      <a class="pull-left date">
                        <p></p>
                        <p>1</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Package 1</a>
                        <p>โรงแรมอมารี ดอนเมือง แอร์พอร์ต กรุงเทพฯ</p>
                      </div>
                    </article>
                    <article class="media event">
                      <a class="pull-left date">
                        <p></p>
                        <p>2</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Package 2</a>
                        <p>โรงแรมอมารี ดอนเมือง แอร์พอร์ต กรุงเทพฯ</p>
                      </div>
                    </article>
                    <article class="media event">
                      <a class="pull-left date">
                        <p></p>
                        <p>3</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Package 3</a>
                        <p>โรงแรมอมารี ดอนเมือง แอร์พอร์ต กรุงเทพฯ</p>
                      </div>
                    </article>
                    
                    
                  </div>
                </div>
              </div>  

    


  </div>
  </div>
  @endsection @section('page-plugin') @endsection @section('more-script') @endsection