@extends('front.layouts.master')
@section('page_title', "product details")
@section('content')
<section class="breadcrumb-section">
    <h2 class="sr-only">Site Breadcrumb</h2>
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Product Details</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<main class="inner-page-sec-padding-bottom">
    <div class="container">
        <div class="row mb--60">
            <div class="col-lg-5 mb--30">
                <!-- Product Details Slider Big Image-->
                <div class="product-details-slider sb-slick-slider arrow-type-two" data-slick-setting='{
              "slidesToShow": 1,
              "arrows": false,
              "fade": true,
              "draggable": false,
              "swipe": false,
              "asNavFor": ".product-slider-nav"
              }'>
                    @foreach ($images as $image)
                    <div class="single-slide">
                        <img src="{{asset($image)}}" alt="" />
                    </div>
                    @endforeach

                </div>
                <!-- Product Details Slider Nav -->
                <div class="mt--30 product-slider-nav sb-slick-slider arrow-type-two" data-slick-setting='{
            "infinite":true,
              "autoplay": true,
              "autoplaySpeed": 8000,
              "slidesToShow": 4,
              "arrows": true,
              "prevArrow":{"buttonClass": "slick-prev","iconClass":"fa fa-chevron-left"},
              "nextArrow":{"buttonClass": "slick-next","iconClass":"fa fa-chevron-right"},
              "asNavFor": ".product-details-slider",
              "focusOnSelect": true
              }'>
                     @foreach ($images as $image)
                    <div class="single-slide">
                        <img src="{{asset($image)}}" alt="" />
                    </div>
                    @endforeach
                </div>
            </div>


            <div class="col-lg-7">
                <div class="product-details-info pl-lg--30">
                    <!-- ... (other code) ... -->
                    <h3 class="product-title">
                        {{ $product->title }}
                    </h3>

                    <ul class="list-unstyled">
                        <li>
                            Category : <span class="list-value">
                              {{$category->title}}
                            </span>
                        </li>
                        <li>
                            Availability: <span class="list-value">
                                @if ($product->availability == 0)
                                Out of Stock
                                @else
                                In Stock
                                @endif
                            </span>
                        </li>

                    </ul>
                    <div class="price-block">
                        <span class="price-new">£{{ (float)$product->price - ((float)$product->price * (float)$product->percent / 100) }}</span>
                        <del class="price-old">£ {{$product->price}}</del>
                        <span class="price-discount">%{{ $product->percent }}</span>
                    </div>
                    <article class="product-details-article">
                        <h4 class="sr-only">Product Summary</h4>
                        <p>
                            {{$product->description}}
                        </p>
                    </article>
                        <div class="add-to-cart-row">
                        <div class="count-input-block">
                            <span class="widget-label"></span>
                            <input type="number" class="form-control text-center" value="1" />
                        </div>
                        <div class="add-cart-btn">
                            <a href="{{ route('add', ['id' => $product->id]) }}" class="btn btn-outlined--primary"><span class="plus-icon">+</span>Add to Cart</a>
                        </div>
                    </div>
                    <div class="compare-wishlist-row">
                        <a href="{{ route('wishlist-add', ['id' => $product->id]) }}" class="add-link"><i class="fas fa-heart"></i>Add to Wish List</a>
                    </div>
                </div>
            </div>


        </div>


    </div>
    <!--=================================
    RELATED PRODUCTS BOOKS
===================================== -->
    <section class="">
        <div class="container">
            <div class="section-title section-title--bordered">
                <h2>New arrivals</h2>
            </div>
            <div class="product-slider sb-slick-slider slider-border-single-row" data-slick-setting='{
                "autoplay": true,
                "autoplaySpeed": 8000,
                "slidesToShow": 4,
                "dots":true
            }' data-slick-responsive='[
                {"breakpoint":1200, "settings": {"slidesToShow": 4} },
                {"breakpoint":992, "settings": {"slidesToShow": 3} },
                {"breakpoint":768, "settings": {"slidesToShow": 2} },
                {"breakpoint":480, "settings": {"slidesToShow": 1} }
            ]'>
                @foreach($products as $product)
                <div class="single-slide">
                    <div class="product-card">
                        <div class="product-header">
                            <a href="" class="author"> {{$product->author}} </a>
                            <h3>
                                <a href="{{route('client.productDetails', $product->id)}}">{{$product->title}}</a>
                            </h3>
                        </div>
                        <div class="product-card--body">
                            <div class="card-image">
                                <img src="{{ asset($product->main_image) }}" alt="{{ $product->title }}">
                                <div class="hover-contents">

                                    <div class="hover-btns">
                                        <a href="{{ route('add', ['id' => $product->id]) }}" class="single-btn">
                                            <i class="fas fa-shopping-basket"></i>
                                        </a>
                                        <a href="{{ route('client.wishList') }}" class="single-btn">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="price-block">
                                <span class="price">£{{ (float)$product->price - ((float)$product->price * (float)$product->percent / 100) }}</span>
                                <del class="price-old">£{{ (float)$product->price }}</del>
                                <span class="price-discount">{{ (float)$product->percent }}%</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade modal-quick-view" id="quickModal" tabindex="-1" role="dialog" aria-labelledby="quickModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close modal-close-btn ml-auto" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="product-details-modal">
                    <div class="row">
                        <div class="col-lg-5">
                            <!-- Product Details Slider Big Image-->
                            <div class="product-details-slider sb-slick-slider arrow-type-two" data-slick-setting='{
              "slidesToShow": 1,
              "arrows": false,
              "fade": true,
              "draggable": false,
              "swipe": false,
              "asNavFor": ".product-slider-nav"
              }'>
                                <div class="single-slide">
                                    <img src="{{asset('assets/front/image/products/product-details-1.jpg')}}" alt="" />
                                </div>
                                <div class="single-slide">
                                    <img src="{{asset('assets/front/image/products/product-details-2.jpg')}}" alt="" />
                                </div>
                                <div class="single-slide">
                                    <img src="{{asset('assets/front/image/products/product-details-3.jpg')}}" alt="" />
                                </div>
                                <div class="single-slide">
                                    <img src="{{asset('assets/front/image/products/product-details-4.jpg')}}" alt="" />
                                </div>
                                <div class="single-slide">
                                    <img src="{{asset('assets/front/image/products/product-details-5.jpg')}}" alt="" />
                                </div>
                            </div>
                            <!-- Product Details Slider Nav -->
                            <div class="mt--30 product-slider-nav sb-slick-slider arrow-type-two" data-slick-setting='{
            "infinite":true,
              "autoplay": true,
              "autoplaySpeed": 8000,
              "slidesToShow": 4,
              "arrows": true,
              "prevArrow":{"buttonClass": "slick-prev","iconClass":"fa fa-chevron-left"},
              "nextArrow":{"buttonClass": "slick-next","iconClass":"fa fa-chevron-right"},
              "asNavFor": ".product-details-slider",
              "focusOnSelect": true
              }'>
                                <div class="single-slide">
                                    <img src="{{asset('assets/front/image/products/product-details-1.jpg')}}" alt="" />
                                </div>
                                <div class="single-slide">
                                    <img src="{{asset('assets/front/image/products/product-details-2.jpg')}}" alt="" />
                                </div>
                                <div class="single-slide">
                                    <img src="{{asset('assets/front/image/products/product-details-3.jpg')}}" alt="" />
                                </div>
                                <div class="single-slide">
                                    <img src="{{asset('assets/front/image/products/product-details-4.jpg')}}" alt="" />
                                </div>
                                <div class="single-slide">
                                    <img src="{{asset('assets/front/image/products/product-details-5.jpg')}}" alt="" />
                                </div>
                            </div>
                        </div>
                        @foreach($categories as $product)
                        <div class="col-lg-7 mt--30 mt-lg--30">
                            <div class="product-details-info pl-lg--30">
                                <p class="tag-block">
                                    Tags: <a href="#">Movado</a>, <a href="#">Omega</a>
                                </p>
                                <h3 class="product-title">
                                    {{ $product->title }}
                                </h3>
                                <ul class="list-unstyled">
                                    <li>Ex Tax: <span class="list-value"> £{{ $product->ex_tax }}</span></li>
                                    <li>
                                        Brands:
                                        <a href="#" class="list-value font-weight-bold">{{ $product->brands }}</a>
                                    </li>
                                    <li>Product Code: <span class="list-value"> {{ $product->product_code }}</span></li>
                                    <li>Reward Points: <span class="list-value"> {{ $product->reward_points }}</span></li>
                                    <li>
                                        Availability: <span class="list-value">
                                            @if ($product->availability == 0)
                                            Out of Stock
                                            @else
                                            In Stock
                                            @endif
                                        </span>
                                    </li>
                                </ul>
                                <div class="price-block">
                                    <span class="price-new">£{{ $product->price }}</span>
                                    <del class="price-old">£{{ $product->old_price }}</del>
                                </div>
                                <article class="product-details-article">
                                    <h4 class="sr-only">Product Summary</h4>
                                    <p>
                                        Long printed dress with thin adjustable straps. V-neckline
                                        and wiring under the Dust with ruffles at the bottom of the
                                        dress.
                                    </p>
                                </article>
                                <div class="add-to-cart-row">
                                    <div class="count-input-block">
                                        <span class="widget-label">Qty</span>
                                        <input type="number" class="form-control text-center" value="1" />
                                    </div>
                                    <div class="add-cart-btn">
                                        <a href="{{ route('add', ['id' => $product->id]) }}" class="btn btn-outlined--primary"><span class="plus-icon">+</span>Add to Cart</a>
                                    </div>
                                </div>
                                <div class="compare-wishlist-row">
                                    <a href="{{ route('wishlist-add', ['id' => $product->id]) }}" class="add-link"><i class="fas fa-heart"></i>Add to Wish List</a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                <div class="modal-footer">
                    <div class="widget-social-share">
                        <span class="widget-label">Share:</span>
                        <div class="modal-social-share">
                            <a href="#" class="single-icon"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-youtube"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-google-plus-g"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</div>
<!--=================================
  Brands Slider
===================================== -->
<section class="section-margin">
    <h2 class="sr-only">Brand Slider</h2>
    <div class="container">
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
                <img src="assets/image/others/brand-1.jpg')}}" alt="" />
            </div>
            <div class="single-slide">
                <img src="assets/image/others/brand-2.jpg')}}" alt="" />
            </div>
            <div class="single-slide">
                <img src="assets/image/others/brand-3.jpg')}}" alt="" />
            </div>
            <div class="single-slide">
                <img src="assets/image/others/brand-4.jpg')}}" alt="" />
            </div>
            <div class="single-slide">
                <img src="assets/image/others/brand-5.jpg')}}" alt="" />
            </div>
            <div class="single-slide">
                <img src="assets/image/others/brand-6.jpg')}}" alt="" />
            </div>
            <div class="single-slide">
                <img src="assets/image/others/brand-1.jpg')}}" alt="" />
            </div>
            <div class="single-slide">
                <img src="assets/image/others/brand-2.jpg')}}" alt="" />
            </div>
        </div>
    </div>
</section>
@endsection
