<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function create(Request $request)
    {


        $order = Order::create([
            //'order_date' => $request->order_date,
            'number_phone' => $request->number_phone,
            'address' => $request->address,
        ]);

        foreach ($request->products as $product) {
            $order->products()->attach($product['id'], [
                'quantity' => $product['quantity'],
                'price' => $product['quantity'] * Product::findOrFail($product['id'])->price,
            ]);
        }

        return view('orders');    }

//    public function store(Request $request)
//    {
//        $validatedData = $request->validate([
//            'order_date' => 'required|date',
//            'number_phone' => 'required|string|max:255',
//            'address' => 'required|string|max:255',
//            'products' => 'required|array|min:1',
//            'products.*.quantity' => 'required|integer|min:1',
//            'products.*.price' => 'required|numeric|min:0.01',
//        ]);
//
//        $order = new Order();
//        $order->order_date;
//
//
//    }

    public function index(Request $request)
    {
        $orders = Order::select('number_phone', 'address');
        return view('orders', compact('orders'));




    }
}
