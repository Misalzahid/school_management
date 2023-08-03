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
                    <div class="col-sm-8">
                        <div class="">
                            <div class="item">
                                <div class="product-entry border">
                                    <a href="#" class="prod-img">
                                        <img src="{{ asset($productDetails->image) }}" class="img-fluid"
                                            alt="Free html5 bootstrap 4 template">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="product-desc">
                            <h3>Product Name: {{ $productDetails->name }}</h3>
                            <div class="product-variant">
                                <form action=" " method="POST">
                                    @csrf
                                    <select name="" id="sizeSelect" class="form-control">
                                        <option value=""disabled selected>Select Size</option>
                                        @foreach ($productDetails->varients as $variant)
                                            <option value="{{ $variant->id }}">{{ $variant->size }}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Stock" value=""
                                            id="stockDisplay" aria-label="Recipient's username"
                                            aria-describedby="basic-addon2">
                                        <span class="input-group-text">Stock</span>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Price" value=""
                                            id="priceDisplay" aria-label="Recipient's username"
                                            aria-describedby="basic-addon2">
                                        <span class="input-group-text">Price</span>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Quantity" id="qty"
                                            aria-label="Recipient's username"
                                            aria-describedby="basic-addon2">
                                        <span class="input-group-text">Quantity</span>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 text-center">
                                            <p class="addtocart"><a
                                                    class="btn btn-primary btn-addtocart add_to_cart"
                                                    onclick="myFunction()"><i class="icon-shopping-cart"></i>
                                                    Add to
                                                    Cart</a></p>
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
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                                        <li class="nav-item">
                                            <a class="nav-link active" id="pills-description-tab" data-toggle="pill"
                                                href="#pills-description" role="tab" aria-controls="pills-description"
                                                aria-expanded="true">Description</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane border fade show active" id="pills-description" role="tabpanel"
                                            aria-labelledby="pills-description-tab">
                                            <p>Even the all-powerful Pointing has no control about the blind texts it is an
                                                almost unorthographic life One day however a small line of blind text by the
                                                name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                                            <p>When she reached the first hills of the Italic Mountains, she had a last view
                                                back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet
                                                Village and the subline of her own road, the Line Lane. Pityful a rethoric
                                                question ran over her cheek, then she continued her way.</p>
                                            <ul>
                                                <li>The Big Oxmox advised her not to do so</li>
                                                <li>Because there were thousands of bad Commas</li>
                                                <li>Wild Question Marks and devious Semikoli</li>
                                                <li>She packed her seven versalia</li>
                                                <li>tial into the belt and made herself on the way.</li>
                                            </ul>
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
