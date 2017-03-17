@extends('backend.layout.main-layout') 

@section('page-style') 
{{ Html::style('assets/global/plugins/vendors/animate.css/animate.css')}} 
@endsection 

@section('more-style')
@endsection 

@section('page-title','Home Page') 

@section('page-content')
    <div class="col-md-12">


             <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <div class="tile-stats portlet light">
                      <div class="icon"><i class="glyphicon glyphicon-credit-card"></i></div>
                      <div class="divsize">{{$sum_price}}</div>
                      <h2>Payment</h2>
                      <p></p>
                  </div>
                 
                  <div class="tile-stats portlet light">
                      <div class="icon"><i class="glyphicon glyphicon-piggy-bank"></i></div>
                      <div class="divsize">{{$sum_fee}}</div>
                      <h2>Fee</h2>                      
                      <p></p>
                  </div>
                
                  <div class="tile-stats portlet light">
                      <div class="icon"><i class="glyphicon glyphicon-inbox"></i></div>
                      <div class="divsize">{{$count_orders}}</div>
                      <h2>Orders</h2>
                      <p></p>                      
                  </div>
              </div>

              <div class="animated flipInY col-lg-2 col-md-3 col-sm-6 col-xs-12">
                <div class="portlet light  tile-stats">
                       <div class="icon"><i class="glyphicon glyphicon-user"></i></div>
                      <div class="divsize">{{$count_data}}</div>
                      <h2>Users</h2>                      
                        <p></p>
                    </div>
              
                    <div class="portlet light  tile-stats">
                        <div class="icon"><i class="glyphicon glyphicon-map-marker"></i></div>
                        <div class="divsize">{{$count_place}}</div>
                        <h2>Place</h2>
                        <p></p>
                    </div>
                 
                    <div class=" portlet light tile-stats">
                      <div class="icon"><i class="glyphicon glyphicon-gift"></i></div>
                      <div class="divsize">{{$count_package}}</div>
                      <h2>Package</h2>
                      <p></p>
                    </div>
              </div>

            <div>
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