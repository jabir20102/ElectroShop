
        <!-- SECTION -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-4 col-xs-6">
                        <div class="section-title">
                            <h4 class="title">Top selling</h4>
                            <div class="section-nav">
                                <div id="slick-nav-23" class="products-slick-nav"></div>
                            </div>
                        </div>

                        <div class="products-widget-slick" data-nav="#slick-nav-23">
                            @for($i=0;$i<10;$i++)
                            @if($i<(count($top_sales)-1))
                            <div>
                           <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                       <img src="{{asset('/images/'.$top_sales[$i]->images->first()->url)}}" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">{{$top_sales[$i]->category}}</p>
                                        <h3 class="product-name"><a href="{{route('view',['slug'=>$top_sales[$i]->slug,'id'=>$top_sales[$i]->id] )}}">{{$top_sales[$i]->title}} </a></h3>
                                        <h4 class="product-price">${{$top_sales[$i]->price*(1-$top_sales[$i]->discount/100)}} <del class="product-old-price">${{$top_sales[$i]->price}}</del></h4>
                                    </div>
                                </div>
                                <!-- /product widget -->
                                <?php  $i++ ; ?>
                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="./img/product04.png" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">{{$top_sales[$i]->category}}</p>
                                        <h3 class="product-name"><a href="{{route('view', $top_sales[$i]->id)}}">{{$top_sales[$i]->title}} </a></h3>
                                        <h4 class="product-price">${{$top_sales[$i]->price*(1-$top_sales[$i]->discount/100)}} <del class="product-old-price">${{$top_sales[$i]->price}}</del></h4>
                                    </div>
                                </div>
                                <!-- /product widget -->
                               </div>  
                               @endif 
                               @endfor                     
                        </div>
                    </div>

                    <div class="col-md-4 col-xs-6">
                        <div class="section-title">
                            <h4 class="title">Top selling</h4>
                            <div class="section-nav">
                                <div id="slick-nav-24" class="products-slick-nav"></div>
                            </div>
                        </div>

                        <div class="products-widget-slick" data-nav="#slick-nav-24">
                          
                               @for($i=10;$i<20;$i++)
                            @if($i<(count($top_sales)-1))
                            <div>
                           <!-- product widget -->
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
                                <!-- /product widget -->
                                <?php  $i++ ; ?>
                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="./img/product04.png" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">{{$top_sales[$i]->category}}</p>
                                        <h3 class="product-name"><a href="{{route('view', $top_sales[$i]->id)}}">{{$top_sales[$i]->title}} </a></h3>
                                        <h4 class="product-price">${{$top_sales[$i]->price*(1-$top_sales[$i]->discount/100)}} <del class="product-old-price">${{$top_sales[$i]->price}}</del></h4>
                                    </div>
                                </div>
                                <!-- /product widget -->
                               </div>  
                               @endif 
                               @endfor  

                           
                        </div>
                    </div>

                    <div class="clearfix visible-sm visible-xs"></div>

                    <div class="col-md-4 col-xs-6">
                        <div class="section-title">
                            <h4 class="title">Top selling</h4>
                            <div class="section-nav">
                                <div id="slick-nav-25" class="products-slick-nav"></div>
                            </div>
                        </div>

                        <div class="products-widget-slick" data-nav="#slick-nav-25">
                           
                               @for($i=20;$i<30;$i++)
                            @if($i<(count($top_sales)-1))
                            <div>
                           <!-- product widget -->
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
                                <!-- /product widget -->
                                <?php  $i++ ; ?>
                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="./img/product04.png" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">{{$top_sales[$i]->category}}</p>
                                        <h3 class="product-name"><a href="{{route('view', $top_sales[$i]->id)}}">{{$top_sales[$i]->title}} </a></h3>
                                        <h4 class="product-price">${{$top_sales[$i]->price*(1-$top_sales[$i]->discount/100)}} <del class="product-old-price">${{$top_sales[$i]->price}}</del></h4>
                                    </div>
                                </div>
                                <!-- /product widget -->
                               </div>  
                               @endif 
                               @endfor

                        </div>
                    </div>

                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /SECTION -->