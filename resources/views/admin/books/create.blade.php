@extends('admin.layouts.app')
@section('book_name', trans('common.books'))
@section('plugins.Datatables', true)
@section('content_header')
<div class="row mb-2">
	<div class="col-sm-6">
		<h1>{{ trans('common.users') }}</h1>
		@include('admin.partials.breadcrumbs', ['breadcrumbs' => [ trans('common.books') => route('admin.books.index'), trans('common.add')]])
	</div>
</div>
@stop
@section('content')
<div class="row">
	<div class="col-lg-12">@include('flash::message')</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile_container">
		<div class="card">
			<div class="card-header">{{ trans('common.book_add')}}</div>
			<form action="{{ route('admin.books.store') }}" method="post" class="books" enctype="multipart/form-data" >
				{{ csrf_field() }}
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12">
							<div class="row">
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="book_name">{{ trans('common.book_name') }}<span class="required">&nbsp;*</span></label>
                                                <input type="text" class="form-control {{ $errors->has('book_name') ? 'is-invalid' : '' }}" id="book_name" name="book_name" placeholder="{{ trans('common.book_name') }}" autocomplete="off"  value="{{ old('book_name') }}" >
                                                @if($errors->has('book_name'))
                                                <div class="invalid-feedback">
                                                    <strong>{{ $errors->first('book_name') }}</strong>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="description">{{ trans('common.description') }}<span class="required">&nbsp;*</span></label>
                                                <textarea type="text" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description" name="description" placeholder="{{ trans('common.description') }}" autocomplete="off"></textarea>
                                                @if($errors->has('description'))
                                                <div class="invalid-feedback">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="author_name">{{ trans('common.author_name') }}<span class="required">&nbsp;*</span></label>
                                                <select id="author_name" name="author_name" class="form-control {{ $errors->has('author_name') ? 'is-invalid' : '' }}">
                                                    <option value="">Select</option>
                                                    @if(count($authors) > 0)
                                                        @foreach($authors as $key => $value)
                                                            <option value="{{ $value->id }}"  @if(!empty(old('author_name')) && ($key == old('author_name'))) selected @endif>{{ $value->name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
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
                                                <label for="book_category">{{ trans('common.book_category') }}<span class="required">&nbsp;*</span></label>
                                                <select id="book_category" name="book_category" class="form-control {{ $errors->has('book_category') ? 'is-invalid' : '' }}">
                                                    <option value="">Select</option>
                                                    @if(count($bookCategory) > 0)
                                                        @foreach($bookCategory as $key => $value)
                                                            <option value="{{ $value->id }}"  @if(!empty(old('book_category')) && ($key == old('book_category'))) selected @endif>{{ $value->name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                @if($errors->has('book_category'))
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $errors->first('book_category') }}</strong>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="media">{{ trans('common.book_cover') }}<span class="required">&nbsp;*</span></label>
                                                <div class="custom-file">
                                                    <input type="file" name="media" class="custom-file-input {{ $errors->has('media') ? 'is-invalid' : '' }}" id="media" lang="es">
                                                    <label class="custom-file-label" for="media">{{ trans('common.media') }}</label>
                                                    @if($errors->has('media'))
                                                        <div class="invalid-feedback">
                                                            <strong>{{ $errors->first('media') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="price">{{ trans('common.price') }}<span class="required">&nbsp;*</span></label>
                                                <input id="price" placeholder="{{ trans('common.price') }}" type="text" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" name="price">
                                                @if($errors->has('price'))
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $errors->first('price') }}</strong>
                                                    </div>
                                                @endif
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="total_pages">{{ trans('common.total_pages') }}<span class="required">&nbsp;*</span></label>
                                                <input id="total_pages" step="1" min="1" placeholder="{{ trans('common.total_pages') }}" type="number" class="form-control {{ $errors->has('total_pages') ? 'is-invalid' : '' }}" name="total_pages">
                                                @if($errors->has('total_pages'))
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $errors->first('total_pages') }}</strong>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="publication">{{ trans('common.publication') }}<span class="required">&nbsp;*</span></label>
                                                <div class="custom-file">
                                                    <input id="publication" placeholder="{{ trans('common.publication') }}" type="text" class="form-control {{ $errors->has('publication') ? 'is-invalid' : '' }}" name="publication">
                                                    @if($errors->has('publication'))
                                                        <div class="invalid-feedback">
                                                            <strong>{{ $errors->first('publication') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="edition">{{ trans('common.edition') }}<span class="required">&nbsp;*</span></label>
                                                <div class="custom-file">
                                                    <input id="edition"  placeholder="{{ trans('common.edition') }}" type="text" class="form-control {{ $errors->has('edition') ? 'is-invalid' : '' }}" name="edition">
                                                    @if($errors->has('edition'))
                                                        <div class="invalid-feedback">
                                                            <strong>{{ $errors->first('edition') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="in_stock">{{ trans('common.in_stock') }}<span class="required">&nbsp;*</span></label>
                                                <select id="in_stock" name="in_stock" class="form-control {{ $errors->has('in_stock') ? 'is-invalid' : '' }}">
                                                    <option value="">Select</option>
                                                    @foreach($in_stock as $key => $value)
                                                        <option value="{{ $key }}"  @if(!empty(old('in_stock')) && ($key == old('in_stock'))) selected @endif>{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('in_stock'))
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $errors->first('in_stock') }}</strong>
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
				<a href="{{ route('admin.books.index') }}"  class="btn btn-secondary">{{ trans('common.back') }}</a>
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
