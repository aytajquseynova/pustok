@extends('front.layouts.master')
@section('page_title', 'Login')
@section('content')
<section class="breadcrumb-section">
    <!-- Breadcrumb code... -->
</section>

<main class="page-section inner-page-sec-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                <!-- Login Form -->
                @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                <form method="POST" action="{{ route('auth.login') }}">
                    @csrf
                    <div class="login-form">
                        <h4 class="login-title">Returning Customer</h4>
                        <p><span class="font-weight-bold">I am a returning customer</span></p>
                        <div class="row">
                            <div class="col-md-12 col-12 mb--15">
                                <label for="email">Enter your email address here...</label>
                                <input class="mb-0 form-control" type="email" id="email1" name="email" placeholder="Enter you email address here...">
                            </div>
                            <div class="col-12 mb--20">
                                <label for="password">Password</label>
                                <input class="mb-0 form-control" type="password" id="login-password" name="password" placeholder="Enter your password">
                            </div>
                            <div class="mb--20">
                                <label for="">Remember me</label>
                                <input class="mb-0 form-control" type="checkbox" name="remember" id="remember">
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



@endsection