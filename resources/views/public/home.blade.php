@extends('layouts.master')

@section('content')
    <!-- Slider Area -->
    <section class="welcome-area">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="slider-img slider-bg-1"></div>
                    <div class="carousel-caption">
                        <h2>Thriller</h2>
                        <p class="d-none d-md-block">You only have one go at life, which is thrilling. </p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="slider-img slider-bg-2"></div>
                    <div class="carousel-caption">
                        <h2>Self Help</h2>
                        <p class="d-none d-md-block">How you love yourself is how you teach others to love you. </p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="slider-img slider-bg-3"></div>
                    <div class="carousel-caption">
                        <h2>Manga</h2>
                        <p class="d-none d-md-block">Manga is not comic. </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="main-content">
        <div class="container">
            <div class="row">
                <!-- Sidebar Content -->
                @include('layouts.includes.side-bar')
                <!-- //Sidebar End -->
                <div class="col-md-8">
                    <div class="content-area">
                        <div class="card my-4">
                            <div class="card-header bg-dark">
                                <h4><a href="{{route('category', 'thriller')}}" class="text-white">Thriller</a></h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @if(! $thriller->count())
                                       <div class="alert alert-warning">No books availble</div>
                                    @else
                                        @foreach($thriller as $book)
                                            <div class="col-lg-3 col-6">
                                                <div class="book-wrap">
                                                    <div class="book-image mb-2">
                                                        <a href="{{route('book-details', $book->id)}}"><img src="{{$book->image_url}}" alt=""></a>
                                                        @if($book->discount_rate)
                                                            <h6><span class="badge badge-warning discount-tag">Discount {{$book->discount_rate}}%</span></h6>
                                                        @endif
                                                    </div>
                                                    <div class="book-title mb-2">
                                                        <a href="{{route('book-details', $book->id)}}">{{str_limit($book->title, 30)}}</a>
                                                    </div>
                                                    <div class="book-author mb-2">
                                                        <small>By <a href="{{route('author', $book->author->slug)}}">{{$book->author->name}}</a></small>
                                                    </div>
                                                    <div class="pbook-price mb-3">
                                                        @if($book->discount_rate)
                                                            <span class="line-through mr-3">&#2547;{{$book->init_price}}</span>
                                                        @endif
                                                        <span class=""><strong>&#2547;{{$book->price}}</strong></span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="show-more pt-2 text-right">
                                    <a href="{{route('category', 'thriller')}}" class="text-secondary">See More <i class="fas fa-angle-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card my-4">
                            <div class="card-header bg-dark">
                                <h4><a href="{{route('category', 'selfhelp')}}" class="text-white">Self help</a></h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @if(! $selfhelp->count())
                                        <div class="alert alert-warning">No books availble</div>
                                    @else
                                        @foreach($selfhelp as $book)
                                            <div class="col-lg-3 col-6">
                                                <div class="book-wrap">
                                                    <div class="book-image mb-2">
                                                        <a href="{{route('book-details', $book->id)}}"><img src="{{$book->image_url}}" alt=""></a>
                                                        @if($book->discount_rate)
                                                            <h6><span class="badge badge-warning discount-tag">Discount {{$book->discount_rate}}%</span></h6>
                                                        @endif
                                                    </div>
                                                    <div class="book-title mb-2">
                                                        <a href="{{route('book-details', $book->id)}}">{{str_limit($book->title, 30)}}</a>
                                                    </div>
                                                    <div class="book-author mb-2">
                                                        <small>By <a href="{{route('author', $book->author->slug)}}">{{$book->author->name}}</a></small>
                                                    </div>
                                                    <div class="pbook-price mb-3">
                                                        @if($book->discount_rate)
                                                            <span class="line-through mr-3">&#2547;{{$book->init_price}}</span>
                                                        @endif
                                                        <span class=""><strong>&#2547;{{$book->price}}</strong></span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="show-more pt-2 text-right">
                                    <a href="{{route('category', 'selfhelp')}}" class="text-secondary">See More <i class="fas fa-angle-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="discount-book mb-5" id="discount-books">
        <div class="container">
            <div class="card mb-10">
                <div class="card-header bg-dark text-white">
                    <h4><a href="{{route('discount-books')}}" class="text-white">Buy and Save</a></h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        @if(! $discount_books->count())
                            <div class="alert alert-warning">No books available</div>
                        @else
                            @foreach($discount_books as $book)
                                <div class="col-lg-2 col-6">
                                    <div class="book-wrap">
                                        <div class="book-image mb-2">
                                            <a href="{{route('book-details', $book->id)}}"><img src="{{$book->image_url}}" alt=""></a>
                                            @if($book->discount_rate)
                                                <h6><span class="badge badge-warning discount-tag">Discount {{$book->discount_rate}}%</span></h6>
                                            @endif
                                        </div>
                                        <div class="book-title mb-2">
                                            <a href="{{route('book-details', $book->id)}}">{{str_limit($book->title, 30)}}</a>
                                        </div>
                                        <div class="book-author mb-2">
                                            <small>By <a href="{{route('author', $book->author->slug)}}">{{$book->author->name}}</a></small>
                                        </div>
                                        <div class="pbook-price mb-3">
                                            @if($book->discount_rate)
                                                <span class="line-through mr-3">&#2547;{{$book->init_price}}</span>
                                            @endif
                                            <span class=""><strong>&#2547;{{$book->price}}</strong></span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="show-more pt-2 text-right">
                        <a href="{{route('discount-books')}}" class="text-secondary">See More <i class="fas fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
