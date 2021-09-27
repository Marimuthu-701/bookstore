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
                                    <th>{{ trans('common.book_name') }}</th>
                                    <td>{{ $book->name ?? null }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('common.author_name') }}</th>
                                    <td>{{ $book->author ? $book->author->name : null }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('common.book_category') }}</th>
                                    <td>{{ $book->category ? $book->category->name : null }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('common.price') }}</th>
                                    <td>{{ $book->price ?? null }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('common.total_pages') }}</th>
                                    <td>{{ $book->pages ?? null }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('common.publication') }}</th>
                                    <td>{{ $book->publication }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('common.edition') }}</th>
                                    <td>{{ $book->edition }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('common.status') }}</th>
                                    <td>{{ $book->status_string ? $book->status_string : null }}</td>
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
