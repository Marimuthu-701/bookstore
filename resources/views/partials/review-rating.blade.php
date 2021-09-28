<div class="row">
   <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
      <div class="review-section" style="min-height:500px;">
        <ul class="nav nav-tabs gallery-reviews-nav" id="gallery-reviews" role="tablist">
          <li class="nav-item active">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#images" role="tab" aria-controls="home" aria-selected="true">Reviews&nbsp;
              {{-- @if(isset($mediaInfo[0]['type']) && $mediaInfo[0]['type'] == App\Models\User::BANNER_TYPE)
              {{ '(0)'}}
              @else
              {{ '('.count($mediaInfo).')'}}
              @endif --}}
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#review" role="tab" aria-controls="profile" aria-selected="false">
              {{-- @if(count($getRatingDetail) > 1) 
              Reviews&nbsp;({{ count($getRatingDetail) }}) 
              @else 
              Review&nbsp; ({{ count($getRatingDetail) }}) 
              @endif --}}
              Write Review  
              </a>
          </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content gallery-review-tab p-4">
          <div class="tab-pane active" id="images" role="tabpanel" aria-labelledby="home-tab">
              <div class="row">    
              </div>
          </div>
          <div class="tab-pane" id="review" role="tabpanel" aria-labelledby="profile-tab">
              <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="pull-right write_review">
                      @if (Auth::guest())
                      <a href="{{ route('login') }}" class="btn btn-primary guest-to-auth-rating">
                      <i class="fas fa-pencil-alt"></i> {{ trans('messages.write_review') }}
                      </a>
                      @else
                      <a href="{{ route('type.id.reviews.add', ['type'=>$type, 'id'=>$id]) }}" class="btn btn-primary">
                      <i class="fas fa-pencil-alt"></i> {{ trans('messages.write_review') }}
                      </a>
                      @endif
                    </div>
                </div>
              </div>
              <div class="row">
                {{-- @if( count ($getRatingDetail) > 0)
                <div class="col-sm-12 col-lg-12 col-md-12 col-xs-12">
                    <div class="reviews-comments-container">
                      <ul>
                          @foreach ($getRatingDetail as $key => $value)
                          <li>
                            <div class="reviews-comments">
                                <p class="reviewed-user">
                                  <i class="fas fa-user-circle"></i> {{ $value['user_name'] }} 
                                  <span>{{ $value['created_at'] }}</span>
                                </p>
                                <div class="row">
                                  <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                      <input type="hidden" name="rating" value="{{ $value['rating'] }}" class="customer-rating">
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
                --}}
              </div>
          </div>
        </div>
    </div>
  </div>
</div>