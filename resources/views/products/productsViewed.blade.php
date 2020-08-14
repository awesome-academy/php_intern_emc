@extends('layouts.app')

@section('header')
    <div class="banner">
        <h2 class="banner__title">{{ trans('home.products_viewed') }}</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">{{ trans('home.home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ trans('home.products_viewed') }}</li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
<div class="container">
    <div class="row producs-page__contai box-products">
        <!-- Thực hiện thêm mẫu 1 sản phẩm vào -->
        <div class="col-6 col-md-3 product">
            <div class="product__box">
                <a href="{{ route('products.show', ['id' => 1]) }}" class="product__image">
                    <img class="image" src="https://salt.tikicdn.com/cache/280x280/ts/product/c4/46/99/0dcc6e04aca0a78cda09a2d8b156dccb.jpg" alt="">
                </a>
                <a href="" class="product__content">
                    <p class="product__name" title="999 Lá Thư Gửi Cho Chính Mình – Mong Bạn Trở Thành Phiên Bản Hoàn Hảo Nhất">
                        999 Lá Thư Gửi Cho Chính. Mong Bạn Trở Thành Phiên Bản Hoàn Hảo Nhất
                    </p>
                    <div class="product__price">
                        <!-- <span class="final-price">270.000 đ</span> -->
                        <div class="discount-price">
                            <span class="final-price">270.000 đ</span>
                            <span class="discount-percent">-10%</span>
                            <p class="old-price">300.000 đ</p>
                        </div>
                    </div>
                </a>
                <i class="fas fa-shopping-cart btnAddCart" title="{{ trans('home.add_to_cart') }}"></i>
            </div>
        </div>
    </div>
    
</div>
@endsection


@section('scroll')
    @include('components.scroll')
@endsection
