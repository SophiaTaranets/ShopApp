@php
    $shopping_cart = \App\Models\ShoppingCart::find(1); // Replace 1 with the appropriate ID
@endphp

    <!DOCTYPE html>
<html>
<head>
    <title>Products List</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<h1>Products List</h1>
<table>
    <thead>
    <tr>
        <th>Title</th>
        <th>Price</th>
        <th>Description</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($products as $product)
        <tr>
            <td>{{ $product->title }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->description }}</td>

            <td>
                <form method="POST" action="{{ route('shopping_cart.create', $shopping_cart->id) }}">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="number" name="amount" value="1" min="1">
                    <button type="submit">Add to cart</button>
                </form>
            </td>



        </tr>
    @endforeach
    </tbody>
</table>
<a href="{{ route('shopping_cart.index') }}">View shopping cart</a>

</body>
</html>
