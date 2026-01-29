<!-- Catalogue : resources/views/products/index.blade.php -->
@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-6">Catalogue des Produits</h2>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <!-- Card produit -->
    <div class="bg-white rounded-xl shadow hover:shadow-lg transition">
        <img src="https://via.placeholder.com/300x200" class="rounded-t-xl w-full" alt="">
        <div class="p-4">
            <h3 class="font-semibold text-lg">Plante Verte</h3>
            <p class="text-green-700 font-bold">120.00 DH</p>
            <span class="inline-block mt-2 px-2 py-1 text-xs bg-green-100 text-green-700 rounded">En stock</span>
            <a href="#" class="block mt-4 text-center bg-green-600 text-white py-2 rounded hover:bg-green-700">Voir détails</a>
        </div>
    </div>

</div>

<!-- Détails produit : resources/views/products/show.blade.php -->

<div class="bg-white rounded-xl shadow p-6 grid md:grid-cols-2 gap-6">
    <img src="https://via.placeholder.com/500x350" class="rounded">
    <div>
        <h2 class="text-3xl font-bold mb-2">Plante Verte</h2>
        <p class="text-xl text-green-700 font-semibold mb-2">120.00 DH</p>
        <p class="text-sm mb-2">Catégorie : <strong>Plantes</strong></p>
        <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <span class="px-3 py-1 bg-green-100 text-green-700 rounded">En stock</span>
        <a href="#" class="block mt-6 text-green-600 underline">← Retour au catalogue</a>
    </div>
</div>
@endsection
