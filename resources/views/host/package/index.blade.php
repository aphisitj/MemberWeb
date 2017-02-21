@extends('host.layout.main-layout') @section('page-style') @endsection @section('more-style') @endsection @section('page-title') Package @endsection @section('page-content')
<div class="col-md-12">
  <div class="portlet light">
    <div class="form-search">
      <form action="" class="form-horizontal" method="GET">
        <div class="form-group">
          <label class="control-label col-md-1">Search</label>
          <div class="col-md-3">
            <input class="form-control" type="text" name="search" value="">
            <span class="help-block">Search by Package name</span>
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
              <th class="text-center col-sm-2">Package_id</th>
              <th>Package name</th>
              <th>QRcode</th>
              <th>Detail</th>
              <th>Price</th>
              <th>Fee</th>
              <th>expire_type</th>
              <th>Quota</th>
              <th class="text-center col-sm-2 col-md-2">
                <a href="{{ url()->to('_host/package/create') }}" class="btn btn-circle blue btn-xs"><i class="fa fa-plus"></i> Add</a>
              </th>
            </tr>
          </thead>
          <tbody>

            <tr>
              <td class="text-center">1</td>
              <td>Package A</td>
              <td><img src="{{ url()->asset('assets/backend/img/qrcode/qrcode.jpg') }}" alt="QRcode" style="width:100px;height:100px;"></td>
              <td>โรงแรมระดับ 4-ดาว แห่งนี้ให้บริการห้องพัก 423 ห้อง ซึ่งได้รับการตกแต่งให้ตรงกับความต้องการของลูกค้า ทุกห้องได้รับการตกแต่งอย่างสวยงาม โดยมี ห้องปลอดบุหรี่</td>
              <td>3500</td>
              <th>5%</th>
              <td>30</td>
              <td>80/100</td>
              <td class="text-center">
                <a href="{{ url()->to('_host/package/update') }}" class="btn btn-xs btn-circle green"><i class="fa fa-edit"></i></a>
                <form action="" class="form-delete" parent-data-id="" method="POST">
                  <input type="hidden" name="_method" value="delete">
                  <input type="hidden" name="_token" value="">
                  <button type="button" class="btn btn-xs btn-circle red btn-delete" data-id=""><i class="fa fa-trash-o"></i></button>
                </form>
              </td>
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