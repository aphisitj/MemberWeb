<?php 
//dd($datapopularplace);

 ?>
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
                
                  
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">

                    <div class=" portlet light tile-stats">
                      <div class="icon"><i class="glyphicon glyphicon-gift"></i></div>
                      <div class="divsize">{{$count_package}}</div>
                      <h2>Package</h2>
                      <p></p>
                    </div>

                    <div class="tile-stats portlet light">
                      <div class="icon"><i class="glyphicon glyphicon-inbox"></i></div>
                      <div class="divsize">{{$count_orders}}</div>
                      <h2>Orders</h2>
                      <p></p>                      
                  </div>

              </div>

              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
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
                 
              </div>

           
              <div class="divmargin portlet light animated flipInY col-lg-12 col-md-12 col-sm-6 col-xs-12">
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
                            <th class="text-center col-sm-1">อันดับ</th>
                            <th class="text-center col-sm-1">Sale</th>
                            <th class="text-center col-sm-1">Voucher Name</th>
                            <th class="text-center col-sm-1">Place</th>
                        </tr>
                        </thead>
                        <thead>
                          @foreach($datapopularvr as $key => $field)
                                    <tr>
                                        <td class="text-center">{{ $ratingvoucher++ }}</td>
                                        <td class="text-center">{{ $field->count }} Voucher</td>
                                        <td>{{ $field->voucher_name  }}</td>
                                        <td>{{ $field->place_name  }}</td>                                      
                                    </tr>                              
                       @endforeach
                     </tbody>
                    </table>
                   </div>

                 </div>
              </div>

              

              <div class="divmargin portlet light animated flipInY col-lg-12 col-md-12 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Popular<small>place</small></h2>
                   <hr>
                    <div class="clearfix"></div>
                  </div>

                  <div class="table-responsive">
                    <table class=" table table-hover table-striped">

                    <thead>
                        <tr>
                            <th class="text-center col-sm-1">อันดับ</th>
                            <th class="text-center col-sm-1">Sale</th>
                            <th class="text-center col-sm-1">Place</th>
                        </tr>
                        </thead>
                        <thead>
                          @foreach($datapopularplace as $key => $field)
                                    <tr>
                                        <td class="text-center">{{ $ratingplacer++ }}</td>
                                        <td class="text-center">{{ $field->countsum }} Voucher</td>
                                     
                                        <td>{{ $field->place_name  }}</td>                                      
                                    </tr>                              
                       @endforeach
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