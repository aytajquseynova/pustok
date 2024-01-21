<footer class="site-footer">
    <div class="container">
        <div class="row justify-content-between  section-padding">
            @foreach ($contacts as $contact)


            <div class=" col-xl-3 col-lg-4 col-sm-6">
                <div class="single-footer pb--40">
                    <div class="brand-footer footer-title">
                        <img src="{{asset('assets/front/image/logo--footer.png')}}" alt="">
                    </div>
                    <div class="footer-contact">
                        <p><span class="label">{{__('routes.address')}}:</span><span class="text">{{$contact->address}}</span></p>
                        <p><span class="label">{{__('routes.phone')}}:</span><span class="text">{{$contact->phone3}}</span></p>
                        <p><span class="label">{{__('routes.email')}}:</span><span class="text">{{$contact->email}}</span></p>


                    </div>

                </div>
             @endforeach
            </div>
            <div class=" col-xl-3 col-lg-2 col-sm-6">
                <div class="single-footer pb--40">
                    <div class="footer-title">
                        <h3>Information</h3>
                    </div>
                    <ul class="footer-list normal-list">
                        <li><a href="">Prices drop</a></li>
                        <li><a href="">New products</a></li>
                        <li><a href="">Best sales</a></li>
                        <li><a href="">Contact us</a></li>
                        <li><a href="">Sitemap</a></li>
                    </ul>
                </div>
            </div>
            <div class=" col-xl-3 col-lg-2 col-sm-6">
                <div class="single-footer pb--40">
                    <div class="footer-title">
                        <h3>Extras</h3>
                    </div>
                    <ul class="footer-list normal-list">
                        <li><a href="">Delivery</a></li>
                        <li><a href="">About Us</a></li>
                        <li><a href="">Stores</a></li>
                        <li><a href="">Contact us</a></li>
                        <li><a href="">Sitemap</a></li>
                    </ul>
                </div>
            </div>
            <div class=" col-xl-3 col-lg-4 col-sm-6">
                <div class="footer-title">
                    <h3>Newsletter Subscribe</h3>
                </div>
                <div class="newsletter-form mb--30">
                    <form action="{{ route('subscribe.store') }}" method="POST">
                        @csrf
                        <input type="email" class="form-control" placeholder="Enter Your Email Address Here..." name="email">
                        <button class="btn btn--primary w-100">Subscribe</button>
                    </form>
                </div>
                <div class="social-block">
                    <h3 class="title">STAY CONNECTED</h3>
                    <ul class="social-list list-inline">
                        <li class="single-social facebook"><a href=""><i class="ion ion-social-facebook"></i></a>
                        </li>
                        <li class="single-social twitter"><a href=""><i class="ion ion-social-twitter"></i></a></li>
                        <li class="single-social google"><a href=""><i class="ion ion-social-googleplus-outline"></i></a></li>
                        <li class="single-social youtube"><a href=""><i class="ion ion-social-youtube"></i></a></li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <p class="copyright-heading">Suspendisse in auctor augue. Cras fermentum est ac fermentum tempor. Etiam
                vel
                magna volutpat, posuere eros</p>
            <a href="#" class="payment-block">
                <img src="{{asset('assets/front/image/icon/payment.png')}}" alt="">
            </a>
            <p class="copyright-text">Copyright © 2019 <a href="#" class="author">Pustok</a>. All Right Reserved.
                <br>
                Design By Pustok
            </p>
        </div>
    </div>
</footer>
