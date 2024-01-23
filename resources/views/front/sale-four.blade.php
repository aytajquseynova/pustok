@extends('front.layouts.master')
@section('page_title', "shopList")
@section('content')

<div class="site-wrapper" id="top">
    <section class="breadcrumb-section">
        <h2 class="sr-only">Site Breadcrumb</h2>
        <div class="container">
            <div class="breadcrumb-contents">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Shop</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <main class="inner-page-sec-padding-bottom">
        <div class="container">
            <div class="shop-toolbar mb--30">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-2 col-sm-6">
                        <!-- Product View Mode -->
                        <div class="product-view-mode">
                            <a href="#" class="sorting-btn active" data-target="grid-four">
                                <span class="grid-four-icon active">
                                    <i class="fas fa-grip-vertical"></i><i class="fas fa-grip-vertical"></i>
                                </span>
                            </a>

                        </div>
                    </div>


                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 mt--10 mt-md--0 ">
                        <div class="sorting-selection">
                            <span>Sort By:</span>
                            <select class="form-control nice-select sort-select mr-0">
                                <option value="" selected="selected">Default Sorting</option>
                                <option value="">Sort
                                    By:Name (A - Z)</option>
                                <option value="">Sort
                                    By:Name (Z - A)</option>
                                <option value="">Sort
                                    By:Price (Low &gt; High)</option>
                                <option value="">Sort
                                    By:Price (High &gt; Low)</option>
                                <option value="">Sort
                                    By:Rating (Highest)</option>
                                <option value="">Sort
                                    By:Rating (Lowest)</option>
                                <option value="">Sort
                                    By:Model (A - Z)</option>
                                <option value="">Sort
                                    By:Model (Z - A)</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shop-toolbar d-none">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-2 col-sm-6">
                        <!-- Product View Mode -->
                        <div class="product-view-mode">
                            <a href="#" class="sorting-btn active" data-target="grid"><i class="fas fa-th"></i></a>
                            <a href="#" class="sorting-btn" data-target="grid-four">
                                <span class="grid-four-icon active">
                                    <i class="fas fa-grip-vertical"></i><i class="fas fa-grip-vertical"></i>
                                </span>
                            </a>
                            <a href="#" class="sorting-btn" data-target="list "><i class="fas fa-list"></i></a>
                        </div>
                    </div>


                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 mt--10 mt-md--0 ">
                        <div class="sorting-selection">
                            <span>Sort By:</span>
                            <select class="form-control nice-select sort-select mr-0">
                                <option value="" selected="selected">Default Sorting</option>
                                <option value="">Sort
                                    By:Name (A - Z)</option>
                                <option value="">Sort
                                    By:Name (Z - A)</option>
                                <option value="">Sort
                                    By:Price (Low &gt; High)</option>
                                <option value="">Sort
                                    By:Price (High &gt; Low)</option>
                                <option value="">Sort
                                    By:Rating (Highest)</option>
                                <option value="">Sort
                                    By:Rating (Lowest)</option>
                                <option value="">Sort
                                    By:Model (A - Z)</option>
                                <option value="">Sort
                                    By:Model (Z - A)</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shop-product-wrap with-pagination row space-db--30 shop-border grid-four" style="display:flex">
                @foreach($selectedProducts as $product)
                <div class="col-lg-4 col-sm-6">
                    <div class="product-card">
                        <div class="product-grid-content">
                            <div class="product-header">
                                <a href="" class="author">
                                    {{$product->author}}
                                </a>
                                <h3><a href="{{route('client.productDetails', $product->id)}}">{{$product->title}}</a></h3>
                            </div>
                            <div class="product-card--body">
                                <div class="card-image">
                                    <!-- Main Image -->
                                    <img src="{{ asset($product->main_image) }}" alt="{{ $product->title }}">
                                    <div class="hover-contents">
                                        <!-- Hover Image (linked to product details page) -->

                                        <div class="hover-btns">
                                            <!-- Your other hover buttons go here -->
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
                                    <del class="price-old">£{{ (float)$product->price }}</del>
                                    <span class="price-discount">{{ (float)$product->percent }}%</span>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>

                @endforeach
            </div>

            <!-- Pagination Block -->
            <div class="row pt--30">
                <div class="col-md-12">
                    <div class="pagination-block">
                        <ul class="pagination-btns flex-center">
                            <li><a href="" class="single-btn prev-btn ">|<i class="zmdi zmdi-chevron-left"></i> </a>
                            </li>
                            <li><a href="" class="single-btn prev-btn "><i class="zmdi zmdi-chevron-left"></i> </a>
                            </li>
                            <li class="active"><a href="" class="single-btn">1</a></li>
                            <li><a href="" class="single-btn">2</a></li>
                            <li><a href="" class="single-btn">3</a></li>
                            <li><a href="" class="single-btn">4</a></li>
                            <li><a href="" class="single-btn next-btn"><i class="zmdi zmdi-chevron-right"></i></a>
                            </li>
                            <li><a href="" class="single-btn next-btn"><i class="zmdi zmdi-chevron-right"></i>|</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
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
                                            <img src="{{asset('assets/front/image/products/product-details-1.jpg')}}" alt="">
                                        </div>
                                        <div class="single-slide">
                                            <img src="{{asset('assets/front/image/products/product-details-2.jpg')}}" alt="">
                                        </div>
                                        <div class="single-slide">
                                            <img src="{{asset('assets/front/image/products/product-details-3.jpg')}}" alt="">
                                        </div>
                                        <div class="single-slide">
                                            <img src="{{asset('assets/front/image/products/product-details-4.jpg')}}" alt="">
                                        </div>
                                        <div class="single-slide">
                                            <img src="{{asset('assets/front/image/products/product-details-5.jpg')}}" alt="">
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
                                            <img src="{{asset('assets/front/image/products/product-details-1.jpg')}}" alt="">
                                        </div>
                                        <div class="single-slide">
                                            <img src="{{asset('assets/front/image/products/product-details-2.jpg')}}" alt="">
                                        </div>
                                        <div class="single-slide">
                                            <img src="{{asset('assets/front/image/products/product-details-3.jpg')}}" alt="">
                                        </div>
                                        <div class="single-slide">
                                            <img src="{{asset('assets/front/image/products/product-details-4.jpg')}}" alt="">
                                        </div>
                                        <div class="single-slide">
                                            <img src="{{asset('assets/front/image/products/product-details-5.jpg')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                               
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
        </div>
    </main>
</div>
<!-- Brands slider -->
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
                <img src="{{asset('assets/front/image/others/brand-1.jpg')}}" alt="">
            </div>
            <div class="single-slide">
                <img src="{{asset('assets/front/image/others/brand-2.jpg')}}" alt="">
            </div>
            <div class="single-slide">
                <img src="{{asset('assets/front/image/others/brand-3.jpg')}}" alt="">
            </div>
            <div class="single-slide">
                <img src="{{asset('assets/front/image/others/brand-4.jpg')}}" alt="">
            </div>
            <div class="single-slide">
                <img src="{{asset('assets/front/image/others/brand-5.jpg')}}" alt="">
            </div>
            <div class="single-slide">
                <img src="{{asset('assets/front/image/others/brand-6.jpg')}}" alt="">
            </div>
            <div class="single-slide">
                <img src="{{asset('assets/front/image/others/brand-1.jpg')}}" alt="">
            </div>
            <div class="single-slide">
                <img src="{{asset('assets/front/image/others/brand-2.jpg')}}" alt="">
            </div>
        </div>
    </div>
</section>
@endsection
