<!DOCTYPE html>
<html>

<head>
    <title>{{trans('general.system_title')}}</title>

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
    <script>
        $(function(){
            $(".input").bind("keyup blur",function() {
                var $th = $(this);
                $th.val( $th.val().replace(/[^A-z0-9,. _-]/g, function(str) { return ''; } ) );
            });
        })
        $(function(){
            $(".number").bind("keyup blur",function() {
                var $th = $(this);
                $th.val( $th.val().replace(/[^0-9-.]/g, function(str) { return ''; } ) );
            });
        })
    </script>


</head>

<body>


<div class="container">

        <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                @if(Session::has('error'))
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="fa fa-info-circle"></i> {!! Session::get('error') !!}
                    </div>
                @endif
                <div class="panel-heading">
                    <h3 class="panel-title">{!! trans('general.create_org') !!}</h3>
                </div>
                <div class="panel-body">
                    {!! Form::open(array('accept-charset' => 'utf-8', 'role' => 'form', 'url' => 'account/createorg')) !!}
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control " placeholder="{{trans('general.org_name')}}" name="name" type="text" autofocus required @if(Session::has('input.org_name')) value="{!! Session::get('input.org_name') !!}" @endif>
                        </div>
                        <div class="form-group">
                            <input class="form-control " placeholder="{{trans('general.about_org')}}" name="about" type="text" required @if(Session::has('input.about_org')) value="{!! Session::get('input.about_org') !!}" @endif>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="{{trans('general.org_location')}}" name="location" type="text"  required @if(Session::has('input.org_location')) value="{!! Session::get('input.org_location') !!}" @endif>
                        </div>
                    
                     
                       
                        <div class="form-group">
                            <input class="form-control number" placeholder="{{trans('general.phone')}}" name="phone" type="text" required @if(Session::has('input.phone')) value="{!! Session::get('input.phone') !!}" @endif>
                        </div>
                     

                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-success btn-block"><i class="fa fa-fw fa-plus"></i>{{trans('general.create')}}</button>
                        </div>
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