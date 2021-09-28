@extends('admin.layouts.app')
@section('book_name', trans('common.tags'))
@section('plugins.Datatables', true)
@section('content_header')
<div class="row mb-2">
	<div class="col-sm-6">
		<h1>{{ trans('common.users') }}</h1>
		@include('admin.partials.breadcrumbs', ['breadcrumbs' => [ trans('common.tags') => route('admin.tags.index'), trans('common.add')]])
	</div>
</div>
@stop
@section('content')
<div class="row">
	<div class="col-lg-12">@include('flash::message')</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile_container">
		<div class="card">
			<div class="card-header">{{ trans('common.book_add')}}</div>
			<form action="{{ route('admin.tags.store') }}" method="post" class="tags" enctype="multipart/form-data" >
				{{ csrf_field() }}
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12">
							<div class="row">
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="name">{{ trans('common.name') }}<span class="required">&nbsp;*</span></label>
                                                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" placeholder="{{ trans('common.name') }}" autocomplete="off"  value="{{ old('name') }}" >
                                                @if($errors->has('name'))
                                                <div class="invalid-feedback">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>                   
                                </div>
                            </div>
						</div>
					</div>
				</div>
			<div class="card-footer">
				<a href="{{ route('admin.tags.index') }}"  class="btn btn-secondary">{{ trans('common.back') }}</a>
				<button type="submit" class="btn btn-primary">{{ trans('common.submit') }}</button>
			</div>
		</form>
	</div>
</div>
</div>
@stop

@section('js')
<script>
</script>
@stop
