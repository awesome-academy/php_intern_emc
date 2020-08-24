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
        @foreach ($viewedProducts as $product)
            <div class="col-6 col-md-3 product">
                <div class="product__box">
                    <a href="{{ route('products.show_detail', ['id' => $product->id]) }}" class="product__image">
                        <img class="image" src="{{ asset('image/products') }}/{{ $product->image }}" alt="">
                    </a>
                    <a href="{{ route('products.show_detail', ['id' => $product->id]) }}" class="product__content">
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

</div>
@endsection


@section('scroll')
    @include('components.scroll')
@endsection
