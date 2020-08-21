@extends('admin.layout.main')

@section('content')
    @include('common.errors')
    @include('common.message')
    <div class="modal-body" id="attachment-body-content">
        <form id="edit-form" class="form-horizontal" method="POST"
            action="{{route('users.update', ['id' => $user->id])}}">
            @method('PUT')
            @csrf
            <div class="card text-white bg-gradient-info mb-0">
                <div class="card-header bg-gradient-info">
                    <h2 class="m-0">{{trans('admin.table.user.edit_title')}}</h2>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="col-form-label" for="fullname">{{trans('admin.user.full_name')}}</label>
                        <input type="text" name="full_name" class="form-control @error('full_name') is-invalid @enderror" 
                            id="fullname" value="{{ $user->full_name }}" required>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="email">{{trans('admin.user.email')}}</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                            id="email" value="{{ $user->email }}" required>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="birthday">{{trans('admin.user.birthday')}}</label>
                        <input type="date" name="birthday" class="form-control @error('birthday') is-invalid @enderror" id="birthday"
                            value="{{ $user->birthday }}">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="address">{{trans('admin.user.address')}}</label>
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" 
                            value="{{ $user->address }}">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="phone_number">{{trans('admin.user.phone_number')}}</label>
                        <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" 
                            id="phone_number" value="{{ $user->phone_number }}">
                    </div>

                    <div class="form-group">
                        <label for="gender" class="col-form-label">{{ trans('admin.user.gender') }}</label>

                        <div class="">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="1" 
                                    {{ $user->gender == config('enums.gender.male') ? 'checked' : '' }}>
                                <label class="form-check-label" for="male">
                                    {{ trans('admin.user.male') }}
                                </label>
                                </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="0" 
                                    {{ $user->gender == config('enums.gender.female') ? 'checked' : '' }}>
                                <label class="form-check-label" for="female">
                                    {{ trans('admin.user.female') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <input class="btn btn-success" type="submit">
                </div>
            </div>
        </form>
    </div>
@endsection
