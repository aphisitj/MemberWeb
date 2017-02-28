@extends('host.layout.main-layout') 

@section('page-style') 
 {{ Html::style('assets/global/plugins/jquery-tags-input/jquery.tagsinput.css') }} 
 {{ Html::style('assets/global/plugins/select2/select2.css') }} 
 {{ Html::style('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}
 {{ Html::style('assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }} 
 {{ Html::style('assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}
 {{ Html::style('assets/global/plugins/jquery-minicolors/jquery.minicolors.css')}} 
 {{ Html::style('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }} 
  @endsection 

  @section('more-style') 
  @endsection 

  @section('page-title','Update Voucher Page Host')

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
						<label class="control-label col-md-3">Department name</label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="firstname" value="">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3">Email</label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="lastname" value="">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3">Phone</label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="lastname" value="">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3">Type</label>
						<div class="col-md-4">
							<select class="form-control" name="admin_role_id">
								<option value=""></option>
				                <option value="">Hotal</option>
				                <option value="" >Restaurant</option>
                            
               </select>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3">Username</label>
						<div class="col-md-4">
							<div class="input-group" style="text-align:left">
								<input type="text" class="form-control" name="username" id="username_input" value="">
								<span class="input-group-btn">
                                    <a href="javascript:;" class="btn green" id="username_checker">
                                        <i class="fa fa-check"></i> Check </a>
                                    </span>
							</div>
						</div>
					</div>
					<div class="form-group last password-strength">
						<label class="control-label col-md-3">Password</label>
						<div class="col-md-4">
							<input type="password" class="form-control" name="password" id="password_strength">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3">เปิดใช้</label>
						<div class="col-md-4">
							<select class="form-control" name="admin_role_id">
								<option value=""></option>
				                <option value="">available</option>
				                <option value="" >not available</option>                            
				               </select>
						</div>
					</div>


				</div>
				<hr>
				<div class="form-actions">
					<div class="row">
						<div class="col-md-offset-3 col-md-9">
							<button type="submit" class="btn green">Update</button>
							<button type="reset" class="btn default">Reset</button>
						</div>
					</div>
				</div>
			</form>
			<!-- END FORM-->
		</div>
	</div>

</div>
@endsection @section('page-plugin') 
{{ Html::script('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }} 
{{ Html::script('assets/global/plugins/jquery-validation/js/additional-methods.min.js') }} 
{{ Html::script('assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}} 
{{ Html::script('assets/global/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}
{{ Html::script('assets/global/plugins/select2/select2.min.js') }} 
{{ Html::script('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}
{{ Html::script('assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }} 
{{ Html::script('assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }} 
{{ Html::script('assets/global/plugins/jquery-minicolors/jquery.minicolors.min.js')}}
{{ Html::script('assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.min.js') }} 
{{ Html::script('assets/global/plugins/autosize/autosize.min.js') }} 
{{ Html::script('assets/global/plugins/ckeditor/ckeditor.js') }} 
{{ Html::script('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}
  @endsection 

  @section('more-script') 
  {{ Html::script('js/backend/validation.js') }} 
  {{ Html::script('js/backend/default.js') }} 
  @endsection