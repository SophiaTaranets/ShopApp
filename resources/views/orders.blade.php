@extends('layouts.app')

@section('content')
    <h1>Create Order</h1>

    <form action="{{ route('orders.create') }}" method="post">
        @csrf

        <div>
            <label for="order_date">Order Date:</label>
            <input type="date" name="order_date" id="order_date">
        </div>

        <div>
            <label for="number_phone">Phone Number:</label>
            <input type="text" name="number_phone" id="number_phone">
        </div>

        <div>
            <label for="address">Address:</label>
            <input type="text" name="address" id="address">
        </div>

        <div>
            <h2>Products:</h2>

            <table>
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>
                            <input type="number" name="products[{{ $product->id }}][quantity]" value="1" min="1">
                            <input type="hidden" name="products[{{ $product->id }}][price]" value="{{ $product->price }}">
                        </td>
                        <td>{{ $product->price }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <button type="submit">Create Order</button>
    </form>
@endsection
