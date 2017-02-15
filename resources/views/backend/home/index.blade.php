@extends('backend.layout.main-layout') @section('page-style') @endsection @section('more-style') @endsection @section('page-title','Home Page') @section('page-content')
<div class="col-md-12">
  <div class="portlet light col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="tile-stats">
      <div class="icon"><i class="glyphicon glyphicon-btc"></i></div>
      <div class="count">
        <h2>0</h2></div>
      <h4>ส่วนแบ่งการขาย</h4>
<!--       <p>Lorem ipsum psdea itgum rixt.</p> -->
    </div>
  </div>
  
  <div class="portlet light col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="tile-stats">
      <div class="icon"><i class="glyphicon glyphicon-btc"></i></div>
      <div class="count">
        <h2>0</h2></div>
      <h4>รายได้จาก ad</h4>
<!--       <p>Lorem ipsum psdea itgum rixt.</p> -->
    </div>
  </div>
  
  <div class="portlet light col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="tile-stats">
      <div class="icon"><i class="glyphicon glyphicon-user"></i></div>
      <div class="count">
        <h2>{{$count_data}}</h2></div>
      <h4>User</h4>
<!--       <p>Lorem ipsum psdea itgum rixt.</p> -->
    </div>
  </div>

  <div class="portlet light col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="tile-stats">
      <div class="icon"><i class="glyphicon glyphicon-map-marker"></i></div>
      <div class="count">
        <h2>{{$count_place}}</h2></div>
      <h4>Place</h4>
<!--       <p>Lorem ipsum psdea itgum rixt.</p> -->
    </div>
  </div>

<div class=" col-lg-9 col-md-9 col-sm-6 col-xs-12">
   
  </div>
  
  <div class="portlet light col-md-3 col-sm-12 col-xs-12">
    <div>
      <div class="x_title">
        <h2>Payment</h2>
       
        <div class="clearfix"></div>
      </div>
      <hr>
      <ul class="list-unstyled top_profiles scroll-view">
        <li class=" media event">
          <a class="pull-left border-aero profile_thumb">
            <i class="fa fa-user aero"></i>
          </a>
          <div class="bg-info media-body">
            <a class="title" href="#">เรดิสัน บลู รีสอร์ท หัวหิน</a>
            <p><strong>$2300. </strong> Ad </p>
            <p> <small>Today</small>
            </p>
          </div>
        </li>
        <hr>
       <li class=" media event">
          <a class="pull-left border-aero profile_thumb">
            <i class="fa fa-user aero"></i>
          </a>
          <div class="bg-info media-body">
            <a class="title" href="#">Putahracsa Hua Hin Resort</a>
            <p><strong>$2300. </strong> Ad </p>
            <p> <small>Today</small>
            </p>
          </div>
        </li>
        <hr>
      </ul>
    </div>
  </div>

</div>
@endsection @section('page-plugin') @endsection @section('more-script') @endsection