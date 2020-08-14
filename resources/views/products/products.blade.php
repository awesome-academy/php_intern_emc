@extends('layouts.app')

@section('header')
    <div class="banner">
        <h2 class="banner__title">{{ trans('home.products') }}</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">{{ trans('home.home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ trans('home.products') }}</li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
<div class="container">
    <div class="row producs-page__contai">
        <div class="col-12 col-md-3">
            
            <div class="side-bar">
                <h3 class="side-bar__title">{{ trans('home.categories') }}</h3>
                <!-- Khi có data sẽ được thay thế bằng các category item -->
                <div class="side-bar__box">
                    <div class="side-bar__item">
                        <a href="">Sách giáo khóa</a>
                        <span>(10)</span>
                    </div>
                    <div class="side-bar__item">
                        <a href="">Sách kinh tế</a>
                        <span>(10)</span>
                    </div>
                    <div class="side-bar__item">
                        <a href="">Sách chính trị</a>
                        <span>(10)</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-9">
            <div class="products-filter">
                <div class="sort-by">
                    <form action="" method="GET">
                        <label for="">{{ trans('home.order_by') }}</label>
                        <select class="sort-by__select">
                            <option value="">{{ trans('home.alphabet_a_z') }}</option>
                            <option value="">{{ trans('home.alphabet_z_a') }}</option>
                            <option value="">{{ trans('home.price_low_hight') }}</option>
                            <option value="">{{ trans('home.price_hight_low') }}</option>
                            <option value="">{{ trans('home.date_new_old') }}</option>
                            <option value="">{{ trans('home.date_old_new') }}</option>
                            <option value="">{{ trans('home.sale') }}</option>
                        </select>
                    </form>
                </div>
            </div>

            <div class="row box-products">
                <!-- Thực hiện thêm mẫu 1 sản phẩm vào -->
                <div class="col-6 col-md-4 product">
                    <div class="product__box">
                        <a href="{{ route('products.show', ['id' => 1]) }}" class="product__image">
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
        </div>

    </div>

</div>
@endsection


@section('scroll')
    @include('components.scroll')
@endsection
