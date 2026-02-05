<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        /**
         * @var App\Models\User $user 
         */
        $user = Auth::user();
        $products = $user->favorites()->paginate(9);
        return view('products.favorites', compact('products'));
    }

    public function toggleFavorite(Product $product)
    {
        /**
         * @var App\Models\User $user 
         */
        $user = Auth::user();
        $user->favorites()->toggle($product->id);
        return back()->with('success', 'Action effectuée avec succès');
    }
}
