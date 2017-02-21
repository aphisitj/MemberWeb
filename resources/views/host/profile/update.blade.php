	@extends('host.layout.main-layout')
	 @section('page-style') 
	{{ Html::style('assets/global/plugins/jquery-tags-input/jquery.tagsinput.css') }} 
	{{ Html::style('assets/global/plugins/select2/select2.css') }}
	{{ Html::style('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')	}} 
	{{ Html::style('assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }} 
	{{ Html::style('assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}
	 {{ Html::style('assets/global/plugins/jquery-minicolors/jquery.minicolors.css')}} 
	{{ Html::style('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}
	 @endsection @section('more-style')
	 @endsection @section('page-title')
	 Edit Profile
	 @endsection @section('page-content')
	<div class="col-md-12">
		<div class="portlet light">
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
					<input type="hidden" name="_method" value="">
					<input type="hidden" name="_token" value="">
					<input type="hidden" name="str_param" value="">
					<div class="form-body">
						<h4 class="font-green-sharp bold uppercase">Edit Profile</h4>
						<div class="form-group">
							<label class="control-label col-md-3">Place Name</label>
							<div class="col-md-4">
								<input type="text" class="form-control maxlength" name="place_name" value="โรงแรมอมารี ดอนเมือง แอร์พอร์ต กรุงเทพฯ" maxlength="255">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">สถานที่ตั้ง</label>
							<div class="col-md-6">
								<textarea class="form-control maxlength" maxlength="500" rows="4" placeholder="Detail Place..." style="resize: vertical" name="address" value="">333 ถนนเชิดวุฒากาศ, สนามบินนานาชาติดอนเมือง, กรุงเทพ, ประเทศไทย</textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">สิ่งอำนวยความสะดวก</label>
							<div class="col-md-6">
								<textarea class="form-control maxlength" maxlength="500" rows="4" placeholder="Detail Facility..." style="resize: vertical" name="facility" value="">บริการอินเทอร์เน็ต ฟิตเนส</textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">บริการที่มีอยู่</label>
							<div class="col-md-6">
								<textarea class="form-control maxlength" maxlength="500" rows="4" placeholder="Detail Service..." style="resize: vertical" name="service" value="">อาหารเช้า</textarea>
							</div>
						</div>
			 			
						<div class="form-group">
							<label class="control-label col-md-3">Type</label>
							<div class="col-md-4">
								<select class="form-control select-default" name="type">
                                    <option name="type" value="Hotel">โรงแรม</option>
                                    <option name="type" value="Resterant">ร้านอาหาร</option>
                                </select>
							</div>
						</div>
			 		
				<div class="form-group">
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
									<span class="label label-danger">NOTE! </span>
                                    Image preview only works in IE10+, FF3.6+, Safari6.0+, Chrome6.0+ and Opera11.1+. In older browsers the filename is shown instead.
                                </div>
                            </div>
                        </div>
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


		@endsection @section('page-plugin') {{ Html::script('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }} {{ Html::script('assets/global/plugins/jquery-validation/js/additional-methods.min.js') }} {{ Html::script('assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')
		}} {{ Html::script('assets/global/plugins/jquery-tags-input/jquery.tagsinput.min.js') }} {{ Html::script('assets/global/plugins/select2/select2.min.js') }} {{ Html::script('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')
		}} {{ Html::script('assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }} {{ Html::script('assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }} {{ Html::script('assets/global/plugins/jquery-minicolors/jquery.minicolors.min.js')
		}} {{ Html::script('assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.min.js') }} {{ Html::script('assets/global/plugins/autosize/autosize.min.js') }} {{ Html::script('assets/global/plugins/ckeditor/ckeditor.js') }} {{ Html::script('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')
		}} @endsection @section('more-script') {{ Html::script('js/backend/validation.js') }} {{ Html::script('js/backend/default.js') }} @endsection