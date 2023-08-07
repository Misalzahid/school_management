@extends('frontend.layout.app')
@section('content')

    <body>
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <p class="bread"><span><a href="{{ url('index') }}">Home</a></span> / <span>Men</span></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="colorlib-featured">
            <div class="container mb-5">
                <div class="row">
                    @foreach ($subcategories as $category)
                        <div class="col-sm-6 text-center">
                            <a class="featured" href="{{ route('product.show', ['id' => $category->id]) }}">
                                <div class="product-entry border">
                                    <div class="prod-img">
                                        <img src="{{ asset($category->image) }}" class="img-fluid"
                                            alt="Free html5 bootstrap 4 template">
                                    </div>
                                    <h2 class="my-3">{{ $category->title }}</h2>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
@endsection
