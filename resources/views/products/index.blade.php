@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-10">
    <h2 class="text-3xl font-bold">
        🌿 Notre Catalogue
    </h2>

    <a href="{{ route('products.create') }}"
       class="bg-green-700 text-white px-5 py-2 rounded hover:bg-green-800">
        ➕ Ajouter un produit
    </a>
</div>


<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">

@foreach($products as $product)
<div class="bg-white rounded-xl shadow hover:shadow-xl transition overflow-hidden">

    <img src="https://images.unsplash.com/photo-1501004318641-b39e6451bec6"
         class="h-48 w-full object-cover">

    <div class="p-5">
        <h3 class="text-xl font-semibold mb-1">
            {{ $product->name }}
        </h3>

        <p class="text-green-700 font-bold mb-2">
            {{ $product->price }} DH
        </p>

        <span class="text-sm px-3 py-1 rounded-full
            {{ $product->stock > 0 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
            {{ $product->stock > 0 ? 'En stock' : 'Rupture' }}
        </span>

        <a href="{{ route('products.show', $product->id) }}"
           class="block mt-4 text-center bg-green-600 text-white py-2 rounded hover:bg-green-700">
            Voir détails
        </a>
    </div>

</div>
@endforeach

</div>

@endsection
