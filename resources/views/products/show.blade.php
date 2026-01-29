@extends('layouts.app')

@section('content')

<div class="bg-white rounded-xl shadow p-8 grid md:grid-cols-2 gap-8">

    <img src="https://images.unsplash.com/photo-1501004318641-b39e6451bec6"
         class="rounded-xl w-full object-cover">

    <div>
        <h1 class="text-4xl font-bold mb-3">
            {{ $product->name }}
        </h1>

        <p class="text-2xl text-green-700 font-semibold mb-3">
            {{ $product->price }} DH
        </p>

        <p class="mb-2">
            📂 Catégorie :
            <strong>{{ $product->category->name }}</strong>
        </p>

        <p class="mb-4 text-gray-600">
            {{ $product->description }}
        </p>

        <span class="inline-block px-4 py-2 rounded
            {{ $product->stock > 0 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
            {{ $product->stock > 0 ? 'En stock' : 'Rupture de stock' }}
        </span>

        <div class="mt-6 flex gap-4">
            <a href="{{ route('products.index') }}"
               class="bg-gray-700 text-white px-5 py-2 rounded">
               ← Retour
            </a>

            <a href="{{ route('products.edit', $product->id) }}"
               class="bg-blue-600 text-white px-5 py-2 rounded">
               Modifier
            </a>
        </div>
    </div>

</div>

@endsection
