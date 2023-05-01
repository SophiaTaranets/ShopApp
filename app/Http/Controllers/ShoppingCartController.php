<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShoppingCart;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;


class ShoppingCartController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'amount' => 'required|integer|min:1'
        ]);

        $product = Product::find($request->product_id);

        if (!$product) {
            abort(404);
        }

        $shoppingCart = ShoppingCart::create([
            'product_id' => $product->id,
            'amount' => $request->amount
        ]);

        return response()->json(['message' => 'ShoppingCart created successfully', 'data' => $shoppingCart]);
    }


    public function index()
    {
        $shoppingCarts = ShoppingCart::all();

        //return response()->json(['data' => $shoppingCarts]);
        return view('shopping_cart', compact('shoppingCarts'));
    }

    public function update(Request $request, $id)
    {
        $shoppingCart = ShoppingCart::find($id);

        if (!$shoppingCart) {
            return response()->json(['message' => 'ShoppingCart not found'], 404);
        }

        $request->validate([
            'product_id' => 'required|integer',
            'amount' => 'required|integer|min:1'
        ]);

        $shoppingCart->product_id = $request->product_id;
        $shoppingCart->amount = $request->amount;

        $shoppingCart->save();

        return response()->json(['message' => 'ShoppingCart updated successfully', 'data' => $shoppingCart]);
    }

    public function delete($id)
    {
        $shoppingCart = ShoppingCart::find($id);

        if (!$shoppingCart) {
            return response()->json(['message' => 'ShoppingCart not found'], 404);
        }

        $shoppingCart->delete();

        return response()->json(['message' => 'ShoppingCart deleted successfully']);
    }


}

