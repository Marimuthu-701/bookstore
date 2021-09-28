@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center home-service-detail">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="detail-title detail-title-rent text-center">
                      <h1 class="my-4">{{  isset($book->name) ? ucfirst($book->name) : '-'  }}</h1>
                    </div>
                    <div class="row form-group">
                        @if ($book->media)
                            @php
                            $media_url = storage_url(App\Models\Book::BOOK_COVER_PATH . $book->media);
                            @endphp
                        @else
                            @php
                            $media_url = asset('images/web/books/book-4.jpg');
                            @endphp
                        @endif 
                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 form-group">
                            <div class="imag-gallery-container profile-image-banner">
                                <a href="{{$media_url}}" target="_blank" class="image-preview">
                                    <img src="{{ $media_url }}" alt="Another alt text"  class="book-cover-detail-page">
                                </a>
                            </div>
                            <div class="search-rating">
                                <input type="hidden" name="rating" value="{{ isset($getAverage[0]['avarage']) ? $getAverage[0]['avarage'] : 0 }}" class="customer-rating">
                                <div class="serch-rating-number" >
                                    <a href="#" class="go-to-reviews-n">
                                    {{-- @if(count($getRatingDetail) > 1) 
                                            ({{ count($getRatingDetail) }} reviews) 
                                        @else 
                                            ({{ count($getRatingDetail) }} review) 
                                        @endif --}}
                                    </a>
                                </div>
                            </div>
                        </div>                        
                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                            <div class="book-details pl-5">
                                <div class="row form-group">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <span>
                                            <i class="fas fa-server form-lable-padding"></i>{{ trans('common.book_name') }}
                                        </span>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <h6 class="semi-bold">
                                            {{ $book->name ?? null }}
                                        </h6>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <span>
                                            <i class="fas fa-server form-lable-padding"></i>{{ trans('common.author_name') }}
                                        </span>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <h6 class="semi-bold">
                                            {{ $book->author->name ?? null }}
                                        </h6>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <span>
                                            <i class="fas fa-server form-lable-padding"></i>{{ trans('common.book_category') }}
                                        </span>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <h6 class="semi-bold">
                                            {{ $book->category->name ?? null }}
                                        </h6>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <span>
                                            <i class="fas fa-server form-lable-padding"></i>{{ trans('common.price') }}
                                        </span>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <h6 class="semi-bold">
                                            {{ isset($book->price) ? moneySymbol($book->price) : null }}
                                        </h6>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <span>
                                            <i class="fas fa-server form-lable-padding"></i>{{ trans('common.total_pages') }}
                                        </span>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <h6 class="semi-bold">
                                            {{ $book->pages ?? null }}
                                        </h6>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <span>
                                            <i class="fas fa-server form-lable-padding"></i>{{ trans('common.publication') }}
                                        </span>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <h6 class="semi-bold">
                                            {{ $book->publication ?? null }}
                                        </h6>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <span>
                                            <i class="fas fa-server form-lable-padding"></i>{{ trans('common.status') }}
                                        </span>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <h6 class="semi-bold">
                                            {{ $book->status_string ?? null }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h5 class="pl-4">{{ trans('common.description') }}</h5>
                        <p class="pl-4">{{ $book->description }}</p>
                    </div>
                </div>
                <div class="px-4">
                    @include('partials.review-rating')    
                </div>
        </div>
    </div>
</div>
@section('js')
<script type="text/javascript">
    $(document).ready(function(){
        $("#gallery-reviews a").click(function(e){
            e.preventDefault();
            $(this).tab("show");
        });
        
        $('.customer-rating').rating({
            min: 0,
            max: 5,
            step: 1,
            size: 'xs',
            showClear: false,
            displayOnly:true,
            showCaption:false,
        });
    });

</script>
@endsection
@endsection