@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ trans('auth.verify_email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ trans('auth.been_sent') }}
                        </div>
                    @endif

                    {{ trans('auth.check_link_email') }}
                    {{ trans('auth.not_receive') }}, 
                    <a href="{{ route('verification.resend') }}">
                        {{ trans('auth.click_another') }}
                    </a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
