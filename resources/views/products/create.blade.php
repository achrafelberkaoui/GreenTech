@extends('layouts.app')
@section('content')
<h2>Ajouter un Produit</h2>

<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Nom" class="border p-2 mb-2"><br>
    <input type="number" name="price" placeholder="Prix" class="border p-2 mb-2"><br>
    <input type="text" name="description" placeholder="Description" class="border p-2 mb-2"><br>
    <input type="number" name="stock" placeholder="Stock" class="border p-2 mb-2"><br>
    <!-- CATEGORY -->
    <select name="category_id">
        <option value="">-- Choisir une catégorie --</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">
                {{ $category->name }}
            </option>
        @endforeach
    </select><br><br>
    <button type="submit" class="bg-green-700 text-white px-4 py-2">Ajouter</button>
</form>
@endsection
