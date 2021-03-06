<!DOCTYPE html>
<html>

<head lang="{{ lang() }}" dir="{{ direction() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">

    <title>
    
    {{ trans('general.App_name') }} </title>


    {!! HTML::script('js/jquery-2.0.3.min.js') !!}

            <!-- Bootstrap Core CSS -->
        {!! HTML::style('css/bootstrap.min.css') !!}
        {!! HTML::style('font-awesome/css/font-awesome.min.css') !!}

        {!! (isRTL())?
             HTML::style('css/bootstrap-rtl.min.css') :
             HTML::style('css/bootstrap.min.css')
        !!}

        {!!  (isRTL())?
        HTML::style('css/custom_fa.css'):
        HTML::style('css/custom.css')

        !!}

        
   
    {!! HTML::style('css/charisma-app.css') !!}
    {!! HTML::style('css/jquery-ui.css') !!}


    {!! HTML::style('css/custom.css') !!}

            <!-- MetisMenu CSS -->
    {!! HTML::style('css/metisMenu.min.css') !!}

    {{--pnotify--}}
    {!! HTML::style('css/pnotify/jquery.pnotify.default.icons.css') !!}
    {!! HTML::style('css/pnotify/jquery.pnotify.default.css') !!}
    {!! HTML::script('js/pnotify/jquery.pnotify.js') !!}


    {{--{!! HTML::style('colorbox/colorbox.css') !!}
    {!! HTML::script('colorbox/jquery.colorbox.js') !!}--}}

            <!-- Custom CSS -->
    {!! HTML::style('css/sb-admin-2.css') !!}
    {!! HTML::script('js/angular.min.js') !!}

            <!-- Morris Charts CSS -->
    {{--{!! HTML::style('css/plugins/morris.css') !!}--}}

    <!-- Custom Fonts -->
    

            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        $(function () {
            $(".input").bind("keyup blur", function () {
                var $th = $(this);
                $th.val($th.val().replace(/[^A-z0-9,. _-]/g, function (str) {
                    return '';
                }));
            });
        })
        $(function () {
            $(".number").bind("keyup blur", function () {
                var $th = $(this);
                $th.val($th.val().replace(/[^0-9-.]/g, function (str) {
                    return '';
                }));
            });
        })
    </script>
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                        (i[r].q = i[r].q || []).push(arguments)
                    }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-60038966-1', 'auto');
        ga('send', 'pageview');

    </script>
 
    @yield('asset')

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>n
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">{{ trans('passwords.system_title')}}</a>
        </div>
        <!-- /.navbar-header -->
        <ul class="nav navbar-top-links navbar-right" id="username">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  <i class="fa fa-user fa-fw"></i>{!! Auth::user()->first_name !!} <i class="fa fa-caret-down"></i> 
                </a>
                <ul class="dropdown-menu dropdown-user" >
                    <li>
                        <a href="{!! URL::to('account/logout') !!}"><i class="fa fa-fw fa-power-off"></i> {{ trans('general.logout') }}</a>
                    </li>
                   
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->

            <!-- /.language -->
           
        </ul>

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a class="@if(@$menu == 'Dashboard') active @endif" href="{!! URL::to('user') !!}"><i
                                    class="fa fa-fw fa-dashboard"></i>  {{ trans('general.dashbord') }}</a>
                    </li>
                    <li>
                        <a class="@if($menu == 'Event') active @endif" href="{!! URL::to('user/event') !!}"><i
                                    class="fa fa-fw fa-th"></i> {{ trans('general.event') }}</a>
                    </li>
                    <li>
                        <a class="@if($menu == 'Create Event') active @endif"
                           href="{!! URL::to('user/create-event') !!}"><i class="fa fa-fw fa-plus"></i>{{ trans('general.create_event') }}</a>
                    </li>
                    <li>
                        <a class="@if($menu == 'Table') active @endif" href="{!! URL::to('user/table-event') !!}"><i
                                    class="fa fa-fw fa-table"></i> {{ trans('general.event_table') }}</a>
                    </li>
                    <li>
                        <a class="@if($menu == 'Trash') active @endif" href="{!! URL::to('user/event-trash') !!}"><i
                                    class="fa fa-fw fa-trash-o"></i> {{ trans('general.trash') }}</a>
                    </li>

                    <li>
                        <a class="@if($menu == 'Setting') active @endif" href="#"><i class="fa fa-fw fa-wrench"></i>
                          {{ trans('general.setting') }}<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{!! URL::to('user/update-info') !!}">{{ trans('general.update_information') }}</a>
                             
                            </li>
                            <li>
                                <a href="{!! URL::to('user/password-change') !!}">{{ trans('general.change_pass') }}</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                    <li>
                        <a class="@if($menu == 'Report') active @endif" href="#"><i class="fa fa-bar-chart-o fa-fw"></i>
                              {{ trans('general.report') }} <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{!! URL::to('user/table-report') !!}">  {{ trans('general.table_report') }}</a>
                            </li>
                            <li>
                                <a href="{!! URL::to('user/calender-report') !!}">  {{ trans('general.calendar_report')}}</a>
                            </li>


                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

               
        @role('admin')
                    <li>
                        <a class="@if($menu == 'admin') active @endif" href="{!! URL::to('user/admin') !!}"><i
                                    class="fa fa-fw fa-trash-o"></i> {{ trans('general.admin') }}</a>
                    </li>
                      <li>
                        <a class="@if($menu == 'organize') active @endif" href="{!! URL::to('user/organize') !!}"><i
                                    class="fa fa-fw fa-trash-o"></i> {{ trans('general.org_admin') }}</a>
                    </li>
             
         @endrole     
                     <li>
                        <a class="@if($menu == 'Table2') active @endif" href="{!! URL::to('user/table-event') !!}"><i
                                    class="fa fa-fw fa-table"></i> {{ trans('general.event_table') }}</a>
                    </li>

                </ul>
            </div>
            <!-- /.sidebar-collapse -->
            {{--<div class="row margin-10">
                
            </div>--}}
        </div>
        <!-- /.navbar-static-side -->
    </nav>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

    <div id="page-wrapper">
        <div class="row">
            
        </div>
        @yield('content')
        <div class="row">
            
        </div>
                <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Bootstrap Core JavaScript -->
{!! HTML::script('js/bootstrap.min.js') !!}
{!! HTML::script('js/jquery-ui.js') !!}
{!! HTML::script('js/timepicker.js') !!}

        <!-- Metis Menu Plugin JavaScript -->
{!! HTML::script('js/metisMenu.min.js') !!}

{!! HTML::script('js/sb-admin-2.js') !!}


</body>

</html>
