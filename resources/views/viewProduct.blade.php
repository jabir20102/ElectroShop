<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <title>View Product</title>

     
        <!-- Google font -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

        <!-- Bootstrap -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"/>

        <!-- Slick -->
        <link href="{{ asset('css/slick.css') }}" rel="stylesheet"/>
        <link href="{{ asset('css/slick-theme.css') }}" rel="stylesheet"/>

        <!-- nouislider -->
        <link href="{{ asset('css/nouislider.css') }}" rel="stylesheet"/>

        <!-- Font Awesome Icon -->
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet"/>

        <!-- Custom stlylesheet -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet"/>

    </head>
    <body>
      @include('header')
<?php
      if( $product->offer!=""){
    
        $price=$product->price*(1-50/100);

      }else{
$price=$product->price*(1-$product->discount/100);
     
      }
?>
        <!-- BREADCRUMB -->
        <div id="breadcrumb" class="section">
            <!-- container -->
            <div class="container">

                @if(count($errors) > 0)     
  <div class="alert alert-danger">
         <ul>
         @foreach($errors->all() as $error)
          <li>{{$error}}</li>
         @endforeach
         </ul>
       </div>
  @endif
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb-tree">
                            <li><a href="{{route('welcome')}}">Home</a></li>
                            <li><a href="#">All Categories</a></li>
                            <li><a href="{{route('mystore',$product->category )}}">{{$product->category}}</a></li>
                            <li class="active">{{$product->title}}</li>
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
                    <!-- Product main img -->
                    <div class="col-md-5 col-md-push-2">
                        <div id="product-main-img">
                            @foreach($product->images as $img)
                            <div class="product-preview">
                                <img src="{{asset('/images/'.$img->url)}}" alt="">
                            </div>

                            @endforeach
                        </div>
                    </div>
                    <!-- /Product main img -->

                    <!-- Product thumb imgs -->
                    <div class="col-md-2  col-md-pull-5">
                        <div id="product-imgs">
                 
                             @foreach($product->images as $img)
                            <div class="product-preview">
                               <img src="{{asset('/images/'.$img->url)}}" alt="">
                            </div>
                            @endforeach
                           
                            

                        </div>
                    </div>
                    <!-- /Product thumb imgs -->

                    <!-- Product details -->
                    <div class="col-md-5">
                        <div class="product-details">
                            <h2 class="product-name">{{$product->title}}</h2>
                            <div>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                    <a class="review-link" data-toggle="tab" href="#tab3">{{count(App\Rattings::where('product_id',$product->id)->get())}} Review(s) </a>
                            </div>
                            <div>
                                <h3 class="product-price">${{$price}} <del class="product-old-price">${{$product->price}}</del></h3>
                                <span class="product-available">In Stock</span>
                            </div>
                            <p>{{$product->description}}</p>

                            <div class="product-options">
                                <label>
                                    Size
                            <select id="size{{$product->id}}" class="input-select">
                                <option value="X">X</option>
                                <option value="XX">XX</option>
                            </select>
                                </label>
                                <label>
                                    Color
                                    <select id="color{{$product->id}}" class="input-select">
                                        
                                        @foreach(explode(":",$product->colors) as $color)
                                            @if($color!='')
                                            <option>{{$color}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </label>
                            </div>

                            <div class="add-to-cart">
                                <div class="qty-label">
                                    Qty
                                    <div class="input-number">
                                        <input id="quatity{{$product->id}}" type="number" value="1">
                                        <span class="qty-up">+</span>
                                        <span class="qty-down">-</span>
                                    </div>
                                </div>

                                  <button type="button" name="add_cart" class="add-to-cart-btn add_cart" data-productname="{{$product->title}}" data-price="{{$price}}" data-productid="{{$product->id}}" data-url="{{$product->images->first()->url}}"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
    
                            </div>

                            <ul class="product-btns">
                                @if ($wishlist=="true")
                                <li><a href="{{action('MyController@removeFromWishlist',['slug'=>$product['slug'],'id'=>$product['id']])}}"><i class="fa fa-heart"></i> added to wishlist</a></li>

                                @else
                                <li><a href="{{action('MyController@addToWishlist', ['slug'=>$product['slug'],'id'=>$product['id']])}}"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
                                <li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
                                @endif
                            </ul>

                            <ul class="product-links">
                                <li>Category:</li>
                                <li><a href="{{route('mystore',$product->category )}}">{{$product->category}}</a></li>
                            </ul>

                            <ul class="product-links">
                                <li>Share:</li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                            </ul>

                        </div>
                    </div>
                    <!-- /Product details -->

                    <!-- Product tab -->
                    <div class="col-md-12">
                        <div id="product-tab">
                            <!-- product tab nav -->
                            <ul class="tab-nav">
                                <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                                <li><a data-toggle="tab" href="#tab2">Details</a></li>
                                <li><a data-toggle="tab" href="#tab3">Reviews (3)</a></li>
                            </ul>
                            <!-- /product tab nav -->

                            <!-- product tab content -->
                            <div class="tab-content">
                                <!-- tab1  -->
                                <div id="tab1" class="tab-pane fade in active">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>{{$product->description}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /tab1  -->

                                <!-- tab2  -->
                                <div id="tab2" class="tab-pane fade in">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>{{$product->details}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /tab2  -->

                                <!-- tab3  -->
                                <div id="tab3" class="tab-pane fade in">
                                    @include('reviews')
                                </div>
                                <!-- /tab3  -->
                            </div>
                            <!-- /product tab content  -->
                        </div>
                    </div>
                    <!-- /product tab -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /SECTION -->
@include('related-products')
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
    $('#mycartlist').load("/shopping_cart/load");
    $('#mywishlist').load("/show/viewWishlist");
 $('.add_cart').click(function()
 {
    
  var product_id = $(this).data("productid");
  var product_name = $(this).data("productname");
  var product_price = $(this).data("price");
  var product_url = $(this).data("url");
  var quantity = $('#quatity' + product_id).val();
  var color = $('#color' + product_id).val();
  var size = $('#size' + product_id).val();
  

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
