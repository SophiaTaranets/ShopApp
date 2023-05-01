<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
</head>
<body>
<h1>Shopping Cart</h1>
<table>
    <thead>
    <tr>
        <th>Title</th>
        <th>Price</th>
        <th>Quantity</th>
    </tr>
    </thead>
    <tbody>

    @php
        $totalPrice = 0;
    @endphp

    @foreach ($shoppingCarts as $shoppingCart)
        <tr>
            <td>
                @if ($shoppingCart->product)
                    {{--                    $table->foreign('product_id')->references('id')->on('products');--}}
                    {{ $shoppingCart->product->title }}
                @endif
            </td>
            <td>
                @if ($shoppingCart->product)
                    {{ $shoppingCart->product->price }}
                @endif
            </td>
            <td>{{ $shoppingCart->amount }}</td>
            <td>
                <form method="POST" action="{{ route('shopping_cart.delete', $shoppingCart->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Remove from cart</button>
                </form>
            </td>
        </tr>

        @php
            if ($shoppingCart->product) {
                $totalPrice += $shoppingCart->amount * $shoppingCart->product->price;
            }
        @endphp
    @endforeach
    </tbody>
</table>

<p>Total price: {{ $totalPrice }}</p>

<form method="POST" action="{{ route('orders') }}">
    @csrf
    <button type="submit">Create order</button>
</form>

</body>
</html>
