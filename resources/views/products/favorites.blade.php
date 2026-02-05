@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">Mes Favoris</h1>

@if(session('success'))
<div class="bg-green-500 text-white p-3 rounded mb-4">
    {{ session('success') }}
</div>
@endif

@if($products->isEmpty())
<p class="text-gray-500">Vous n'avez aucun produit dans vos favoris.</p>
@else
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
    @foreach($products as $product)
    <div class="bg-white rounded-xl shadow hover:shadow-xl transition overflow-hidden">
        <img src="{{ $product->image ?? 'https://images.unsplash.com/photo-1501004318641-b39e6451bec6' }}"
             class="h-48 w-full object-cover">

        <div class="p-5">
            <h3 class="text-xl font-semibold mb-1">{{ $product->name }}</h3>
            <p class="text-green-700 font-bold mb-2">{{ $product->price }} DH</p>

            <span class="text-sm px-3 py-1 rounded-full
                {{ $product->stock > 0 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                {{ $product->stock > 0 ? 'En stock' : 'Rupture' }}
            </span>

            <a href="{{ route('products.show', $product->id) }}"
               class="block mt-4 text-center bg-green-600 text-white py-2 rounded hover:bg-green-700">
                Voir détails
            </a>

            <form method="POST" action="{{ route('favorite.toggleFavorite', $product->id) }}" class="mt-4">
                @csrf
                <button type="submit"
                    class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700">
                    Retirer des favoris
                </button>
            </form>
        </div>
    </div>
    @endforeach
</div>

<div class="mt-10">
    {{ $products->links() }}
</div>
@endif

@endsection