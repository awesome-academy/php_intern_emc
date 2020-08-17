@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row pt-3 account">
            <div class="col-12 col-md-3">
                <div class="account-info">
                    <img src="https://salt.tikicdn.com/desktop/img/avatar.png" alt="" class="account-info__img">
                    <div class="account-info__box">
                        <span>Accout of</span>
                        <h3 class="account-info__name">{{ $user->full_name }}</h3>
                    </div>
                </div>

                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" data-toggle="pill" href="#info-account" role="tab" 
                        aria-selected="true">{{ trans('home.info_account') }}</a>
                    <a class="nav-link" data-toggle="pill" href="#change_pass" role="tab" 
                        aria-selected="false">{{ trans('home.change_pass') }}</a>
                    <a class="nav-link" data-toggle="pill" href="#history_order" role="tab" 
                        aria-selected="false">{{ trans('home.history_order') }}</a>
                </div>
            </div>

            <div class="col-12 col-md-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="info-account" role="tabpanel">
                        <h3>{{ trans('home.info_account') }}</h3>

                        <div class="account__box">
                            @if(session('updateInfoSuccess'))
                                <div class="alert alert-success">
                                    {{ session('updateInfoSuccess') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('account.update', ['id' => $user->id]) }}">
                                @method('PUT')
                                @csrf

                                <div class="form-group row">
                                    <label for="full_name" class="col-md-2 col-form-label text-md-left">
                                        {{ trans('auth.full_name') }}
                                    </label>

                                    <div class="col-md-7">
                                        <input id="full_name" type="text" class="form-control @error('full_name') is-invalid 
                                            @enderror" name="full_name" value="{{ $user->full_name }}">

                                        @error('full_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-2 col-form-label text-md-left">
                                        {{ trans('auth.email_address') }}
                                    </label>

                                    <div class="col-md-7">
                                        <input id="email" type="email" class="form-control" 
                                            name="email" value="{{ $user->email }}" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="birthday" class="col-md-2 col-form-label text-md-left">{{ trans('auth.birthday') }}</label>

                                    <div class="col-md-7">
                                        <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" 
                                            name="birthday" value="{{ $user->birthday }}" >

                                        @error('birthday')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="address" class="col-md-2 col-form-label text-md-left">{{ trans('auth.address') }}</label>

                                    <div class="col-md-7">
                                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" 
                                            name="address" value="{{ $user->address }}" required autocomplete="address">

                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="gender" class="col-md-2 col-form-label text-md-left">{{ trans('auth.gender') }}</label>

                                    <div class="col-md-7">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="male" value="1"
                                                {{ $user->gender == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="male">
                                                {{ trans('auth.male') }}
                                            </label>
                                            </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="female" value="0"
                                                {{ $user->gender == 0 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="female">
                                                {{ trans('auth.female') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone_number" class="col-md-2 col-form-label text-md-left">{{ trans('auth.phone') }}</label>

                                    <div class="col-md-7">
                                        <input id="phone_number" type="tell" class="form-control @error('phone_number') is-invalid @enderror" 
                                            name="phone_number" value="{{ $user->phone_number }}" pattern="[0-9]{10,11}">

                                        @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

    

                                <div class="form-group row mb-0">
                                    <div class="col-md-7 offset-md-2">
                                        <button type="submit" class="btn btn-dark">
                                            {{ trans('home.update') }}
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                    <div class="tab-pane fade" id="change_pass" role="tabpanel">
                        <h3>{{ trans('home.change_pass') }}</h3>

                        <div class="account__box">
                            @if(session('updatePasswordSuccess'))
                                <div class="alert alert-success">
                                    {{ session('updatePasswordSuccess') }}
                                </div>
                            @endif

                            @if(session('updatePasswordError'))
                                <div class="alert alert-danger">
                                    {{ session('updatePasswordError') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('account.updatePass') }}">
                                @method('PUT')
                                @csrf

                                <div class="form-group row">
                                    <label for="old_pass" class="col-md-3 col-md-25 col-form-label text-md-left">{{ trans('home.old_pass') }}</label>

                                    <div class="col-md-7">
                                        <input id="old_pass" type="password" class="form-control @error('old_pass') is-invalid @enderror" 
                                            name="old_pass">

                                        @error('old_pass')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-3 col-md-25 col-form-label text-md-left">{{ trans('home.new_pass') }}</label>

                                    <div class="col-md-7">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                            name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-3 col-md-25 col-form-label text-md-left">
                                        {{ trans('auth.confirm_pass') }}
                                    </label>

                                    <div class="col-md-7">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" 
                                            required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-7 offset-md-25">
                                        <button type="submit" class="btn btn-dark">
                                            {{ trans('home.update') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="history_order" role="tabpanel">
                        <h3>{{ trans('home.history_order') }}</h3>

                        <div class="account__box">
                            <table class="table history-order">
                                <thead>
                                    <tr>
                                        <th>{{ trans('home.order_no') }}</th>
                                        <th>{{ trans('home.order_date') }}</th>
                                        <th>{{ trans('home.quantity') }}</th>
                                        <th>{{ trans('home.total') }}</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <td>120</td>
                                        <td>2020-08-13</td>
                                        <td>3</td>
                                        <td>200 $</td>
                                        <td>
                                            <a href="" data-toggle="modal" data-target="#viewDetail">{{ trans('home.view_detail') }}</a>
                                        </td>
                                    </tr>
                                </thead>
                            </table>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="viewDetail" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{ trans('home.view_detail') }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table history-order">
                                        <thead>
                                            <tr>
                                                <th>{{ trans('home.img') }}</th>
                                                <th>{{ trans('home.name_product') }}</th>
                                                <th>{{ trans('home.quantity') }}</th>
                                                <th>{{ trans('home.total') }}</th>
                                            </tr>
                                        </thead>
                                        <thead>
                                            <tr>
                                                <td>
                                                    <img src="https://salt.tikicdn.com/cache/280x280/ts/product/eb/62/6b/0e56b45bddc01b57277484865818ab9b.jpg" alt="" 
                                                        class="image_order">
                                                </td>
                                                <td>Dac nhan tam</td>
                                                <td>3</td>
                                                <td>200 $</td>
                                            </tr>
                                        </thead>
                                    </table>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{ trans('home.close') }}</button>
                                </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>    
                
            </div>
        </div>
    </div>

@endsection


@section('scroll')
    @include('components.scroll')
@endsection
