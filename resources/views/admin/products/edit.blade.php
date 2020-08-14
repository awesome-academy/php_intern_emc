@extends('admin.layout.main')

@section('content')
    @include('common.errors')
    @include('common.message')
    <div class="modal-body" id="attachment-body-content">
        <form id="edit-form" class="form-horizontal" method="POST"
              action={{route('products.update', ['id' => $product->id])}} enctype="multipart/form-data">
            @method('PUT')
            {{csrf_field()}}
            <div class="card text-white bg-gradient-info mb-0">
                <div class="card-header bg-gradient-info">
                    <h2 class="m-0">{{trans('admin.table.product.edit_title')}}</h2>
                </div>
                <div class="card-body">
                    <!-- name -->
                    <div class="form-group">
                        <label class="col-form-label"
                               for="modal-input-name">{{trans('admin.product.name')}}</label>
                        <input type="text" name="name" value="{{$product->name}}" class="form-control" id="name"
                               required autofocus>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label"
                               for="modal-input-name">{{trans('admin.product.description')}}</label>
                        <input type="text" name="description" value="{{$product->description}}" class="form-control"
                               id="description  "
                               required autofocus>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label"
                               for="modal-input-name">{{trans('admin.product.information')}}</label>
                        <input type="text" name="information" value="{{$product->information}}" class="form-control"
                               id="information"
                               required autofocus>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label"
                               for="modal-input-name">{{trans('admin.product.amount')}}</label>
                        <input type="text" name="stock_amount" value="{{$product->stock_amount}}" class="form-control"
                               id="stock_amount"
                               required autofocus>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label"
                               for="modal-input-name">{{trans('admin.product.price')}}</label>
                        <input type="text" name="price" value="{{$product->price}}" class="form-control" id="price"
                               required autofocus>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label"
                               for="modal-input-name">{{trans('admin.product.discount')}}</label>
                        <input type="text" name="discount" value="{{$product->discount}}" class="form-control"
                               id="discount"
                               required autofocus>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label"
                               for="modal-input-name">{{trans('admin.product.category')}}</label>
                        <select class="form-control" name="category_id">
                            @foreach($categories as $category)
                                <option
                                    value="{{$category->id}}" {{($category->id == $product->category_id) ? 'selected' : ''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label"
                               for="modal-input-name">{{trans('admin.product.image')}}</label>
                        <input type="file" name="image" value="" class="form-control" id="image"
                               autofocus>
                    </div>
                    <input class="btn btn-success" type="submit">
                </div>
            </div>
        </form>
    </div>
@endsection
