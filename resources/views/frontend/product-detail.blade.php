@extends('frontend.layout.app')
@section('content')

    <body>
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <p class="bread"><span><a href="{{ url('index') }}">Home</a></span> / <span>Product Details</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="colorlib-product">
            <div class="container">
                <div class="row row-pb-lg product-detail-wrap">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <div class="item">
                                <div class="product-entry border pb-4 text-center">
                                    <a href="#" class="prod-img">
                                        <img src="{{ asset($productDetails->image) }}" class="img-fluid"
                                            alt="Free html5 bootstrap 4 template">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="pl-lg-4 px-0 product-desc">
                            <h3>Product Name: {{ $productDetails->name }}</h3>
                            <div class="product-variant">
                                <form action=" " method="POST">
                                    @csrf
                                    <select name="" id="sizeSelect" class="form-control rounded-0 mb-3">
                                        <option value=""disabled selected>Select Size</option>
                                        @foreach ($productDetails->varients as $variant)
                                            <option value="{{ $variant->id }}">{{ $variant->size }}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control rounded-0" placeholder="Stock" value=""
                                            id="stockDisplay" aria-label="Recipient's username"
                                            aria-describedby="basic-addon2"" readonly>
                                        <span class="input-group-text rounded-0">Stock</span>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control rounded-0" placeholder="Price" value=""
                                            id="priceDisplay" aria-label="Recipient's username"
                                            aria-describedby="basic-addon2" readonly>
                                        <span class="input-group-text rounded-0">Price</span>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control rounded-0" placeholder="Quantity" id="qty"
                                            aria-label="Recipient's username"
                                            aria-describedby="basic-addon2">
                                        <span class="input-group-text rounded-0">Quantity</span>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 text-center">
                                            <p class="addtocart"><a
                                                    class="w-100 font-weight-bold text-white btn btn-success btn-addtocart add_to_cart"
                                                    onclick="myFunction()"><span class="mr-3 icon-shopping-cart"></span>Add to Cart</a></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-md-12 pills">

                                <div class="bd-example bd-example-tabs">
                                    <h3>Description</h3>

                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane border fade show active" id="pills-description" role="tabpanel"
                                            aria-labelledby="pills-description-tab">
                                            <p>{!! $productDetails->description !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
        function myFunction() {
            var varientId = $('#sizeSelect').val();
            var qty = $('#qty').val();
            $.ajax({
                    url: '{{ URL::to('/add-to-cart') }}', // Update the URL to the correct endpoint
                    type: 'GET',
                    data: {
                        'id': varientId,
                        'qty':qty
                    },
                    success: function(response) {
                        // console.log(response);
                        $('.cart-item-count').text(response.data);
                        toastr.success(response.message);
                    }
                });

        }

        sizeSelect.addEventListener('change', function() {
            const selectedSize = sizeSelect.value;
            // alert(selectedSize);

            // Send an Ajax request to the server using jQuery
            $.ajax({
                url: "{{ url('varient') }}",
                type: "POST",
                data: {
                    size: selectedSize,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(data) {
                    // console.log(data);
                    // Update the displayed stock and price
                    $('#stockDisplay').val(data.data.total_stock);
                    $('#priceDisplay').val(data.data.price);
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        });

        // $('.btn-addtocart').click(function(event) {
        //     event.preventDefault();
        //     // Submit the form when the button is clicked
        //     $('#addToCartForm').submit();
        // });

        // var quantityInput = document.getElementById("quantity");
        // var quantity = parseInt(quantityInput.value);
        // var plusButton = document.getElementsByClass("quantity-right-plus btn");
        // var minusButton = document.getElementsByClass(" quantity-left-minus btn");

        // function incrementQuantity() {
        //     quantity += 1;
        //     quantityInput.value = quantity;
        // }

        // function decrementQuantity() {
        //     if (quantity <= 0) {
        //         quantity = 0;
        //     } else {
        //         quantity -= 1;
        //         quantityInput.value = quantity;
        //     }
        // }

        // plusButton.addEventListener('click', function() {
        //     incrementQuantity();
        // });
        // minusButton.addEventListener('click', function() {
        //     decrementQuantity();
        // });
    </script>
@endsection
