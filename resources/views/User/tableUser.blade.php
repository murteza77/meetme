@extends('User.layout')
@section('content')


    <div class="row">
        <div class="col-lg-12">
          
            <ol class="breadcrumb">
                <li class="active">
                    <a style="text-decoration: none" href="{!! URL::to('/') !!}"> {{trans('general.dashbord')}}</a> /
                    <a style="text-decoration: none" href="{!! URL::to('user/table-user') !!}">{{trans('general.users_table')}}</a>
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
       <div class="col-lg-12">
          <a href="{!! URL::to('user/create-user') !!}" class="btn btn-success"><i class="fa fa-fw fa-plus"></i> {{trans('general.create_user')}}</a>
        </div>
    </div>
    <br/>
    <!-- /.row -->
    <div class="row" ng-app="user" ng-controller="userDeleteController">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-fw fa-table fa-fw"></i> {{trans('general.admin')}}</h3>
                </div>
                <div class="panel-body">
                    <table id="example" class="display" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>{{trans('general.username')}}</th>
                             <th>{{trans('general.email')}}</th>
                             <th>{{trans('general.org')}}</th>
                            <th>{{trans('general.action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr id="{!! $user->id !!}">
                            <td>{!! $user->first_name !!} {!! $user->last_name !!}</td>
                            <td>{!! $user->email !!}</td>
                            <td>{!! $user->org !!}</td>
                            <td>
                                <a class="btn btn-danger delete" ng-click="delete({!! $user->id !!})" ><i class="fa fa-fw fa-trash-o"></i>{{trans('general.delete')}}</a>
                                <a class="btn btn-primary iframe" href='{!! URL::to("user/table-user/$user->id") !!}'><i class="fa fa-fw fa-edit"></i>{{trans('general.edit')}}</a>
                            </td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('asset')
    {!! HTML::script('js/jquery.dataTables.js') !!}
    {!! HTML::script('js/dataTables.tableTools.js') !!}
    {!! HTML::style('css/jquery.dataTables.css') !!}
    {!! HTML::style('css/dataTables.tableTools.css') !!}
    <script>
        var user = angular.module('user', [], function($interpolateProvider) {
            $interpolateProvider.startSymbol('{kp');
            $interpolateProvider.endSymbol('kp}');
        });
        user.controller('userDeleteController',function($scope,$http){
            $scope.delete = function(id){
                var req = {
                    method : 'GET',
                    url : "{!! URL::to('user/trash-user') !!}",
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    params: { id: id }
                };
                var chk = confirm("Are you sure to trash this user?");
                if (chk) {
                    $http(req).success(function (response) {
                        $.pnotify.defaults.styling = "bootstrap3";
                        if (response == 'true') {
                            $("#"+id).hide();
                            $.pnotify({
                                title: 'Message',
                                text: 'User Trashed Successfully',
                                type: 'success',
                                delay: 3000
                            });
                        } else {
                            $.pnotify({
                                title: 'ERROR',
                                text: 'Something Went Wrong',
                                type: 'error',
                                delay: 3000
                            });
                        }
                    });
                }
            };
        });
    </script>
    <script type="text/javascript" language="javascript" class="init">
        $(document).ready(function() {
            $('#example').DataTable( {
                dom: 'T<"clear">lfrtip'
            });
        });
    </script>
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