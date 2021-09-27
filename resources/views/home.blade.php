@extends('layouts.app')

@section('content')
@guest
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Home') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are in Home!') }}
                </div>
            </div>
        </div>
    </div>
</div>
 @else
<div class="container">
    <div class="row justify-content-center">
            <div class="col-md-12 grid-margin-md stretch-card d-flex_">
                <div class="card">
                  <div class="card-body">
                    <div class="card-header">Events</div>
                    <!-- <div class="d-flex justify-content-between mb-3">
                        <h4 class="card-title">Events</h4>
                    </div> -->


                    <div class="border p-3 mb-3">
                      <div class="border-bottom pb-3">
                        <div class="row">
                            <div class="col-sm-4 border-right-lg border-right-md-0">
                              <div class="d-flex justify-content-center align-items-center">
                                <h1 class="mb-0 mr-2 text-primary font-weight-normal">04</h1>
                                  <div>
                                    <p class="font-weight-bold mb-0 text-dark">Feb</p>
                                    <p class="mb-0">2018</p>
                                  </div>
                              </div>
                            </div>
                            <div class="col-sm-8 pl-3">
                              <p class="text-dark font-weight-bold mb-0">Lorem ipsum dolor sit amit</p>
                              <p class="mb-0">9.30 PM - 10:30 PM</p>
                            </div>
                          </div>
                      </div>
                      <div class="border-bottom pt-3 pb-3">
                          <div class="row">
                              <div class="col-sm-4 border-right-lg border-right-md-0">
                                <div class="d-flex justify-content-center align-items-center">
                                  <h1 class="mb-0 mr-2 text-primary font-weight-normal">15</h1>
                                    <div>
                                      <p class="font-weight-bold mb-0 text-dark">Mar</p>
                                      <p class="mb-0">2018</p>
                                    </div>
                                </div>
                              </div>
                              <div class="col-sm-8 pl-3">
                                <p class="text-dark font-weight-bold mb-0">Lorem ipsum dolor sit amit</p>
                                <p class="mb-0">10.00 PM - 12:30 PM</p>
                              </div>
                            </div>
                        </div>
                          <div class="border-bottom pb-3 pt-3">
                            <div class="row">
                                <div class="col-sm-4 border-right-lg border-right-md-0">
                                  <div class="d-flex justify-content-center align-items-center">
                                    <h1 class="mb-0 mr-2 text-primary font-weight-normal">22</h1>
                                      <div>
                                        <p class="font-weight-bold mb-0 text-dark">Apr</p>
                                        <p class="mb-0">2018</p>
                                      </div>
                                  </div>
                                </div>
                                <div class="col-sm-8 pl-3">
                                  <p class="text-dark font-weight-bold mb-0">Lorem ipsum dolor sit amit</p>
                                  <p class="mb-0">9.30 PM - 10:30 PM</p>
                                </div>
                              </div>
                          </div>
                          <div class="pt-3">
                              <div class="row">
                                  <div class="col-sm-4 border-right-lg border-right-md-0">
                                    <div class="d-flex justify-content-center align-items-center">
                                      <h1 class="mb-0 mr-2 text-primary font-weight-normal">26</h1>
                                        <div>
                                          <p class="font-weight-bold mb-0 text-dark">Jun</p>
                                          <p class="mb-0">2018</p>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="col-sm-8 pl-3">
                                    <p class="text-dark font-weight-bold mb-0">Lorem ipsum dolor sit amit</p>
                                    <p class="mb-0">10.00 PM - 12:30 PM</p>
                                  </div>
                                </div>
                            </div>
                    </div>

                  </div>
                </div>
            </div>
    </div>
</div>
@endguest
@endsection
