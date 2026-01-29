@extends('layouts.app')

@section('content')
<h2>Modifier le Produit</h2>

<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $product->name }}" class="border p-2 mb-2"><br>
    <input type="number" name="price" value="{{ $product->price }}" class="border p-2 mb-2"><br>
    <input type="text" name="description" value="{{ $product->description }}" class="border p-2 mb-2"><br>
    <input type="number" name="stock" value="{{ $product->stock }}" class="border p-2 mb-2"><br>
    <!-- CATEGORY -->
    <select name="category_id">
        <option value="">-- Choisir une catégorie --</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" @if ($product->category->id == $category->id) selected @endif >
                {{ $category->name }}
            </option>
        @endforeach
    </select><br><br>
    <button type="submit" class="bg-blue-700 text-white px-4 py-2">Modifier</button>
</form>
@endsection
