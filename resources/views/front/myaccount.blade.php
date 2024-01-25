@extends('front.layouts.master')
@section('page_title', "my account")
@section('content')
<section class="breadcrumb-section">
    <h2 class="sr-only">Site Breadcrumb</h2>
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">My Account</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<div class="page-section inner-page-sec-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <!-- My Account Tab Menu Start -->
                    <div class="col-lg-3 col-12">
                        <div class="myaccount-tab-menu nav" role="tablist">
                            <a href="#dashboad" class="active" data-toggle="tab"><i class="fas fa-tachometer-alt"></i>
                                Dashboard</a>
                            <a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>

                            <a href="#address-edit" data-toggle="tab"><i class="fa fa-map-marker"></i>
                                address</a>
                            <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> Account
                                Details</a>
                            <a href="{{route('auth.logout')}}"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </div>
                    </div>
                    <!-- My Account Tab Menu End -->
                    <!-- My Account Tab Content Start -->
                    <div class="col-lg-9 col-12 mt--30 mt-lg--0">
                        <div class="tab-content" id="myaccountContent">
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Dashboard</h3>
                                    <div class="welcome mb-20">
                                            
                                    </div>
                                    <p class="mb-0">From your account dashboard. you can easily check &amp; view
                                        your
                                        recent orders, manage your shipping and billing addresses and edit your
                                        password and account details.</p>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="orders" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Orders</h3>
                                    <div class="myaccount-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Date</th>
                                                    <th>Total</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach (Cart::content() as $cart)
                                                <tr>
                                                    <td>{{$cart->name}}</td>
                                                    <td>{{ now()->format('M d, Y') }}</td>
                                                    <td>${{Cart::subtotal()}}</td>
                                                    <td><a href="{{route('client.cart')}}" class="btn">View</a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="download" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Downloads</h3>
                                    <div class="myaccount-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    @foreach (Cart::content() as $cart)
                                                    <td>{{$cart->name}}</td>
                                                    <td>{{ now()->format('M d, Y') }}</td>
                                                    @endforeach
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Billing Address</h3>
                                    @foreach ($checkouts as $checkout)
                                    <address>
                                        <p><strong>{{$checkout->town_city}}</strong></p>
                                        <p>{{$checkout->state}} <br>
                                            {{$checkout->zip_code}}</p>
                                    </address>
                                    @endforeach

                                    <a href="#" class="btn btn--primary"><i class="fa fa-edit"></i>Edit
                                        Address</a>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="account-info" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Account Details</h3>
                                    @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    @if ($errors->any())
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li class="text-danger"> {{$error}}</li>
                                        @endforeach
                                    </ul>
                                    @endif
                                    <div class="account-details-form">
                                        <form action="#" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-6 col-12  mb--30">
                                                    <input id="first-name" name="name" placeholder="First Name" type="text">
                                                </div>
                                                <div class="col-lg-6 col-12  mb--30">
                                                    <input id="last-name" name="surname" placeholder="Last Name" type="text">
                                                </div>
                                                <div class="col-12  mb--30">
                                                    <input id="display-name" name ="fullname" placeholder="Display Name" type="text">
                                                </div>
                                                <div class="col-12  mb--30">
                                                    <input id="email" name="email" placeholder="Email Address" type="email">
                                                </div>
                                                <div class="col-12  mb--30">
                                                    <h4>Password change</h4>
                                                </div>
                                                <div class="col-12  mb--30">
                                                    <input id="current-pwd" name="password" placeholder="Current Password" type="password">
                                                </div>
                                                <div class="col-lg-6 col-12  mb--30">
                                                    <input id="new-pwd" name="new_password" placeholder="New Password" type="password">
                                                </div>
                                                <div class="col-lg-6 col-12  mb--30">
                                                    <input id="confirm-pwd" name="confirm_password" placeholder="Confirm Password" type="password">
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn--primary">Save Changes</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                        </div>
                    </div>
                    <!-- My Account Tab Content End -->
                </div>
            </div>
        </div>
    </div>
</div>
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
