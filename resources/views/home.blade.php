@extends('layouts.app')
@section('content')
  <div class="container">
    <section class="home-banner">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('images/web/banner-1.jpg') }}" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('images/web/banner-2.jpg') }}" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('images/web/banner-3.jpg') }}" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </section>
    <section class="product-list py-4">
      <h2 class="mb-3 font-weight-bold">{{ trans('common.books') }}</h2>
      @if (count($books) > 0)
      <div class="row">
        @foreach ($books as $key => $item)
          @if ($item->media)
            @php
              $media_url = storage_url(App\Models\Book::BOOK_COVER_PATH . $item->media);
              @endphp
          @else
            @php
              $media_url = asset('images/web/books/book-4.jpg');
            @endphp 
          @endif
            <div class="col-lg-3 py-3">
              <div class="card book-grid-card">
                <img class="card-img-top book-cover-img" src="{{ $media_url }}" alt="Card image cap">
                <div class="card-body text-center">
                  <h5 class="card-title">{{ $item->name }}</h5>
                  @php
                      $tags = $item->tags()->get()->pluck('name')->toArray();
                  @endphp
                  <div class="tag-section mb-2 text-success">
                    @if (count($tags) > 0)
                        <i class="fas fa-tags"></i>{{ Str::limit(implode(', ', $tags), 50, '...') }}       
                    @endif
                  </div>
                  <div class="book-description">
                    <p class="card-text">{{ Str::limit($item->description, 100, '...') }}</p>
                  </div>
                  <div class="text-center">
                    <a href="{{ route('book.info', ['slug'=> $item->slug]) }}" class="btn btn-primary text-center">View Book</a>
                  </div>
                </div>
              </div>
            </div>
        @endforeach
      </div>
      @else
          <div class="row">
            <div class="col-lg-12">
              <p>{{ trans('messages.data_not_found') }}</p>
            </div>
          </div>
      @endif
    </section>
  </div>
@endsection

@section('js')
  <script type="text/javascript">
    $(document).ready(function() {
      console.log('Herer loader');
    })
  </script>
@endsection
