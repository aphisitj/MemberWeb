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
	@extends('host.layout.main-layout') @section('page-style') {{ Html::style('assets/global/plugins/jquery-tags-input/jquery.tagsinput.css') }} {{ Html::style('assets/global/plugins/select2/select2.css') }} {{ Html::style('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')
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
							<label class="control-label col-md-3">voucher name</label>
							<div class="col-md-4">
								<input type="text" class="form-control maxlength" maxlength="255" name="voucher_name" value="{{ $voucher_name }}">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">place id</label>
							<div class="col-md-4">
								<input type="text" class="form-control maxlength" maxlength="255" name="place_id" value="{{ $place_id }}">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">Price</label>
							<div class="col-md-4">
								<input type="text" class="form-control" name="price" value="{{ $price }}">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">Expire_Day</label>
							<div class="col-md-4">
								<input type="text" class="form-control" name="expire_days" value="{{ $expire_days }}">
							</div>
						</div>


						<div class="form-group">
							<label class="control-label col-md-3">Expire_Date</label>
							<div class="col-md-4">
								<div class="input-small date-picker input-daterange" data-date-format="yyyy-mm-dd">
									<input type="text" class="form-control" name="expire_date" value="{{ $expire_date }}">
									<!-- 								<span class="input-group-addon">
												to </span>
								<input type="text" class="form-control" name="expire_date" value="{{ $expire_date }}"> -->
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">Quota</label>
							<div class="col-md-4">
								<input type="text" class="form-control" name="quota" value="{{ $quota }}">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">Sale</label>
							<div class="col-md-9">
								<div class="input-inline input-medium">
									<input class="form-control touchspin" type="text" value="20" name="spinner">
								</div>
							</div>
						</div>


						<input type="hidden" name="_token" value="">
						<div class="row page-header">
							<div class="col-sm-12">

							</div>
							<div class="col-sm-6 text-right padding-top-20">
								<input type="file" name="uploader" id="uploader" />
							</div>
							<div class="col-sm-6 text-right padding-top-20">
								<button class="btn btn-success" type="submit" name="btn-upload" title="Upload image"><i class="fa fa-upload" ></i> Upload</button>
								<button class="btn btn-danger del" type="submit" name="btn-delete" title="Delete Multiple image"><i class="fa fa-trash-o" ></i> Delete</button>
							</div>
							<!-- /.col-lg-12 -->
						</div>
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="dataTable_wrapper">
									<div class="row">

									</div>

								</div>
							</div>
						</div>
						<!-- 					<div class="form-group">
						<label class="control-label col-md-3">Status</label>
						<div class="col-md-4">
							<select class="form-control" name="status" value="{{ $status }}">
								<option value=""></option>
				                <option value="{{ $status }}">available</option>
				                <option value="{{ $status }}" >not available</option>
                            
               				</select>
						</div>
					</div> -->
						<!-- <div class="form-group">
                            <label class="control-label col-md-3">Image Upload #2</label>
                            <div class="col-md-9">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                    </div>
                                    <div>
                                        <span class="btn default btn-file">
                                        <span class="fileinput-new">
                                        Select image </span>
                                        <span class="fileinput-exists">
                                        Change </span>
                                        <input type="file" name="...">
                                        </span>
                                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">
                                            Remove </a>
                                    </div>
                                </div>
                                <div class="clearfix margin-top-10">
												<span class="label label-danger">
												NOTE! </span>
                                    Image preview only works in IE10+, FF3.6+, Safari6.0+, Chrome6.0+ and Opera11.1+. In older browsers the filename is shown instead.
                                </div>
                            </div>
                        </div> -->
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
				<!-- END FORM-->
			</div>
		</div>

	</div>
	@endsection @section('page-plugin') {{ Html::script('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }} {{ Html::script('assets/global/plugins/jquery-validation/js/additional-methods.min.js') }} {{ Html::script('assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')
	}} {{ Html::script('assets/global/plugins/jquery-tags-input/jquery.tagsinput.min.js') }} {{ Html::script('assets/global/plugins/select2/select2.min.js') }} {{ Html::script('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}
	{{ Html::script('assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }} {{ Html::script('assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }} {{ Html::script('assets/global/plugins/jquery-minicolors/jquery.minicolors.min.js')
	}} {{ Html::script('assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.min.js') }} {{ Html::script('assets/global/plugins/autosize/autosize.min.js') }} {{ Html::script('assets/global/plugins/ckeditor/ckeditor.js') }} {{ Html::script('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')
	}} @endsection @section('more-script') {{ Html::script('js/backend/validation.js') }} {{ Html::script('js/backend/default.js') }} @endsection