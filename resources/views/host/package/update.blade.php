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
    Update Package
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
						<label class="control-label col-md-3">Package Name</label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="package_name" value="{{ $package_name }}">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3">Detail</label>
						<div class="col-md-4">
							<textarea class="form-control maxlength" maxlength="500" rows="4" placeholder="Detail Package..." style="resize: vertical" name="detail" value="{{ $detail }}">{{ $detail }}</textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3">Price</label>
						<div class="col-md-4">
							<input type="number" class="form-control" name="price" value="{{ $price }}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Fee</label>
						<div class="col-md-3 ">

							<input type="number" class="form-control" name="fee" value="{{ $fee }}">
							
						</div>
					</div>
					

					<div class="form-group">
						<label class="control-label col-md-3">Quota</label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="quota" value="{{ $quota }}">
						</div>
					</div>

					

					<div class="form-group">
						<label class="control-label col-md-3">Expire Type</label>
						<div class="col-md-4">
						<select class="form-control" name="expire_type" value="expire_type" id="expiretype" onchange="expiretypeFunction()">						
		                <option value="1" @if( $expire_type === 1 ) selected="selected " @endif >Expire Day</option>
		                <option value="2" @if( $expire_type === 2 ) selected="selected " @endif >Expire Date</option>
		                     
               			</select>
						</div>
					</div>
					<div class="form-group"  >
                            <label class="control-label col-md-3">Expire Date</label>
                            <div class="col-md-4">
                                <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="yyyy-mm-dd">
                                    <input type="text" class="form-control" name="expire_date" value="{{ $expire_date }}" id="expiredate">												
                                </div>
                            </div>
                    </div>

					<div class="form-group" >
						<label class="control-label col-md-3">Expire_Day</label>
						<div class="col-md-4">
							<input type="number" class="form-control" name="expire_day" value="{{ $expire_day }}" id="expireday" >
						</div>
					</div>
			
					<div class="form-group">
						<label class="control-label col-md-3">Public</label>
						<div class="col-md-4">
						<select class="form-control" name="public" value="{{ $public }}" >						
		                <option value="0" @if( $public === 0 ) selected="selected " @endif >Private</option>
		                <option value="1" @if( $public === 1 ) selected="selected " @endif >Public</option>
		                     
               			</select>
						</div>
					</div>


          
			 		
				</div>
				<hr>
				<div class="form-actions">
					<div class="row">
						<div class="col-md-offset-3 col-md-9">
							<button type="submit" class="btn green" >{{ $txt_manage }}</button>
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
<script type="text/javascript">	
	var type = document.getElementById("expiretype");
	var expiretype = type.options[type.selectedIndex].value;
	if (expiretype == 2) {
		document.getElementById("expireday").disabled = true;
		 document.getElementById("expiredate").disabled = false;
		 document.getElementById("expireday").value = 0 ;
	}else{
		document.getElementById("expiredate").disabled = true;
		document.getElementById("expireday").disabled = false;
		document.getElementById("expiredate").value = '0000-00-00' ;
	}

	function expiretypeFunction() {
    var type = document.getElementById("expiretype");
	var expiretype = type.options[type.selectedIndex].value;
	if (expiretype == 2) {
		document.getElementById("expireday").disabled = true;		
		 document.getElementById("expiredate").disabled = false;
		 document.getElementById("expireday").value = 0 ;
	}else{
		document.getElementById("expiredate").disabled = true;
		 document.getElementById("expireday").disabled = false;
		 document.getElementById("expiredate").value = '0000-00-00' ;
	};
}
</script>
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