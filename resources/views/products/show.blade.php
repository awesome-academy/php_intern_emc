@extends('layouts.app')

@section('header')
    @include('reviews.show')
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
        <div class="card">
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-6">
                        <div class="preview-pic tab-content">
                            <div class="tab-pane active" id="pic-1"><img
                                    src="{{asset(Config::get('setting.path_image_url'))}}/{{$product->image}}"/>
                            </div>
                        </div>

                    </div>
                    <div class="details col-md-6">
                        <h3 class="product-title">{{$product->name}}</h3>
                        <div class="rating">
                            <div class="stars">
                                @for($i = 0; $i < (int)(round($averageStar)); $i++)
                                    <span class="fa fa-star checked"></span>
                                @endfor
                            </div>
                            <span class="review-no">{{$number_rate}} {{trans('admin.comments.review')}}</span>
                        </div>
                        <div class="border-top-grey my-1"></div>
                        <p class="product-description">{{$product->description}}</p>
                        <h5 class="price">Price:
                            <span>{{number_format($product->price - ($product->price / 100) * $product->discount, 0, '', ',')}} đ</span>
                            <span
                                class="discount_price">{{number_format($product->price, 0, '', ',')}} đ</span>
                        </h5>
                        <h5 class="sizes">{{trans('admin.product.amount')}}
                            <span data-toggle="tooltip" title="small">{{$product->stock_amount}}</span>
                        </h5>
                        <h5 class="colors">{{trans('admin.product.discount')}}
                            <span>{{$product->discount}}%</span></h5>
                        <div class="border-top-grey my-3"></div>
                        <button data-id="{{ $product->id }}" class="add-to-cart btn btn-default btnAddCart" type="button"><i aria-hidden="true"
                            class="fa fa-cart-plus"> {{trans('admin.product.add_cart')}}</i>
                        </button>
                        <a href="#" class="btn btn-primary btn-circle btn-lg facebook_share">
                            <div class="fb-share-button"
                                 data-href="{{url()->current()}}"
                                 data-layout="button_count">
                            </div>

                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="border-top-grey my-3"></div>
        </div>
        <div class="information">
            <h2>{{trans('admin.product.information')}}</h2>
            <div class="col-lg-12">
                <div class="border-top-grey my-3"></div>
            </div>
            <div class="content">
                <p>{{$product->information}}</p>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="border-top-grey my-3"></div>
        </div>
        <div class="review">
            <h2>Review</h2>
            <div class="col-lg-12">
                <div class="border-top-grey my-3"></div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="bg-white rounded shadow-sm p-4 mb-4 clearfix graph-star-rating">
                        <div class="graph-star-rating-body">
                            <div class="rating-list">
                                <div class="rating-list-left text-black">
                                    {{trans('admin.comments.star5')}}
                                    <span class="fa fa-star checked"></span>
                                </div>
                                <div class="rating-list-center">
                                    <div class="progress">
                                        <div class="progress-bar w-{{$percent_each_rate[5]}}" aria-valuemax="5"
                                             aria-valuemin="0"
                                             aria-valuenow="5" role="progressbar" class="progress-bar bg-warning">
                                        </div>
                                    </div>
                                </div>
                                <div class="rating-list-right text-black">{{$percent_each_rate[5]}}%</div>
                            </div>
                            <div class="rating-list">
                                <div class="rating-list-left text-black">
                                    {{trans('admin.comments.star4')}}
                                    <span class="fa fa-star checked"></span>
                                </div>
                                <div class="rating-list-center">
                                    <div class="progress">
                                        <div class="progress-bar w-{{$percent_each_rate[4]}}" aria-valuemax="5"
                                             aria-valuemin="0"
                                             aria-valuenow="5" role="progressbar" class="progress-bar bg-primary">
                                        </div>
                                    </div>
                                </div>
                                <div class="rating-list-right text-black">{{$percent_each_rate[4]}}%</div>
                            </div>
                            <div class="rating-list">
                                <div class="rating-list-left text-black">
                                    {{trans('admin.comments.star3')}}
                                    <span class="fa fa-star checked"></span>
                                </div>
                                <div class="rating-list-center">
                                    <div class="progress">
                                        <div class="progress-bar w-{{$percent_each_rate[3]}}" aria-valuemax="5"
                                             aria-valuemin="0"
                                             aria-valuenow="5" role="progressbar" class="progress-bar bg-success">
                                        </div>
                                    </div>
                                </div>
                                <div class="rating-list-right text-black">{{$percent_each_rate[3]}}%</div>
                            </div>
                            <div class="rating-list">
                                <div class="rating-list-left text-black">
                                    {{trans('admin.comments.star2')}}
                                    <span class="fa fa-star checked"></span>
                                </div>
                                <div class="rating-list-center">
                                    <div class="progress">
                                        <div class="progress-bar w-{{$percent_each_rate[2]}}" aria-valuemax="5"
                                             aria-valuemin="0" aria-valuenow="5"
                                             role="progressbar" class="progress-bar bg-danger">
                                        </div>
                                    </div>
                                </div>
                                <div class="rating-list-right text-black">{{$percent_each_rate[2]}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="bg-white rounded shadow-sm p-4 mb-4 clearfix graph-star-rating">
                        <div class="graph-star-rating-footer text-center mt-4 mb-4">
                            <div class="graph-star-rating-header">
                                <div class="stars">
                                    @for($i = 0; $i < (int)(round($averageStar)); $i++)
                                        <span class="fa fa-star checked"></span>
                                    @endfor
                                </div>
                                <p class="text-black mb-4 mt-4"> {{$averageStar}} {{trans('admin.comments.out_of')}}</p>
                            </div>
                            @guest
                            @else
                                <button type="button" class="btn btn-danger btn-sm js-btn-review">
                                    {{trans('admin.comments.rate_btn')}}
                                </button>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>

            {{--member_review--}}
            <div class="bg-white rounded shadow-sm p-4 mb-4 product-detailed-ratings-and-reviews">
                <input type="hidden" id="product_id" value="{{$product->id}}">
                <h5 class="mb-1">{{trans('admin.comments.all')}}</h5>
                <div class="all_comments" id="all_comments">
                    @include('reviews.comment')
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection

@section('scroll')
    @include('components.scroll')
@endsection
