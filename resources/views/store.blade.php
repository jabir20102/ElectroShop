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
		
		<!-- HEADER -->
		@include('header')
		<!-- /HEADER -->

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="{{route('welcome')}}">Home</a></li>
							<li><a href="#">All Categories</a></li>
							<li><a href="#">Accessories</a></li>
							<li class="active">Headphones (227,490 Results)</li>
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
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Categories</h3>
							<div class="checkbox-filter">
									<form id="sortform" action="{{action('MyController@sortProducts')}}" method="get">
										
								<div class="input-checkbox">
									@if(!isset($_GET['Laptops']))
									<input type="checkbox" id="category-1" name="Laptops" class="check">
									@else
									<input type="checkbox" id="category-1" name="Laptops" class="check" checked>
									@endif
									<label for="category-1">
										<span></span>
										Laptops
										<small>({{count(App\Product::where('category','Laptops')->get())}})</small>
									</label>
								</div>

								<div class="input-checkbox">
									@if(!isset($_GET['Smartphones']))
									<input type="checkbox" id="category-2" name="Smartphones" class="check">
									@else
									<input type="checkbox" id="category-2" name="Smartphones" class="check" checked>
									@endif
									<label for="category-2">
										<span></span>
										Smartphones
										<small>({{count(App\Product::where('category','Smartphones')->get())}})</small>
									</label>
								</div>

								<div class="input-checkbox">
									@if(!isset($_GET['Cameras']))
									<input type="checkbox" id="category-3"  name="Cameras" class="check">
									@else
									<input type="checkbox" id="category-3"  name="Cameras" class="check" checked>
									@endif
									<label for="category-3">
										<span></span>
										Cameras
										<small>({{count(App\Product::where('category','Cameras')->get())}})</small>
									</label>
								</div>

								<div class="input-checkbox">
									@if(!isset($_GET['Accessories']))
									<input type="checkbox" id="category-4" name="Accessories" class="check">
									@else
									<input type="checkbox" id="category-4" name="Accessories" class="check" checked>
									@endif
									<label for="category-4">
										<span></span>
										Accessories
										<small>({{count(App\Product::where('category','Accessories')->get())}})</small>
									</label>
								</div>
								
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Price</h3>
							
							<div class="input-checkbox">
									@if(!isset($_GET['price1']))
									<input type="checkbox" id="price-1" name="price1" class="check">
									@else
									<input type="checkbox" id="price-1" name="price1" class="check" checked>
									@endif
									<label for="price-1">
										<span></span>
										PRICE ($1-$500)										
									</label>
								</div>
								<div class="input-checkbox">
									@if(!isset($_GET['price2']))
									<input type="checkbox" id="price-2" name="price2" class="check">
									@else
									<input type="checkbox" id="price-2" name="price2" class="check" checked>
									@endif
									<label for="price-2">
										<span></span>
										PRICE ($500-$1000)										
									</label>
								</div>
								<div class="input-checkbox">
									@if(!isset($_GET['price3']))
									<input type="checkbox" id="price-3" name="price3" class="check">
									@else
									<input type="checkbox" id="price-3" name="price3" class="check" checked>
									@endif
									<label for="price-3">
										<span></span>
										PRICE (>$1000)										
									</label>
								</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Brand</h3>
							<div class="checkbox-filter">
								<div class="input-checkbox">
									@if(!isset($_GET['SAMSUNG']))
									<input type="checkbox" id="brand-1" name="SAMSUNG" class="check">
									@else
									<input type="checkbox" id="brand-1" name="SAMSUNG" class="check" checked>
									@endif
									<label for="brand-1">
										<span></span>
										SAMSUNG
										<small>({{count(App\Product::where('brand','SAMSUNG')->get())}})</small>
									</label>
								</div>
								<div class="input-checkbox">
									@if(!isset($_GET['LG']))
									<input type="checkbox" id="brand-2" name="LG" class="check">
									@else
									<input type="checkbox" id="brand-2" name="LG" class="check" checked>
									@endif
									<label for="brand-2">
										<span></span>
										LG
										<small>({{count(App\Product::where('brand','LG')->get())}})</small>
									</label>
								</div>
								<div class="input-checkbox">
									@if(!isset($_GET['SONY']))
									<input type="checkbox" id="brand-3" name="SONY" class="check">
									@else
									<input type="checkbox" id="brand-3" name="SONY" class="check" checked>
									@endif
									<label for="brand-3">
										<span></span>
										SONY
									<small>({{count(App\Product::where('brand','SONY')->get())}})</small>
									</label>
								</div>
								<div class="input-checkbox">
									@if(!isset($_GET['DELL']))
									<input type="checkbox" id="brand-4" name="DELL" class="check">
									@else
									<input type="checkbox" id="brand-4" name="DELL" class="check" checked>
									@endif
									<label for="brand-4">
										<span></span>
										DELL
									<small>({{count(App\Product::where('brand','DELL')->get())}})</small>
									</label>
								</div>
								
							</form>
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Top selling</h3>
							@for($i=0;$i<4;$i++)
                            @if($i<(count($top_sales)))
							<div class="product-widget">
								<div class="product-img">
									 <img src="{{asset('/images/'.$top_sales[$i]->images->first()->url)}}" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">{{$top_sales[$i]->category}}</p>
									<h3 class="product-name"><a href="{{route('view', $top_sales[$i]->id)}}">{{$top_sales[$i]->title}} </a></h3>
                                        <h4 class="product-price">${{$top_sales[$i]->price*(1-$top_sales[$i]->discount/100)}} <del class="product-old-price">${{$top_sales[$i]->price}}</del></h4>
								</div>
							</div>
							@endif
							@endfor
							
						</div>
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="store-sort">
								<label>
									Sort By:
									<select class="input-select">
										<option value="0">Popular</option>
										<option value="1">Position</option>
									</select>
								</label>

								<label>
									Show:
									<select class="input-select">
										<option value="0">20</option>
										<option value="1">50</option>
									</select>
								</label>
							</div>
							<ul class="store-grid">
								<li class="active"><i class="fa fa-th"></i></li>
								<li><a href="#"><i class="fa fa-th-list"></i></a></li>
							</ul>
						</div>
						<!-- /store top filter -->

						<!-- store products -->
						<div class="row">
							
				@foreach($products as $product)
				<?php
				
				if( $offer=="true"){
					$price=$product->price*(1-50/100);
			}else{
					$price=$product->price*(1-$product->discount/100);
				}

				?>
							<!-- product -->
							<div class="col-md-4 col-xs-6">
								
								<div class="product">
									<div class="product-img">
										<img src="{{asset('/images/'.$product->images->first()->url)}}" alt="">
										<div class="product-label">
								@if( $offer=="true")
								<span class="sale">-50%</span>	
								@else
							<span class="sale">-{{$product->discount}}%</span>
								@endif
											<span class="new">NEW</span>
										</div>
									</div>
									<div class="product-body">
										<p class="product-category">{{$product->category}}</p>
										<h3 class="product-name"><a href="{{route('view', $product['id'])}}">{{$product->title}}</a></h3>
							<h4 class="product-price">${{$price}}
										 <del class="product-old-price">${{$product->price}}</del></h4>	
										
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
										<div class="product-btns">
											<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
											<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
											<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
										</div>
									</div>
									<div class="add-to-cart">
										<button type="button" name="add_cart" class="add-to-cart-btn add_cart" data-productname="{{$product->title}}" data-price="{{$price}}" data-productid="{{$product->id}}" data-url="{{$product->images->first()->url}}"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
									</div>
								</div>
								
							</div>
							<!-- /product -->

								@endforeach

						
						</div>
						<!-- /store products -->

						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<span class="store-qty">Showing 20-100 products</span>
							<div style="float:right;">
							{{ $products->links() }}
							</div>
								<!-- <ul class="store-pagination">
								
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
			
    
</ul> -->
							
							
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
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
 <script>
$(document).ready(function(){
	$('.check').on('click', function(){
    	// if($(this). prop("checked") == true){
    $('#sortform').submit();
// }  //  if close
  });
  $('#mycartlist').load("/shopping_cart/load"); 
  $('#mywishlist').load("/show/viewWishlist"); 
 $('.add_cart').click(function(){
    
  var product_id = $(this).data("productid");
  var product_name = $(this).data("productname");
  var product_price = $(this).data("price");
  var product_url = $(this).data("url");
  var quantity = 1;
  var color = '';
  var size = '';
  

  if(quantity != '' && quantity > 0)
  {
   $.ajax({
    url:"{{ route('shopping_cart.add')}}",
    method:"POST",
    data:{"_token": "{{ csrf_token() }}",id:product_id,name:product_name, price:product_price, qnty:quantity,size:size,color:color,url:product_url},
    success:function(data)
    {
        // alert(data);
     alert("Product Added into Cart ");
     $('#mycartlist').html(data);
    },
    error: function(data){
        alert("fail" + ' ' + this.data)
    }
   });
  }
  else
  {
   alert("Please Enter quantity");
  }

 
});

});
</script>
	</body>
</html>
