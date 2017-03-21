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
   {{ $page_title }} 
   @endsection 
   @section('page-content')
  <div class="col-md-12">
    <div class="portlet light">
      <div class="portlet-body">
        <form action="" class="form-horizontal" method="GET">

          <table>
          
            <tr>
              <td>
          @foreach( $data as $key => $field ) 

              @if( $img_count > 0)
              @foreach( $img_place as $key => $img )  
                <img class="mySlides" src="{{ url()->asset('assets/backend/img/place/'.$img->src) }}" alt="HTML5 Icon" style="width:480px;height:300px;">
                
                @endforeach 
              @else
               <img class="mySlides" src="{{ url()->asset('assets/backend/layout3/img/logo-default.png') }}" alt="HTML5 Icon" style="width:480px;height:300px;">
              @endif
              
              <a href="{{ url()->to($path.'/uploadimg/'.$field->$primaryKey.'/edit?1'.$str_param) }}" class="btn btn-xs btn-circle green"><i class="fa fa-edit"></i>เปลี่ยนรูป</a> 

              </td>
               
            
             <td class="text-left col-sm-6 col-md-6">
              
             
                 <h2>{{ $field->place_name }} <small></small></h2>
                <hr>

                <h4>สถานที่ตั้ง</h4> 

                @if( $field->address === NULL )
                  <p> - </p>
                @else
                  <p>
                   {{ $field->address }}
                  </p>
                @endif

                <h4>สิ่งอำนวยความสะดวก</h4>

                @if( $field->service === NULL )
                  <p> - </p>
                @else
                  <p>
                   {{ $field->service }}
                  </p>
                @endif

                <h4>บริการที่มีอยู่</h4>
                              
                @if( $field->facility === NULL )
                  <p> - </p>
                @else
                  <p>
                  
                   {{ $field->facility }}
                  </p>
                @endif
                
                <h4>ประเภท</h4>

               
                  <p>
                  {{ $field->place_type_name_th }}
                  </p>
                

                <a href="{{ url()->to($path.'/'.$field->$primaryKey.'/edit?1'.$str_param) }}" class="btn btn-xs btn-circle green"><i class="fa fa-edit"></i></a> 
              
              @endforeach
               
              </td> 

            </tr>
           
          </table>

        </form>        
      </div>
    </div>

    <div class="divmargin animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  
                   <div class="tile-stats portlet light">
                      <div class="icon"><i class="glyphicon glyphicon-credit-card"></i></div>
                      <div class="divsize">{{ $count_voucher }}</div>
                      <h2>Total Payment</h2>
                      <p></p>                      
                  </div>
                 
                  
  
                  <div class="tile-stats portlet light">
                      <div class="icon"><i class="glyphicon glyphicon-gift"></i></div>
                      <div class="divsize">{{ $count_voucher }}</div>
                      <h2>Voucher</h2>
                      <p></p>                      
                  </div>

                  
                  
              </div>

              <div class="divmargin  animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">

               <div class="tile-stats portlet light">
                      <div class="icon"><i class="glyphicon glyphicon-inbox"></i></div>
                      <div class="divsize">44</div>
                      <h2>Fee</h2>
                      <p></p>                      
                  </div>
                   <div class="tile-stats portlet light">
                      <div class="icon"><i class="glyphicon glyphicon-piggy-bank"></i></div>
                      <div class="divsize">{{ $count_package }}</div>
                      <h2>Package</h2>
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
  @endsection 
  @section('page-plugin') 
  <script>
        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
               x[i].style.display = "none";  
            }
            myIndex++;
            if (myIndex > x.length) {myIndex = 1}    
            x[myIndex-1].style.display = "block";  
            setTimeout(carousel, 2000); // Change image every 2 seconds
        }
  </script>

  @endsection
   @section('more-script') 
   @endsection