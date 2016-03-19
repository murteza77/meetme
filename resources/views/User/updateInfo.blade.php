@extends('User.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12">
           
            <ol class="breadcrumb">
                <li class="active">
                    <a style="text-decoration: none" href="{!! URL::to('/') !!}">  {{trans('general.dashbord')}} </a> /
                    <a style="text-decoration: none" href="{!! URL::to('user/update-info') !!}">  {{trans('general.update_information')}}</a>
                </li>
            </ol>
        </div>
    </div>
    
    <div class="row" ng-app="setting" ng-controller="settingController">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-edit fa-fw"></i>  {{trans('general.update_information')}}</h3>
                </div>
                <div class="panel-body">
                    {!! Form::open(array('id' => 'settings', 'accept-charset' => 'utf-8', 'class' => 'form-horizontal', 'method' => 'post', 'ng-submit' => 'update($event)')) !!}
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label"> {{trans('general.first_name')}}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control " name="first_name" required placeholder="{{trans('general.first_name')}}" style="width: 60%" value="{!! Auth::user()->first_name !!}">
                            <input type="hidden" name="id" required value="{!! Auth::user()->id !!}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label"> {{trans('general.last_name')}}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control " name="last_name" required placeholder="{{trans('general.last_name')}}" style="width: 60%" value="{!! Auth::user()->last_name !!}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label"> {{trans('general.email')}}</label>
                        <div class="col-sm-10">
                            <input type="eamil" class="form-control" name="email" required placeholder="Email" style="width: 60%" value="{!! Auth::user()->email !!}">
                        </div>
                    </div>


                    <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label"> {{trans('general.lang')}}</label>
                          <div class="col-sm-10">
                                <select value="{!! Auth::user()->lang !!}" name="language">
                                    <option value="en">{{trans('general.eng')}}</option>
                                    <option value="fa"> {{trans('general.dari')}}</option>
                                </select>
                      
                          </div>


                    <?php $lang = ['fa'=>'Dari','en'=>'English'] ?>


                    </div>



                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label"> {{trans('general.phone')}}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control number" name="phone" required placeholder="{{trans('general.phone')}}" style="width: 60%" value="{!! Auth::user()->phone !!}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <input name="email_status" @if(Auth::user()->email_status == 'on') checked @endif type="checkbox"> {{trans('general.email_daily_meeting')}}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> {{trans('general.update')}}</button>
                        </div>
                    </div>
                    {!! Form::close()   !!}
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
                var req = {
                    method : 'POST',
                    url : "{!! URL::to('user/update-info') !!}",
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    data: $("#settings").serialize()
                };
                    $http(req).success(function (response) {
                        $.pnotify.defaults.styling = "bootstrap3";
                        if (response == 'true') {
                            $.pnotify({
                                title: 'Message',
                                text: 'Information Update Successfully',
                                type: 'success',
                                delay: 3000,

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
    @if(Session::get('error'))
        <script type="text/javascript" language="javascript" class="init">
            $(document).ready(function() {
                $.pnotify.defaults.styling = "bootstrap3";
                $.pnotify({
                    title: 'ERROR',
                    text: "{!! Session::get('error') !!}",
                    type: 'error',
                    delay: 3000
                });
            });
        </script>
    @endif
    @if(Session::get('success'))
        <script type="text/javascript" language="javascript" class="init">
            $(document).ready(function() {
                $.pnotify.defaults.styling = "bootstrap3";
                $.pnotify({
                    title: 'Message',
                    text: "{!! Session::get('success') !!}",
                    type: 'success',
                    delay: 3000
                });
            });
        </script>
    @endif
@endsection