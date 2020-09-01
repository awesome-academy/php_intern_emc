@component('mail::message')
# {{trans('home.mail.content_mail_order')}} {{$total_order}}

@component('mail::button', ['url' => route('orders.index')])
{{trans('home.mail.see_more')}}
@endcomponent

Thanks,<br>
@endcomponent
