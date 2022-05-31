<!--header-top-->
<div class="header-top d-none d-sm-block">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-sm-9">
				<div class="contact-info">
					<ul>
						<li><i class="fa fa-phone"></i>(88) 0111 223 445 <span>|</span></li>
						<li><i class="fa fa-home"></i>20 Green Farm, New Zealand <span>|</span></li>
						<li><i class="fa fa-time"></i>Monday - Saturday: 7.AM - 5.PM</li>
					</ul>
				</div>
			</div>	
			<div class="col-sm-3">
				<div class="social-icons pull-right">
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-instagram"></i></a>
					<a href="#"><i class="fa fa-youtube"></i></a>
					<a href="#"><i class="fa fa-skype"></i></a>
				</div>
			</div>
		</div>
	</div>
</div>
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
						<a href="{{route('dashboard')}}">
							@guest()
							@else
							{{Auth::user()->nom." ".Auth::user()->prenoms}}
							@endguest
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
  