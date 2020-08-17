@extends('layouts.app')

@section('header')
    @include('components.header')
@endsection

@section('content')
<div class="container">
    <section class="section-products">
        <h2 class="title-intro">{{ trans('home.new_book') }}</h2>

        <div class="row box-products">
            @foreach ($newProducts as $product)
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

    </section>

    <section class="section-products">
        <h2 class="title-intro">{{ trans('home.book_sale') }}</h2>

        <div class="row box-products">
            @foreach ($saleProducts as $product)
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
    </section>

    <section class="section-products">
        <h2 class="title-intro">{{ trans('home.hot_trend') }}</h2>

        <div class="row box-products">
            @foreach ($trendProducts as $product)
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
    </section>

    @if (count($viewedProducts) >= 4)
        <section class="section-products">
            <h2 class="title-intro">{{ trans('home.recently_viewed') }}</h2>

            <div class="row box-products">
                @foreach ($viewedProducts as $product)
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
        </section>
    @endif

</div>
@endsection


@section('scroll')
    @include('components.scroll')
@endsection
