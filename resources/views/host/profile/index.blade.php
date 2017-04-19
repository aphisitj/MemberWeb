<?php
$table = $obj_model->table;
$primaryKey = $obj_model->primaryKey;
$fillable = $obj_model->fillable;
//dd($dataprice);

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
              
              <a href="{{ url()->to($path.'/uploadimg/'.$field->$primaryKey.'/edit?1'.$str_param) }}" class="btn btn-xs btn-circle green"><i class="glyphicon glyphicon-picture"></i>เปลี่ยนรูป</a> 

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
                @foreach( $dataprice as $key => $sum )    
                   <div class="tile-stats portlet light">
                      <div class="icon"><i class="glyphicon glyphicon-credit-card"></i></div>
                      <div class="divsize">{{ $sum->sumprice }}</div>
                      <h2>Total Payment</h2>
                      <p></p>                      
                  </div>                
                  
  
                
               
                  <div class="tile-stats portlet light">
                      <div class="icon"><i class="glyphicon glyphicon-gift"></i></div>
                      <div class="divsize">{{ $sum->sumfee }}</div>
                      <h2>Total Fee</h2>
                      <p></p>                      
                  </div>
             @endforeach 
                  
                  
              </div>

              <div class="divmargin  animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">

               <div class="tile-stats portlet light">
                      <div class="icon"><i class="glyphicon glyphicon-inbox"></i></div>
                      <div class="divsize">{{ $count_voucher }}</div>
                      <h2>Voucher</h2>
                      <p></p>                      
                  </div>
                   <div class="tile-stats portlet light">
                      <div class="icon"><i class="glyphicon glyphicon-piggy-bank"></i></div>
                      <div class="divsize">{{ $count_package }}</div>
                      <h2>Package</h2>
                      <p></p>                      
                  </div>

                
                                     
              </div>

              

               <div class="divmargin portlet light animated flipInY col-lg-5 col-md-12 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Popular<small>voucher</small></h2>
                   <hr>
                    <div class="clearfix"></div>
                  </div>

                  <div class="table-responsive">
                    <table class=" table table-hover">

                    <thead>
                        <tr>
                            <th class="text-center col-sm-2">อันดับ</th>
                            <th class="text-center ">Sale</th>
                            <th class="text-center ">Voucher Name</th>
                            
                        </tr>
                        </thead>
                        <thead>
                        @foreach($datapopularvr as $key => $field)
                                    <tr>
                                        <td class="text-center">{{ $ratingvoucher++ }}</td>
                                        <td class="text-center">{{ $field->count }}</td>
                                        <td class="text-center ">{{ $field->voucher_name }}</td>
                                                                             
                                    </tr>                              
                        @endforeach
                                    
                                                               
                       
                     </tbody>
                    </table>
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