@extends('backend.layout.main-layout') 

@section('page-style') 
{{ Html::style('assets/global/plugins/vendors/animate.css/animate.css')}} 
@endsection 

@section('more-style')
@endsection 

@section('page-title','Home Page') 

@section('page-content')
    <div class="col-md-12">


             <div class="animated flipInY col-lg-2 col-md-2 col-sm-3 col-xs-6">
                  <div class="tile-stats portlet light">
                      <i class="glyphicon glyphicon-credit-card"></i>
                      <h1>{{$sum_price}}</h1>
                      <h4>Total Payment</h4>
                      <p></p>
                  </div>
                 
                  <div class="tile-stats portlet light">
                      <i class="glyphicon glyphicon-inbox"></i>
                      <h1>{{$count_orders}}</h1>
                      <h4>Orders</h4>
                      <p></p>
                  </div>
                
                  <div class="tile-stats portlet light">
                      <i class="glyphicon glyphicon-user"></i>
                      <h1 class="">{{$count_data}}</h1>
                      <h4>Users</h4>
                      <p></p>
                      
                  </div>
              </div>

              <div class="animated flipInY col-lg-2 col-md-2 col-sm-3 col-xs-6">
                <div class="portlet light  tile-stats">
                        <i class="glyphicon glyphicon-piggy-bank"></i>
                        <h1>{{$sum_fee}}</h1>
                        <h4>Fee</h4>
                        <p></p>
                    </div>
              
                    <div class="portlet light  tile-stats">
                        <i class="glyphicon glyphicon-map-marker"></i>
                        <h1>{{$count_place}}</h1>
                        <h4>Place</h4>
                        <p></p>
                    </div>
                 
                    <div class=" portlet light tile-stats">
                      <i class="glyphicon glyphicon-gift"></i>
                      <h1>{{$count_package}}</h1>
                      <h4>Package</h4>
                      <p></p>
                    </div>
              </div>

    <div >
                   <div class="divmargin portlet light animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Popular<small>place</small></h2>
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
                        <a class="title" href="#">Sale 3000 voucher</a>
                        <p>โรงแรมอมารี ดอนเมือง แอร์พอร์ต กรุงเทพฯ</p>
                      </div>
                    </article>
                    <article class="media event">
                      <a class="pull-left date">
                        <p></p>
                        <p>2</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Sale 1500 voucher</a>
                        <p>โรงแรมอมารี ดอนเมือง แอร์พอร์ต กรุงเทพฯ</p>
                      </div>
                    </article>
                    <article class="media event">
                      <a class="pull-left date">
                        <p></p>
                        <p>3</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Sale 890 voucher</a>
                        <p>โรงแรมอมารี ดอนเมือง แอร์พอร์ต กรุงเทพฯ</p>
                      </div>
                    </article>
                    <article class="media event">
                      <a class="pull-left date">
                        <p></p>
                        <p>4</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Sale 470 voucher</a>
                        <p>โรงแรมอมารี ดอนเมือง แอร์พอร์ต กรุงเทพฯ</p>
                      </div>
                    </article>
                    <article class="media event">
                      <a class="pull-left date">
                        <p></p>
                        <p>5</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Sale 300 voucher</a>
                        <p>โรงแรมอมารี ดอนเมือง แอร์พอร์ต กรุงเทพฯ</p>
                      </div>
                    </article>
                    
                  </div>
                </div>
              </div>

              <div class="divmargin portlet light animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Popular<small>voucher</small></h2>
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
                        <a class="title" href="#">Voucher 1</a>
                        <p>โรงแรมอมารี ดอนเมือง แอร์พอร์ต กรุงเทพฯ</p>
                      </div>
                    </article>
                    <article class="media event">
                      <a class="pull-left date">
                        <p></p>
                        <p>2</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Voucher 2</a>
                        <p>โรงแรมอมารี ดอนเมือง แอร์พอร์ต กรุงเทพฯ</p>
                      </div>
                    </article>
                    <article class="media event">
                      <a class="pull-left date">
                        <p></p>
                        <p>3</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Voucher 3</a>
                        <p>โรงแรมอมารี ดอนเมือง แอร์พอร์ต กรุงเทพฯ</p>
                      </div>
                    </article>
                    <article class="media event">
                      <a class="pull-left date">
                        <p></p>
                        <p>4</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Voucher 4</a>
                        <p>โรงแรมอมารี ดอนเมือง แอร์พอร์ต กรุงเทพฯ</p>
                      </div>
                    </article>
                    <article class="media event">
                      <a class="pull-left date">
                        <p></p>
                        <p>5</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Voucher 5</a>
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

@endsection 



@section('more-script')
@endsection