@foreach ($productsOrder as $product)
    <tr>
        <td>
            <img src="{{asset('image/products')}}/{{ $product->image }}" alt="" class="image_order">
        </td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->pivot->quantity }}</td>
        <td>{{ number_format($product->pivot->quantity * $product->pivot->price) }} đ</td>
    </tr>
@endforeach
