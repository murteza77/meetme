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
          <a href="{!! URL::to('user/create-org') !!}" class="btn btn-success"><i class="fa fa-fw fa-plus"></i> {{trans('general.create_org')}}</a>
        </div>
    </div>
    <br/>
    <!-- /.row -->
    <div class="row" ng-app="org" ng-controller="userDeleteController">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-fw fa-table fa-fw"></i> {{trans('general.org_admin')}}</h3>
                </div>
                <div class="panel-body">
                    <table id="example" class="display" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                             <th>{{trans('general.org_name')}}</th>
                             <th>{{trans('general.about_org')}}</th>
                             <th>{{trans('general.org_location')}}</th>
                               <th>{{trans('general.phone')}}</th>
                            <th>{{trans('general.action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                   @foreach($orgsdata as $orgdata)
                        <tr id="{{ $orgdata->id }}">
                            <td>{{ $orgdata->name }}</td>
                            <td>{{ $orgdata->about }}</td>
                            <td>{{ $orgdata->location }}</td>

                            <td>{{ $orgdata->phone }}</td>

                            <td>
                                <a class="btn btn-danger delete" ng-click="delete({!! $orgdata->id !!})" ><i class="fa fa-fw fa-trash-o"></i>{{trans('general.delete')}}</a>
                                <a class="btn btn-primary iframe" href='{!! URL::to("user/org-update/$orgdata->id") !!}'><i class="fa fa-fw fa-edit"></i>{{trans('general.edit')}}</a>
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
@section('asset') {!! HTML::script('js/jquery.dataTables.js') !!}
    {!! HTML::script('js/dataTables.tableTools.js') !!}
    {!! HTML::style('css/jquery.dataTables.css') !!}
    {!! HTML::style('css/dataTables.tableTools.css') !!}
    <script>
        var user = angular.module('org', [], function($interpolateProvider) {
            $interpolateProvider.startSymbol('{kp');
            $interpolateProvider.endSymbol('kp}');
        });
        user.controller('userDeleteController',function($scope,$http){
            $scope.delete = function(id){
                var req = {
                    method : 'GET',
                    url : "{!! URL::to('user/trash-org') !!}",
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    params: { id: id }
                };
                var chk = confirm("Are you sure to trash this?");
                if (chk) {
                    $http(req).success(function (response) {
                        $.pnotify.defaults.styling = "bootstrap3";
                        if (response == 'true') {
                            $("#"+id).hide();
                            $.pnotify({
                                title: 'Message',
                                text: 'Organiztion Trashed Successfully',
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