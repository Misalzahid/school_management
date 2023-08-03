@extends('frontend.layout.app')
@section('content')

    <body>
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <p class="bread"><span><a href="{{ url('index') }}">Home</a></span> / <span>Women</span></p>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="breadcrumbs-two">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="breadcrumbs-img" style="background-image:url('{{ asset($categories->image) }}');">
                            <h2>Women's</h2>
                        </div>
                        <div class="menu text-center">
                            <p><a href="#">New Arrivals</a> <a href="#">Best Sellers</a> <a
                                    href="#">Extended Widths</a> <a href="#">Sale</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="colorlib-featured">
            <div class="container">
                <div class="row">
                    @foreach ($subcategories as $subCategory)
                        <div class="col-sm-6 text-center">
                            <div class="featured">
                                <div class="product-entry border">
                                    <a href="" class="prod-img">
                                        <img src="{{ asset($subCategory->image) }}" class="img-fluid" alt="Free html5 bootstrap 4 template">
                                    </a>
                                    <h2>{{ $subCategory->title }}</h2>
                                    <p>
                                        <a href="{{ route('product.show', ['id' => $subCategory->id]) }}" class="btn btn-primary btn-lg">Shop now</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- <div class="colorlib-product">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-xl-9">
                        <div class="row row-pb-md">
                            @foreach ($products as $product)
                                <div class="col-lg-4 mb-4 text-center">
                                    <div class="product-entry border">
                                        <a href="{{ route('product', ['id' => $product->id]) }}" class="prod-img">
                                            <img src="{{ asset($product->image) }}" class="img-fluid"
                                                alt="Free html5 bootstrap 4 template">
                                        </a>
                                        <div class="desc">
                                            <h2><a href="#">{{ $product->name }}</a></h2>
                                            <span class="price">{{ $price[$product->id] }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="block-27">
                                    <ul>
                                        <li><a href="{{ $products->previousPageUrl() }}"><i class="ion-ios-arrow-back"></i></a></li>
                                        @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                                            <li class="{{ $page == $products->currentPage() ? 'active' : '' }}"><a href="{{ $url }}">{{ $page }}</a></li>
                                        @endforeach
                                        <li><a href="{{ $products->nextPageUrl() }}"><i class="ion-ios-arrow-forward"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="colorlib-partner">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
                        <h2>Trusted Partners</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col partner-col text-center">
                        <img src="{{ asset('public/images/brand-1.jpg') }}" class="img-fluid"
                            alt="Free html4 bootstrap 4 template">
                    </div>
                    <div class="col partner-col text-center">
                        <img src="{{ asset('public/images/brand-2.jpg') }}" class="img-fluid"
                            alt="Free html4 bootstrap 4 template">
                    </div>
                    <div class="col partner-col text-center">
                        <img src="{{ asset('public/images/brand-3.jpg') }}" class="img-fluid"
                            alt="Free html4 bootstrap 4 template">
                    </div>
                    <div class="col partner-col text-center">
                        <img src="{{ asset('public/images/brand-4.jpg') }}" class="img-fluid"
                            alt="Free html4 bootstrap 4 template">
                    </div>
                    <div class="col partner-col text-center">
                        <img src="{{ asset('public/images/brand-5.jpg') }}" class="img-fluid"
                            alt="Free html4 bootstrap 4 template">
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
