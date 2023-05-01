<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function store()
    {
        $products = Product::select('title', 'price', 'description')->get();
//        return response()->json($products);

        return view('products', ['products' => $products]);
    }

    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        return response()->json(["token" => csrf_token(),"data" => $product]);
    }

    public function create(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);

        $product = Product::create([
            'title' => $validatedData['title'],
            'price' => $validatedData['price'],
            'description' => $validatedData['description'],
        ]);

        return response()->json(['message' => 'Product created successfully', 'product' => $product], 201);



    }
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        $product->title = $request->input('title');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->save();
        return response()->json($product);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }
}


