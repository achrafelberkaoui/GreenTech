@extends('layouts.app')

@section('content')

<div class="max-w-xl mx-auto bg-white p-8 rounded-xl shadow">
<h2 class="text-2xl font-bold mb-6">➕ Modifier le Produit</h2>

<form method="POST" action="{{ route('products.update', $product->id) }}" class="space-y-4">
@csrf
@method('PUT')

<input type="text" value="{{ $product->name }}" name="name" placeholder="Nom"
class="w-full border p-3 rounded">

<input type="number" value="{{ $product->price }}" name="price" placeholder="Prix"
class="w-full border p-3 rounded">

<textarea name="description" placeholder="Description"
class="w-full border p-3 rounded"> {{  $product->description }} </textarea>

<input type="number" name="stock" value="{{ $product->stock }}" placeholder="Stock"
class="w-full border p-3 rounded">

<select name="category_id" class="w-full border p-3 rounded">
<option>-- Catégorie --</option>
@foreach($categories as $category)
<option value="{{ $category->id }}" @if($product->category->id == $category->id) selected @endif>{{ $category->name }}</option>
@endforeach
</select>

<button type= "submit" class="bg-green-700 text-white px-6 py-3 rounded w-full">
Ajouter
</button>

</form>
</div>

@endsection
