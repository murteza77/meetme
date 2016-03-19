@extends('User.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
               {{trans('general.user_update')}}
            </h2>
            <ol class="breadcrumb">
                <li class="active">
                    <a style="text-decoration: none" href="{!! URL::to('/') !!}"> {{trans('general.dashbord')}}</a> /
                    <a style="text-decoration: none" href="{!! URL::to('user/table-user') !!}"> {{trans('general.user_update')}}</a>
                </li>
            </ol>
        </div>
    </div>

    <div class="row" ng-app="user" ng-controller="userDeleteController">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-edit fa-fw"></i> {{trans('general.user_update')}}</h3>
                </div>
                <div class="panel-body">
                    {!! Form::open(array('id' => 'user', 'accept-charset' => 'utf-8', 'class' => 'form-horizontal',  'ng-submit'=>'update($user)')) !!}
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">{{trans('general.title')}}</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control " name="first_name" id="inputEmail3" required
                                   placeholder="{{trans('general.first_name')}}" value="{!! $user->first_name !!}" style="width: 60%">
                            <input type="hidden" name="id" value="{!! $user->id !!}">
                        </div>
                    </div>
                      <div class="form-group">
                        <label for="last_name" class="col-sm-2 control-label">{{trans('general.last_name')}}</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control "  name="last_name" required
                                
                                   value="{!! $user->last_name !!}" style="width: 60%">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">{{trans('general.email')}}</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control "  name="email" required
                                   value="{!! $user->email !!}"
                                   style="width: 60%">
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="org" class="col-sm-2 control-label">{{trans('general.org')}}</label>

                        <div class="col-sm-10">
                            <input type="text"  class="form-control " name="org" required
                                    value="{!! $user->org !!}"
                                   style="width: 60%">
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="phone" class="col-sm-2 control-label">{{trans('general.phone')}}</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control "  name="phone" required
                                   value="{!! $user->phone !!}"
                                   style="width: 60%">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> {{trans('general.update')}}
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('asset')
  
   
   
@endsection