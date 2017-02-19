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
	@extends('backend.layout.main-layout') @section('page-style') {{ Html::style('assets/global/plugins/jquery-tags-input/jquery.tagsinput.css') }} {{ Html::style('assets/global/plugins/select2/select2.css') }} {{ Html::style('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')
	}} {{ Html::style('assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }} {{ Html::style('assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }} {{ Html::style('assets/global/plugins/jquery-minicolors/jquery.minicolors.css')
	}} {{ Html::style('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }} @endsection @section('more-style') @endsection @section('page-title') {{ $txt_manage.' '.$page_title }} @endsection @section('page-content')
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
							<label class="control-label col-md-3">Place name</label>
							<div class="col-md-4">
								<input type="text" class="form-control" name="place_name" value="{{$place_name}}" disabled>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">Email</label>
							<div class="col-md-4">
								<input type="email" class="form-control" name="email" value="" disabled>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">Phone</label>
							<div class="col-md-4">
								<input type="tel" class="form-control" name="phone" value="{{$mobile}}" disabled>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">Type</label>
							<div class="col-md-4">
								<select class="form-control" name="type">							
					                <option value="Hotel">Hotel</option>
					                <option value="Restaurant" >Restaurant</option>

                            	</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3">เปิดใช้</label>
							<div class="col-md-4">
							<select class="form-control" name="status">							
					                <option value="Available">Available</option>
					                <option value="Not Available" >Not Available</option>                           
			                </select>
							</div>
						</div>

					<hr>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<button type="submit" class="btn green">{{ $txt_manage }}</button>
								<button type="reset" class="btn default">Reset</button>
							</div>
						</div>
					</div>
				</form> 
				<!-- END FORM -->
			</div>
		</div>

	</div>
	@endsection @section('page-plugin') {{ Html::script('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }} {{ Html::script('assets/global/plugins/jquery-validation/js/additional-methods.min.js') }} {{ Html::script('assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')
	}} {{ Html::script('assets/global/plugins/jquery-tags-input/jquery.tagsinput.min.js') }} {{ Html::script('assets/global/plugins/select2/select2.min.js') }} {{ Html::script('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}
	{{ Html::script('assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }} {{ Html::script('assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }} {{ Html::script('assets/global/plugins/jquery-minicolors/jquery.minicolors.min.js')
	}} {{ Html::script('assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.min.js') }} {{ Html::script('assets/global/plugins/autosize/autosize.min.js') }} {{ Html::script('assets/global/plugins/ckeditor/ckeditor.js') }} {{ Html::script('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')
	}} @endsection @section('more-script') {{ Html::script('js/backend/validation.js') }} {{ Html::script('js/backend/default.js') }} @endsection