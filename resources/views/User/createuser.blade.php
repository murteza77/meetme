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
                    <h3 class="panel-title">{!! trans('general.create_account') !!}</h3>
                </div>
                <div class="panel-body">
                    {!! Form::open(array('accept-charset' => 'utf-8', 'role' => 'form', 'url' => 'account/create')) !!}
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control " placeholder="{{trans('general.first_name')}}" name="first_name" type="text" autofocus required @if(Session::has('input.first_name')) value="{!! Session::get('input.first_name') !!}" @endif>
                        </div>
                        <div class="form-group">
                            <input class="form-control " placeholder="{{trans('general.last_name')}}" name="last_name" type="text" required @if(Session::has('input.last_name')) value="{!! Session::get('input.last_name') !!}" @endif>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="{{trans('general.email')}}" name="email" type="email"  required @if(Session::has('input.email')) value="{!! Session::get('input.email') !!}" @endif>
                        </div>
                         <div class="form-group">
                            <input class="form-control" placeholder="{{trans('general.org')}}" name="org" type="text"  required @if(Session::has('input.org')) value="{!! Session::get('input.org') !!}" @endif>
                        </div>
                        <div class="form-group">
                            
                            <select name="role">
                            @foreach(DCN\RBAC\Models\Role::all() as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="password" placeholder="{{trans('general.password')}}" name="password" type="password" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="confirm_password" placeholder="{{trans('general.confirm_password')}}" name="confirm_password" type="password" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control number" placeholder="{{trans('general.phone')}}" name="phone" type="text" required @if(Session::has('input.phone')) value="{!! Session::get('input.phone') !!}" @endif>
                        </div>
                        <!-- <div class="form-group">
                           {{ trans('general.already_account')}} <a style="text-decoration: none" href="{!! URL::to('/') !!}">{{trans('general.login')}}</a>
                        </div> -->
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