<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->paginate(10);

        $categories = Category::all();

        return view('products.index', compact('products','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Product $product)
    {
    $request->validate([
            'name' => 'string|required|max:30',
            'price' => 'numeric|required|max:30',
            'description' => 'string|required|max:80',
            'stock' => 'integer|max:8',
            'category_id' => 'required'
        ]);
    Product::create($request->all());
    return redirect()->route('products.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
   
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $formvalid = $request->validate([
            'name' => 'string|required|max:30',
            'price' => 'numeric|required|max:30',
            'description' => 'string|required|max:80',
            'stock' => 'integer|max:8',
            'category_id' => 'required'
            ]);
    $product->update($formvalid);
    return redirect()->route('products.index')->with('success', 'Produit mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->destroy();
        return redirect()->route('products.index');
    }
}
