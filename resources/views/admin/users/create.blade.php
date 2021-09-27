@extends('admin.layouts.app')
@section('title', trans('common.genres'))
@section('plugins.Datatables', true)
@section('content_header')
<div class="row mb-2">
	<div class="col-sm-6">
		<h1>{{ trans('common.users') }}</h1>
		@include('admin.partials.breadcrumbs', ['breadcrumbs' => [ trans('common.users') => route('admin.users.index'), trans('common.add')]])
	</div>
</div>
@stop
@section('content')
<div class="row">
	<div class="col-lg-12">@include('flash::message')</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile_container">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">{{ trans('common.genre_add') }}</h3>
			</div>
			<form action="{{ route('admin.users.store') }}" method="post" class="users">
				{{ csrf_field() }}
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12">
							<div class="row">
								<div class="col-lg-6">
									<div class="row">
										<div class="col-md-12 col-sm-12">
											<div class="form-group">
												<label for="name ">{{ trans('common.name') }}<span class="required">&nbsp;*</span></label>
												<input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" placeholder="{{ trans('common.name') }}" tabindex="1" autocomplete="off"   value="{{ old('name') }}" >
												@if($errors->has('name'))
												<div class="invalid-feedback">
													<strong>{{ $errors->first('name') }}</strong>
												</div>
												@endif
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 col-sm-12">
											<div class="form-group mb-0">
											<label for="email">{{ trans('common.image') }} <span class="required">&nbsp;*</span> </label>
											</div>
											<div class="custom-file">
											  <input type="file" name="genre_image" class="custom-file-input" id="genre_image" lang="es">
											  <label class="custom-file-label" for="genre_image">{{ trans('common.image') }}</label>
											</div>
											<!-- <div class="form-group">
											<label for="email">{{ trans('common.image') }} <span class="required">&nbsp;*</span> </label>
											<input type="text" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" id="email" name="email" tabindex="3" placeholder="{{ trans('common.image') }}" autocomplete="off" value="{{ old('image') }}">
											@if($errors->has('image'))
											<div class="invalid-feedback">
												<strong>{{ $errors->first('image') }}</strong>
											</div>
											@endif -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<a href="{{ route('admin.users.index') }}"  class="btn btn-secondary">{{ trans('common.back') }}</a>
				<button type="submit" tabindex="8" class="btn btn-primary">{{ trans('common.submit') }}</button>
			</div>
		</form>
	</div>
</div>
</div>
@stop
@section('js')
<script>
$(function() {
	$(".genres").validate({
		errorClass: "invalid-feedback",
		errorElement: "strong",
		rules: {
			name:{
				required: true,
			},
			genre_image: {
				required: true
			},
		},
		highlight: function(element) {
			$(element).addClass("is-invalid");
		},
		unhighlight: function(element) {
			$(element).removeClass("is-invalid");
		},
		submitHandler: function(form) {
			form.submit();
		}
	});
});
</script>
@stop