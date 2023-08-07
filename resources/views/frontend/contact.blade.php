@extends('frontend.layout.app')
@section('content')

    <body>
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <p class="bread"><span><a href="{{ url('index') }}">Home</a></span> / <span>Contact</span></p>
                    </div>
                </div>
            </div>
        </div>
        <div id="colorlib-contact">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h3>Contact Information</h3>
                        <div class="row contact-info-wrap">
                            <div class="col-md-3">
                                <p><span><i class="icon-location"></i></span> 198 West 21th Street, <br> Suite 721 New York
                                    NY 10016</p>
                            </div>
                            <div class="col-md-3">
                                <p><span><i class="icon-phone3"></i></span> <a href="tel://923465427897">+92 3465427897</a>
                                </p>
                            </div>
                            <div class="col-md-3">
                                <p><span><i class="icon-paperplane"></i></span> <a
                                        href="mailto:info@yoursite.com">info@shoeshop.com</a></p>
                            </div>
                            <div class="col-md-3">
                                <p><span><i class="icon-globe"></i></span> <a href="#">shoeshop.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
