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
            <div class="cart-button mt-3 px-2 d-flex justify-content-between align-items-center">
                <button class="btn btn-primary text-uppercase"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                <div class="add"><span class="product_fav"><i class="fa fa-heart-o"></i></span>
                    <span
                        class="product_fav"><i class="fa fa-opencart"></i></span></div>
            </div>
        </div>
    </div>
@endforeach
<div class="container">
    <div class="row">
        {{ $products->render() }}
    </div>
</div>

