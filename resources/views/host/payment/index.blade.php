@extends('host.layout.main-layout') @section('page-style') @endsection @section('more-style') @endsection @section('page-title') Payment @endsection @section('page-content')
<div class="col-md-12">
  <div class="portlet light">
    <div class="form-search">
      <form action="" class="form-horizontal" method="GET">
        <div class="form-group">
          <label class="control-label col-md-1">Search</label>
          <div class="col-md-3">
            <input class="form-control" type="text" name="search" value="">
            <span class="help-block">Search by Firstname, Username and Role name</span>
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
              <th class="text-center col-sm-2">Orders_id</th>
              <th>voucher name</th>
              <th>Qty</th>
              <th>Price</th>
              <th>payment type</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>

            <tr>
              <td class="text-center">d</td>
              <td>d</td>
              <td>d</td>
              <td>d</td>
              <td>d</td>
              <td>d</td>
            </tr>


            <tr>
              <td class="text-center" colspan="6">No Result.</td>
            </tr>

          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>
@endsection @section('page-plugin') @endsection @section('more-script') @endsection