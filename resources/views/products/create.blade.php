@extends('layouts.app')

@section('content')

<div class="max-w-xl mx-auto bg-white p-8 rounded-xl shadow">
<h2 class="text-2xl font-bold mb-6">➕ Ajouter un Produit</h2>

<form method="POST" action="{{ route('products.store') }}" class="space-y-4">
@csrf

<input type="text" name="name" placeholder="Nom"
class="w-full border p-3 rounded">

<input type="number" name="price" placeholder="Prix"
class="w-full border p-3 rounded">

<textarea name="description" placeholder="Description"
class="w-full border p-3 rounded"></textarea>

<input type="number" name="stock" placeholder="Stock"
class="w-full border p-3 rounded">

<select name="category_id" class="w-full border p-3 rounded">
<option>-- Catégorie --</option>
@foreach($categories as $category)
<option value="{{ $category->id }}">{{ $category->name }}</option>
@endforeach
</select>

<button class="bg-green-700 text-white px-6 py-3 rounded w-full">
Ajouter
</button>

</form>
</div>

@endsection
