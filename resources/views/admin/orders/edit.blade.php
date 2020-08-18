@extends('admin.layout.main')

@section('content')
    @include('common.errors')
    @include('common.message')
    <div class="modal-body" id="attachment-body-content">
        <form id="edit-form" class="form-horizontal" method="POST"
              action={{route('orders.update', ['id' => $order->id])}} enctype="multipart/form-data">
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
                               for="modal-input-name">{{trans('admin.product.total')}}</label>
                        <input type="text" name="total_price" value="{{$order->total_price}}" class="form-control"
                               id="total_price"
                               required autofocus>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label"
                               for="modal-input-name">{{trans('admin.product.status')}}</label>
                        <select class="form-control" name="status">
                            @foreach(trans('admin.enum.request_status') as $key => $value)
                                <option
                                    value="{{$key}}" {{($order->status['value'] == $key) ? 'selected' : ''}}>{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                    <input class="btn btn-success" type="submit">
                </div>
            </div>
        </form>
    </div>
@endsection
