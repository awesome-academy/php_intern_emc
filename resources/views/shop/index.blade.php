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
    @include('common.message')
    @include('common.errors')
    @include('products.add_request')
    <div class="container-fluid mt-5 mb-5 shop">
        <div class="row g-2">
            <div class="col-md-3">
                @guest
                @else
                    <ul class="list-group mt-4">
                        <button type="button" class="btn btn-success js-btn-customer-request">{{trans('admin.product.requests')}}</button>
                    </ul>
                @endguest
                <ul class="list-group mt-4">
                    <li class="list-group-item active">{{trans('admin.filter.search')}}</li>
                    <div class="input-group">
                        <input type="search" id="search_txt" class="form-control" placeholder="Search">
                    </div>
                </ul>

                <div class="category_filter">
                    <ul class="list-group mt-4">
                        <li class="list-group-item active">{{trans('admin.filter.category_title')}}</li>
                        @foreach($categories as $category)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input value="{{$category->id}}" type="radio" class="form-check-input"
                                               name="category_radio">{{$category->name}}
                                    </label>
                                </div>
                                <span class="badge badge-primary badge-pill">{{$category->products->count()}}</span>
                            </li>
                        @endforeach

                    </ul>
                </div>
                <ul class="list-group mt-4">
                    <li class="list-group-item active">{{trans('admin.filter.price_title')}}</li>

                    @foreach(config('setting.filter') as $key => $value)
                        <li class="list-group-item">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" value="{{$key}}" class="form-check-input"
                                           name="price_filter"> {{$value}}
                                </label>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-md-9 mt-4">
                <select id="filter_discount">
                    <option value="">{{trans('admin.filter.all')}}</option>
                    @foreach(config('setting.discount_filter') as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select>
                <select id="sort_price">
                    <option value="desc">{{trans('admin.filter.increase_price')}}</option>
                    <option value="asc">{{trans('admin.filter.decrease_price')}}</option>
                </select>
                <div class="row g-2 mt-2 product_show" id="product_show">
                    @include('shop.product')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scroll')
    @include('components.scroll')
@endsection
