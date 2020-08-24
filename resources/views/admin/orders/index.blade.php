@extends('admin.layout.main')

@section('content')
    @include('common.errors')
    @include('common.message')
    @include('admin.orders.show')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{trans('admin.product.title')}}</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>{{trans('admin.order.full_name')}}</th>
                        <th>{{trans('admin.order.address')}}</th>
                        <th>{{trans('admin.order.phone_number')}}</th>
                        <th>{{trans('admin.order.total_price')}}</th>
                        <th>{{trans('admin.order.status')}}</th>
                        <th>{{trans('admin.order.action')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{($order->full_name) ? $order->full_name : $order->user->full_name}}</td>
                            <td>{{($order->address) ? $order->address : $order->user->address}}</td>
                            <td>{{($order->phone_number) ? $order->phone_number : $order->user->phone_number}}</td>
                            <td>{{$order->total_price}}</td>
                            <td><span class="badge badge-pill {{$order->status['color']}}">
                                     {{$order->status['status']}}
                                </span></td>
                            <td>
                                <button id="item{{$order->id}}" class="btn btn-danger btn-circle remove-order"
                                        value="{{$order->id}}"><i class="fa fa-trash"></i></button>
                                <a href="{{route('orders.edit',['id' => $order->id])}}"
                                   class="btn btn-success btn-circle"><i class="fa fa-edit" id="edit-product"></i></a>
                                <button id="item{{$order->id}}" class="btn btn-primary btn-circle view-order"
                                        value="{{$order->id}}"><i class="fa fa-eye"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
