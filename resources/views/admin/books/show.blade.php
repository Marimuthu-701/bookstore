@extends('admin.layouts.app')

@section('title', 'Users')
@section('plugins.Datatables', true)
@section('plugins.Validation', true)

@section('content_header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>{{ trans('common.view') }}</h1>
    @include('admin.partials.breadcrumbs', ['breadcrumbs' => [ trans('common.books') => route('admin.books.index'), trans('common.view')]])
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
                                    <th>{{ trans('common.title') }}</th>
                                    <td>{{ $book->title }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('common.description') }}</th>
                                    <td>{{ $book->description }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('common.start_date') }}</th>
                                    <td>{{ $book->start_date ? dateFormat($book->start_date, 'd-m-Y') : null }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('common.end_date') }}</th>
                                    <td>{{ $book->end_date ? dateFormat($book->end_date, 'd-m-Y') : null }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('common.duration') }}</th>
                                    <td>{{ $book->duration }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('common.location') }}</th>
                                    <td>{{ $book->location }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('common.status') }}</th>
                                    <td>{{ $book->status_string }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('common.payment_type') }}</th>
                                    <td>{{ $book->payment_type ? Str::ucfirst($book->payment_type) : null }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('common.created_at') }}</th>
                                    <td>{{ isset($book->created_at) ? dateTimeFormat($book->created_at) : null }}</td>
                                </tr>
                                @if ($book->media)
                                    <tr>
                                        <th>{{ trans('common.media') }}</th>
                                        <td>
                                            <a target="_blank" href="{{ storage_url(App\Models\Book::BOOK_COVER_PATH . $book->media) }}">
                                                <img src="{{ storage_url(App\Models\Book::BOOK_COVER_PATH . $book->media) }}"  width="50px" height="50px" alt="" class="img-responsive">
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                                

                            </table>
                          </div>
                        </div>
                        <!--<a href="{{ url()->previous() }}" class="btn btn-default">Back</a>  -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <a href="{{ route('admin.books.index') }}"  class="btn btn-secondary">{{ trans('common.back') }}</a>
          </div>
      </div>
    </div>
</div>
@stop
