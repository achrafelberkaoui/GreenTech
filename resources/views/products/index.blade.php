@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-6 gap-4">

    <form method="GET" action="{{ route('products.search') }}" class="flex gap-2 w-full max-w-md">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="🔍 Rechercher un produit..." class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-600">

        <button type="submit" class="bg-green-700 text-white px-5 py-2 rounded hover:bg-green-800"> 
            Rechercher
        </button>
            </form>
    <!-- Filter catégorie -->
     <form method="GET" action="{{ route('products.filter') }}" class="flex gap-2 w-full max-w-md">
    <select name="category_id"
            class="border rounded px-4 py-2">
        <option value="">-- Toutes les catégories --</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}"
                {{ request('category_id') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    <!-- Buttons -->
    <button type="submit"
            class="bg-green-700 text-white px-5 py-2 rounded hover:bg-green-800">
        Filtrer
    </button>
    </form>
@auth
@if(Auth::user()->role === 'admin')
    <a href="{{ route('products.create') }}"
       class="bg-green-700 text-white px-5 py-2 rounded hover:bg-green-800 whitespace-nowrap">
        ➕ Ajouter un produit
    </a>
@endif
@endauth
</div>

@if(session('success'))
<div class="bg-green-500 text-white p-3 rounded">
{{session('success')}}
</div>
@endif

    <!-- SIDEBAR -->
    <aside class="w-64 bg-white p-4 rounded-xl shadow">
        <h2 class="font-bold mb-4">Catégories</h2>

        <ul class="space-y-2">
            @foreach($categories as $parent)
                <li>
                    <a href="{{ route('products.filter', ['category_id' => $parent->id]) }}"
                       class="font-semibold hover:text-green-700">
                        {{ $parent->name }}
                    </a>

                    @if($parent->children->count())
                        <ul class="ml-4 text-sm text-gray-600">
                            @foreach($parent->children as $child)
                                <li>
                                    <a href="{{ route('products.filter', ['category_id' => $child->id]) }}"
                                       class="hover:text-green-600">
                                        — {{ $child->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </aside>

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
        @auth
@if(Auth::user()->roles && Auth::user()->roles->name === 'Admin')
        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="mt-4">
            @csrf
            @method('DELETE')
        
            <button
                type="submit"
                class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700">
                Delete
            </button>
        </form>
        @else
        <form method="POST" action="{{route('favorite.toggleFavorite',$product->id)}}">
            @csrf
            <button type="submit"
                class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">
                Ajouter / Retirer des favoris
            </button>
        </form>
        @endif
        @endauth

    </div>

</div>
@endforeach

</div>
    <div class="mt-10">
    {{ $products->links() }}
    </div>

@endsection
