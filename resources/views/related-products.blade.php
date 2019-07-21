
        <!-- Section -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">

                    <div class="col-md-12">
                        <div class="section-title text-center">
                            <h3 class="title">Related Products</h3>
                        </div>
                    </div>
                    @foreach($relatedProducts as $product)
                    <!-- product -->
                    <div class="col-md-3 col-xs-6">
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
                               <h3 class="product-name"><a href="{{route('view', ['slug' => $product['slug'] , 'id' => $product['id']]) }}">{{
                                     $product->title
                                }} </a></h3>
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
                                 
                                 <a href="{{action('MyController@removeFromWishlist',['slug'=>$product['slug'],'id'=>$product['id']])}}"><i class="fa fa-heart"></i></a> 
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
                    </div>
                    <!-- /product -->
                    @endforeach

                   
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /Section -->
