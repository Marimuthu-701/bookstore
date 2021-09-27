@extends('admin.layouts.app')

@section('title', 'Users')
@section('plugins.Datatables', true)
@section('plugins.Validation', true)

@section('content_header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>{{ trans('common.view') }}</h1>
    @include('admin.partials.breadcrumbs', ['breadcrumbs' => [ trans('common.users') => route('admin.users.index'), trans('common.view')]])
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
                                    <th>{{ trans('common.name') }}</th>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('common.company_name') }}</th>
                                    <td>{{ $user->company_name }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('common.email') }}</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('common.phone') }}</th>
                                    <td>{{ $user->phone }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('common.mobile') }}</th>
                                    <td>{{ $user->mobile }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('common.address') }}</th>
                                    <td>{{ $user->address }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('common.status') }}</th>
                                    <td>{{ $user->status_string }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('common.created_at') }}</th>
                                    <td>{{ isset($user->created_at) ? dateTimeFormat($user->created_at) : null }}</td>
                                </tr>
                                <tr>
                                    <th colspan="2" class="text-center">{{ trans('common.payment_details') }}</th>
                                </tr>
                                <tr>
                                    <th>{{ trans('common.amount') }}</th>
                                    <td>{{ isset($user->payment->amount) ? $user->payment->amount : null }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('common.payment_mode') }}</th>
                                    <td>{{ isset($user->payment->paymentMode->type) ? Str::ucfirst($user->payment->paymentMode->type) : null }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('common.payment_status') }}</th>
                                    <td>{{ isset($user->payment->status) ? Str::ucfirst($user->payment->status) : null }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('common.created_at') }}</th>
                                    <td>{{ isset($user->payment->created_at) ? dateTimeFormat($user->created_at) : null }}</td>
                                </tr>
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
            <a href="{{ route('admin.users.index') }}"  class="btn btn-secondary">{{ trans('common.back') }}</a>
          </div>
      </div>
    </div>
</div>
@stop
