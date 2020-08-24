@foreach($products as $product)
    <div class="col-md-4">
        <div class="product py-4"><span class="off bg-success">-{{$product->discount}}% OFF</span>
            <a href="./products/{{$product->id}}">
                <div class="text-center"><img
                        src="{{asset(Config::get('setting.path_image_url'))}}/{{$product->image}}"
                        width="200"></div>
            </a>
            <div class="about text-center">
                <h5>{{$product->name}}</h5>
                <span>{{number_format($product->price, 0, '', ',')}} đ</span>
            </div>
            <div class="mt-4 px-4 d-flex ">
                <button data-id="{{ $product->id }}" class="btn btn-primary text-uppercase btnAddCart"><i class="fa fa-shopping-cart"> Order </i></button>
            </div>
        </div>
    </div>
@endforeach
<div class="container">
    <div class="row">
        {{ $products->render() }}
    </div>
</div>
