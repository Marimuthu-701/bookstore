@extends('layouts.app')
@section('content')
    <div class="container">
        <section class="book-details">
            <div class="row">
                <div class="col-lg-12 py-4 text-center">
                    <h1>{{ $book->name ??  null}}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        @if ($book->media)
                            @php
                            $media_url = storage_url(App\Models\Book::BOOK_COVER_PATH . $book->media);
                            @endphp
                        @else
                            @php
                            $media_url = asset('images/web/books/book-4.jpg');
                            @endphp
                        @endif 
                        <img class="card-img-top rounded border border-primary border-2" src="{{$media_url}}" alt="Card image cap">
                        {{-- <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-6">

                </div>
            </div>
        </section>
        <section class="rating-review"></section>
    </div>
@endsection