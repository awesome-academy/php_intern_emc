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
                @foreach ($categories as $category)
                    <div class="side-bar__box">
                        <div class="side-bar__item">
                            <a href="">{{ $category->name }}</a>
                            @if (count($category->children))
                                <i class="fas fa-chevron-right"></i>
                            @endif
                        </div>
                        @if (count($category->children))
                            <div class="side-bar__item-sub">
                                @foreach ($category->children as $childCategory)
                                    <a href="" class="item-sub">{{ $childCategory->name }}</a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        <div class="col-12 col-md-9">
            <div class="products-filter">
                <div class="sort-by">
                    <form action="{{ url('products') }}" method="GET" id="formSortProducts">
                        <label for="">{{ trans('home.order_by') }}</label>
                        <select name="order-by" class="sort-by__select" id="sortProducts">
                            <option value=""></option>
                            <option value="a-z">{{ trans('home.alphabet_a_z') }}</option>
                            <option value="z-a">{{ trans('home.alphabet_z_a') }}</option>
                            <option value="price_low_hight">{{ trans('home.price_low_hight') }}</option>
                            <option value="price_hight_low">{{ trans('home.price_hight_low') }}</option>
                            <option value="date_new_old">{{ trans('home.date_new_old') }}</option>
                            <option value="date_old_new">{{ trans('home.date_old_new') }}</option>
                            <option value="sale">{{ trans('home.sale') }}</option>
                        </select>
                    </form>
                </div>
            </div>

            <div class="row box-products">
                @foreach ($products as $product)
                    <div class="col-6 col-md-3 product">
                        <div class="product__box">
                            <a href="{{ route('products.show', ['id' => $product->id]) }}" class="product__image">
                                <img class="image" src="{{ asset('image/products') }}/{{ $product->image }}" alt="">
                            </a>
                            <a href="{{ route('products.show', ['id' => $product->id]) }}" class="product__content">
                                <p class="product__name" title="{{ $product->name }}">
                                    {{ $product->name }}
                                </p>
                                <div class="product__price">
                                    @if ($product->discount)
                                        <div class="discount-price">
                                            <span class="final-price">
                                                {{ number_format(price_discount($product->price, $product->discount)) }} đ
                                            </span>
                                            <span class="discount-percent">-{{ $product->discount }}%</span>
                                            <p class="old-price">{{ number_format($product->price) }} đ</p>
                                        </div>
                                    @else
                                        <span class="final-price">{{ number_format($product->price) }} đ</span>
                                    @endif
                                </div>
                            </a>
                            <i data-id="{{ $product->id }}" class="fas fa-shopping-cart btnAddCart" 
                                title="{{ trans('home.add_to_cart') }}"></i>
                        </div>
                    </div>
                @endforeach
                
            </div>

            {{ $products->appends(request()->query())->links() }}

        </div>

    </div>

</div>
@endsection


@section('scroll')
    @include('components.scroll')
@endsection
