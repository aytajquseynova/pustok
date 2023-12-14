@extends('front.layouts.master')
@section('page_title', "login-register")
@section('content')
<section class="breadcrumb-section">
    <h2 class="sr-only">Site Breadcrumb</h2>
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Login</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<!--=============================================
    =            Login Register page content         =
    =============================================-->
<main class="page-section inner-page-sec-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb--30 mb-lg--0">
                <!-- Login Form s-->
           @if(session()->has('message'))
           <div class="alert alert-success">
                {{session('message')}}
           </div>
           @endif
                <form method="post" action="{{route('auth.login-register')}}">
                    @csrf
                    <div class="login-form">
                        <h4 class="login-title">New Customer</h4>
                        <p><span class="font-weight-bold">I am a new customer</span></p>
                        <div class="row">
                            <div class="col-md-12 col-12 mb--15">
                                <label for="email">Full Name</label>
                                <input class="mb-0 form-control" type="text" name="name"  placeholder="Enter your full name">
                            </div>
                            @error('name')
                                <div style="font-size: 12px; margin-top:-15px; padding:10px; margin-left:15px" class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            <div class="col-12 mb--20">
                                <label for="email">Email</label>
                                <input class="mb-0 form-control" type="email" name="email" placeholder="Enter Your Email Address Here..">
                            </div>
                            @error('email')
                                <div style="font-size: 12px; margin-top:-15px; padding:10px; margin-left:15px" class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            <div class="col-lg-6 mb--20">
                                <label for="password">Password</label>
                                <input class="mb-0 form-control" type="password" name="password" placeholder="Enter your password">
                            </div>
                            @error('password')
                                <div style="font-size: 12px; margin-top:-15px; padding:10px; margin-left:15px" class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            <div class="col-lg-6 mb--20">
                                <label for="password">Repeat Password</label>
                                <input class="mb-0 form-control" type="password" name="password_repeat" placeholder="Repeat your password">
                            </div>
                            @error('password_repeat')
                                <div style="font-size: 12px; margin-top:-15px; padding:10px; margin-left:15px" class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                                
                            <div class="col-md-12">
                                <button href="" class="btn btn-outlined">Register</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                <form action="{{route('auth.login-register')}}" method='post'>
                    @csrf
                    <div class="login-form">
                        <h4 class="login-title">Returning Customer</h4>
                        <p><span class="font-weight-bold">I am a returning customer</span></p>
                        <div class="row">
                            <div class="col-md-12 col-12 mb--15">
                                <label for="email">Enter your email address here...</label>
                                <input class="mb-0 form-control" type="email" id="email" name="email" placeholder="Enter you email address here...">
                            </div>
                            @error('email')
                                <div style="font-size: 12px; margin-top:-15px; padding:10px; margin-left:15px" class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            <div class="col-12 mb--20">
                                <label for="password">Password</label>
                                <input class="mb-0 form-control" type="password" id="password" name="password" placeholder="Enter your password">
                            </div>
                            @error('password')
                                <div style="font-size: 12px; margin-top:-15px; padding:10px; margin-left:15px" class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                                <div style="display: flex; align-items:center; margin-left:15px; gap:10px;justify-content:center">
                                    <input type="checkbox" name="remember" id="">
                                    <label for="">remember me</label>
                                </div>
                            <div class="col-md-12">
                                <button class="btn btn-outlined">Login</button>
                            </div>
                        </div>
                    </div>
                </form>
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