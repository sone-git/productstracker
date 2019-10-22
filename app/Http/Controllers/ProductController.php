<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ProductCollection;
use App\Product;

class ProductController extends Controller
{
    public function store(Request $request)
    {
      $product = new Product([
        'name' => $request->get('name'),
        'category' => $request->get('category'),
        'sku' => $request->get('sku'),
        'price' => $request->get('price'),
        'quantity' => $request->get('quantity')
      ]);
      $product->save();

      return response()->json('product successfully added');
    }

    public function index()
    {
      return new ProductCollection(Product::all());
    }

    public function edit($id)
    {
      $product = Product::find($id);
      return response()->json($product);
    }

    public function update($id, Request $request)
    {
      $Product = Product::find($id);

      $Product->update($request->all());

      return response()->json('product successfully updated');
    }

    public function delete($id)
    {
      $Product = Product::find($id);

      $Product->delete();

      return response()->json('product successfully deleted');
    }
}
