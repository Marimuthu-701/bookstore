<div class="row">
   <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
      <div class="review-section" style="min-height:500px;">
        <ul class="nav nav-tabs gallery-reviews-nav" id="gallery-reviews" role="tablist">
          <li class="nav-item active">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#images" role="tab" aria-controls="home" aria-selected="true">Write a Review</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#review" role="tab" aria-controls="profile" aria-selected="false">
              {{-- @if(count($getRatingDetail) > 1) 
              Reviews&nbsp;({{ count($getRatingDetail) }}) 
              @else 
              Review&nbsp; ({{ count($getRatingDetail) }}) 
              @endif --}}
              Reviews&nbsp; 
              </a>
          </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content gallery-review-tab py-4">
          <div class="tab-pane active" id="images" role="tabpanel" aria-labelledby="home-tab">
              
              <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="pull-right write_review">
                      @if (Auth::guest())
                        <p>If you wish to post commments, Please login</p>
                      @else
                      
                      @if(session()->has('message'))
                          <div class="alert alert-success">
                              {{ session()->get('message') }}
                          </div>
                      @endif
                        <form class="rating" method="post" action="{{ route('review-comments') }}">
                          @csrf
                          <input type="hidden" name="slug" value="{{ $slug}}" />
                          <label for="bad" style="font-weight:bold;">Rating</label>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="rating" id="bad" value="1">
                            <label class="form-check-label" for="bad">
                              Bad
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="rating" id="poor" value="2">
                            <label class="form-check-label" for="poor">
                              Poor
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="rating" id="average" value="3">
                            <label class="form-check-label" for="average">
                              Average
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="rating" id="good" value="4">
                            <label class="form-check-label" for="good">
                              Good
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="rating" id="excelent" value="5">
                            <label class="form-check-label" for="excelent">
                              Excelent
                            </label>
                          </div>
                          @if($errors->has('rating'))
                          <div class="errors">
                              <strong>{{ $errors->first('rating') }}</strong>
                          </div>
                          @endif
                          <div class="row mt-2">
                            <div class="col-lg-12">
                              <div class="form-group">
                                <label for="comments" style="font-weight: bold;">Comments</label>
                                <textarea class="form-control" id="comments" rows="3" name="comments"></textarea>
                                @if($errors->has('comments'))
                                  <div class="errors">
                                      <strong>{{ $errors->first('comments') }}</strong>
                                  </div>
                                @endif
                              </div>
                            </div>
                          </div>
                          <div class="row mt-2">
                            <div class="col-lg-12">
                              <input type="submit" name="submit" class="btn btn-primary btn-lg"/>
                            </div>
                          </div>
                        </form>
                      @endif
                    </div>
                </div>
              </div>
          </div>
          <div class="tab-pane" id="review" role="tabpanel" aria-labelledby="profile-tab">
              <div class="row">
                @if( count ($getRatingDetail) > 0)
                <div class="col-sm-12 col-lg-12 col-md-12 col-xs-12">
                    <div class="reviews-comments-container">
                      <ul style="list-style: none;padding-left:15px;">
                          @foreach ($getRatingDetail as $key => $value)
                          <li style="border-bottom:1px solid #dddddd;" class="mb-2">
                            <div class="reviews-comments">
                                <p class="reviewed-user" style="font-size: 16px;">
                                  <i class="fas fa-user-circle" style="font-size:25px;"></i> {{ $value['user_name'] }} 
                                  <span style="font-size: 13px;color: #274584;">{{ $value['created_at'] }}</span>
                                </p>
                                <div class="row">
                                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                      <label>Rating: {{ $value['rating'] }}</label>
                                  </div>
                                  <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12" style="display: none;">
                                      <p class="rating-points">{{ number_format($value['rating'], 2) }}</p>
                                  </div>
                                </div>
                                <p>{{ $value['comments'] ? $value['comments'] : '-' }}</p>
                            </div>
                          </li>
                          @endforeach
                      </ul>
                    </div>
                </div>
                @else
                <div class="col-sm-12 col-lg-12 col-md-12 col-xs-12 text-center">
                    <p class="not-found-review-image">{{ trans('messages.review_not_found') }}</p>
                </div>
                @endif
              </div>
          </div>
        </div>
    </div>
  </div>
</div>