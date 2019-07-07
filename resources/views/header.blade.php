   <!-- HEADER -->
        <header>
            <!-- TOP HEADER -->
            <div id="top-header">
                <div class="container">
                    <ul class="header-links pull-left">
                        <li><a href="#"><i class="fa fa-phone"></i> +923155395245</a></li>
                        <li><a href="mailto:mjabir42@gmail.com"><i class="fa fa-envelope-o"></i> mjabir42@gmail.com</a></li>
                        <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
                    </ul>
                    <ul class="header-links pull-right">
                         @if (Route::has('login'))
                    @if (Auth::check())
                        <li><a href="{{ url('/home') }}">Dashboard</a></li>
                    @endif
                          @endif
                         @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}" style="color:black;" 
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            <!-- /TOP HEADER -->

            <!-- MAIN HEADER -->
            <div id="header">
                <!-- container -->
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <!-- LOGO -->
                        <div class="col-md-3">
                            <div class="header-logo">
                                <a href="{{route('welcome')}}" class="logo">
                                    <img src="{{asset('/img/logo.png')}}" alt="">
                                </a>
                            </div>
                        </div>
                        <!-- /LOGO -->

                        <!-- SEARCH BAR -->
                        <div class="col-md-6">
                            <div class="header-search">
                                <form action="{{action('MyController@search')}}" method="post">
                                     {{ csrf_field() }}
                                    <select name="category"  class="input-select">
                                        <option>All Categories</option>
                                        <option>Laptops</option>
                                        <option>Smartphones</option>
                                        <option>Cameras</option>
                                        <option>Accessories</option>  
    
                                    </select>
                                    <input class="input" name="search" placeholder="Search here">
                                    <button type="submit" class="search-btn">Search</button>
                                </form>
                            </div>
                        </div>
                        <!-- /SEARCH BAR -->

                        <!-- ACCOUNT -->
                        <div class="col-md-3 clearfix">
                            <div class="header-ctn">
                                <!-- Wishlist -->
                                <div id="mywishlist" class="dropdown">
                                    <a href="#">
                                        <i class="fa fa-heart-o"></i>
                                        <span>Your Wishlist</span>
                                        <div class="qty">0</div>
                                    </a>
                                </div>
                                <!-- /Wishlist -->

                                <!-- Cart -->
                                <!-- https://github.com/Crinsane/LaravelShoppingcart -->
                                <div id="mycartlist" class="dropdown">
                                 
                                </div>
                                <!-- /Cart -->

                                <!-- Menu Toogle -->
                                <div class="menu-toggle">
                                    <a href="#">
                                        <i class="fa fa-bars"></i>
                                        <span>Menu</span>
                                    </a>
                                </div>
                                <!-- /Menu Toogle -->
                            </div>
                        </div>
                        <!-- /ACCOUNT -->
                    </div>
                    <!-- row -->
                </div>
                <!-- container -->
            </div>
            <!-- /MAIN HEADER -->
        </header>
        <!-- /HEADER -->

        <!-- NAVIGATION -->
        <nav id="navigation">
            <!-- container -->
            <div class="container">
                <!-- responsive-nav -->
                <div id="responsive-nav">
                    <!-- NAV -->
                    <ul class="main-nav nav navbar-nav">
                        <li  class="{{(\Request::is('/'))? 'active':''}}"><a href="{{route('welcome')}}">Home</a></li>
                        <li  class="{{(\Request::is('store/HotDeals'))? 'active':''}}"><a href="{{route('mystore', 'HotDeals')}}">Hot Deals</a></li>
                        <li><a href="#">Categories</a></li>
                        <li  class="{{(\Request::is('store/Laptops'))? 'active':''}}"><a href="{{route('mystore', 'Laptops')}}">Laptops</a></li>
                        <li class="{{(\Request::is('store/Smartphones'))? 'active':''}}"><a href="{{route('mystore', 'Smartphones')}}">Smartphones</a></li>
                        <li class="{{(\Request::is('store/Cameras'))? 'active':''}}"><a href="{{route('mystore', 'Cameras')}}">Cameras</a></li>
                        <li  class="{{(\Request::is('store/Accessories'))? 'active':''}}"><a href="{{route('mystore', 'Accessories')}}">Accessories</a></li>
                    </ul>
                    <!-- /NAV -->
                </div>
                <!-- /responsive-nav -->
            </div>
            <!-- /container -->
        </nav>
        <!-- /NAVIGATION -->