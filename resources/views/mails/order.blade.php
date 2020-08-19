@component('mail::message')

# {{ trans('home.mail.title_mail') }}

@component('mail::table')
    <table>
        <thead>
            <tr>
                <th>{{ trans('home.name_product') }}</th>
                <th>{{ trans('home.quantity') }}</th>
                <th>{{ trans('home.price') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($content['products'] as $product)
                <tr>
                    <td>{{ $product['name'] }}</td>
                    <td>{{ $product['quantity'] }}</td>
                    <td>{{ number_format($product['price']) }} đ</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endcomponent

## {{ trans('home.mail.total_order') }} {{ number_format($content['total']) }} đ

@component('mail::button', ['url' => url('/')])
    {{ trans('home.continue_buy') }}
@endcomponent

@endcomponent
