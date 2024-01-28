@extends('front.layouts.master')
@section('page_title', "Pustok - Book Store HTML Template")
@section('content')
<!--=================================
        Hero Area
    ===================================== -->
<section class="hero-area hero-slider-4 ">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 offset-lg-3">
                <div class="sb-slick-slider" data-slick-setting='{
                                                                    "autoplay": true,
                                                                    "autoplaySpeed": 8000,
                                                                    "slidesToShow": 1,
                                                                    "dots":true
                                                                    }'>
                    <div class="single-slide bg-image bg-overlay--white" data-bg="{{asset('assets/front/image/bg-images/home-4-slider-1.png')}}">
                        <div class="home-content text-left pl--30">
                            <div class="row">
                                <div class="col-lg-5">
                                    <span class="title-small">Magazine Cover</span>
                                    <h1>Mockup.</h1>
                                    <p>Cover up front of book and
                                        <br>leave summary
                                    </p>
                                    <a href="{{route('client.shopList', 'slug')}}" class="btn btn-outlined--pink">
                                        Shop Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide bg-image bg-overlay--dark" data-bg="{{asset('assets/front/image/bg-images/home-4-slider-2.png')}}">
                        <div class="home-content text-center">
                            <div class="row justify-content-end">
                                <div class="col-lg-8">
                                    <h1 class="v2">I Love This Idea!</h1>
                                    <h2>Cover up front of book and
                                        leave summary</h2>
                                    <a href="{{route('client.shopList', 'slug')}}" class="btn btn--yellow">
                                        Shop Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=================================
        Home Features Section
    ===================================== -->

<!--=================================
        Home Category Gallery
    ===================================== -->

<!--=================================
        Home Two Column Section
    ===================================== -->
<section class="section-margin">
    <h1 class="sr-only">Promotion Section</h1>
    <div class="container" style="padding-top: 40px">
        <div class="row">
            <div class="col-lg-4">
                <div class="home-left-side text-center text-lg-left">
                    <div class="single-block text-center">
                        {{-- <h3 class="home-sidebar-title style-2">
                            Special offer
                        </h3> --}}
                        <div class="product-slider countdown-single with-countdown sb-slick-slider product-border-reset" data-slick-setting='{
                                                "autoplay": true,
                                                "autoplaySpeed": 8000,
                                                "slidesToShow": 1,
                                                "dots":true
                                            }' data-slick-responsive='[
                                            {"breakpoint":1200, "settings": {"slidesToShow": 1} },
                                            {"breakpoint":992, "settings": {"slidesToShow": 2} },
                                            {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                            {"breakpoint":575, "settings": {"slidesToShow": 1} },
                                            {"breakpoint":490, "settings": {"slidesToShow": 1} }
                                        ]'>
                                        @foreach($products as $product)
                                        <div class="single-slide">
                                            <div class="product-card">
                                                <div class="product-header">
                                                    <a href="" class="author">
                                                        {{ $product->author }}
                                                    </a>
                                                    <h3><a href="{{route('client.productDetails', $product->id)}}">{{ $product->name }}</a></h3>
                                                </div>
                                                <div class="product-card--body">
                                                    <div class="card-image">
                                                         <a href="{{ route('client.productDetails', ['id' => $product->id]) }}" class="image">
                                                            <img src="{{ asset($product->main_image) }}" alt="{{ $product->title }}" class="img-fluid">
                                                        </a>
                                                        <div class="hover-contents">
                                                            <a href="{{route('client.productDetails', $product->id)}}" class="hover-image">
                                                                <img src="{{asset('assets/front/image/products/product-1.jpg')}}" alt="">
                                                            </a>
                                                            <div class="hover-btns">
                                                                 <a href="{{ route('add', ['id' => $product->id]) }}" class="single-btn">
                                                                    <i class="fas fa-shopping-basket"></i>
                                                                </a>
                                                                <a href="{{ route('wishlist-add', ['id' => $product->id]) }}" class="single-btn">
                                                                    <i class="fas fa-heart"></i>
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="price-block">
                                                        <span class="price">£{{ (float)$product->price - ((float)$product->price * (float)$product->percent / 100) }}</span>
                                                        <del class="price-old">£ {{$product->price}}</del>
                                                        <span class="price-discount">%{{ $product->percent }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                        </div>
                    </div>
                    <div class="single-block">

                        <div class="sb-slick-slider testimonial-slider slider-one-column" data-slick-setting='{
                "autoplay": true,
                "autoplaySpeed": 8000,
                "slidesToShow":1,
                "dots":true
            }' data-slick-responsive='[
                {"breakpoint":1200, "settings": {"slidesToShow": 1} },
                {"breakpoint":992, "settings": {"slidesToShow": 2} },
                {"breakpoint":768, "settings": {"slidesToShow": 2} },
                {"breakpoint":575, "settings": {"slidesToShow": 1} },
                {"breakpoint":490, "settings": {"slidesToShow": 1} }
            ]'>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="home-right-side">
                    <div class="single-block">
                        <div class="sb-custom-tab text-lg-left text-center">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="shop-tab" data-toggle="tab" href="#shop" role="tab" aria-controls="shop" aria-selected="true">
                                        Featured Products
                                    </a>
                                    <span class="arrow-icon"></span>
                                </li>
                              <li class="nav-item">
                                    <a  class="nav-link" href="{{ route('client.newArrivals') }}" id="men-tab" role="tab" aria-controls="men" aria-selected="true">
                                        New Arrivals
                                    </a>
                                    <span class="arrow-icon"></span>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('client.bestseller')}}">
                                        Best sellers
                                    </a>
                                    <span class="arrow-icon"></span>
                                </li>
                            </ul>
                            <div class="tab-content space-db--30" id="myTabContent">
                                <div class="tab-pane show active" id="shop" role="tabpanel" aria-labelledby="shop-tab">
                                    <div class="product-slider multiple-row slider-border-multiple-row  sb-slick-slider" data-slick-setting='{
                        "autoplay": true,
                        "autoplaySpeed": 8000,
                        "slidesToShow": 3,
                        "rows":2,
                        "dots":true
                    }' data-slick-responsive='[
                        {"breakpoint":992, "settings": {"slidesToShow": 3} },
                        {"breakpoint":768, "settings": {"slidesToShow": 2} },
                        {"breakpoint":480, "settings": {"slidesToShow": 1} },
                        {"breakpoint":320, "settings": {"slidesToShow": 1} }
                    ]'>
                                        @foreach($products as $product)
                                        <div class="single-slide">
                                            <div class="product-card">
                                                <div class="product-header">
                                                    <a href="" class="author">
                                                        {{ $product->author }}
                                                    </a>
                                                    <h3><a href="{{route('client.productDetails', $product->id)}}">{{ $product->name }}</a></h3>
                                                </div>
                                                <div class="product-card--body">
                                                    <div class="card-image">
                                                         <a href="{{ route('client.productDetails', ['id' => $product->id]) }}" class="image">
                                                            <img src="{{ asset($product->main_image) }}" alt="{{ $product->title }}" class="img-fluid">
                                                        </a>
                                                        <div class="hover-contents">
                                                            <a href="{{route('client.productDetails', $product->id)}}" class="hover-image">
                                                                <img src="{{asset('assets/front/image/products/product-1.jpg')}}" alt="">
                                                            </a>
                                                            <div class="hover-btns">
                                                                <a href="{{ route('add', ['id' => $product->id]) }}" class="single-btn">
                                                                    <i class="fas fa-shopping-basket"></i>
                                                                </a>
                                                               <a href="{{ route('wishlist-add', ['id' => $product->id]) }}" class="single-btn">
                                                                    <i class="fas fa-heart"></i>
                                                                </a>


                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="price-block">
                                                        <span class="price">£{{ (float)$product->price - ((float)$product->price * (float)$product->percent / 100) }}</span>
                                                        <del class="price-old">£ {{$product->price}}</del>
                                                        <span class="price-discount">%{{ $product->percent }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane" id="men" role="tabpanel" aria-labelledby="men-tab">
                                    <div class="product-slider multiple-row slider-border-multiple-row  sb-slick-slider" data-slick-setting='{
                                    "autoplay": true,
                                    "autoplaySpeed": 8000,
                                    "slidesToShow": 3,
                                    "rows":2,
                                    "dots":true
                                    }' data-slick-responsive='[
                            {"breakpoint":992, "settings": {"slidesToShow": 3} },
                            {"breakpoint":768, "settings": {"slidesToShow": 2} },
                            {"breakpoint":480, "settings": {"slidesToShow": 1} },
                            {"breakpoint":320, "settings": {"slidesToShow": 1} }
                        ]'>
                                         @foreach($products as $product)
                                        <div class="single-slide">
                                            <div class="product-card">
                                                <div class="product-header">
                                                    <a href="" class="author">
                                                        {{ $product->author }}
                                                    </a>
                                                    <h3><a href="{{route('client.productDetails', $product->id)}}">{{ $product->name }}</a></h3>
                                                </div>
                                                <div class="product-card--body">
                                                    <div class="card-image">
                                                         <a href="{{ route('client.productDetails', ['id' => $product->id]) }}" class="image">
                                                            <img src="{{ asset($product->main_image) }}" alt="{{ $product->title }}" class="img-fluid">
                                                        </a>
                                                        <div class="hover-contents">
                                                            <a href="{{route('client.productDetails', $product->id)}}" class="hover-image">
                                                                <img src="{{asset('assets/front/image/products/product-1.jpg')}}" alt="">
                                                            </a>
                                                            <div class="hover-btns">
                                                               <a href="{{ route('add', ['id' => $product->id]) }}" class="single-btn">
                                                                    <i class="fas fa-shopping-basket"></i>
                                                                </a>
                                                                <a href="{{ route('wishlist-add', ['id' => $product->id]) }}" class="single-btn">
                                                                    <i class="fas fa-heart"></i>
                                                                </a>


                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="price-block">
                                                        <span class="price">£{{ (float)$product->price - ((float)$product->price * (float)$product->percent / 100) }}</span>
                                                        <del class="price-old">£ {{$product->price}}</del>
                                                        <span class="price-discount">%{{ $product->percent }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane" id="woman" role="tabpanel" aria-labelledby="woman-tab">
                                    <div class="product-slider multiple-row slider-border-multiple-row  sb-slick-slider" data-slick-setting='{
                                    "autoplay": true,
                                    "autoplaySpeed": 8000,
                                    "slidesToShow": 3,
                                    "rows":2,
                                    "dots":true
                                }' data-slick-responsive='[
                                        {"breakpoint":992, "settings": {"slidesToShow": 3} },
                                        {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                        {"breakpoint":480, "settings": {"slidesToShow": 1} },
                                        {"breakpoint":320, "settings": {"slidesToShow": 1} }
                                    ]'>

                                @foreach($products as $product)
                                        <div class="single-slide">
                                            <div class="product-card">
                                                <div class="product-header">
                                                    <a href="" class="author">
                                                        {{ $product->author }}
                                                    </a>
                                                    <h3><a href="{{route('client.productDetails', $product->id)}}">{{ $product->name }}</a></h3>
                                                </div>
                                                <div class="product-card--body">
                                                    <div class="card-image">
                                                         <a href="{{ route('client.productDetails', ['id' => $product->id]) }}" class="image">
                                                            <img src="{{ asset($product->main_image) }}" alt="{{ $product->title }}" class="img-fluid">
                                                        </a>
                                                        <div class="hover-contents">
                                                            <a href="{{route('client.productDetails', $product->id)}}" class="hover-image">
                                                                <img src="{{asset('assets/front/image/products/product-1.jpg')}}" alt="">
                                                            </a>
                                                            <div class="hover-btns">
                                                             <a href="{{ route('add', ['id' => $product->id]) }}" class="single-btn">
                                                                    <i class="fas fa-shopping-basket"></i>
                                                                </a>
                                                                <a href="{{ route('wishlist-add', ['id' => $product->id]) }}" class="single-btn">
                                                                    <i class="fas fa-heart"></i>
                                                                </a>


                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="price-block">
                                                        <span class="price">£{{ (float)$product->price - ((float)$product->price * (float)$product->percent / 100) }}</span>
                                                        <del class="price-old">£ {{$product->price}}</del>
                                                        <span class="price-discount">%{{ $product->percent }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-block">
                    <div class="row space-db--30">
                        <div class="col-lg-8 mb--30">
                            <a href="{{ route('client.sale-four') }}" class="promo-image promo-overlay">
                                <img src="{{asset('assets/front/image/bg-images/promo-banner-with-text-big.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="col-lg-4 mb--30">
                            <a href="{{ route('client.sale-four') }}" class="promo-image promo-overlay">
                                <img src="{{asset('assets/front/image/bg-images/promo-banner-with-text-2--small.jpg')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>

        </div>

    </div>
</div>
</div>
<!--=================================
    Footer
===================================== -->
</div>
<!--=================================
  Brands Slider
===================================== -->
<section class="section-margin">
    <h2 class="sr-only">Brand Slider</h2>
    <div class="container" >
        <div class="brand-slider sb-slick-slider border-top border-bottom" data-slick-setting='{
                                            "autoplay": true,
                                            "autoplaySpeed": 8000,
                                            "slidesToShow": 6
                                            }' data-slick-responsive='[
                {"breakpoint":992, "settings": {"slidesToShow": 4} },
                {"breakpoint":768, "settings": {"slidesToShow": 3} },
                {"breakpoint":575, "settings": {"slidesToShow": 3} },
                {"breakpoint":480, "settings": {"slidesToShow": 2} },
                {"breakpoint":320, "settings": {"slidesToShow": 1} }
            ]'>
            <div class="single-slide">
                <img src="{{asset('assets/ifront/image/others/brand-1.jpg')}}" alt="">
            </div>
            <div class="single-slide">
                <img src="{{asset('assets/ifront/image/others/brand-2.jpg')}}" alt="">
            </div>
            <div class="single-slide">
                <img src="{{asset('assets/ifront/image/others/brand-3.jpg')}}" alt="">
            </div>
            <div class="single-slide">
                <img src="{{asset('assets/ifront/image/others/brand-4.jpg')}}" alt="">
            </div>
            <div class="single-slide">
                <img src="{{asset('assets/ifront/image/others/brand-5.jpg')}}" alt="">
            </div>
            <div class="single-slide">
                <img src="{{asset('assets/ifront/image/others/brand-6.jpg')}}" alt="">
            </div>
            <div class="single-slide">
                <img src="{{asset('assets/ifront/image/others/brand-1.jpg')}}" alt="">
            </div>
            <div class="single-slide">
                <img src="{{asset('assets/ifront/image/others/brand-2.jpg')}}" alt="">
            </div>
        </div>
    </div>
</section>
@endsection
