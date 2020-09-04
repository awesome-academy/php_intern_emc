@foreach($products as $product)
    <div class="col-6 col-md-4">
        <div class="product py-4">
            @if ($product->discount > 0)
                <span class="off bg-success">- {{$product->discount}}% {{ trans('home.OFF') }}</span>
            @endif
            <a href="./products/{{$product->id}}">
                <div class="text-center"><img
                        src="{{asset(Config::get('setting.path_image_url'))}}/{{$product->image}}"
                        width="200"></div>
            </a>
            <div class="about text-center">
                <h5 class="product__name">{{$product->name}}</h5>
                @if ($product->discount > 0)
                    <span class="old-price">{{number_format($product->price, 0, '', ',')}} đ</span>
                    <span>
                        {{number_format(price_discount($product->price, $product->discount), 0, '', ',')}} đ
                    </span>
                @else
                    <span>{{number_format($product->price, 0, '', ',')}} đ</span>
                @endif
            </div>
            <div class="mt-3 d-flex justify-content-end">
                <button data-id="{{ $product->id }}" class="btn btn-primary text-uppercase fillterBtnAddCart">
                    <i class="fa fa-shopping-cart"> {{ trans('home.order') }}</i>
                </button>
            </div>
        </div>
    </div>
@endforeach
<div class="container">
    {{ $products->render() }}
</div>
