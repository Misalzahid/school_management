@extends('frontend.layout.app')
@section('content')

    <body>
        <aside id="colorlib-hero">
            <div class="flexslider">
                <ul class="slides">
                    <li style="background-image: url(public/images/img_bg_1.jpg);">
                        <div class="overlay"></div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6 offset-sm-3 text-center slider-text">
                                    <div class="slider-text-inner">
                                        <div class="desc">
                                            <h1 class="head-1">Men</h1>
                                            <h2 class="head-2">Shoes</h2>
                                            <h2 class="head-3">Collection</h2>
                                            <p class="category"><span>New trending shoes</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li style="background-image: url(public/images/img_bg_2.jpg);">
                        <div class="overlay"></div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6 offset-sm-3 text-center slider-text">
                                    <div class="slider-text-inner">
                                        <div class="desc">
                                            <h1 class="head-1">Women</h1>
                                            <h2 class="head-2">Shoes</h2>
                                            <h2 class="head-3">Collection</h2>
                                            <p class="category"><span>Big sale sandals</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="colorlib-intro">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h2 class="intro">All Categories</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="colorlib-product">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-4 text-center">
                        <div class="featured">
                            <a href="{{url('men')}}" class="prod-img">
                                <img src="{{ asset($categories->image) }}" class="img-fluid"
                                    alt="Free html5 bootstrap 4 template">
                            </a>
                            <div class="desc">
                                <h3 class="mt-3 heading"><a href="{{url('men')}}">Men's Collection</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 text-center">
                        <div class="featured">
                            <a href="{{url('women')}}" class="prod-img">
                                <img src="{{ asset($category->image) }}" class="img-fluid"
                                    alt="Free html5 bootstrap 4 template">
                            </a>
                            <div class="desc">
                                <h3 class="mt-3 heading"><a href="{{url('women')}}">Women's Collection</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 text-center">
                        <div class="featured">
                            <a href="{{url('kids')}}" class="prod-img">
                                <img src="{{ asset($kidscategory->image) }}" class="img-fluid"
                                    alt="Free html5 bootstrap 4 template">
                            </a>
                            <div class="desc">
                                <h3 class="mt-3 heading"><a href="{{url('kids')}}">Kid's Collection</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="colorlib-product home all-products">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 offset-sm-2 text-center colorlib-heading">
                        <h2>All Products</h2>
                    </div>
                </div>
                <div class="row row-pb-md">
                    @foreach ($products as $product)
                        <div class="col-lg-3 mb-4 text-center">
                            <div class="product-entry border">
                                <a href="{{ route('product', ['id' => $product->id]) }}" class="prod-img">
                                    <img src="{{ asset($product->image) }}" class="img-fluid"
                                        alt="Free html5 bootstrap 4 template">
                                </a>
                                <div class="desc">
                                    <h2><a href="{{ route('product', ['id' => $product->id]) }}">{{ $product->name }}</a></h2>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p><a href="{{route('allProduct')}}" class="btn btn-primary btn-lg">View All</a></p>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
