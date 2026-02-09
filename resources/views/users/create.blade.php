@extends('layouts.app')

@section('content')

<h2 class="text-2xl font-bold mb-6">Ajouter utilisateur</h2>

<form method="POST" action="{{ route('users.store') }}"
      class="bg-white p-6 rounded shadow max-w-md">
    @csrf

    <div class="mb-4">
        <label class="block mb-1">Nom</label>
        <input type="text" name="name"
               class="w-full border px-3 py-2 rounded">
    </div>

    <div class="mb-4">
        <label class="block mb-1">Email</label>
        <input type="email" name="email"
               class="w-full border px-3 py-2 rounded">
    </div>

    <div class="mb-4">
        <label class="block mb-1">Mot de passe</label>
        <input type="password" name="password"
               class="w-full border px-3 py-2 rounded">
    </div>

    <button class="bg-green-700 text-white px-5 py-2 rounded">
        Enregistrer
    </button>
</form>

@endsection