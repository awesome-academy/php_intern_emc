@extends('admin.layout.main')

@section('content')
    @include('common.errors')
    @include('common.message')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{trans('admin.user.title_order')}}</h6>
        </div>

        @include('admin.users.modelDetail')
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>{{ trans('admin.user.order_no') }}</th>
                            <th>{{ trans('admin.user.order_date') }}</th>
                            <th>{{ trans('admin.user.total') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ number_format($order->total_price) }} đ</td>
                                <td>
                                    <a href="" data-id="{{ $order->id }}" class="detail_order" data-toggle="modal" data-target="#viewDetail">
                                        {{ trans('admin.user.view_detail') }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
