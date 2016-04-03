 @extends('layout.index')
 
 <!-- Put page level plugin css-links here :)  -->
 @section('page_level_plugins_css')
	 {!! Html::style('assets/global/plugins/select2/css/select2.min.css') !!}
	 {!! Html::style('assets/global/plugins/select2/css/select2-bootstrap.min.css') !!}
 @endsection
 
 
  <!-- Put page level plugin script-links here :)  -->
 @section('page_level_plugins_script')
	{!! Html::script('assets/global/plugins/select2/js/select2.full.min.js') !!}
	{!! Html::script('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') !!}
	{!! Html::script('assets/global/plugins/jquery-validation/js/localization/messages_fa.js') !!}
	{!! Html::script('assets/global/plugins/jquery-validation/js/additional-methods.min.js') !!}
	{!! Html::script('assets/global/plugins/bootstrap-pwstrength/pwstrength-bootstrap.min.js') !!}
 @endsection


 <!-- put any script link that is related only to this page here :)  -->
 <!-- write your own custom scripts here :)  -->
 @section('page_level_scripts')   
 @endsection

 @section('content')
		<!-- BEGIN PAGE HEADER-->
			
		<!-- BEGIN PAGE TITLE-->
		<h3 class="page-title"> {{ trans('general.user_management') }}
			<small>{{ trans('general.new_role') }}</small>
		</h3>
		<!-- END PAGE TITLE-->
	
		<!-- END PAGE HEADER-->
		<div class="row">
			<div class="col-md-12">
				<div class="portlet light portlet-fit portlet-datatable bordered">					
				   <div class="portlet-title">							
						<div class="caption">							
							<span class="caption-subject font-green sbold">{{ trans('general.new_role') }}</span>
						</div>												 
					</div> 
				   
					<div class="portlet-body">
						  {!! Form::open(array('url'=> route('storeRole'), 'method' => 'post', 'class' => 'form-horizontal')) !!}

				  			<div class="form-group @if($errors->has('display_name')) has-error @endif">
								{!! Form::label('display_name', trans('general.name'), array('class' => 'col-md-2 control-label') ) !!}
								<div class="col-md-4 form-field">																						
									{!! Form::text('display_name',null, array('class' => 'form-control')) !!}											
									@if ($errors->has('display_name'))
	                                <span class="help-block">
	                                    {{ $errors->first('display_name') }}
	                                </span>
	                             	@endif
								</div>
							</div>
							<div class="form-group @if($errors->has('description')) has-error @endif">
								{!! Form::label('description', trans('general.description'), array('class' => 'col-md-2 control-label') ) !!}
								<div class="col-md-5 form-field">																						
									{!! Form::textarea('description',null, array('class' => 'form-control', 'rows' => '3')) !!}											
									@if ($errors->has('description'))
	                                <span class="help-block">
	                                    {{ $errors->first('description') }}
	                                </span>
	                             	@endif
								</div>
							</div>
							<hr/>
						  	<table class="table table-light table-hover">
						  		@foreach($resources as $resource)
						  		<tr>
                                    <td> {{ trans('general.'.$resource->title) }} </td>
                                    <td>
                                    	@foreach($resource->permissions as $permission)
                                        <label class="uniform-inline">
                                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" /> {{ trans('general.'.$permission->display_name) }} </label>                                        
                                        @endforeach    
                                    </td>
                                </tr>
						  		@endforeach              
                            </table>
                            <div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn green">{{ trans('general.submit') }}</button>
											<a href="{{route('users')}}" class="btn btn-default">{{ trans('general.cancel') }}</a>
										</div>
									</div>
								</div>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
        </div>
		<div class="clearfix"></div>    
@endsection                    