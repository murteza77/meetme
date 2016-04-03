
@extends('User.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <ol class="breadcrumb">
                <li class="active">
                    <a style="text-decoration: none" href="{!! URL::to('/') !!}"> {{trans('general.dashbord')}}</a> /
                    <a style="text-decoration: none" href="{!! URL::to('user/password-change') !!}"> {{trans('general.change_pass')}}</a>
                </li>
            </ol>
        </div>
    </div>

    <div class="row" ng-app="setting" ng-controller="settingController">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-edit fa-fw"></i> {{trans('general.change_pass')}}</h3>
                </div>
                <div class="panel-body">
                    {!! Form::open(array('id' => 'passwordChange', 'accept-charset' => 'utf-8', 'class' => 'form-horizontal', 'method' => 'post', 'ng-submit' => 'update($event)')) !!}
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">{{trans('general.current_pass')}}</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="current_password" required placeholder="{{trans('general.old_pass')}}" style="width: 60%">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">{{trans('general.new_pass')}}</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="new_password" name="new_password" required placeholder="{{trans('general.new_pass')}}" style="width: 60%">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">{{trans('general.confirm_pass')}}</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required placeholder="{{trans('general.confirm_pass')}}" style="width: 60%">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> {{trans('general.change')}}</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('asset')
    <script>
        var event = angular.module('setting', [], function($interpolateProvider) {
            $interpolateProvider.startSymbol('{kp');
            $interpolateProvider.endSymbol('kp}');
        });
        event.controller('settingController',function($scope,$http){
            $scope.update = function(event){
                event.preventDefault();
                $.pnotify.defaults.styling = "bootstrap3";
                if($("#new_password").val() != $("#confirm_password").val()){
                    $.pnotify({
                        title: 'ERROR',
                        text: 'New Password and Confirm Password are Not Matched',
                        type: 'error',
                        delay: 3000
                    });
                    return false
                }
                var req = {
                    method : 'POST',
                    url : "{!! URL::to('user/password-change') !!}",
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    data: $("#passwordChange").serialize()
                };
                $http(req).success(function (response) {
                    if (response == 'true') {
                        $.pnotify({
                            title: 'Message',
                            text: 'Password Changed Successfully',
                            type: 'success',
                            delay: 3000
                        });
                    } else {
                        $.pnotify({
                            title: 'ERROR',
                            text: response,
                            type: 'error',
                            delay: 3000
                        });
                    }
                });
            };
        });
    </script>
@endsection