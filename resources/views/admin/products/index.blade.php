@extends('admin.layout.main')

@section('content')
    @include('common.errors')
    @include('common.message')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{trans('admin.product.title')}}</h6>
        </div>

        @include('admin.products.add')
        <div class="card-body">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#add_product">
                {{trans('admin.table.product.add_title')}}
            </button>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>{{trans('admin.product.name')}}</th>
                        <th>{{trans('admin.product.description')}}</th>
                        <th>{{trans('admin.product.image')}}</th>
                        <th>{{trans('admin.product.amount')}}</th>
                        <th>{{trans('admin.product.price')}}</th>
                        <th>{{trans('admin.product.discount')}}</th>
                        <th>{{trans('admin.product.category')}}</th>
                        <th>{{trans('admin.table.product.action')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>
                                <img class="img img-thumbnail"
                                     src="{{asset(Config::get('setting.path_image_url'))}}/{{$product->image}}">
                            </td>
                            <td>{{$product->stock_amount}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->discount}}</td>
                            <td>{{$product->category->name}}</td>
                            <td>
                                <button id="item{{$product->id}}" class="btn btn-danger btn-circle remove-product"
                                        value="{{$product->id}}"><i class="fa fa-trash"></i></button>
                                <a href="{{route('products.edit',['id' => $product->id])}}"
                                   class="btn btn-success btn-circle"><i class="fa fa-edit" id="edit-product"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    {!! $products->links() !!}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
