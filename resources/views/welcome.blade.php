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



<!-- SECTION -->
<div class="section">
<!-- container -->
<div class="container">
    @include('inc.flashMessages')
<!-- row -->
<div class="row">
    <!-- shop -->
    <div class="col-md-4 col-xs-6">
        <div class="shop">
            <div class="shop-img">
                <img src="./img/shop01.png" alt="">
            </div>
            <div class="shop-body">
                <h3>Laptop<br>Collection</h3>
                <a href="{{route('mystore', 'Laptops')}}" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <!-- /shop -->

    <!-- shop -->
    <div class="col-md-4 col-xs-6">
        <div class="shop">
            <div class="shop-img">
                <img src="./img/shop03.png" alt="">
            </div>
            <div class="shop-body">
                <h3>Accessories<br>Collection</h3>
                <a href="{{route('mystore', 'Accessories')}}" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <!-- /shop -->

    <!-- shop -->
    <div class="col-md-4 col-xs-6">
        <div class="shop">
            <div class="shop-img">
                <img src="./img/shop02.png" alt="">
            </div>
            <div class="shop-body">
                <h3>Cameras<br>Collection</h3>
                <a href="{{route('mystore', 'Cameras')}}" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <!-- /shop -->
</div>
<!-- /row -->
</div>
<!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
<!-- container -->
<div class="container">
<!-- row -->
<div class="row">

    <!-- section title -->
    <div class="col-md-12">
        <div class="section-title">
            <h3 class="title">New Products</h3>
            <div class="section-nav">
                <ul class="section-tab-nav tab-nav">
                    <li class="active"><a data-toggle="tab" href="#tab1">Laptops</a></li>
                    <li><a data-toggle="tab" href="#tab2">Smartphones</a></li>
                    <li><a data-toggle="tab" href="#tab3">Cameras</a></li>
                    <li><a data-toggle="tab" href="#tab4">Accessories</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /section title -->

    <!-- Products tab & slick -->
    <div class="col-md-12">
        <div class="row">
            <div class="products-tabs">
                <!-- tab1  for Laptops-->
                <div id="tab1" class="tab-pane active">
                    <div class="products-slick" data-nav="#slick-nav-1">
                        
                       @foreach($products as $product)

                        @if($product->category=="Laptops")
                        <!-- product -->
                        <div class="product">
                            <div class="product-img">
                                <img src="{{asset('/images/'.$product->images->first()->url)}}" alt="">
                                <div class="product-label">
                                    <span class="sale">-{{$product->discount}}%</span>
                                    <span class="new">NEW</span>
                                </div>
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{$product->category}} </p>
                                <h3 class="product-name"><a href="{{route('view', $product['id'])}}">{{$product->title}} </a></h3>
                                <h4 class="product-price">${{$product->price*(1-$product->discount/100)}} <del class="product-old-price">${{$product->price}}</del></h4>

                                <?php
                                $ratts=App\Rattings::where('product_id',$product->id)->get();
                                $total=count(App\Rattings::where('product_id',$product->id)->get());
                                $avg=0;$sum=0;
                                if($total==0)$total=1;
                                foreach ($ratts as $ratting) 
                                {
                                   $sum+=$ratting->ratting;
                                }
                                $avg=$sum/$total;
    ?>
                                <div class="product-rating">
                                   @for($i=0;$i<(round($avg,0));$i++)
                                                        <i class="fa fa-star"></i>
                                                        @endfor
                                                        @for($i=(round($avg,0));$i<5;$i++)
                                                        <i class="fa fa-star-o"></i>
                                                        @endfor
                                </div>
                                <div class="product-btns">
                                @if ( Auth::check())
                                @if(count(App\Wishlist::where(['product_id'=>$product->id,'user'=>Auth::user()->id])->get()
                                )>0)
                                 
                                 <a href="{{action('MyController@removeFromWishlist',$product['id'])}}"><i class="fa fa-heart"></i></a> 
                                 @else
                                 <a href="{{action('MyController@addToWishlist', $product['id'])}}"><i class="fa fa-heart-o"></i></a>
                                @endif

                                @else
                                <a href="{{action('MyController@addToWishlist', $product['id'])}}"><i class="fa fa-heart-o"></i></a>
                                @endif


                                    


                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                </div>
                            </div>
                            <div class="add-to-cart">
                               <button type="button" name="add_cart" class="add-to-cart-btn add_cart" data-productname="{{$product->title}}" data-price="{{$product->price*(1-$product->discount/100)}}" data-productid="{{$product->id}}" data-url="{{$product->images->first()->url}}"><i class="fa fa-shopping-cart"></i> Add to Cart</button>   
                            </div>
                        </div>
                        <!-- /product -->
                        @endif
                         @endforeach
                    </div>
                    <div id="slick-nav-1" class="products-slick-nav"></div>
                </div>
                <!-- /tab1 -->
                <!-- tab2  for Smartphones-->
                <div id="tab2" class="tab-pane">
                    <div class="products-slick" data-nav="#slick-nav-2">
                       @foreach($products as $product)
                        @if($product->category=="Smartphones")
                        <!-- product -->
                        <div class="product">
                            <div class="product-img">
                                <img src="{{asset('/images/'.$product->images->first()->url)}}" alt="">
                                <div class="product-label">
                                    <span class="sale">-{{$product->discount}}%</span>
                                    <span class="new">NEW</span>
                                </div>
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{$product->category}} </p>
                                <h3 class="product-name"><a href="{{route('view', $product['id'])}}">{{$product->title}} </a></h3>
                                <h4 class="product-price">${{$product->price*(1-$product->discount/100)}} <del class="product-old-price">${{$product->price}}</del></h4>
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
                                <button type="button" name="add_cart" class="add-to-cart-btn add_cart" data-productname="{{$product->title}}" data-price="{{$product->price*(1-$product->discount/100)}}" data-productid="{{$product->id}}" data-url="{{$product->images->first()->url}}"><i class="fa fa-shopping-cart"></i> Add to Cart</button> 
                                 </div>
                        </div>
                        <!-- /product -->
                        @endif
                         @endforeach
                    </div>
                    <div id="slick-nav-2" class="products-slick-nav"></div>
                </div>
                <!-- /tab2 -->
                <!-- tab3  for Cameras-->
                <div id="tab3" class="tab-pane">
                    <div class="products-slick" data-nav="#slick-nav-3">
                       @foreach($products as $product)
                        @if($product->category=="Cameras")
                        <!-- product -->
                        <div class="product">
                            <div class="product-img">
                                <img src="{{asset('/images/'.$product->images->first()->url)}}" alt="">
                                <div class="product-label">
                                    <span class="sale">-{{$product->discount}}%</span>
                                    <span class="new">NEW</span>
                                </div>
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{$product->category}} </p>
                                <h3 class="product-name"><a href="{{route('view', $product['id'])}}">{{$product->title}} </a></h3>
                                <h4 class="product-price">${{$product->price*(1-$product->discount/100)}} <del class="product-old-price">${{$product->price}}</del></h4>
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
                              <button type="button" name="add_cart" class="add-to-cart-btn add_cart" data-productname="{{$product->title}}" data-price="{{$product->price*(1-$product->discount/100)}}" data-productid="{{$product->id}}" data-url="{{$product->images->first()->url}}"><i class="fa fa-shopping-cart"></i> Add to Cart</button> 
                               </div>
                        </div>
                        <!-- /product -->
                        @endif
                         @endforeach
                    </div>
                    <div id="slick-nav-3" class="products-slick-nav"></div>
                </div>
                <!-- /tab3 -->
               <!-- tab4  for Accessories-->
                <div id="tab4" class="tab-pane">
                    <div class="products-slick" data-nav="#slick-nav-4">
                       @foreach($products as $product)
                        @if($product->category=="Accessories")
                        <!-- product -->
                        <div class="product">
                            <div class="product-img">
                                <img src="{{asset('/images/'.$product->images->first()->url)}}" alt="">
                                <div class="product-label">
                                    <span class="sale">-{{$product->discount}}%</span>
                                    <span class="new">NEW</span>
                                </div>
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{$product->category}} </p>
                                <h3 class="product-name"><a href="{{route('view', $product['id'])}}">{{$product->title}} </a></h3>
                                <h4 class="product-price">${{$product->price*(1-$product->discount/100)}} <del class="product-old-price">${{$product->price}}</del></h4>
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
                               <button type="button" name="add_cart" class="add-to-cart-btn add_cart" data-productname="{{$product->title}}" data-price="{{$product->price*(1-$product->discount/100)}}" data-productid="{{$product->id}}" data-url="{{$product->images->first()->url}}"><i class="fa fa-shopping-cart"></i> Add to Cart</button> 
                                </div>
                        </div>
                        <!-- /product -->
                        @endif
                         @endforeach
                    </div>
                    <div id="slick-nav-4" class="products-slick-nav"></div>
                </div>
                <!-- /tab4 -->
               
            </div>
        </div>
    </div>
    <!-- Products tab & slick -->
     
</div>
<!-- /row -->
 
</div>
<!-- /container -->
</div>
<!-- /SECTION -->

<!-- HOT DEAL SECTION -->
<div id="hot-deal" class="section">
<!-- container -->
<div class="container">
<!-- row -->
<div class="row">
    <div class="col-md-12">
        <div class="hot-deal">
            <ul class="hot-deal-countdown">
                <li>
                    <div>
                        <h3 id="days">02</h3>
                        <span>Days</span>
                    </div>
                </li>
                <li>
                    <div>
                        <h3 id="hours">10</h3>
                        <span>Hours</span>
                    </div>
                </li>
                <li>
                    <div>
                        <h3 id="mints">34</h3>
                        <span>Mins</span>
                    </div>
                </li>
                  <li>
                    <div>
                        <h3 id="secs">34</h3>
                        <span>Secs</span>
                    </div>
                </li>
               
            </ul>
            <h2 class="text-uppercase">hot deal this week</h2>
            <p>New Collection Up to 50% OFF</p>
            <a class="primary-btn cta-btn" href="{{route('mystore', 'HotDeals')}}">Shop now</a>
        </div>
    </div>
</div>
<!-- /row -->
</div>
<!-- /container -->
</div>
<!-- /HOT DEAL SECTION -->


@include('top-selling')
@include('top-selling-list')
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
    // var myVar = setInterval(timer, 1000);
    function timer(){
         var d = new Date();
  var day = d.getDay();
  var hour = d.getHours();
  var min=d.getMinutes();
  var secs=d.getSeconds();
  document.getElementById("days").innerHTML = 6-day;
  document.getElementById("hours").innerHTML = 24-hour;
  document.getElementById("mints").innerHTML = 60-min;
  document.getElementById("secs").innerHTML = 60-secs;
    }
   
</script>
  <script>
$(document).ready(function(){
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
