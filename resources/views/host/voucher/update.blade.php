<?php
$table = $obj_model->table;
$primaryKey = $obj_model->primaryKey;
$fillable = $obj_model->fillable;

$tablepackage = $obj_modelpackage->table;
$primaryKeypackage = $obj_modelpackage->primaryKey;
$fillablepackage = $obj_modelpackage->fillable;

$order_by = Input::get('order_by');
$sort_by = Input::get('sort_by');

$a_param = Input::all();
$str_param = $obj_fn->parameter($a_param);
$a_param_sort = Input::except(['order_by','sort_by']);
$str_param_sort = $obj_fn->parameter($a_param_sort);




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
{{ Html::style('assets/global/plugins/jquery-minicolors/jquery.minicolors.css')	}}
{{ Html::style('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}
 @endsection
  @section('more-style')
  @endsection 
  @section('page-title')
   {{ $txt_manage.' '.$page_title }} 
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
							<label class="control-label col-md-3">VoucherName</label>
							<div class="col-md-4">
								<input type="text" class="form-control maxlength" maxlength="255" name="voucher_name" value="{{ $voucher_name }}">
							</div>
						</div>						
						<div class="form-group">
							<label class="control-label col-md-3">Detail Short</label>
							<div class="col-md-4">
								<textarea class="form-control maxlength" maxlength="300" rows="4" placeholder="Detail Short..." style="resize: vertical" name="detail_short" value="{{ $detail_short  }}">{{ $detail_short }}</textarea>
							</div>
						</div>	
						<div class="form-group">
							<label class="control-label col-md-3">Description</label>
							<div class="col-md-4">
								<textarea class="form-control maxlength" maxlength="500" rows="4" placeholder="Description Voucher..." style="resize: vertical" name="description" value="{{ $description }}">{{ $description }}</textarea>
							</div>
						</div>	
						<div class="form-group">
							<label class="control-label col-md-3">Package ID</label>
							<div class="col-md-4">
								<input type="text" class="form-control maxlength" maxlength="255" id="packageid" name="package_id" value="{{ $package_id }}">
							</div>
						</div>	
						<hr>
					
						<h2>Package</h2>
      					 <div class="portlet-body">
					        <div class="table-responsive">
								 <table class="table table-striped table-bordered table-hover">
									<thead>
							            <tr>
							              <th class="text-center">{!! $obj_fn->sorting('Package Id','package_id',$order_by,$sort_by,$str_param_sort,'') !!}</th>
							              <th>{!! $obj_fn->sorting('Package Name','package_name',$order_by,$sort_by,$str_param_sort,'') !!}</th>              
							              <th class="col-sm-2 col-md-2">{!! $obj_fn->sorting('Detail','detail',$order_by,$sort_by,$str_param_sort,'') !!}</th>
							              <th>{!! $obj_fn->sorting('Price','price',$order_by,$sort_by,$str_param_sort,'') !!}</th>
							              <th>{!! $obj_fn->sorting('Fee','fee',$order_by,$sort_by,$str_param_sort,'') !!}</th>
							              <th>{!! $obj_fn->sorting('Quota','quota',$order_by,$sort_by,$str_param_sort,'') !!}</th>
							              <th>{!! $obj_fn->sorting('Expire Type','expire_type',$order_by,$sort_by,$str_param_sort,'') !!}</th>
							              <th>{!! $obj_fn->sorting('Expire Day','expire_day',$order_by,$sort_by,$str_param_sort,'') !!}</th>
							              <th>{!! $obj_fn->sorting('Expire Date','expire_date',$order_by,$sort_by,$str_param_sort,'') !!}</th>
							              <th>{!! $obj_fn->sorting('Public','public',$order_by,$sort_by,$str_param_sort,'') !!}</th>
							              <th class="text-center col-sm-2 col-md-2">
							          		<p>Add Package</p>
							              </th>
							            </tr>
							         </thead>
			         				<tbody>
          

							          @if($count_data > 0)
							              	@foreach($datapackage as $key => $field)
									            <tr>
									              <td class="text-center">{{ $field->package_id }}</td>
									              <td>{{ $field->package_name }}</td>              
									              <td>{{ $field->detail }}</td>
									              <td>{{ $field->price }}</td>
									              <th>{{ $field->fee }}%</th>
									              <td>{{ $field->quota }}</td>
									              <td>{{ $field->expire_type }}</td>
									              <td class="text-center">@if($field->expire_type == 1){{ $field->expire_day }}@else <p>-</p> @endif</td>
									              <td class="text-center">@if($field->expire_type == 2){{ $field->expire_date }}@else <p>-</p> @endif</td>
									              <td class="text-center">@if($field->public == 1) <p> Public </p> @else <p> Private </p> @endif</td>
									              <td class="text-center">         
													
													<form>
													 <input class="btn btn-circle blue btn-xs" type="button" value="{{ $field->package_id }}" onclick="doAction(this.value)">													
													</form>	
									                      
									              </td>
									            </tr>
							              	@endforeach
							            @else
							                  <tr>
							                   	<td class="text-center" colspan="9">No Result.</td>
							                  </tr>
							            @endif

							        </tbody>
					          </table>
					        </div>
					        
     					</div>
					<hr>
					<form action="{{ url()->to($url_to) }}" method="post" enctype="multipart/form-data">
						<input type="hidden" name="_method" value="{{ $method }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="str_param" value="{{ $str_param }}">
						    <div class="row page-header">
						        <div class="col-sm-12">
						            <h1 class="">{{ $page_title }} Img</h1>
						        </div>
						        <div class="col-sm-6 text-right padding-top-20">
						            <input type="file" name="uploader" id="uploader" />
						        </div>
						        <div class="col-sm-6 text-right padding-top-20">
						        @if($images_count < 5 )
						            <button class="btn btn-success" type="submit" name = "btn-upload" title="Upload image"><i class="fa fa-upload" ></i> Upload</button>
						        @endif
						            <button class="btn btn-danger del" type="submit" name = "btn-delete" title="Delete Multiple image" " ><i class="fa fa-trash-o" ></i> Delete</button>
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
						                        <img src="{{ url()->asset('assets/backend/img/voucher/'.$img->src) }}" style=" width: 250px; height: 150px" />
						                    </div>
						                    @endforeach
						                @endif
						                </div>
						 
						            </div>
						        </div>
						    </div>
						</form>
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
	@endsection 
	@section('page-plugin') 
	 <script type="text/javascript">
  function doAction(value)
  {
   // Don't really have anything to set...just show the value
   
   document.getElementById("packageid").value = value ;
   
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