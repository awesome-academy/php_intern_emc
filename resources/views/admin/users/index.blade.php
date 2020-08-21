@extends('admin.layout.main')

@section('content')
    @include('common.errors')
    @include('common.message')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{trans('admin.user.title')}}</h6>
        </div>

        @include('admin.users.add')
        <div class="card-body">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#add_user">
                {{trans('admin.table.user.add_title')}}
            </button>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>{{trans('admin.user.name')}}</th>
                            <th>{{trans('admin.user.email')}}</th>
                            <th>{{trans('admin.user.address')}}</th>
                            <th>{{trans('admin.user.phone_number')}}</th>
                            <th>{{trans('admin.user.birthday')}}</th>
                            <th>{{trans('admin.table.product.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->full_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->address }}</td>
                                <td>{{ $user->phone_number }}</td>
                                <td>{{ $user->birthday }}</td>
                                <td>
                                    <button id="item{{$user->id}}" class="btn btn-danger btn-circle remove-user"
                                            value="{{$user->id}}"><i class="fa fa-trash"></i></button>
                                    <a href="{{route('users.edit',['id' => $user->id])}}"
                                        class="btn btn-success btn-circle"><i class="fa fa-edit" id="edit-user"></i></a>
                                    <a href="{{route('users.order',['id' => $user->id])}}"
                                        class="btn btn-success btn-circle"><i class="fa fa-history"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
