@component('mail::message')

# {{ trans('home.mail.title_mail_report_daily') }}

## {{ trans('home.mail.total_order_report') }} {{ $quantity }}

@component('mail::button', ['url' => url('/')])
    {{ trans('home.mail.continue_manage') }}
@endcomponent

@endcomponent
