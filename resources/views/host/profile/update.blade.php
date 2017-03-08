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
@extends('host.layout.main-layout')
	 @section('page-style') 
	  
	{{ Html::style('assets/global/plugins/jquery-tags-input/jquery.tagsinput.css') }} 
	{{ Html::style('assets/global/plugins/select2/select2.css') }}
	{{ Html::style('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')	}} 
	{{ Html::style('assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }} 
	{{ Html::style('assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}
	{{ Html::style('assets/global/plugins/jquery-minicolors/jquery.minicolors.css')}} 
	{{ Html::style('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}
	 {{ Html::style('assets/global/plugins/vendors/animate.css/animate.css')}} 
    
	 @endsection @section('more-style')
	 @endsection @section('page-title')
	 Edit Profile
	 @endsection @section('page-content')
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
							<label class="control-label col-md-3">Place Name</label>
							<div class="col-md-4">
								<input type="text" class="form-control maxlength" name="place_name" value="{{ $place_name }}" maxlength="255">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">สถานที่ตั้ง</label>
							<div class="col-md-6">
								<textarea class="form-control maxlength" maxlength="500" rows="4" placeholder="Detail Place..."  name="address" value="{{ $address }}">{{ $address }}</textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">สิ่งอำนวยความสะดวก</label>
							<div class="col-md-6">
								<textarea class="form-control maxlength" maxlength="500" rows="4" placeholder="Detail Facility..."  name="facility" value="{{ $facility }}">{{ $facility }}</textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">บริการที่มีอยู่</label>
							<div class="col-md-6">
								<textarea class="form-control maxlength" maxlength="500" rows="4" placeholder="Detail Service..."  name="service" value="{{ $service }}">{{$service}}</textarea>
							</div>
						</div>
			 			<div class="form-group">
							<label class="control-label col-md-3">Type</label>
							<div class="col-md-4">
								<select class="form-control" name="place_type" id="place_type" >
					                <option value="1" @if( $place_type === 1 ) selected="selected " @endif >Hotel</option>
					                <option value="2" @if( $place_type === 2 ) selected="selected " @endif >Restaurant</option>
                            	</select>
							</div>
						</div>	
						
  			
		   				<form action="{{url('/admin/upload/action')}}" method="post" enctype="multipart/form-data">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
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
						                @if($images)
						                    @foreach($images as $img)
						                    <div class="col-xs-3 gallery">
						                        <img src="{{ url()->asset('assets/backend/img/'.$img->src) }}"  />
						                    </div>
						                    @endforeach
						                @endif
						                </div>
						 
						            </div>
						        </div>
						    </div>
						</form>

				
						<div class="form-actions">
							<div class="row">
								<div class="col-md-offset-3 col-md-9">
									<button type="submit" class="btn green">{{ $txt_manage }}</button>
									<button type="reset" class="btn default">Reset</button>
								</div>
							</div>
						</div>
				</form>
				<!-- END FORM-->
				</div>
			</div>

		</div>


		@endsection 
		@section('page-plugin') 
		
		{{ Html::script('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}
		{{ Html::script('assets/global/plugins/jquery-validation/js/additional-methods.min.js') }} 
		{{ Html::script('assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}
		{{ Html::script('assets/global/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}
		{{ Html::script('assets/global/plugins/select2/select2.min.js') }} 
		{{ Html::script('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}} 
		{{ Html::script('assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }} 
		{{ Html::script('assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }} 
		{{ Html::script('assets/global/plugins/jquery-minicolors/jquery.minicolors.min.js')	}} 
		{{ Html::script('assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.min.js') }} 
		{{ Html::script('assets/global/plugins/autosize/autosize.min.js') }} 
		{{ Html::script('assets/global/plugins/ckeditor/ckeditor.js') }} 
		{{ Html::script('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')	}} 



		@endsection 
		@section('more-script') 
		{{ Html::script('js/backend/validation.js') }} 
		{{ Html::script('js/backend/default.js') }}
		 @endsection