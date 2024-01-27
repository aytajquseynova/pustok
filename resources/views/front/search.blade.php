@extends('front.layouts.master')
@section('page_title', "shopList")
@section("content")

<div class="shop-product-wrap with-pagination with-pagination row space-db--30 shop-border grid-four">
    @if(count($products) > 0)
    @foreach($products as $product)
    <div class="col-lg-4 col-sm-6">
        <div class="product-card " style="padding:40px;">
            <div class="product-grid-content">
                <div class="product-header">
                    <a href="" class="author">
                        {{$product->author}}
                    </a>
                    <h3><a href="{{route('client.shopList', $product->id)}}">{{$product->title}}</a></h3>
                </div>
                <div class="product-card--body">
                    <div class="card-image">
                        <img src="{{ asset($product->main_image) }}" alt="{{ $product->title }}">
                        <div class="hover-contents">
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
    </div>
    @endforeach
    @else
    <div style="display: flex; justify-content: center; align-items: center;  margin-left:80px; padding-bottom:80px">
    <div class="alert alert-danger" role="alert">
        <strong>Sorry!</strong> No products are currently available.
    </div>
    </div>

    @endif

</div>

@endsection
