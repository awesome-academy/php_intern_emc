@extends('admin.layout.main')

@section('content')
    @include('common.errors')
    @include('common.message')
    <div class="modal-body" id="attachment-body-content">
        <form id="edit-form" class="form-horizontal" method="POST" 
            action="{{route('categories.update', ['id' => $category->id])}}" >
            @method('PUT')
            @csrf
            <div class="card text-white bg-gradient-info mb-0">
                <div class="card-header bg-gradient-info">
                    <h2 class="m-0">{{trans('admin.category.edit_title')}}</h2>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="col-form-label"
                                for="modal-input-name">{{trans('admin.category.name')}}</label>
                        <input type="text" value="{{ $category->name }}" name="name" class="form-control" id="name"
                            autofocus>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label"
                                for="modal-input-name">{{trans('admin.category.category_parent')}}</label>
                        <select class="form-control" name="parent_id">
                            <option></option>
                            @foreach($categories as $item)
                                @if ($item->id == $category->parent_id)
                                    <option selected value="{{$item->id}}">{{$item->name}}</option>
                                @else 
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    
                    <input class="btn btn-success" type="submit">
                </div>
            </div>
        </form>
    </div>
@endsection
