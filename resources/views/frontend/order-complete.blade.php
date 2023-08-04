@extends('frontend.layout.app')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="bread"><a href="{{ url('index') }}">Home</a> / Purchase Complete</p>
                </div>
            </div>
        </div>
    </div>
    <div class="colorlib-product">
        <div class="container">
            <div>
                <div class="row">
                    <div class="col-md-12">
                        <h4>Purchase Details</h4>
                        <p><strong>Name:</strong> {{ $name }}</p>
                        <p><strong>Invoice:</strong> {{ $order->code }}</p>
                        <p><strong>Date:</strong> {{ $order->created_at }}</p>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Unit Price</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ((array) session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                            <tr>
                                <td>{{ $details['name'] }}</td>
                                <td>{{ $details['price'] }}</td>
                                <td>{{ $details['quantity'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"><strong>Total:</strong></td>
                            <td>{{ $total }}</td>
                        </tr>
                    </tfoot>
                </table>
                <div>
                    <button id="printButton">Print</button>
                </div>
            </div>
            <div class="row hide-content">
                <div class="col-sm-10 offset-sm-1 text-center">
                    <p class="icon-addcart"><span><i class="icon-check"></i></span></p>
                    <h2 class="mb-4">Thank you for purchasing, Your order is complete</h2>
                    <p>
                        <a href="{{ url('index') }}"class="btn btn-primary btn-outline-primary">Home</a>
                        <a href="{{ url('index') }}"class="btn btn-primary btn-outline-primary"><i
                                class="icon-shopping-cart"></i> Continue Shopping</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @if (\Illuminate\Support\Facades\Session::has('message'))
        <script>
            toastr.success('{{ \Illuminate\Support\Facades\Session::get('message') }}');
        </script>
    @endif
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#printButton").click(function() {
                $(".colorlib-nav, footer, .breadcrumbs, #printButton, .hide-content").hide();
                window.print();
                $(".colorlib-nav, footer, .breadcrumbs, #printButton, .hide-content").show();
            });
        });
    </script>
@endsection
