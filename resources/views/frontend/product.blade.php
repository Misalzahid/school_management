@extends('frontend.layout.app')
@section('content')

    <body>
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <p class="bread"><span><a href="{{ url('index') }}">Home</a></span> / <span>Subcategory Products</span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="colorlib-featured">
            <div class="container">
                <div class="row">
                    {{-- all product show against subCategory --}}
                    @foreach ($products as $product)
                        <div class="col-sm-4 text-center mb-3">
                            <a class="featured" href="{{ route('product', ['id' => $product->id]) }}">
                                <div class="product-entry border">
                                    <div class="prod-img">
                                        <img src="{{ asset($product->image) }}" class="img-fluid"
                                            alt="Free html5 bootstrap 4 template">
                                    </div>
                                    <h2 class="my-3">{{ $product->name }}</h2>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="colorlib-product">
            <div class="container">
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
