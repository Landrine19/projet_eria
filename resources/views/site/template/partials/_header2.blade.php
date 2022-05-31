<div id="sticker" class="header-bottom">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-sm-2">
				<div class="logo">
					<a href="{{url('/')}}"><img src="{{asset('assets/site/images/logo.png')}}" alt="logo"></a>
				</div>
			</div>
			<div class="col-sm-8">
				<div class="mainmenu text-center">
					@include('site.template.partials._menu')
				</div>
			</div>
			<div class="col-sm-2">
				<div class="search-and-cart">
					
					<!--shopping-cart-->
					<div class="cart-link">
						<a href="javascript:void(0);">
							<i class="fa fa-user"></i>
						</a>
						<ul class="list-none cart-dropdown">
							<li>
								<div class="mini-cart-thumb">
									<a href="#"><img src="{{asset('assets/site/images/cart/1.jpg')}}" alt="" /></a>
								</div>
								<div class="mini-cart-heading">
									<h5><a href="#">Aloe vera - herbal</a></h5>
									<span>2 x $140.00</span>
								</div>
								<div class="mini-cart-remove">
									<button><i class="fa fa-trash-o" aria-hidden="true"></i></button>
								</div>
							</li>
							<li>
								<div class="mini-cart-thumb">
									<a href="#"><img src="{{asset('assets/site/images/cart/2.jpg')}}" alt="" /></a>
								</div>
								<div class="mini-cart-heading">
									<h5><a href="#">Haworthia Wide Zebra</a></h5>
									<span>1 x $100.00</span>
								</div>		  		                              
								<div class="mini-cart-remove">
									<button><i class="fa fa-trash-o" aria-hidden="true"></i></button>
								</div>
							</li>
							<li>
								<div class="mini-cart-thumb">
									<a href="#"><img src="{{asset('assets/site/images/cart/3.jpg')}}" alt="" /></a>
								</div>
								<div class="mini-cart-heading">
									<h5><a href="#">Echeveria Succulent</a></h5>
									<span>1 x $100.00</span>
								</div>		  		                              
								<div class="mini-cart-remove">
									<button><i class="fa fa-trash-o" aria-hidden="true"></i></button>
								</div>
							</li>
							<li>
								<div class="mini-cart-total">
									<h5>Total: $280.00</h5>
								</div>
								<div class="mini-cart-checkout">
									<a href="checkout.html">Checkout</a>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
  	