 <div class="row">
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
    $star5=count(App\Rattings::where(['product_id'=>$product->id,'ratting'=>'5'])->get());
    $star4=count(App\Rattings::where(['product_id'=>$product->id,'ratting'=>'4'])->get());
    $star3=count(App\Rattings::where(['product_id'=>$product->id,'ratting'=>'3'])->get());
    $star2=count(App\Rattings::where(['product_id'=>$product->id,'ratting'=>'2'])->get());
    $star1=count(App\Rattings::where(['product_id'=>$product->id,'ratting'=>'1'])->get());
    ?>
                                        <!-- Rating -->
                                        <div class="col-md-3">
                                            <div id="rating">
                                                <div class="rating-avg">
                                                    <span>{{round($avg,1)}} </span>
                                        
                                                    <div class="rating-stars">
                                                        @for($i=0;$i<(round($avg,0));$i++)
                                                        <i class="fa fa-star"></i>
                                                        @endfor
                                                        @for($i=(round($avg,0));$i<5;$i++)
                                                        <i class="fa fa-star-o"></i>
                                                        @endfor
                                                       
                                                    </div>
                                                </div>
                                                <ul class="rating">
                                                    <li>
                                                        <div class="rating-stars">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                        <div class="rating-progress">
                                                            <div style="width: {{($star5/$total)*100}}%;"></div>
                                                        </div>
                                                        <span class="sum">{{$star5}}</span>
                                                    </li>
                                                    <li>
                                                        <div class="rating-stars">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                         <div class="rating-progress">
                                                            <div style="width: {{($star4/$total)*100}}%;"></div>
                                                        </div>
                                                        <span class="sum">{{$star4}}</span>
                                                    </li>
                                                    <li>
                                                        <div class="rating-stars">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                         <div class="rating-progress">
                                                            <div style="width: {{($star3/$total)*100}}%;"></div>
                                                        </div>
                                                        <span class="sum">{{$star3}}</span>
                                                    </li>
                                                    <li>
                                                        <div class="rating-stars">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                         <div class="rating-progress">
                                                            <div style="width: {{($star2/$total)*100}}%;"></div>
                                                        </div>
                                                        <span class="sum">{{$star2}}</span>
                                                    </li>
                                                    <li>
                                                        <div class="rating-stars">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                         <div class="rating-progress">
                                                            <div style="width: {{($star1/$total)*100}}%;"></div>
                                                        </div>
                                                        <span class="sum">{{$star1}}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- /Rating -->

                                        <!-- Reviews -->
                                        <div class="col-md-6">
                                            <div id="reviews">
                                                <ul class="reviews">
                                            @foreach($rattings as $ratting)
                                                    <li>
                                                        <div class="review-heading">
                                                            <h5 class="name">{{$ratting->name}}</h5>
                                                            <p class="date">{{$ratting->created_at}}</p>
                                                            <div class="review-rating">
                                                               @for($i=0;$i<$ratting->ratting;$i++)

                                                                <i class="fa fa-star"></i>
                                                               @endfor
                                                                @for($i=$ratting->ratting;$i<5;$i++)
                                                                <i class="fa fa-star-o empty"></i>
                                                                @endfor
                                                            </div>
                                                        </div>
                                                        <div class="review-body">
                                                            <p>{{$ratting->comment}}</p>
                                                        </div>
                                                    </li>
                                                @endforeach
                                                    
                                                </ul>
                                                {{ $rattings->links() }}
                                                <!-- <ul class="reviews-pagination">
                                                    <li class="active">1</li>
                                                    <li><a href="#">2</a></li>
                                                    <li><a href="#">3</a></li>
                                                    <li><a href="#">4</a></li>
                                                    <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                                </ul> -->
                                            </div>
                                        </div>
                                        <!-- /Reviews -->

                                        <!-- Review Form -->
                                        <div class="col-md-3">
                                            <div id="review-form">
                                                <form class="review-form" method="POST" action="{{ route('store.review') }}">
                                                     {{ csrf_field() }}
                                                    
                                                    <input name="name" class="input" type="text" placeholder="Your Name">
                                                    <input name="email" class="input" type="email" placeholder="Your Email">
                                                    <textarea name="comment" class="input" placeholder="Your Review"></textarea>
                                                    <div class="input-rating">
                                                        <span>Your Rating: </span>
                                                        <div class="stars">
                                                            <input name="ratting" id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
                                                            <input name="ratting"  id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
                                                            <input name="ratting"  id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
                                                            <input name="ratting"  id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
                                                            <input name="ratting"  id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
                                                        </div>
                                                    </div>
                                                    <input type="text" name="product_slug" value="{{$product->slug}}" hidden>
                                                    <input type="text" name="product_id" value="{{$product->id}}" hidden>
                                                    <button class="primary-btn">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /Review Form -->
                                    </div>