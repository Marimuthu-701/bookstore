@extends('admin.layouts.app')

@section('title', 'Authors')
@section('plugins.Datatables', true)
@section('plugins.Validation', true)

@section('content_header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>{{ trans('common.view') }}</h1>
    @include('admin.partials.breadcrumbs', ['breadcrumbs' => [ trans('common.authors') => route('admin.authors.index'), trans('common.view')]])
  </div>
</div>
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
      @include('flash::message')
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile_container">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">{{ trans('common.view') }}</h3>
        </div>

          <div class="card-body">
            <div class="row">
              <div class="col-lg-10">
                <div class="row">
                  <div class="col-md-6">
                    <div class="panel-body" id="print_val">
                        <div class="row">
                          <div class="col-md-12">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>{{ trans('common.author_name') }}</th>
                                    <td>{{ $author->name ?? null }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('common.email') }}</th>
                                    <td>{{ $author->email ?? null }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('common.author_category') }}</th>
                                    <td>{{ $author->phone ?? null }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('common.address') }}</th>
                                    <td>{{ $author->address ?? null }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('common.status') }}</th>
                                    <td>{{ $author->status_string ?? null }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('common.created_at') }}</th>
                                    <td>{{ isset($author->created_at) ? dateTimeFormat($author->created_at) : null }}</td>
                                </tr>
                            </table>
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
          </div>
      </div>
    </div>
</div>
@stop
