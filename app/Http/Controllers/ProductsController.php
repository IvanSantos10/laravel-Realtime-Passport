<?php

namespace App\Http\Controllers;

use App\Product;
use App\Http\Requests\ProductsRequest as Request;

class ProductsController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function store(Request $request)
    {
        $request->merge(['user_id'=> auth()->id()]);
        return Product::create($request->all());
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return $product;
    }
    public function show(Product $product)
    {
        return $product;
    }

    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);
        $product->delete();
        return $product;
    }
}
