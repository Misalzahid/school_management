@extends('frontend.layout.app')
@section('content')

    <body>
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <p class="bread"><span><a href="{{ url('index') }}">Home</a></span> / <span>Checkout</span></p>
                    </div>
                </div>
            </div>
        </div>


        <div class="colorlib-product">
            <div class="container">
                <div class="row row-pb-lg">
                    <div class="col-sm-10 offset-md-1">
                        <div class="process-wrap">
                            <div class="process text-center active">
                                <p><span>01</span></p>
                                <h3>Shopping Cart</h3>
                            </div>
                            <div class="process text-center active">
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
                <div class="row">
                    <div class="col-lg-8">
                        <form action="{{ route('order') }}" method="post" class="colorlib-form">
                            @csrf
                            <h2>Billing Details</h2>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <input type="text" name="country" id="country" class="form-control"
                                            value="Pakistan">
                                        {{-- <div class="form-field">
                                            <i class="icon icon-arrow-down3"></i>
                                            <select name="people" id="people" class="form-control">
                                                <option value="#">Select country</option>
                                                <option value="#">Alaska</option>
                                                <option value="#">China</option>
                                                <option value="#">Japan</option>
                                                <option value="#">Korea</option>
                                                <option value="#">Philippines</option>
                                            </select>
                                        </div> --}}
                                        @error('country')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">First Name</label>
                                        <input type="text" name="f_name" id="fname" class="form-control"
                                            placeholder="Your firstname">
                                        @error('f_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lname">Last Name</label>
                                        <input type="text" name="l_name" id="lname" class="form-control"
                                            placeholder="Your lastname">
                                        @error('l_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="fname">Address</label>
                                        <input type="text" name="address" id="address" class="form-control"
                                            placeholder="Enter Your Address">
                                        @error('address')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="stateprovince">State/Province</label>
                                        <input type="text" name="state" id="fname" class="form-control"
                                            placeholder="State Province">
                                        @error('state')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="companyname">Town/City</label>
                                        <input type="text" name="city" id="towncity" class="form-control"
                                            placeholder="Town or City">
                                        @error('city')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lname">Zip/Postal Code</label>
                                        <input type="number" name="postal_code" id="zippostalcode" class="form-control"
                                            placeholder="Zip / Postal">
                                        @error('postal_code')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">E-mail Address</label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            placeholder="State Province">
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Phone">Phone Number</label>
                                        <input type="number" name="phone_no" id="zippostalcode" class="form-control"
                                            placeholder="">
                                        @error('phone_no')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="radio">
                                            <label><input type="radio" name="optradio"> Create an Account? </label>
                                            <label><input type="radio" name="optradio"> Ship to different
                                                address</label>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="cart-detail">
                                    <h2>Cart Total</h2>
                                    <ul>
                                        <li>
                                            <span>Subtotal</span> <span>{{ $total }}</span>
                                            <ul>
                                                @foreach ((array) session('cart') as $id => $details)
                                                    <li><span>{{ $details['quantity'] }} x
                                                            {{ $details['name'] }}</span>
                                                        <span>{{ $details['price'] * $details['quantity'] }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        {{-- <li><span>Shipping</span> <span>$0.00</span></li> --}}
                                        <li><span>Order Total</span> <span>{{ $total }}</span></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="w-100"></div>

                            <div class="col-md-12">
                                <div class="cart-detail">
                                    <h2>Payment Method</h2>
                                    <h3>Cash on delivery</h3>
                                    {{-- <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="radio">
                                                        <label><input type="radio" name="optradio"> Direct Bank
                                                            Tranfer</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="radio">
                                                        <label><input type="radio" name="optradio"> Check Payment</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="radio">
                                                        <label><input type="radio" name="optradio"> Paypal</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" value=""> I have read and
                                                            accept the
                                                            terms and conditions</label>
                                                    </div>
                                                </div>
                                            </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center row">
                            <div class="col">
                                <button type="submit"
                                    class="btn btn-primary
                                    id="submit">Place an
                                    order</button>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-md-12 text-center">
                                {{-- <p><a href="{{ route('order') }}" class="btn btn-primary">Place an order</a></p> --}}
                        {{-- <p><a {{url('store-form')}} class="btn btn-primary">Place an order</a></p> --}}
                        {{-- </div> --}}
                        {{-- </div> --}}
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
@endsection
