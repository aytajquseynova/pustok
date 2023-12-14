@include('front.layouts.partials.head')

<body>
    <x-front-header-component/>
        @yield('content')   
    <x-front-footer-component/>
    @include('front.layouts.partials.foot')
</body>
