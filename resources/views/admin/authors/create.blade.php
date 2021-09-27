@extends('admin.layouts.app')
@section('book_name', trans('common.authors'))
@section('plugins.Datatables', true)
@section('content_header')
<div class="row mb-2">
	<div class="col-sm-6">
		<h1>{{ trans('common.users') }}</h1>
		@include('admin.partials.breadcrumbs', ['breadcrumbs' => [ trans('common.authors') => route('admin.authors.index'), trans('common.add')]])
	</div>
</div>
@stop
@section('content')
<div class="row">
	<div class="col-lg-12">@include('flash::message')</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile_container">
		<div class="card">
			<div class="card-header">{{ trans('common.book_add')}}</div>
			<form action="{{ route('admin.authors.store') }}" method="post" class="authors" enctype="multipart/form-data" >
				{{ csrf_field() }}
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12">
							<div class="row">
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="author_name">{{ trans('common.author_name') }}<span class="required">&nbsp;*</span></label>
                                                <input type="text" class="form-control {{ $errors->has('author_name') ? 'is-invalid' : '' }}" id="author_name" name="author_name" placeholder="{{ trans('common.author_name') }}" autocomplete="off"  value="{{ old('author_name') }}" >
                                                @if($errors->has('author_name'))
                                                <div class="invalid-feedback">
                                                    <strong>{{ $errors->first('author_name') }}</strong>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="email">{{ trans('common.email') }}<span class="required">&nbsp;*</span></label>
                                                <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" name="email" placeholder="{{ trans('common.email') }}" autocomplete="off"  value="{{ old('email') }}" >
                                                @if($errors->has('email'))
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="phone">{{ trans('common.phone') }}<span class="required">&nbsp;*</span></label>
                                                <input type="text" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" id="phone" name="phone" placeholder="{{ trans('common.phone') }}" autocomplete="off"  value="{{ old('phone') }}" maxlength="10">
                                                @if($errors->has('phone'))
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $errors->first('phone') }}</strong>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="address">{{ trans('common.address') }}<span class="required">&nbsp;*</span></label>
                                                <div class="custom-file">
                                                    <textarea id="address" placeholder="{{ trans('common.address') }}" type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address"></textarea>
                                                    @if($errors->has('address'))
                                                        <div class="invalid-feedback">
                                                            <strong>{{ $errors->first('address') }}</strong>
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
				</div>
			<div class="card-footer">
				<a href="{{ route('admin.authors.index') }}"  class="btn btn-secondary">{{ trans('common.back') }}</a>
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
