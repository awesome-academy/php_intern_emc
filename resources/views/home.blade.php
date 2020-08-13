@extends('layouts.app')

@section('header')
    @include('components.header')
@endsection

@section('content')
<div class="container">
    <section class="section-products">
        <h2 class="title-intro">{{ trans('home.new_book') }}</h2>

        <div class="row box-products">
            <!-- Thực hiện thêm mẫu 1 sản phẩm vào -->
            <div class="col-6 col-md-3 product">
                <div class="product__box">
                    <a href="" class="product__image">
                        <img class="image" src="https://salt.tikicdn.com/cache/280x280/ts/product/df/7d/da/cc713d2bcecd12ba82d5596ddbcac2d7.jpg" alt="">
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

    </section>

    <section class="section-products">
        <h2 class="title-intro">{{ trans('home.book_sale') }}</h2>

        <div class="row box-products">
        </div>
    </section>

    <section class="section-products">
        <h2 class="title-intro">{{ trans('home.hot_trend') }}</h2>

        <div class="row box-products">
        </div>
    </section>

    <section class="section-products">
        <h2 class="title-intro">{{ trans('home.recently_viewed') }}</h2>

        <div class="row box-products">
        </div>
    </section>

</div>
@endsection


@section('scroll')
    @include('components.scroll')
@endsection
