<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Electro - HTML Ecommerce Template</title>

			<!-- Google font -->
			<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

			<!-- Bootstrap -->
			<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet"/>

			<!-- Slick -->
			<link href="{{ asset('/css/slick.css') }}" rel="stylesheet"/>
			<link href="{{ asset('/css/slick-theme.css') }}" rel="stylesheet"/>

			<!-- nouislider -->
			<link href="{{ asset('/css/nouislider.css') }}" rel="stylesheet"/>

			<!-- Font Awesome Icon -->
			<link href="{{ asset('/css/font-awesome.min.css') }}" rel="stylesheet"/>

			<!-- Custom stlylesheet -->
			<link href="{{ asset('/css/style.css') }}" rel="stylesheet"/>

    </head>
	<body>
		@include('header')

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Checkout</h3>
						<ul class="breadcrumb-tree">
							<li><a href="{{route('welcome')}}">Home</a></li>
							<li class="active">Checkout</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-7">
					<form action="{{action('MyController@placeOrder')}}" method="post">	
						{{ csrf_field() }}
						 
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Billing address</h3>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="first-name"  value="{{(Auth::check() ? Auth::user()->name:'' )}}" placeholder="First Name">
							</div>
							<div  class="form-group">
								<input class="input" type="text" name="last-name" placeholder="Last Name">
							</div>
							<div class="form-group">
								<input class="input" type="email" name="email" value="{{(Auth::check() ? Auth::user()->email:'' )}}" placeholder="Email">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="address" placeholder="Address">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="city" placeholder="City">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="country" placeholder="Country">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="zip-code" placeholder="ZIP Code">
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="tel" placeholder="Telephone">
							</div>
							</div>
						<!-- /Billing Details -->

					

						<!-- Order notes -->
						<div class="order-notes">
							<textarea class="input" placeholder="Order Notes"></textarea>
						</div>
						<!-- /Order notes -->
					</div>

					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Your Order</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODUCT</strong></div>
								<div><strong>TOTAL</strong></div>
							</div>
							<div class="order-products">
								@foreach(Cart::content() as $row)
								<div class="order-col">
									<div>{{($row->options->has("size") ? $row->options->size : '1')}}x

									 {{$row->name}}</div>
									<div>${{$row->price}}</div>
									</div>
								@endforeach	

								
								
							</div>
							<div class="order-col">
								<div>Shiping</div>
								<div><strong>FREE</strong></div>
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<div><strong class="order-total">${{Cart::subtotal()}}</strong></div>
							</div>
						</div>
						<div class="payment-method">
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-1">
								<label for="payment-1">
									<span></span>
									Direct Bank Transfer
								</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
							</div>
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-2">
								<label for="payment-2">
									<span></span>
									Cheque Payment
								</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
							</div>
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-3">
								<label for="payment-3">
									<span></span>
									Paypal System
								</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
							</div>
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="terms">
							<label for="terms">
								<span></span>
								I've read and accept the <a href="#">terms & conditions</a>
							</label>
						</div>
						<button class="primary-btn order-submit">Place order</button>
					</div>
				</form>
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		@include('newsletter')
		@include('footer')

<!-- jQuery Plugins -->

			<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
			<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
			<script type="text/javascript" src="{{ asset('js/slick.min.js') }}"></script>
			<script type="text/javascript" src="{{ asset('js/nouislider.min.js') }}"></script>
			<script type="text/javascript" src="{{ asset('js/jquery.zoom.min.js') }}"></script>
			<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>

			<script type="text/javascript">
			$(document).ready(function(){
				$('#mycartlist').load("/shopping_cart/load");
    			$('#mywishlist').load("/show/viewWishlist");
    		});

			</script>
	</body>
</html>
