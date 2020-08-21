<!-- Attachment Modal -->
<div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="add-modal-label"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-modal-label"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" id="attachment-body-content">
                <form id="edit-form" class="form-horizontal" method="POST" action="{{route('users.store')}}">
                    {{csrf_field()}}
                    <div class="card text-white bg-gradient-info mb-0">
                        <div class="card-header bg-gradient-info">
                            <h2 class="m-0">{{trans('admin.table.user.add_title')}}</h2>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="col-form-label" for="username">{{trans('admin.user.user_name')}}</label>
                                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" 
                                    id="username" required autofocus>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label" for="fullname">{{trans('admin.user.full_name')}}</label>
                                <input type="text" name="full_name" class="form-control @error('full_name') is-invalid @enderror" 
                                    id="fullname" required>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label" for="email">{{trans('admin.user.email')}}</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                                    id="email" required>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label" for="birthday">{{trans('admin.user.birthday')}}</label>
                                <input type="date" name="birthday" class="form-control @error('birthday') is-invalid @enderror" id="birthday" >
                            </div>

                            <div class="form-group">
                                <label class="col-form-label" for="address">{{trans('admin.user.address')}}</label>
                                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" >
                            </div>

                            <div class="form-group">
                                <label class="col-form-label" for="phone_number">{{trans('admin.user.phone_number')}}</label>
                                <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" 
                                    id="phone_number" required>
                            </div>

                            <div class="form-group">
                                <label for="gender" class="col-form-label">{{ trans('admin.user.gender') }}</label>

                                <div class="">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="male" value="1" checked>
                                        <label class="form-check-label" for="male">
                                            {{ trans('admin.user.male') }}
                                        </label>
                                        </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="female" value="0">
                                        <label class="form-check-label" for="female">
                                            {{ trans('admin.user.female') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-form-label">{{ trans('auth.pass') }}</label>

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                    name="password" required autocomplete="new-password">
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-form-label">
                                    {{ trans('admin.user.confirm_pass') }}
                                </label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" 
                                    required autocomplete="new-password">
                            </div>
                            
                            <input class="btn btn-success" type="submit">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{trans('admin.product.btn_close')}}</button>
            </div>
        </div>
    </div>
</div>
<!-- /Attachment Modal -->
