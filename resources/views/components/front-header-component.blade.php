
    @foreach ($contacts as $contact)

   <div class="site-wrapper" id="top">
        <div class="site-header header-4 mb--20 d-none d-lg-block">

            <div class="header-middle pt--10 pb--10">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <a href="/" class="site-brand">
                                <img src="{{asset('assets/front/image/logo.png')}}" alt="">
                            </a>
                        </div>
                        <div class="col-lg-5">
                            <div class="header-search-block">
                                <input type="text" placeholder="Search entire store here">
                                <button>Search</button>
                            </div>
                        </div>
                        <div iv class="col-lg-4">
                            <div class="main-navigation flex-lg-right">
                                <div class="cart-widget">
                                    <div class="login-block">
                                        @guest <!-- Check if the user is a guest (not logged in) -->
                                        <a href="{{ route('auth.signin') }}" class="font-weight-bold">Login</a> <br>
                                        <span>or</span>
                                        <a href="{{ route('auth.registration') }}" class="font-weight-bold">Register</a> <br>
                                        @else <!-- If the user is logged in -->
                                        {{ auth()->user()->name }}<br>
                                        <span>or</span>
                                        <a onclick="return confirm('Are you sure?')" href="{{ route('auth.logout') }}" class="font-weight-bold">Log out</a>
                                        @endguest
                                    </div>


                                    <div class="cart-block">
                                        <div class="cart-total">
                                            <span class="text-number">
                                                {{Cart::count()}}
                                            </span>
                                            <span class="text-item">
                                                Shopping Cart
                                            </span>
                                            <span class="price">
                                                £{{Cart::subtotal()}}
                                                <i class="fas fa-chevron-down"></i>
                                            </span>
                                        </div>
                                    <div class="cart-dropdown-block">
                                                <div class="single-cart-block">

                                                    @foreach(Cart::content()->take(2) as $cart)
                                                    <div class="cart-product">
                                                        <a href="{{ route('client.productDetails', ['id' => $cart->id]) }}" class="image">
                                                            <img src="{{ asset($cart->options['image']) }}" alt="{{ $cart->name }}" class="img-fluid">
                                                        </a>
                                                        <div class="content">
                                                            <h3 class="title">
                                                                <a href="{{ route('client.productDetails', ['id' => $cart->id]) }}">
                                                                    {{ $cart->name }}
                                                                </a>
                                                            </h3>

                                                            <p class="price">
                                                                  <span class="qty">{{ $cart->qty }} ×</span> £{{ $cart->price }}
                                                            </p>
                                                                <a href="{{ route('remove', $cart->rowId) }}" class="cross-btn"><i class="fas fa-times"></i></a>
                                                        </div>
                                                    </div>
                                                    @endforeach

                                                </div>
                                                <div class="single-cart-block">
                                                    <div class="btn-block">
                                                        <a href="{{ route('client.cart') }}" class="btn">View Cart <i class="fas fa-chevron-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>



                                                </div>
                                                @foreach(LaravelLocalization::getSupportedLocales() as $localeKey => $properties)
                                                <a style="display:block; padding:7px; background-color:#62ab00; color:white; font-weight:bold; border:1px solid white" href="{{LaravelLocalization::getLocalizedURL($localeKey)}}">{{ $localeKey}}</a>
                                                @endforeach
                                            </div>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <nav class="category-nav  primary-nav {{request()->routeIs('client.home') ? 'show' : ''}}">

                                <div>
                                    <a href="javascript:void(0)" class="category-trigger"><i class="fa fa-bars"></i>Browse
                                        categories</a>
                                    <ul class="category-menu">
                                        @foreach($categories as $category)
                                        <li class="cat-item has-children">
                                            <a href="#">{{$category->title}}</a>
                                            <ul class="sub-menu">
                                                @foreach($category->category as $child)
                                                <li><a href="#">{{ $child->title }}</a></li>
                                                @endforeach
                                            </ul>

                                        </li>
                                        @endforeach


                                        <!-- <li class="cat-item hidden-menu-item"><a href="#">Accessories</a></li>
                                            <li class="cat-item hidden-menu-item"><a href="#">Education</a></li> -->
                                        <li class="cat-item hidden-menu-item"><a href="#">Indoor Living</a></li>
                                        <li class="cat-item"><a href="#" class="js-expand-hidden-menu">More
                                                Categories</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="col-lg-3">
                            <div class="header-phone ">
                                <div class="icon">
                                    <i class="fas fa-headphones-alt"></i>
                                </div>

                                <div class="text">
                                    <p>Free Support 24/7</p>
                                    <p class="font-weight-bold number">{{$contact->phone1}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="main-navigation flex-lg-right">
                                <ul class="main-menu menu-right li-last-0">
                                    <li class="menu-item has-children">
                                         <a href="{{route('client.home')}}">{{__('menu.home')}}</a>
                                    </li>
                                    <!-- Shop -->
                                    <li class="menu-item has-children mega-menu">
                                        <a href="{{route('client.shopList')}}">{{__('routes.shop')}}</a>

                                    </li>

                                    <li class="menu-item">
                                        <a href="{{route('client.contact')}}">{{__('routes.contact')}}</a>
                                    </li>
                                         <li class="menu-item ">
                                 <a href="{{ route('client.wishList') }}" class="single-btn">
                                                <i class="fas fa-heart"></i>
                                            </a>
                                 </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-mobile-menu">
            <header class="mobile-header d-block d-lg-none pt--10 pb-md--10">
                <div class="container">
                    <div class="row align-items-sm-end align-items-center">
                        <div class="col-md-4 col-7">
                            <a href="{{route('client.home')}}" class="site-brand">
                                <img src="{{asset('assets/front/image/logo.png')}}" alt="">
                            </a>
                        </div>
                        <div class="col-md-5 order-3 order-md-2">
                            <nav class="category-nav   ">
                                <div>
                                    <a href="javascript:void(0)" class="category-trigger"><i class="fa fa-bars"></i>Browse
                                        categories</a>
                                    <ul class="category-menu">
                                        @foreach($categories as $category)
                                        <li class="cat-item has-children">
                                            <a href="#">{{$category->title}}</a>
                                            <ul class="sub-menu">
                                                @foreach($category->category as $child)
                                                <li><a href="#">{{ $child->title }}</a></li>
                                                @endforeach
                                            </ul>

                                        </li>
                                        @endforeach

                                </div>
                            </nav>
                        </div>
                        <div class="col-md-3 col-5  order-md-3 text-right">
                            <div class="mobile-header-btns header-top-widget">
                                <ul class="header-links">
                                    <li class="sin-link">
                                        <a href="{{route('client.cart')}}" class="cart-link link-icon"><i class="ion-bag"></i></a>
                                    </li>
                                    <li class="sin-link">
                                        <a href="javascript:" class="link-icon hamburgur-icon off-canvas-btn"><i class="ion-navicon"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!--Off Canvas Navigation Start-->
            <aside class="off-canvas-wrapper">
                <div class="btn-close-off-canvas">
                    <i class="ion-android-close"></i>
                </div>
                <div class="off-canvas-inner">
                    <!-- search box start -->
                    <div class="search-box offcanvas">
                        <form>
                            <input type="text" placeholder="Search Here">
                            <button class="search-btn"><i class="ion-ios-search-strong"></i></button>
                        </form>
                    </div>
                    <!-- search box end -->
                    <!-- mobile menu start -->
                    <div class="mobile-navigation">
                        <!-- mobile menu navigation start -->
                        <nav class="off-canvas-nav">
                            <ul class="mobile-menu main-mobile-menu">
                                <li class="menu-item-has-children">
                                    <a href="{{route('client.home')}}">{{__('menu.home')}}</a>

                                </li>
                                <!-- <li class="menu-item-has-children">
                                    <a href="./blog-list-left-sidebar.html">Blog</a>
                                </li> -->
                                <li class="menu-item-has-children">
                                    <a href=" {{route('client.shopList')}}">{{__('routes.shop')}}</a>
                                </li>

                                <li><a href="{{route('client.contact')}}">{{__('routes.contact')}}</a></li>
                                     <li>
                                 <a href="{{ route('client.wishList') }}" class="single-btn">
                                                <i class="fas fa-heart"></i>
                                            </a>
                                 </li>
                            </ul>
                        </nav>
                        <!-- mobile menu navigation end -->
                    </div>
                    <!-- mobile menu end -->
                    <nav class="off-canvas-nav">
                        <ul class="mobile-menu menu-block-2">
                            <li class="menu-item-has-children">
                                <a href="#">Currency - USD $ <i class="fas fa-angle-down"></i></a>
                                <ul class="sub-menu">
                                    <li> <a href="{{route('client.cart')}}">USD $</a></li>
                                    <li> <a href="{{route('client.checkout')}}">EUR €</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Lang - Eng<i class="fas fa-angle-down"></i></a>
                                <ul class="sub-menu">
                                    <li>Eng</li>
                                    <li>Ban</li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">My Account <i class="fas fa-angle-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="">My Account</a></li>
                                    <li><a href="">Order History</a></li>
                                    <li><a href="">Transactions</a></li>
                                    <li><a href="">Downloads</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <div class="off-canvas-bottom">
                        <div class="contact-list mb--10">
                            <a href="" class="sin-contact"><i class="fas fa-mobile-alt"></i>{{$contact->phone2}}</a>
                            <a href="" class="sin-contact"><i class="fas fa-envelope"></i>{{$contact->email}}</a>
                        </div>
                        <div class="off-canvas-social">
                            <a href="#" class="single-icon"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="single-icon"><i class="fas fa-rss"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-youtube"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-google-plus-g"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </aside>
            <!--Off Canvas Navigation End-->
        </div>
        <div class="sticky-init fixed-header common-sticky">
            <div class="container d-none d-lg-block">
                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <a href="{{route('client.home')}}" class="site-brand">
                            <img src="{{asset('assets/front/image/logo.png')}}" alt="">
                        </a>
                    </div>
                    <div class="col-lg-8">
                        <div class="main-navigation flex-lg-right">
                            <ul class="main-menu menu-right ">
                                <li class="menu-item has-children">
                                    <a href="{{route('client.home')}}">{{__('menu.home')}}</a>

                                </li>
                                <!-- Shop -->
                                <li class="menu-item has-children mega-menu">
                                    <a href="{{route('client.shopList')}}">{{__('routes.shop')}} </a>

                                </li>


                                <li class="menu-item">
                                    <a href="{{route('client.contact')}}">{{__('routes.contact')}}</a>
                                </li>
                                      <li class="menu-item ">
                                 <a href="{{ route('client.wishList') }}" class="single-btn">
                                                <i class="fas fa-heart"></i>
                                            </a>
                                 </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     @endforeach
