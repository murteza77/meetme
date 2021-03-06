<!DOCTYPE html>
<html>

{!!
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
!!}
<head>


    <title> {{trans('general.App_name')}}</title>

    {!! HTML::script('js/jquery-2.0.3.min.js') !!}
    <!-- Bootstrap Core CSS -->
    {!! HTML::style('css/bootstrap.min.css') !!}


 {!! (isRTL())?
             HTML::style('css/bootstrap-rtl.min.css') :
             HTML::style('css/bootstrap.min.css')
        !!}
    <!-- Custom CSS -->
    {!! HTML::style('css/sb-admin-2.css') !!}

    <!-- Custom Fonts -->
    {!! HTML::style('font-awesome/css/font-awesome.min.css') !!}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

   
</head>

<body>

<div class="container">

    <div class="row">
        
        
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                @if(Session::get('error'))
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-info-circle"></i> {!! Session::get('error') !!}
                            </div>
                @endif
                <div class="panel-heading">
                    <h3 class="panel-title">{{trans('general.login')}}</h3>
                </div>
                <div class="panel-body">
                    {!! Form::open(array('accept-charset' => 'utf-8', 'role' => 'form', 'url' => 'account/login')) !!}
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="{{trans('general.email')}}" name="email" type="email" autofocus required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="{{trans('general.password')}}" name="password" type="password" required>
                        </div>
<!-- 
                        <div class="form-group">
                            <input type="checkbox" name="remember" value="1"> {{trans('general.remember_me')}}
                        </div>
                        -->
                        <div class="form-group">  <a href="password/email" name="forget_pass"> {{trans('general.forget_pass')}}</a>
                        </div>


                        <div class="form-group">
                            <input type="submit" class="btn btn-lg btn-success btn-block" value="{{trans('general.login')}}">
                        </div>
                        <!-- Change this to a button or input when using this as a form -->

                    </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Core JavaScript -->
{!! HTML::script('js/bootstrap.min.js') !!}

<!-- Custom Theme JavaScript -->
{!! HTML::script('js/sb-admin-2.js') !!}

</body>

</html>
