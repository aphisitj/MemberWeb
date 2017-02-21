  @extends('host.layout.main-layout') 
  @section('page-style') 
  @endsection 
  @section('more-style') 
  @endsection 
  @section('page-title') 
    Voucher
   @endsection @section('page-content')
  <div class="col-md-12">
    <div class="portlet light">
      <div class="form-search">
        <form action="" class="form-horizontal" method="GET">
          <div class="form-group">
            <label class="control-label col-md-1">Search</label>
            <div class="col-md-3">
              <input class="form-control" type="text" name="search" value="">
              <span class="help-block">Search by Voucher Name </span>
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
<!--                 <span class="badge bg-red pull-right">50%</span> -->
                <th class="text-center col-sm-1">VoucherID</th>
                <th>VoucherName</th>
                <th>Detail Short</th>           
                
                <th class="text-center col-sm-2 col-md-2">
                  <a href="{{ url()->to('_host/voucher/create') }}" class="btn btn-circle blue btn-xs"><i class="fa fa-plus"></i> Add</a>
                </th>
              </tr>
            </thead>
            <tbody>              
              <tr>
                <td class="text-center">1</td>
                <td>ที่พัก 3 วัน 2 คืน</td>
                <td>ห้องพักดีลักซ์ เตียงแฝด (Deluxe Twin)</td>   
                <td class="text-center">
                  <a href="{{ url()->to('_host/voucher/update') }}" class="btn btn-xs btn-circle green"><i class="fa fa-edit"></i></a>
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