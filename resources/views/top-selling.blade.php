
        <!-- SECTION -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">

                    <!-- section title -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <h3 class="title">Top selling</h3>
                            <div class="section-nav">
                                <ul class="section-tab-nav tab-nav">
                                    <li class="active"><a data-toggle="tab" href="#tab11">Laptops</a></li>
                                    <li><a data-toggle="tab" href="#tab12">Smartphones</a></li>
                                    <li><a data-toggle="tab" href="#tab13">Cameras</a></li>
                                    <li><a data-toggle="tab" href="#tab14">Accessories</a></li>
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
                <div id="tab11" class="tab-pane active">
                    <div class="products-slick" data-nav="#slick-nav-11">
                      
                       @foreach($top_sales as $product)
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
                                <h3 class="product-name"><a href="{{route('view', ['slug'=>$product['slug'],'id'=>$product['id']])}}">{{$product->title}} </a></h3>
                                <h4 class="product-price">${{$product->price*(1-$product->discount/100)}} <del class="product-old-price">${{$product->price}}</del></h4>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-btns">
                                @if ( Auth::check())
                                @if(count(App\Wishlist::where(['product_id'=>$product->id,'user'=>Auth::user()->id])->get()
                                )>0)
                                 
                                 <a href="{{action('MyController@removeFromWishlist', ['slug'=>$product['slug'],'id'=>$product['id']])}}"><i class="fa fa-heart"></i></a> 
                                 @else
                                 <a href="{{action('MyController@addToWishlist', ['slug'=>$product['slug'],'id'=>$product['id']])}}"><i class="fa fa-heart-o"></i></a>
                                @endif

                                @else
                                <a href="{{action('MyController@addToWishlist', ['slug'=>$product['slug'],'id'=>$product['id']])}}"><i class="fa fa-heart-o"></i></a>
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
                    <div id="slick-nav-11" class="products-slick-nav"></div>
                </div>
                <!-- /tab1 -->
                <!-- tab2  for Smartphones-->
                <div id="tab12" class="tab-pane">
                    <div class="products-slick" data-nav="#slick-nav-12">
                       @foreach($top_sales as $product)
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
                                <h3 class="product-name"><a href="{{route('view',  ['slug'=>$product['slug'],'id'=>$product['id']])}}">{{$product->title}} </a></h3>
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
                    <div id="slick-nav-12" class="products-slick-nav"></div>
                </div>
                <!-- /tab2 -->
                <!-- tab3  for Cameras-->
                <div id="tab13" class="tab-pane">
                    <div class="products-slick" data-nav="#slick-nav-13">
                       @foreach($top_sales as $product)
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
                                <h3 class="product-name"><a href="{{route('view',  ['slug'=>$product['slug'],'id'=>$product['id']])}}">{{$product->title}} </a></h3>
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
                    <div id="slick-nav-13" class="products-slick-nav"></div>
                </div>
                <!-- /tab3 -->
               <!-- tab4  for Accessories-->
                <div id="tab14" class="tab-pane">
                    <div class="products-slick" data-nav="#slick-nav-14">
                       @foreach($top_sales as $product)
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
                                <h3 class="product-name"><a href="{{route('view',  ['slug'=>$product['slug'],'id'=>$product['id']])}}">{{$product->title}} </a></h3>
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
                    <div id="slick-nav-14" class="products-slick-nav"></div>
                </div>
                <!-- /tab4 -->
                            </div>
                        </div>
                    </div>
                    <!-- /Products tab & slick -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /SECTION -->