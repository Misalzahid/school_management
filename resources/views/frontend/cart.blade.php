@extends('frontend.layout.app')
@section('content')

    <body>
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <p class="bread"><span><a href="{{ url('index') }}">Home</a></span> / <span>Shopping Cart</span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="colorlib-product">
            <div class="container">
                <div class="row row-pb-lg">
                    <div class="col-md-10 offset-md-1">
                        <div class="process-wrap">
                            <div class="process text-center active">
                                <p><span>01</span></p>
                                <h3>Shopping Cart</h3>
                            </div>
                            <div class="process text-center">
                                <p><span>02</span></p>
                                <h3>Checkout</h3>
                            </div>
                            <div class="process text-center">
                                <p><span>03</span></p>
                                <h3>Order Complete</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row row-pb-lg">
                    <div class="col-md-12">
                        <div class="product-name d-flex">
                            <div class="one-forth text-left px-4">
                                <span>Product Details</span>
                            </div>
                            <div class="one-eight text-center">
                                <span>Price</span>
                            </div>
                            <div class="one-eight text-center">
                                <span>Quantity</span>
                            </div>
                            <div class="one-eight text-center">
                                <span>Total</span>
                            </div>
                            <div class="one-eight text-center px-4">
                                <span>Remove</span>
                            </div>
                        </div>
                        <?php
                        $total = 0;
                        ?>
                        <div id="cart_data">
                            @foreach ((array) session('cart') as $id => $details)
                                @php $total += $details['price'] * $details['quantity'] @endphp
                                <div class="product-cart d-flex">
                                    <div class="one-forth">
                                        <div class="product-img">
                                            <img src="{{ asset($details['image']) }}" class="img-fluid"
                                                alt="Free html5 bootstrap 4 template">
                                        </div>
                                        <div class="display-tc">
                                            <h3>{{ $details['name'] }}</h3>
                                        </div>
                                    </div>
                                    <div class="one-eight text-center">
                                        <div class="display-tc">
                                            <span class="price">
                                                <h3>{{ $details['price'] }}</h3>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="one-eight text-center">
                                        <div class="display-tc">
                                            <input type="text" id="quantity" name="quantity"
                                                class="form-control input-number text-center"
                                                value="{{ $details['quantity'] }}" min="1" max="100">
                                        </div>
                                    </div>
                                    <div class="one-eight text-center">
                                        <div class="display-tc">
                                            <span class="price">{{ $details['price'] * $details['quantity'] }}</span>
                                        </div>
                                    </div>
                                    <div class="one-eight text-center">
                                        <div class="display-tc">
                                            <a href="#" class="closed add_to_cart_remove"
                                                data-product-id="{{ $id }}"></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row row-pb-lg">
                    <div class="col-md-12">
                        <div class="total-wrap">
                            <div class="row">
                                <div class="col-sm-8">
                                    {{-- <form action="#">
                                        <div class="row form-group">
                                            <div class="col-sm-9">
                                                <input type="text" name="quantity" class="form-control input-number"
                                                    placeholder="Your Coupon Number...">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="submit" value="Apply Coupon" class="btn btn-primary">
                                            </div>
                                        </div>
                                    </form> --}}
                                    <div>
                                        <a class="btn btn-success mb-3" href="{{ route('checkout') }}">cheakout</a>
                                    </div>
                                </div>
                                <div class="col-sm-4 text-center">
                                    <div class="total">
                                        <div class="sub">
                                        </div>
                                        <div class="grand-total">
                                            <p><span><strong>Total:</strong></span> <span>{{ $total }}</span></p>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div>
                                    <a class="btn btn-success mb-3" href="{{ route('checkout') }}">cheakout</a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
                        <h2>Related Products</h2>
                    </div>
                </div>
                <div class="row">
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
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
@endsection
@section('js')
    @if (\Illuminate\Support\Facades\Session::has('message'))
        <script>
            toastr.success('{{ \Illuminate\Support\Facades\Session::get('message') }}');
        </script>
    @endif
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $(document).on('click', '.add_to_cart_remove', function(e) {
            e.preventDefault();

            // Get the product ID from the data attribute
            var productId = $(this).data('product-id');
            // alert(productId);

            // Send an AJAX request to the server to remove the product
            $.ajax({
                url: '{{ URL::to('/add-to-cart-remove') }}',
                type: 'GET',
                data: {
                    'id': productId
                },
                success: function(response) {
                    $('.cart-item-count').text(response.data);
                    $('#cart_data').empty();
                    $.each(response.cart, function(id, details) {
                        var cartDetail = '<li>' +
                            // console.log(cartDetail);
                            '<div class="product-cart d-flex">' +
                            '<div class="one-forth">' +
                            '<div class="product-img">' +
                            '<img src="' + details.image +
                            '" class="img-fluid" alt="Free html5 bootstrap 4 template">' +
                            '</div>' +
                            '<div class="display-tc">' +
                            '<h3>' + details.name + '</h3>' +
                            '</div>' +
                            '</div>' +
                            '<div class="one-eight text-center">' +
                            '<div class="display-tc">' +
                            '<span class="price">' +
                            '<h3>' + details.price + '</h3>' +
                            '</span>' +
                            '</div>' +
                            '</div>' +
                            '<div class="one-eight text-center">' +
                            '<div class="display-tc">' +
                            '<input type="text" id="quantity" name="quantity" class="form-control input-number text-center" value="' +
                            details.quantity + '" min="1" max="100">' +
                            '</div>' +
                            '</div>' +
                            '<div class="one-eight text-center">' +
                            '<div class="display-tc">' +
                            '<span class="price">' + (details.price * details.quantity) +
                            '</span>' +
                            '</div>' +
                            '</div>' +
                            '<div class="one-eight text-center">' +
                            '<div class="display-tc">' +
                            '<a href="#" class="closed add_to_cart_remove" data-product-id="' +
                            id + '"></a>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</li>';
                        $('#cart_data').append(cartDetail);
                    });
                }
            });
        });
    </script>
@endsection
