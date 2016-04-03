 @extends('layout.index')
 
 @section('page_level_plugins_css')
 <!-- Put page level plugin css-links here :)  -->	 
 	 {!! Html::style('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') !!}
	 {!! Html::style('assets/pages/css/profile-rtl.min.css') !!}	 
 @endsection
 
 @section('page_level_plugins_script')
 <!-- Put page level plugin script-links here :)  -->
	{!! Html::script('assets/global/plugins/bootstrap-pwstrength/pwstrength-bootstrap.min.js') !!}
	{!! Html::script('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') !!}
<!-- 	{!! Html::script('assets/global/plugins/jquery.sparkline.min.js') !!}
	{!! Html::script('assets/global/plugins/gmaps/gmaps.min.js') !!}    
    <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script> -->
	
 @endsection
 
 @section('page_level_scripts')
 <!-- put any script link that is related only to this page here :)  -->
 <!-- write your own custom scripts here :)  -->
 <!--  {!! Html::script('assets/pages/scripts/profile.min.js') !!}    
 {!! Html::script('assets/pages/scripts/timeline.min.js') !!}     -->
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
     <!-- BEGIN PAGE TITLE-->
    <h3 class="page-title"> {{ trans('general.users') }}
        <small>{{ trans('general.user_profile') }}</small>
    </h3>
    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PROFILE SIDEBAR -->            
            @include('userManagement.users.profileSidebar')            
            <!-- END BEGIN PROFILE SIDEBAR -->
            <!-- BEGIN PROFILE CONTENT -->
            <div class="profile-content">
                <div class="row">
                    <div class="col-md-12">

                    	@include('layout.message')

                        <div class="portlet light ">
                            <div class="portlet-title tabbable-line">
                                <div class="caption caption-md">
                                    <i class="icon-globe theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase">{{ trans('general.profile_account') }}</span>
                                </div>
                                <ul class="nav nav-tabs">

                                    <li class="@if($errors->count() == 0 || $errors->has('email')) active @endif">
                                        <a href="#tab_1_1" data-toggle="tab">{{ trans('general.personal_info') }}</a>
                                    </li>
                                    @if(0)
                                    <li>
                                        <a href="#tab_1_2" data-toggle="tab">{{ trans('general.change_avatar') }}</a>
                                    </li>
                                    @endif
                                    <li class="@if($errors->has('password') || $errors->has('password_confirmation')) active @endif">
                                        <a href="#tab_1_3" data-toggle="tab">{{ trans('general.change_password') }}</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_4" data-toggle="tab">{{ trans('general.privacy_settings') }}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->
                                    <div class="tab-pane @if($errors->count() == 0 || $errors->has('email')) active @endif" id="tab_1_1">
                                    	{!! Form::model($user,['url' => route('updateUser',['id' => $user->id]),'method'=> 'PUT' ,'class' => 'form-horizontal' , 'role' => 'form']) !!}
                                        <form role="form" class="form-horizontal" action="#">
                                        	<div class="form-group">										
												<label class="control-label col-md-2 font-blue-madison">{{ trans('general.name') }}</label>
												<div class="col-md-5 form-field">
													<p class="form-control-static"> {{ $user->employee->name }} </p>
												</div>
											</div>
											<div class="form-group">										
												<label class="control-label col-md-2 font-blue-madison">{{ trans('general.last_name') }}</label>
												<div class="col-md-5 form-field">
													<p class="form-control-static"> {{ $user->employee->last_name }} </p>
												</div>
											</div>
                                            <div class="form-group">										
												<label class="control-label col-md-2 font-blue-madison">{{ trans('general.father_name') }}</label>
												<div class="col-md-5 form-field">
													<p class="form-control-static"> {{ $user->employee->father_name or '' }} </p>
												</div>
											</div>
											<div class="form-group">										
												<label class="control-label col-md-2 font-blue-madison">{{ trans('general.phone') }}</label>
												<div class="col-md-5 form-field">
													<p class="form-control-static"> {{ $user->employee->phone or '' }} </p>
												</div>
											</div>

                                            <div class="form-group @if($errors->has('language')) has-error @endif">                   
                                                <label class="control-label col-md-2 font-blue-madison">{{trans('general.language')}}</label>
                                                <div class="col-md-5 form-field">                                                    
                                                    {!! Form::select('language',config('app.locales'), null, ['class' => 'form-control placeholder-no-fix', 'placeholder' => trans('general.default_language')]) !!} 
                                                    @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        {{ $errors->first('email') }}
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group @if($errors->has('email')) has-error @endif">										
												<label class="control-label col-md-2 font-blue-madison">{{ trans('general.email') }}</label>
												<div class="col-md-5 form-field">
													{!! Form::email('email',null,['class' => 'form-control ltr']) !!}
													@if ($errors->has('email'))
					                                <span class="help-block">
					                                    {{ $errors->first('email') }}
					                                </span>
					                             	@endif														
												</div>
											</div>
                                            <div class="form-group">
                                                {!! Form::label('status', trans('general.status'), array('class' => 'col-md-2 control-label font-blue-madison') ) !!}
                                                <div class="col-md-5 form-field">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        {!! Form::select('active',[trans('general.inactive'), trans('general.active')], null,['class'=> 'form-control']) !!}
                                                    </div>
                                                </div>
                                            </div>
											<hr/>
											<div class="form-actions margin-top-20">
												<div class="row">
													<div class="col-md-offset-2 col-md-9">
														<button type="submit" class="btn green"> {{ trans('general.submit') }} </button>
                                                        <a href="{{route('users')}}" class="btn default"> {{ trans('general.cancel') }} </a> 													
													</div>
												</div>
											</div>                                                                                                                                                                                                                 
                                        {!! Form::close() !!}
                                    </div>
                                    <!-- END PERSONAL INFO TAB -->
                                    @if(0)
                                    <!-- CHANGE AVATAR TAB -->
                                    <div class="tab-pane" id="tab_1_2">
                                        <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                            eiusmod. </p>
                                        <form action="#" role="form">
                                            <div class="form-group">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                    <div>
                                                        <span class="btn default btn-file">
                                                            <span class="fileinput-new"> Select image </span>
                                                            <span class="fileinput-exists"> Change </span>
                                                            <input type="file" name="..."> </span>
                                                        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                    </div>
                                                </div>
                                                <div class="clearfix margin-top-10">
                                                    <span class="label label-danger">NOTE! </span>
                                                    <span>Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
                                                </div>
                                            </div>
                                            <div class="margin-top-10">
                                                <button type="submit" class="btn green"> {{ trans('general.submit') }} </button>
                                                <a href="{{route('users')}}" class="btn default"> {{ trans('general.cancel') }} </a> 
                                            </div>
                                        </form>
                                    </div>
                                    <!-- END CHANGE AVATAR TAB -->
                                    @endif
                                    <!-- CHANGE PASSWORD TAB -->
                                    <div class="tab-pane @if($errors->has('password') || $errors->has('password_confirmation')) active @endif" id="tab_1_3">
                                        {!! Form::open(['url' => route('updatePassword', ['id' => $user->id]),'method' => 'PUT', 'class' => 'form-horizontal', ]) !!}
                                           
                                             <div class="form-group @if($errors->has('password')) has-error @endif">
                                                {!! Form::label('password',trans('general.password'),['class' => 'control-label col-md-2 font-blue-madison']) !!}                                                
                                                <div class="col-md-5 form-field">
                                                    {!! Form::password('password',['class' => 'form-control']) !!}
                                                    @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        {{ $errors->first('password') }}
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group @if($errors->has('password_confirmation')) has-error @endif">                                       
                                                {!! Form::label('password_confirmation',trans('general.password_confirmation'),['class' => 'control-label col-md-2 font-blue-madison']) !!}                                                
                                                <div class="col-md-5 form-field">
                                                    {!! Form::password('password_confirmation',['class' => 'form-control']) !!}
                                                    @if ($errors->has('password_confirmation'))
                                                    <span class="help-block">
                                                        {{ $errors->first('password_confirmation') }}
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <hr/>
                                            <div class="form-actions margin-top-20">
                                                <div class="row">
                                                    <div class="col-md-offset-2 col-md-9">
                                                         <button type="submit" class="btn green"> {{ trans('general.submit') }} </button>
                                                        <a href="{{route('users')}}" class="btn default"> {{ trans('general.cancel') }} </a>                                                  
                                                    </div>
                                                </div>
                                            </div>
                                        {!! Form::close() !!}
                                    </div>
                                    <!-- END CHANGE PASSWORD TAB -->
                                    <!-- PRIVACY SETTINGS TAB -->
                                    <div class="tab-pane" id="tab_1_4">                                        
                                        {!! Form::open(['url' => route('updateRoles',['id' => $user->id]), 'method' => 'PUT']) !!}
                                            <table class="table table-light table-hover">                                               
                                                @foreach($roles as $role)
                                                <tr>
                                                    <td style="width:15px">
                                                        <input type="checkbox" name="roles[]" value="{{$role->id}}" @if($user->roles->contains($role->id)) checked @endif /> 
                                                    </td>
                                                    <td> {{$role->display_name}} </td>                    
                                                </tr>
                                                @endforeach
                                            </table>
                                            <hr/>
                                            <!--end profile-settings-->
                                            <div class="form-actions margin-top-20">
                                                <div class="row">
                                                    <div class="col-md-offset-2 col-md-9">
                                                        <button type="submit" class="btn green"> {{ trans('general.submit') }} </button>
                                                        <a href="{{route('users')}}" class="btn default"> {{ trans('general.cancel') }} </a>                                                        
                                                    </div>
                                                </div>
                                            </div> 
                                        {!! Form::close() !!}
                                    </div>
                                    <!-- END PRIVACY SETTINGS TAB -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PROFILE CONTENT -->
        </div>
    </div>                                  
@endsection                    