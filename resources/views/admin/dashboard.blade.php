@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
@stop

@section('css')
    <style>
        .warn {background-color: #fcc100;border-radius: 10px; }
        .success {background-color: #6cc788;border-radius: 10px;}
        .info {background-color: #6887ff;border-radius: 10px;}
        .warning {background-color: #f77a99;border-radius: 10px;}
        .danger {background-color: #E9333D;border-radius: 10px;}
        .blue {background-color: #2196f3;border-radius: 10px;}
        .review {background-color: #9772EC;border-radius: 10px;}
        .pull-right {float: right}
        .panel-heading {padding: 20px 20px 10px 25px;color:#ffffff;}
        .panel-count{font-size: 32px; font-weight: bold;line-height: 30px;}
        .panel-lable{font-size: 18px; font-weight: normal;padding: 0px 0px 0px 15px;}
        .dash-head-part{padding-bottom: 25px;}
        .panel-footer {padding: 10px 15px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;color: #ffffff; font-size: .95rem;}
    </style>
@stop
@section('content')
<div class="dash-head-main py-4" id="dash-head-main">
	<div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 dash-head-part">
            <div class="panel warn dash-head-subpart">
                    <div class="panel-heading dash-head-ajax">
                        <div class="row">
                            <div class="col-md-4 col-xs-4 text-center">
                                <img src="{{ asset('images/admin/dashboard_icon/user.png') }}">
                            </div>
                            <div class="col-md-8 col-xs-8 text-right">
                                <div class="title-head panel-count">{{ $users_count ?? null}}</div>
                                <div class="title-text panel-lable">{{trans('common.users')}}</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('admin.users.index')}}">
                        <div class="panel-footer" style="background: #e5ac00;">
                            <span class="pull-left">View all</span>
                            <span class="pull-right">
                                <img src="{{ asset('images/admin/dashboard_icon/arrow.png') }}">
                            </span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 dash-head-part">
            <div class="panel review dash-head-subpart">
                <div class="panel-heading dash-head-ajax">
                    <div class="row">
                        <div class="col-md-4 col-xs-4 text-center">
                            <img src="{{ asset('images/admin/dashboard_icon/facilities.png') }}">
                        </div>
                        <div class="col-md-8 col-xs-8 text-right">
                            <div class="title-head panel-count">{{ $event_count ?? null}}</div>
                            <div class="title-text panel-lable">{{trans('common.events')}}</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer" style="background: #AA85FF;">
                        <span class="pull-left">View all</span>
                        <span class="pull-right">
                            <img src="{{ asset('images/admin/dashboard_icon/arrow.png') }}">
                        </span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
