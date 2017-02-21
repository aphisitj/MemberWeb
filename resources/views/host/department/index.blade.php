@extends('host.layout.main-layout') @section('page-style') @endsection @section('more-style') @endsection @section('page-title') Department @endsection @section('page-content')
<div class="col-md-12">
  <div class="portlet light">
    <div class="form-search">
      <form action="" class="form-horizontal" method="GET">
        <div class="form-group">
          <label class="control-label col-md-1">Search</label>
          <div class="col-md-3">
            <input class="form-control" type="text" name="search" value="">
            <span class="help-block">Search by Department name</span>
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
              <th class="text-center col-sm-2">Department name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Type</th>
              <th class="text-center col-sm-2 col-md-2">
                <a href="{{ url()->to('_host/department/create') }}" class="btn btn-circle blue btn-xs"><i class="fa fa-plus"></i> Add</a>
              </th>
            </tr>
          </thead>
          <tbody>

            <tr>
              <td class="text-center">Department 1</td>
              <td>d@d.com</td>
              <td>789569</td>
              <td>Hotel</td>
              <td class="text-center">
                <a href="{{ url()->to('_host/department/update') }}" class="btn btn-xs btn-circle green"><i class="fa fa-edit"></i></a>
                <form action="" class="form-delete" parent-data-id="" method="POST">
                  <input type="hidden" name="_method" value="delete">
                  <input type="hidden" name="_token" value="">
                  <button type="button" class="btn btn-xs btn-circle red btn-delete" data-id=""><i class="fa fa-trash-o"></i></button>
                </form>
              </td>
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