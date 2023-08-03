@extends('frontend.layout.app')
@section('content')

    <body>
        <div class="colorlib-product">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 offset-sm-2 text-center colorlib-heading">
                        <h2>All product</h2>
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
                                    <h2><a href="#">{{ $product->name }}</a></h2>
                                    {{-- <span class="price">{{ $price }}</span> --}}
                                    {{-- <p class="btn-holder"><a href="{{route('checkout')}}"
                                        class="btn btn-outline-primary">Add to cart</a> </p> --}}
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
