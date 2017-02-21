@extends('host.layout.main-layout') @section('page-style')
    {{ Html::style('assets/global/plugins/jquery-tags-input/jquery.tagsinput.css') }}
    {{ Html::style('assets/global/plugins/select2/select2.css') }}
    {{ Html::style('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}
    {{ Html::style('assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}
    {{ Html::style('assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}
    {{ Html::style('assets/global/plugins/jquery-minicolors/jquery.minicolors.css') }}
    {{ Html::style('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}
@endsection 
@section('more-style') 
@endsection 

@section('page-title')
    Create Package
@endsection
@section('page-content')
<div class="col-md-12">
	<div class="portlet light">
		<div class="portlet-body form">
			<!-- BEGIN FORM-->
			<form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
				<input type="hidden" name="_method" value="">
				<input type="hidden" name="_token" value="">
				<input type="hidden" name="str_param" value="">
				<div class="form-body">

					<div class="form-group">
						<label class="control-label col-md-3">Package Name</label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="package_name" value="package_name">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3">Detail</label>
						<div class="col-md-4">
							<textarea class="form-control maxlength" maxlength="500" rows="4" placeholder="Detail Package..." style="resize: vertical" name="detail" value=""></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3">Price</label>
						<div class="col-md-4">
							<input type="number" class="form-control" name="price" value="price">
						</div>
					</div>


					<div class="form-group">
						<label class="control-label col-md-3">Expire_Day</label>
						<div class="col-md-4">
							<input type="number" class="form-control" name="expire_days" value="expire_days">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3">Quota</label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="quota" value="quota">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3">Voucher</label>
						<div class="col-md-4">
							<p>Voucher 1 <button type="button" class="btn btn-xs btn-circle red btn-delete" data-id=""><i class="fa fa-trash-o"></i></button></p><br>							
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Department</label>
						<div class="col-md-4">
							<p>Department 1 <button type="button" class="btn btn-xs btn-circle red btn-delete" data-id=""><i class="fa fa-trash-o"></i></button></p><br>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3">Status</label>
						<div class="col-md-4">
							<select class="form-control" name="status" value="status">
								<option value=""></option>
		                <option value="">available</option>
		                <option value="" >not available</option>
		                            
               </select>
						</div>
					</div>
					<div class="row page-header">
		<div class="col-sm-12">
			<h1 class="">Basic Uploader</h1>
		</div>
		<div class="col-sm-6 text-right padding-top-20">
			<input type="file" name="uploader" id="uploader" />
		</div>
		<div class="col-sm-6 text-right padding-top-20">
			<button class="btn btn-success" type="submit" name = "btn-upload" title="Upload image"><i class="fa fa-upload" ></i> Upload</button>
			<button class="btn btn-danger del" type="submit" name = "btn-delete" title="Delete Multiple image"><i class="fa fa-trash-o" ></i> Delete</button>
		</div>
		<!-- /.col-lg-12 -->
	</div>
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="dataTable_wrapper">
					<div class="row">
					
						<div class="col-xs-3 gallery">
							
						</div>
					
					</div>
					
				</div>
			</div>
		</div>
		<hr>
		<div class="form-search">
		        <form action="" class="form-horizontal" method="GET">
		        <h4 class="font-green-sharp bold uppercase">Voucher</h4>
		          <div class="form-group">
		            <label class="control-label col-md-1">Search</label>
		            <div class="col-md-3">
		              <input class="form-control" type="text" name="search" value="">
		              <span class="help-block">Search by Voucher Name</span>
		            </div>
		          </div>
		          <div class="form-group">
		            <div class="col-md-offset-1 col-md-3 ">
		              <button class="btn blue btn-sm" type="submit"><i class="fa fa-search"></i> Search</button>
		            </div>
		          </div>
		        </form>
		        
		      </div>
	<table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
<!--                 <span class="badge bg-red pull-right">50%</span> -->
                <th class="text-center col-sm-1">Voucher id</th>
                <th>Voucher Name</th>
                <th>Detail Short</th>                
                <th class="text-center col-sm-2 col-md-2">
                  ADD
                </th>
              </tr>
            </thead>

            <tbody>
             
              <tr>
                <td class="text-center">1</td>
                <td>ที่พัก 3 วัน 2 คืน</td>
                <td>ห้องพักดีลักซ์ เตียงแฝด (Deluxe Twin)</td>
                <td class="text-center">
                 <a href="" class="btn btn-circle blue btn-xs"><i class="fa fa-plus"></i> Add</a>
                </td>
              </tr>
              
              <tr>
                <td class="text-center" colspan="4">No Result.</td>
              </tr>

            </tbody>
          </table>


          <hr>
          <h4 class="font-green-sharp bold uppercase">Department</h4>
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
                Add
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
                <a href="" class="btn btn-circle blue btn-xs"><i class="fa fa-plus"></i> Add</a>
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
				<hr>
				<div class="form-actions">
					<div class="row">
						<div class="col-md-offset-3 col-md-9">
							<button type="submit" class="btn green" >Create </button>
							<button type="reset" class="btn default">Reset</button>
						</div>
					</div>
				</div>
				
			
<input type="hidden" name="_token" value="">
	

				
			</form>
			<!-- END FORM-->
		</div>
	</div>

</div>
@endsection 
@section('page-plugin')
    {{ Html::script('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}
    {{ Html::script('assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}

    {{ Html::script('assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}
    {{ Html::script('assets/global/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}
    {{ Html::script('assets/global/plugins/select2/select2.min.js') }}
    {{ Html::script('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}
    {{ Html::script('assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}
    {{ Html::script('assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}
    {{ Html::script('assets/global/plugins/jquery-minicolors/jquery.minicolors.min.js') }}
    {{ Html::script('assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.min.js') }}
    {{ Html::script('assets/global/plugins/autosize/autosize.min.js') }}
    {{ Html::script('assets/global/plugins/ckeditor/ckeditor.js') }}
    {{ Html::script('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}
@endsection
@section('more-script')
    {{ Html::script('js/backend/validation.js') }}
    {{ Html::script('js/backend/default.js') }}
@endsection