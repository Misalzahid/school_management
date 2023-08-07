<div class="colorlib-loader"></div>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-sm-7 col-md-9">
							<div id="colorlib-logo"><a href="{{ url('index') }}">Shoe Shop</a></div>
						</div>
						<div class="col-sm-5 col-md-3">
			         </div>
		         </div>
					<div class="row">
						<div class="col-sm-12 text-left menu-1">
							<ul>
								<li><a href="{{ url('index') }}">Home</a></li>
								<li><a href="{{ url('men') }}">Men</a></li>
								<li><a href="{{ url('women') }}">Women</a></li>
								<li><a href="{{ url('kids') }}">Kids</a></li>
								<li><a href="{{ url('about') }}">About Us</a></li>
								<li><a href="{{ url('contact') }}">Contact</a></li>
								<li><a href="{{ url('upComingProduct') }}">Upcoming Product</a></li>
                                <li class="cart"><a href="{{ url('cart') }}"><i class="icon-shopping-cart"></i> Cart [<span class="cart-item-count">{{count((array) session('cart'))}}</span>]</a></li>
                            </ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
    </div>
</div>



