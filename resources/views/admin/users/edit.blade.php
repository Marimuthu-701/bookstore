@extends('admin.layouts.app')

@section('title', trans('common.users'))
@section('plugins.Datatables', true)
@section('plugins.Validation', true)
@php
$user_status = config('mgclient.user_status');
@endphp

@section('content_header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>{{ trans('common.users') }}</h1>
    @include('admin.partials.breadcrumbs', ['breadcrumbs' => [trans('common.users')=> route('admin.users.index'), trans('common.edit'),]])
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
                <h3 class="card-title">{{ trans('common.users') }} {{ trans('common.edit') }}</h3>
            </div>
            <form action="{{ route('admin.users.update', $user->id) }}" method="post" class="user_edit">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                  <div class="col-md-6 col-sm-12">
                                      <div class="form-group">
                                        <label for="name">{{ trans('common.name') }} <span class="required">&nbsp;*</span></label>
                                        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" placeholder="{{ trans('common.name') }}"  value="{{ old('name') ?? $user->name }}" >
                                        @if($errors->has('name'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </div>
                                        @endif
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-sm-12">
                                      <div class="form-group">
                                        <label for="company_name">{{ trans('common.company_name') }}&nbsp;*</label>
                                        <input type="text" class="form-control {{ $errors->has('company_name') ? 'is-invalid' : '' }}" id="company_name" name="company_name" placeholder="{{ trans('common.company_name') }}"  value="{{ old('company_name') ?? $user->company_name }}" >
                                        @if($errors->has('company_name'))
                                            <div class="invalid-feedback">
                                            <strong>{{ $errors->first('company_name') }}</strong>
                                            </div>
                                        @endif
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label for="phone">{{ trans('common.phone_number') }}&nbsp;*</label>
                                      <input type="text" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" id="phone" name="phone"  placeholder="{{ trans('common.phone_number') }}" autocomplete="off" value="{{ old('phone') ?? $user->phone }}" maxlength="10">
                                      @if($errors->has('phone'))
                                      <div class="invalid-feedback">
                                          <strong>{{ $errors->first('phone') }}</strong>
                                      </div>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label for="mobile">{{ trans('common.mobile') }}&nbsp;*</label>
                                      <input type="text" class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" id="mobile" name="mobile"  placeholder="{{ trans('common.mobile') }}" autocomplete="off" value="{{ old('mobile') ?? $user->mobile }}" maxlength="10">
                                      @if($errors->has('mobile'))
                                      <div class="invalid-feedback">
                                          <strong>{{ $errors->first('mobile') }}</strong>
                                      </div>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label for="email">{{ trans('common.email') }} <span class="required">&nbsp;*</span> </label>
                                      <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" name="email" placeholder="{{ trans('common.email') }}" autocomplete="off" value="{{ old('email') ?? $user->email }}" >
                                      @if($errors->has('email'))
                                      <div class="invalid-feedback">
                                          <strong>{{ $errors->first('email') }}</strong>
                                      </div>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label for="status">{{ trans('common.status') }}&nbsp;*</label>
                                      <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" id="status" name="status" disabled="disabled">
                                        @foreach($user_status_list as  $key => $value)
                                            <option value="{{ $key }}" @if($user->status == $key) selected @endif>{{ $value }}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                  </div>
                            </div>
                        </div>

                        <div class="col-lg-12 my-3">
                            <h2 class="card-title">{{ trans('common.payment_details') }}</h2>
                            <hr class="mt-4">
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                  <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label for="amount">{{ trans('common.amount') }} </label>
                                      <input type="text" class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" id="amount" name="amount"  placeholder="{{ trans('common.amount') }}" value="{{ $user->payment->amount ?? null }}">
                                      @if($errors->has('amount'))
                                      <div class="invalid-feedback">
                                          <strong>{{ $errors->first('amount') }}</strong>
                                      </div>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label for="payment_mode">{{ trans('common.payment_mode') }}*</label>
                                      <select class="form-control {{ $errors->has('payment_mode') ? 'is-invalid' : '' }}" id="payment_mode" name="payment_mode">
                                        @if (count($payment_modes) > 0)
                                            <option value="">{{ trans('common.select') }}</option>
                                            @php
                                                $payment_mode = $user->payment->payment_mode_id ?? null;
                                            @endphp
                                            @foreach($payment_modes as $value)
                                                <option value="{{ $value->id }}" @if($payment_mode == $value->id) selected @endif>{{ Str::ucfirst($value->type) }}</option>
                                            @endforeach
                                        @endif
                                      </select>
                                      @if($errors->has('payment_mode'))
                                      <div class="invalid-feedback">
                                          <strong>{{ $errors->first('payment_mode') }}</strong>
                                      </div>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label for="payment_status">{{ trans('common.payment_status') }}*</label>
                                        @php
                                            $status = $user->payment->status ?? null;
                                        @endphp
                                        <select class="form-control {{ $errors->has('payment_status') ? 'is-invalid' : '' }}" id="payment_status" name="payment_status">
                                            <option value="">{{ trans('common.select') }}</option>
                                            @foreach($payment_status as $key=>$value)
                                                <option value="{{ $key }}" @if($key == $status) selected @endif>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('payment_status'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('payment_status') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                  </div>
                            </div>
                        </div>

                        <div class="col-lg-12 my-3">
                            <h2 class="card-title">{{ trans('common.password_update') }}</h2>
                            <hr class="mt-4">
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                  <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label for="password">{{ trans('common.new_password') }} </label>
                                      <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password" name="password"  placeholder="{{ trans('common.new_password') }}" autocomplete="new-password" value="{{ old('password') }}">
                                      @if($errors->has('password'))
                                      <div class="invalid-feedback">
                                          <strong>{{ $errors->first('password') }}</strong>
                                      </div>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label for="confirm_password">{{ trans('common.confirm_password') }} </label>
                                      <input type="password" class="form-control {{ $errors->has('confirm_password') ? 'is-invalid' : '' }}" id="confirm_password" name="confirm_password" placeholder="{{ trans('common.confirm_password') }}" autocomplete="off" value="{{ old('confirm_password') }}">
                                      @if($errors->has('confirm_password'))
                                      <div class="invalid-feedback">
                                          <strong>{{ $errors->first('confirm_password') }}</strong>
                                      </div>
                                      @endif
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
