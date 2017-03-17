<?php
$table = $obj_model->table;
$primaryKey = $obj_model->primaryKey;
$fillable = $obj_model->fillable;

$a_param = Input::all();
$str_param = $obj_fn->parameter($a_param);

if(isset($data)) {
    foreach($fillable as $value){
        $$value = $data->$value;
    }
} else {
    foreach($fillable as $value){
        $$value = "";
    }
}
?>
@extends('backend.layout.main-layout') 
@section('page-style') 
{{ Html::style('assets/global/plugins/jquery-tags-input/jquery.tagsinput.css') }} 
{{ Html::style('assets/global/plugins/select2/select2.css') }} 
{{ Html::style('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')	}}
{{ Html::style('assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }} 
{{ Html::style('assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}
{{ Html::style('assets/global/plugins/jquery-minicolors/jquery.minicolors.css')}} 
{{ Html::style('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }} 
 @endsection 
 @section('more-style') 
 @endsection 
 @section('page-title') 
 {{ $page_title }}
 @endsection 
 @section('page-content')
	<div class="col-md-12">
		<div class="portlet light">
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<form action="{{ url()->to($url_to) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
					<input type="hidden" name="_method" value="{{ $method }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="str_param" value="{{ $str_param }}">

					<div class="form-body">

						<div class="form-group">
							<label class="control-label col-md-3">User Id</label>
							<div class="col-md-4">
								<input type="text" class="form-control" name="user_id" value="{{ $user_id }}" disabled>
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3">Name</label>
							<div class="col-md-4">
								<input type="text" class="form-control" name="firstname" value="{{ $firstname }}  {{$lastname}}" disabled>
							</div>
						</div>
						
											
						<div class="form-group">
							<label class="control-label col-md-3">Email</label>
							<div class="col-md-4">
								<input type="email" class="form-control" name="email" value="{{ $email }}" disabled>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">Phone</label>
							<div class="col-md-4">
								<input type="tel" class="form-control" name="mobile" value="{{ $mobile }}" disabled>
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3">Verify email</label>
							<div class="col-md-4">
								<input type="text" class="form-control" name="firstname" value="{{ $verify_email }}" disabled>
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3">Verification</label>
							<div class="col-md-4">
								<input type="text" class="form-control" name="firstname" value="{{ $verification }}" disabled>
							</div>
						</div>

							
						</div>

						<hr>
						
				</form>
				<!-- END FORM -->
				</div>
			</div>

		</div>
		@endsection 
		
		@section('page-plugin') 
		{{ Html::script('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }} 
		{{ Html::script('assets/global/plugins/jquery-validation/js/additional-methods.min.js') }} 
		{{ Html::script('assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')	}}
		 {{ Html::script('assets/global/plugins/jquery-tags-input/jquery.tagsinput.min.js') }} 
		 {{ Html::script('assets/global/plugins/select2/select2.min.js') }} 
		 {{ Html::script('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}} 
		 {{ Html::script('assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }} 
		 {{ Html::script('assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}
		 {{ Html::script('assets/global/plugins/jquery-minicolors/jquery.minicolors.min.js')}}
		 {{ Html::script('assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.min.js') }} 
		 {{ Html::script('assets/global/plugins/autosize/autosize.min.js') }} 
		 {{ Html::script('assets/global/plugins/ckeditor/ckeditor.js') }} 
		 {{ Html::script('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')	}} 
		 @endsection 

		 @section('more-script') 
		 {{ Html::script('js/backend/validation.js') }} 
		 {{ Html::script('js/backend/default.js') }}
		 @endsection