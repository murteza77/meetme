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
	<script>
		$(function(){
				var handlePasswordStrengthChecker = function () {
					var initialized = false;
					var options = {};
					options.ui = {
						//showProgressBar: false,
						//showPopover: true,
						showVerdictsInsideProgressBar: true,
						//scores: [17, 26, 40, 50],
						verdicts: ["{{ trans('general.weak') }}", "{{ trans('general.normal') }}", "{{ trans('general.medium') }}", "{{ trans('general.strong') }}", "{{ trans('general.very_strong') }}"], 
					}
					var input = $("#password_strength");

					input.keydown(function () {
						if (initialized === false) {
							// set base options
							input.pwstrength(options);

							// add your own rule to calculate the password strength
							input.pwstrength("addRule", "demoRule", function (options, word, score) {
								return word.match(/[a-z].[0-9]/) && score;
							}, 10, true);

							// set as initialized 
							initialized = true;
						}
					});
					
				}
			
				handlePasswordStrengthChecker();	
				
		})
	</script>    
 @endsection

 @section('content')
		<!-- BEGIN PAGE HEADER-->
			
		<!-- BEGIN PAGE TITLE-->
		<h3 class="page-title"> {{ trans('general.users') }}
			<small>{{ trans('general.new_user') }}</small>
		</h3>
		<!-- END PAGE TITLE-->
	
		<!-- END PAGE HEADER-->
		<div class="row">
			<div class="col-md-12">
				<div class="portlet light portlet-fit portlet-datatable bordered">					
				   <div class="portlet-title">							
						<div class="caption">							
							<span class="caption-subject font-green sbold">{{ trans('general.new_user') }}</span>
						</div>												 
					</div> 
				   
					<div class="portlet-body">
						  {!! Form::open(array('url'=> route('storeUser'), 'method' => 'post', 'class' => 'form-horizontal')) !!}
						  	<div class="form-body">																
								<div class="form-group margin-top-20 {{ $errors->has('id') ? ' has-error' : '' }}">
									{!! Form::label('id',trans('general.name'),['class' => 'control-label col-md-3']) !!}						
									<div class="col-md-4 form-field">													
										{!! Form::select('id', array(), null, ['class'=> 'form-control employee-list', 'option-selected' => !empty(old('id')) ? old('id') : '', 'style' => 'width:100%']) !!}
										@if ($errors->has('id'))
				                            <span class="help-block">
				                                {{ $errors->first('id') }}
				                            </span>
			                         	@endif
									</div>
								</div>																																																				
								<div class="form-group @if($errors->has('email')) has-error @endif">
									{!! Form::label('email', trans('general.email'), array('class' => 'col-md-3 control-label') ) !!}
									<div class="col-md-4 form-field">
										{!! Form::email('email', null, ['class' => 'form-control ltr']) !!}
										@if ($errors->has('email'))
		                                <span class="help-block">
		                                    {{ $errors->first('email') }}
		                                </span>
		                             	@endif											
									</div>
								</div>
								<div class="form-group @if($errors->has('password')) has-error @endif">
									{!! Form::label('password', trans('general.password'), array('class' => 'col-md-3 control-label') ) !!}
									<div class="col-md-4 form-field">
										{!! Form::password('password', ['class' => 'form-control ltr', 'id' => 'password_strength']) !!}
										@if ($errors->has('password'))
		                                <span class="help-block">
		                                    {{ $errors->first('password') }}
		                                </span>
		                             	@endif
									</div>
								</div>	
								<div class="form-group @if($errors->has('password_confirmation')) has-error @endif">
									{!! Form::label('password_confirmation', trans('general.password_confirmation'), array('class' => 'col-md-3 control-label') ) !!}
									<div class="col-md-4 form-field">
										{!! Form::password('password_confirmation',  ['class' => 'form-control ltr']) !!}											
										@if ($errors->has('password_confirmation'))
		                                <span class="help-block">
		                                    {{ $errors->first('password_confirmation') }}
		                                </span>
		                             	@endif
									</div>
								</div>
								<div class="form-group">
									{!! Form::label('status', trans('general.status'), array('class' => 'col-md-3 control-label') ) !!}
									<div class="col-md-4 form-field">
										<div class="input-icon right">
											<i class="fa"></i>
											{!! Form::select('active',[trans('general.inactive'), trans('general.active')], 1,['class'=> 'form-control']) !!}
										</div>
									</div>
								</div>								
						    <hr/> 
							<div class="form-actions">
								<div class="row">
									<div class="col-md-offset-3 col-md-9">
										<button type="submit" class="btn green">{{ trans('general.submit') }}</button>
										<a href="{{route('users')}}" class="btn btn-default">{{ trans('general.cancel') }}</a>
									</div>
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