@component('mail::message')

# {{trans('home.mail.shipped_title')}}

{{trans('home.mail.shipped')}}

## {{ trans('home.mail.total_order') }} {{ number_format($order->total_price) }} đ

## {{ trans('home.mail.address') }} {{ $user->address }}

## {{ trans('home.mail.phone_number') }} {{ $user->phone_number }}

@component('mail::button', ['url' => route('home')])
        {{ trans('home.continue_buy') }}
@endcomponent

Thanks,<br>
From Admin EbookShop !
@endcomponent
