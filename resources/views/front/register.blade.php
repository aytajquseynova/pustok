@extends('front.layouts.master')
@section('page_title', 'Register')
@section('content')
<section class="breadcrumb-section">
    <!-- Breadcrumb code... -->
</section>

<main class="page-section inner-page-sec-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12 mb--30 mb-lg--0">

                <form method="POST" action="{{ route('auth.register') }}">
                    @csrf
                    <div class="login-form">
                        <h4 class="login-title">New Customer</h4>
                        <p><span class="font-weight-bold">I am a new customer</span></p>
                        <div class="row">
                            <div class="col-md-12 col-12 mb--15">
                                <label for="email">Full Name</label>
                                <input class="mb-0 form-control" type="text" id="name" name="name" placeholder="Enter your full name">
                            </div>
                            @error('name')
                            <div style="font-size: 12px; margin-top: -18px; margin-left: 15px; padding: 10px;" class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                            <div class="col-12 mb--20">
                                <label for="email">Email</label>
                                <input class="mb-0 form-control" type="email" id="email" name="email" placeholder="Enter Your Email Address Here..">
                            </div>
                            @error('email')
                            <div style="font-size: 12px; margin-top: -18px; margin-left: 15px; padding: 10px;" class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                            <div class="col-lg-12 mb--20">
                                <label for="password">Password</label>
                                <input class="mb-0 form-control" type="password" id="password" name="password" placeholder="Enter your password">
                            </div>
                            @error('password')
                            <div style="font-size: 12px; margin-top: -18px; margin-left: 15px;padding: 10px;" class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                            <div class="col-lg-12 mb--20">
                                <label for="password">Repeat Password</label>
                                <input class="mb-0 form-control" type="password" id="repeat-password" name="repeat-password" placeholder="Repeat your password">
                            </div>
                            @error('repeat-password')
                            <div style="font-size: 12px; margin-top: -18px; margin-left: 15px;padding: 10px;" class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                            <div class="col-md-12">
                                <button  class="btn btn-outlined">Register</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</main>



@endsection