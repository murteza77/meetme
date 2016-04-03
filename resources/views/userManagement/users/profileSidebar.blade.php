<div class="profile-sidebar">
<!-- PORTLET MAIN -->
<div class="portlet light profile-sidebar-portlet ">
    <!-- SIDEBAR USERPIC -->
    <div class="profile-userpic">
        @if(empty($user->employee->avatar))
            <img src="{{ url('') }}/assets/global/img/profile.png" class="img-responsive" alt=""> 
        @else
            {!! HTML::image('uploads/avatars/'.$user->employee->avatar,null,['class'=>'img-responsive']) !!}
        @endif
     </div>
    <!-- END SIDEBAR USERPIC -->
    <!-- SIDEBAR USER TITLE -->
    <div class="profile-usertitle">
        <div class="profile-usertitle-name"> {{ $user->employee->name }} {{ $user->employee->last_name }}</div>
        <div class="profile-usertitle-job"> {{ $user->employee->jobTitle() }} </div>
    </div>
    <!-- END SIDEBAR USER TITLE -->
    @if(0)
    <!-- SIDEBAR BUTTONS -->
    <div class="profile-userbuttons">
        <button type="button" class="btn btn-circle green btn-sm">Follow</button>
        <button type="button" class="btn btn-circle red btn-sm">Message</button>
    </div>
    <!-- END SIDEBAR BUTTONS -->
    @endif
    <!-- SIDEBAR MENU -->
    <div class="profile-usermenu">
        <ul class="nav">
            @if(0)
            <li>
                <a href="page_user_profile_1.html">
                    <i class="icon-home"></i> Overview </a>
            </li>
            @endif
            <li class="active">
                <a href="page_user_profile_1_account.html">
                    <i class="icon-settings"></i> {{trans('general.account_settings')}} </a>
            </li>
            @if(0)
            <li>
                <a href="page_user_profile_1_help.html">
                    <i class="icon-info"></i> Help </a>
            </li>
            @endif
        </ul>
    </div>
    <!-- END MENU -->
</div>
<!-- END PORTLET MAIN -->

@if(0)
 <!-- PORTLET MAIN -->
<div class="portlet light ">
    <!-- STAT -->
    <div class="row list-separated profile-stat">
        <div class="col-md-4 col-sm-4 col-xs-6">
            <div class="uppercase profile-stat-title"> 37 </div>
            <div class="uppercase profile-stat-text"> Projects </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-6">
            <div class="uppercase profile-stat-title"> 51 </div>
            <div class="uppercase profile-stat-text"> Tasks </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-6">
            <div class="uppercase profile-stat-title"> 61 </div>
            <div class="uppercase profile-stat-text"> Uploads </div>
        </div>
    </div>
    <!-- END STAT -->
    <div>
        <h4 class="profile-desc-title">About Marcus Doe</h4>
        <span class="profile-desc-text"> Lorem ipsum dolor sit amet diam nonummy nibh dolore. </span>
        <div class="margin-top-20 profile-desc-link">
            <i class="fa fa-globe"></i>
            <a href="http://www.keenthemes.com">www.keenthemes.com</a>
        </div>
        <div class="margin-top-20 profile-desc-link">
            <i class="fa fa-twitter"></i>
            <a href="http://www.twitter.com/keenthemes/">@keenthemes</a>
        </div>
        <div class="margin-top-20 profile-desc-link">
            <i class="fa fa-facebook"></i>
            <a href="http://www.facebook.com/keenthemes/">keenthemes</a>
        </div>
    </div>
</div>
<!-- END PORTLET MAIN -->
@endif
</div>