@extends('layouts.app')

@section('content')
<h2>Catalogue des Produits</h2>

<a href="{{ route('products.create') }}" class="bg-green-700 text-white px-4 py-2 inline-block mb-4">Ajouter</a>

<table class="table-auto border-collapse border border-gray-300">
    <thead>
        <tr>
            <th class="border px-4 py-2">Nom</th>
            <th class="border px-4 py-2">Prix</th>
            <th class="border px-4 py-2">Description</th>
            <th class="border px-4 py-2">Stock</th>
            <th class="border px-4 py-2">Catégorie</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td class="border px-4 py-2">{{ $product->name }}</td>
            <td class="border px-4 py-2">{{ $product->price }}</td>
            <td class="border px-4 py-2">{{ $product->description }}</td>
            <td class="border px-4 py-2">{{ $product->stock }}</td>
            <td class="border px-4 py-2" >{{ $product->category->name }}</td>
            <td class="border px-4 py-2">
                <a href="{{ route('products.edit', $product->id) }}" class="bg-blue-700 text-white px-2 py-1">Edit</a>

                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-700 text-white px-2 py-1">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
