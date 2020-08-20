@extends('admin.layout.main')

@section('content')
    @include('common.errors')
    @include('common.message')
    @include('admin.orders.show')
    @include('admin.categories.add')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{trans('admin.category.title')}}</h6>
        </div>

        <div class="card-body">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#add_category">
                {{trans('admin.table.category.add_title')}}
            </button>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>{{trans('admin.category.name')}}</th>
                        <th>{{trans('admin.category.parent')}}</th>
                        <th>{{trans('admin.category.action')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->parrent ? $category->parrent->name : ''  }}</td>
                                <td>
                                    <button id="item{{ $category->id }}" class="btn btn-danger btn-circle remove-category"
                                            value="{{ $category->id }}"><i class="fa fa-trash"></i></button>
                                    <a href="{{route('categories.edit',['id' => $category->id])}}"
                                        class="btn btn-success btn-circle"><i class="fa fa-edit" id="edit-product"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
