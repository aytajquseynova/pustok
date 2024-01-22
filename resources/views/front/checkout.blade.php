@extends('front.layouts.master')
@section('page_title', "check out")
@section('content')

<section class="breadcrumb-section">
    <h2 class="sr-only">Site Breadcrumb</h2>
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">>Home</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<main id="content" class="page-section inner-page-sec-padding-bottom space-db--20">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Checkout Form s-->
                @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                    <li class="text-danger"> {{$error}}</li>
                    @endforeach
                </ul>
                @endif
                <form action="{{route('client.checkout.post')}}" class="checkout-form" method="POST">
                    <div class="row row-40">
                        <div class="col-12">
                        </div>
                        <div class="col-lg-7 mb--20">
									<!-- Billing Address -->
									<div id="billing-form" class="mb-40">
										<h4 class="checkout-title">Billing Address</h4>
										<div class="row">
											<div class="col-md-6 col-12 mb--20">
												<label>First Name*</label>
												<input type="text" name="name" placeholder="First Name">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Last Name*</label>
												<input type="text" name="surname" placeholder="Last Name">
											</div>
											<div class="col-12 mb--20">
												<label>Company Name</label>
												<input type="text" name="company_name" placeholder="Company Name">
											</div>

											<div class="col-md-6 col-12 mb--20">
												<label>Email Address*</label>
												<input type="email"name="email" placeholder="Email Address">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Phone no*</label>
												<input type="text" name="phone" placeholder="Phone number">
											</div>
											<div class="col-12 mb--20">
												<label>Address*</label>
												<input type="text" name="address" placeholder="Address line 1">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Town/City*</label>
												<input type="text" name="town_city" placeholder="Town/City">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>State*</label>
												<input type="text" name="state" placeholder="State">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Zip Code*</label>
												<input type="text" name="zip_code" placeholder="Zip Code">
											</div>
											<div class="col-12 mb--20 ">

											</div>
										</div>
									</div>
									<!-- Shipping Address -->

									<div class="order-note-block mt--30">
										<label for="order-note">Order notes</label>
										<textarea id="order-note" name="order_notes" cols="30" rows="10" class="order-note" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
									</div>
								</div>
                        <div class="col-lg-5">
                            <div class="row"><h2 class="checkout-title">YOUR ORDER</h2>
                                <!-- Cart Total -->
                             @foreach (Cart::content() as $cart)
                            <div class="col-12">
                                <div class="checkout-cart-total">
                                    <h4>Product <span>Total</span></h4>
                                    <ul>
                                        <li><span class="left">{{ $cart->name }} X {{ $cart->qty }}</span> <span class="right">£ {{ $cart->price * $cart->qty }}</span></li>
                                    </ul>

                               </div>
                            </div>
                            @endforeach

                        <div class="col-12">
                            <div class="checkout-cart-total">
                                <h4>Grand Total <span>£ {{ Cart::subtotal() }}</span></h4>
                                <button class="place-order w-100" type="submit">Place order</button>

                            </div>
                        </div>

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
