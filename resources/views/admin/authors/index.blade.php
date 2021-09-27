@extends('admin.layouts.app')

@section('title', trans('common.authors'))

@section('plugins.Datatables', true)

@section('content_header')
<div class="row mb-2">
  	<div class="col-sm-6">
    	<h1>{{ trans('common.authors') }}</h1>
    	@include('admin.partials.breadcrumbs', ['breadcrumbs' => [trans('common.authors')]])
  	</div>
  	<div class="col-sm-6 text-right">
    	<a class="btn btn-primary table-edit-btn" href="{{ route('admin.authors.create') }}" data-toggle="tooltip" data-placement="top" title="Create">{{trans('common.create')}}</a>
  	</div>
</div>
@stop


@section('content')
<div class="row">
	<div class="col-md-12">
        @include('flash::message')
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-overflow">
            		<table class="table table-striped table-bordered" id="authors-data-table"></table>
            	</div>
            </div>
        </div>
    </div>
</div>
@stop
@section('css')
	<style>
		.table .action-wrap{
			min-width:200px;
		}
	</style>
@stop
@section('js')
<script type="text/javascript">
	$(function() {
		var table = $('#authors-data-table').DataTable({
			processing: true,
			serverSide: true,
			stateSave: true,
			searching: true,
			ajax: { 
	        url: "{!! route('admin.authors.index') !!}",
	        type:'GET',
	        data: function (d) {
	        	d._token  =  $('meta[name="csrf-token"]').attr("content");
	        }
	    },
	    columns: [
			{data: 'name', name: 'name', title: '{{ trans('common.name') }}'},
			{data: 'email', name: 'email', title: '{{ trans('common.email') }}'},
			{data: 'phone', name: 'phone', title: '{{ trans('common.phone') }}'},
			{data: 'address', name: 'address', title: '{{ trans('common.address') }}'},
			{data: 'created_at', name: 'created_at', title: '{{ trans('common.created_at') }}', render: function(data, type, row){
                if(type === "sort" || type === "type"){
                    return data;
                }
                return moment(data).format(js_date_time_format);
            }},
			{data: 'action', name: 'action', title: '{{ trans('common.action') }}', searchable: false, sortable: false, className:"action-wrap"},
	    ],
		//	order: [[2, 'desc']],
		drawCallback: function () {},
	  	});

	});
</script>
@stop