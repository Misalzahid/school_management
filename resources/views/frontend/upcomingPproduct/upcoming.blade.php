@extends('frontend.layout.app')
@section('content')

    <body>
        <div class="colorlib-product all-products">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 offset-sm-2 text-center colorlib-heading">
                        <h2>Upcoming product</h2>
                    </div>
                </div>
                <div class="row row-pb-md">
                    @foreach ($products as $product)
                        <div class="col-lg-3 mb-4 text-center">
                            <div class="product-entry border">
                                <a href="{{ route('upComingProduct', ['id' => $product->id]) }}" class="prod-img">
                                    <img src="{{ asset($product->image) }}" class="img-fluid"
                                        alt="Free html5 bootstrap 4 template">
                                </a>
                                <div class="desc">
                                    <h2><a href="#">{{ $product->name }}</a></h2>
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
    </body>
@endsection
