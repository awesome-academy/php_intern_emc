@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="cart order">
            <div class="cart__box order__box">
                <div class="cart__item order-1 order-md-0">
                    <div class="mt-4 mt-md-0">
                        <h2 class="cart__title">{{ trans('home.bill_info') }}</h2>
                    </div>

                    @include('common.cartMessage')

                    <div class="order__info">
                        <div class="text-right mb-1">
                            <span>{{ trans('home.already_account') }}</span>
                            <a href="{{ route('login') }}">{{ trans('auth.login') }}</a>
                        </div>

                        <form method="POST" action="{{ route('order.guestOrder') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="full_name" class="col-12 col-form-label">{{ trans('auth.full_name') }}</label>

                                <div class="col-12">
                                    <input id="full_name" type="text" class="w-100 form-control @error('full_name') is-invalid @enderror" 
                                        name="full_name" value="{{ old('full_name') }}">

                                    @error('full_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-12 col-form-label">{{ trans('auth.email_address') }}</label>

                                <div class="col-12">
                                    <input id="email" type="email" class="w-100 form-control @error('email') is-invalid @enderror" 
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-12 col-form-label">{{ trans('auth.address') }}</label>

                                <div class="col-12">
                                    <input id="address" type="text" class="w-100 form-control @error('address') is-invalid @enderror" 
                                        name="address" value="{{ old('address') }}" required>

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone_number" class="col-12 col-form-label">{{ trans('auth.phone') }}</label>

                                <div class="col-12">
                                    <input id="phone_number" type="tell" class="w-100 form-control @error('phone_number') is-invalid @enderror" 
                                        name="phone_number" value="{{ old('phone_number') }}" pattern="[0-9]{10,11}">

                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-12">
                                    <button type="submit" class="btn__buy btn__buy-margin">
                                        {{ trans('home.payment') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                </div>  

                <div class="cart__checkout order-0 order-md-1">
                    <div class="card cart-summary">
                        <div class="cart-detailed-totals">

                            <div class="card-block">
                                @foreach($sessionCart as $key => $cart)
                                    <div class="cart__product">
                                        <div class="cart__product-img">
                                            <img class="image" src="{{ asset('image/products') }}/{{ $cart['image'] }}" alt="">
                                        </div>
                                        <div class="cart__product-name">
                                            <a href="" class="name_product">{{$cart['name']}}</a>
                                            <input type="number" min="1" class="input_quantity" name="{{ $key }}" value={{ $cart['quantity'] }}> 
                                        </div>
                                        <div class="cart__product-icon">
                
                                            <p class="total-price">{{number_format($cart['price'] * $cart['quantity'])}} đ</p>
                                            <a data-id="{{ $key }}" href="" class="cart__delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach

                                @if(count($sessionCart) == 0)
                                    <p class="alert_nothing">{{ trans('home.empty_cart') }}</p>
                                @endif
                            </div>

                            <hr class="separator">

                            <div class="card-block">
                                <div class="cart-summary-line" id="cart-subtotal-products">
                                    <span class="label js-subtotal">
                                        {{ trans('home.subtotal') }}
                                    </span>
                                    <span class="value total_cart">{{ number_format(total_cart()) }} đ</span>
                                </div>
                                <div class="cart-summary-line" id="cart-subtotal-shipping">
                                    <span class="label">
                                        {{ trans('home.ship_amount') }}
                                    </span>
                                    <span class="value">{{ trans('home.free') }}</span>
                                </div>
                            </div>
                            
                            <hr class="separator">

                            <div class="card-block">
                                <div class="cart-summary-line cart-total">
                                    <span class="label">{{ trans('home.total_money') }}</span>
                                    <span class="value total_cart">{{ number_format(total_cart()) }} đ</span>
                                </div>
                            </div>
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
