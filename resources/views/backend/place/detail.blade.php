 @extends('backend.layout.main-layout') @section('page-style') @endsection @section('more-style') @endsection @section('page-title') @endsection @section('page-content')
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
              
                <h2>Place name</h2>
                <hr>

                <h4>สถานที่ตั้ง</h4>
                <p>
                  
                </p>
                <h4>สิ่งอำนวยความสะดวก</h4>
                <p>
                 
                </p>
                <h4>บริการที่มีอยู่</h4>
                <p>
                 
                </p>
               
             
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
            <span class="help-block">Search by Voucher Id, Voucher name</span>
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
        <span class="caption-subject font-green-sharp bold">Found h Record(s).</span>
      </div>
    </div>
    <div class="portlet-body">
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
          <thead>

            <tr>
              <th>Package Id</th>
              <th>Package name</th>
              <th>Price</th>             
              <th>Fee Amount</th>              
            </tr>

          </thead>

          <tbody>

            <tr>
              <td class="text-center">test</td>
              <td></td>
              <td>test</td>
              <td>test</td>
            </tr>

            <tr>
              <td class="text-center" colspan="9">No Result.</td>
            </tr>


          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>
@endsection @section('page-plugin') @endsection @section('more-script') @endsection