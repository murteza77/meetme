@extends('User.layout')
@section('content')


    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
               {{trans('general.event_update')}}
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <a style="text-decoration: none" href="{!! URL::to('/') !!}"> {{trans('general.dashbord')}}</a> /
                    <a style="text-decoration: none" href="{!! URL::to('user/table-event') !!}"> {{trans('general.event_table')}}</a>
                </li>
            </ol>
        </div>
    </div>

    <div class="row" ng-app="event" ng-controller="eventDeleteController">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-edit fa-fw"></i> {{trans('general.event_update')}}</h3>
                </div>
                <div class="panel-body">
                    {!! Form::open(array('id' => 'event', 'accept-charset' => 'utf-8', 'class' => 'form-horizontal',  'ng-submit'=>'update($event)')) !!}
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">{{trans('general.title')}}</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control " name="title" id="inputEmail3" required
                                   placeholder="{{trans('general.title')}}" value="{!! $event->title !!}" style="width: 60%">
                            <input type="hidden" name="id" value="{!! $event->id !!}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">{{trans('general.start_time')}}</label>

                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control from" name="start" required
                                   placeholder="{{trans('general.start_time')}}"
                                   value="{!! date('Y-m-d H:i', strtotime($event->start_time)) !!}" style="width: 60%">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">{{trans('general.end_time')}}</label>

                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control to" name="end" required
                                   placeholder="{{trans('general.end_time')}}" value="{!! date('Y-m-d H:i', strtotime($event->end_time)) !!}"
                                   style="width: 60%">
                        </div>
                    </div>

                    @if(!$event->ScheduleReminder->isEmpty())

                        @foreach($event->ScheduleReminder as $reminder)
                            <div class="reminder_delete_div">
                                <div class="form-group">
                                    <hr class="col-sm-8 width60 hr-clr-green"/>
                                <span class="col-sm-1 pull-left reminder-cross-table delete_reminder"
                                      style="cursor: pointer">X</span>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">{{trans('general.reminder_date')}}</label>

                                    <div class="col-sm-10">
                                        <input type="text" required name="reminder_date[]"
                                               class="form-control width60 reminder_date readonly"
                                               value="<?php echo date('Y-m-d', strtotime($reminder->reminder_date)) ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Reminder to(Email)</label>

                                    <div class="col-sm-10">
                                        <input type="text" required name="reminder_email[]" class="form-control width60"
                                               placeholder="Example : imtiazpabel@yahoo.com,ippabel@gmail.com"
                                               value="{!! $reminder->reminder_email !!}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Reminder Text</label>

                                    <div class="col-sm-10">
                                    <textarea name="reminder_text[]" class="form-control width60"
                                              required>{!! $reminder->reminder_text !!}</textarea>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    @endif

                    <div id="updateReminderShow">

                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" id="updateReminderCreate" class="btn btn-primary"><i
                                        class="fa fa-plus"></i> {{trans('general.add_reminder')}}
                            </button>
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

    <div class="addReminderView" style="display: none">
        <div class="reminder_delete_div">
            <div class="form-group">
                <hr class="col-sm-8 width60 hr-clr-green"/>
                <span class="col-sm-1 pull-left reminder-cross-table delete_reminder" style="cursor: pointer">X</span>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">{{trans('general.reminder_date')}}</label>

                <div class="col-sm-10">
                    <input type="text" required name="reminder_date[]"
                           class="form-control width60 reminder_date readonly">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">{{trans('general.reminder_email')}}</label>

                <div class="col-sm-10">
                    <input type="text" required name="reminder_email[]" class="form-control width60">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">{{trans('general.reminder_text')}}</label>

                <div class="col-sm-10">
                    <textarea name="reminder_text[]" class="form-control width60" required></textarea>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('asset')
    <style>
        .from {
            position: relative;
            z-index: 10000;
        }

        .to {
            position: relative;
            z-index: 10000;
        }

        .reminder_date {
            position: relative;
            z-index: 10000;
        }

        .ui-pnotify {
            z-index: 1041
        }
    </style>
    <script>
        $(document).ready(function () {
            $("#updateReminderCreate").click(function (event) {
                event.preventDefault();
                $("#updateReminderCreate").html('<i class="fa fa-plus"></i> {{trans('general.add_more_reminder')}}');
                $("#updateReminderShow").append($(".addReminderView").html());
            });
            $(document).on('focus', '.reminder_date', function () {
                $(this).datepicker({
                    dateFormat: 'yy-mm-dd',
                    defaultDate: "+1w",
                    changeMonth: true,
                    changeYear: true,
                    numberOfMonths: 1
                });
            });

            $(document).on('click', '.delete_reminder', function () {
                $(this).parent().parent().remove();
            });
        });
        var event = angular.module('event', [], function ($interpolateProvider) {
            $interpolateProvider.startSymbol('{kp');
            $interpolateProvider.endSymbol('kp}');
        });
        event.controller('eventDeleteController', function ($scope, $http) {
            $scope.update = function (event) {
                event.preventDefault();
                var req = {
                    method: 'POST',
                    url: "{!! URL::to('user/event-update') !!}",
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    data: $("#event").serialize()
                };
                $http(req).success(function (response) {
                    $.pnotify.defaults.styling = "bootstrap3";
                    if (response == 'true') {
                        window.location.href = "{!! URL::to('user/event') !!}";
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
    <script>
        $(document).ready(function () {
            $(".from").datetimepicker({
                dateFormat: 'yy-mm-dd',
                defaultDate: "+1w",
                changeMonth: true,
                changeYear: true,
                numberOfMonths: 1,
                onClose: function (selectedDate) {
                    $(".to").datepicker("option", "minDate", selectedDate);
                }
            });
            $(".to").datetimepicker({
                dateFormat: 'yy-mm-dd',
                defaultDate: "+1w",
                changeMonth: true,
                changeYear: true,
                numberOfMonths: 1,
                onClose: function (selectedDate) {
                    $(".from").datepicker("option", "maxDate", selectedDate);
                }
            });
        });
    </script>
@endsection