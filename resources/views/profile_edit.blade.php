@extends('layouts.app')


@section('content')
<div class="container">
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile Edit') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="company_name" class="col-md-4 col-form-label text-md-right">{{ __('Business Name') }} <span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="company_name" type="text" value="{{Auth::guard('web')->user()->company_name}}" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}"  autocomplete="company_name" autofocus>

                                @error('company_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Username / Contact Person') }} <span class="text-danger">*</span> </label>

                            <div class="col-md-6">
                                <input id="name" type="text" value="{{Auth::guard('web')->user()->name}}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }} <span class="text-danger">*</span> </label>

                            <div class="col-md-6">
                                <input id="email" type="email" value="{{Auth::guard('web')->user()->email}}" class="form-control @error('email') is-invalid @enderror" name="email" readonly="readonly"  autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Business Telephone') }} </label>

                            <div class="col-md-6">
                                <input id="mobile" type="text" value="{{Auth::guard('web')->user()->mobile}}" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}"  autocomplete="mobile" autofocus>

                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }} <span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="phone" type="text" value="{{Auth::guard('web')->user()->phone}}" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>





                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }} <span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="address" type="text" value="{{Auth::guard('web')->user()->address}}" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}"  autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection