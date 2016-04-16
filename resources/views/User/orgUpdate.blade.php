@extends('User.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12">
         
            <ol class="breadcrumb">
                <li class="active">
                    <a style="text-decoration: none" href="{!! URL::to('/') !!}"> {{trans('general.dashbord')}}</a> /
                    <a style="text-decoration: none" href="{!! URL::to('user/table-user') !!}"> {{trans('general.org_update')}}</a>
                </li>
            </ol>
        </div>
    </div>


    <div class="row" ng-app="user" ng-controller="userDeleteController">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-edit fa-fw"></i> {{trans('general.org_update')}}</h3>
                </div>
                <div class="panel-body">
                    {!! Form::open(array('id' => 'org', 'accept-charset' => 'utf-8', 'class' => 'form-horizontal',  'ng-submit'=>'update($org)')) !!}
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">{{trans('general.title')}}</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control " name="name" id="inputEmail3" required
                                   placeholder="{{trans('general.org_name')}}" value="{!! $org->name !!}" style="width: 60%">
                            <input type="hidden" name="id" value="{!! $org->id !!}">
                        </div>
                    </div>

                     <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">{{trans('general.about_org')}}</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control " name="about" id="inputEmail3" required
                                   placeholder="{{trans('general.about_org')}}" value="{!! $org->about !!}" style="width: 60%">
                            <input type="hidden" name="id" value="{!! $org->id !!}">
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">{{trans('general.org_location')}}</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control " name="location" id="inputEmail3" required
                                   placeholder="{{trans('general.org_location')}}" value="{!! $org->location !!}" style="width: 60%">
                            <input type="hidden" name="id" value="{!! $org->id !!}">
                        </div>
                    </div>

                     <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">{{trans('general.phone')}}</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control " name="phone" id="inputEmail3" required
                                   placeholder="{{trans('general.phone')}}" value="{!! $org->phone !!}" style="width: 60%">
                            <input type="hidden" name="id" value="{!! $org->id !!}">
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