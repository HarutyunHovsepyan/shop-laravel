<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $params = $request->all();
        Product::create($params);
        $products = Product::all();
        return view('product.index', compact('products'));
    }


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('product.update', compact('product', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        $product->fill($request->all())->save();
        return redirect()->route('product.index');
    }

    public function destroy(string $id)
    {
        //
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product.index');
    }
}
