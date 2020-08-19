@extends('admin.layout.main')

@section('content')
    @include('common.errors')
    @include('common.message')
    @include('admin.requests.add')
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
                        <th>{{trans('admin.product_request.username')}}</th>
                        <th>{{trans('admin.product_request.product')}}</th>
                        <th>{{trans('admin.product_request.description')}}</th>
                        <th>{{trans('admin.product_request.image')}}</th>
                        <th>{{trans('admin.product_request.status')}}</th>
                        <th>{{trans('admin.product_request.action')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($requestProducts as $productRequest)
                        <tr>
                            <td>{{$productRequest->user->full_name}}</td>
                            <td>{{$productRequest->product_name}}</td>
                            <td>{{$productRequest->description}}</td>
                            <td>
                                <img class="img img-thumbnail"
                                     src="{{asset(Config::get('setting.path_image_url'))}}/{{$productRequest->image}}">
                            </td>
                            <td><span class="badge badge-pill {{$productRequest->status['color']}}">
                                     {{$productRequest->status['status']}}
                                </span></td>
                            <td>
                                <button id="item{{$productRequest->id}}"
                                        class="btn btn-danger btn-circle remove-request"
                                        value="{{$productRequest->id}}"><i class="fa fa-trash"></i></button>

                                <div class="dropdown arrow mb-4">
                                    <button class="btn btn-success btn-circle dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <button value="{{$productRequest->id}}" class="dropdown-item success_btn" >{{trans('admin.status_request.pending')}}</button>
                                        <button value="{{$productRequest->id}}" class="dropdown-item pending_btn" >{{trans('admin.status_request.Success')}}</button>
                                        <button value="{{$productRequest->id}}" class="dropdown-item cancel_btn"  >{{trans('admin.status_request.Cancel')}}</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
