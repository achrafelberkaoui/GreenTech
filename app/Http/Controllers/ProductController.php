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
        $products = Product::with('category')->paginate(9);
        $categories = Category::with('children')->whereNull('parent_id')->get();
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
   $te = $request->validate([
            'name' => 'string|required|max:30',
            'price' => 'numeric|required|max:30',
            'description' => 'string|required|max:80',
            'stock' => 'integer|max:8',
            'category_id' => 'required'
        ]);
    Product::create($request->all());
    // dd($te);
    return redirect()->route('products.index')->with('success', 'Produit ajoute avec succès !');;

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
        $product->delete();
        return redirect()->route('products.index');
    }
    public function search(Request $request){
        $req = $request->input('search');
        $products = Product::where('name', 'like', '%' . $req . '%')->paginate(9)->withQueryString();
        // dd($query);
        $categories = Category::all();
    return view('products.index', compact('products', 'categories'));

    }
    public function filter(Request $request){
        $req = $request->input('category_id');
        $products = Product::where('category_id', $req)->paginate(9)->withQueryString();
        $categories = Category::all();
    return view('products.index', compact('products', 'categories'));

    }
}
