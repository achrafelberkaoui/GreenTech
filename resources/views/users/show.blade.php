@extends('layouts.app')

@section('content')

<div class="bg-white p-6 rounded shadow max-w-md">
    <h2 class="text-2xl font-bold mb-4">Détails utilisateur</h2>

    <p><strong>Nom:</strong> {{ $user->name }}</p>
    <p><strong>Role:</strong> {{ $user->role->name }}</p>

    <a href="{{ route('users.index') }}"
       class="inline-block mt-4 bg-green-700 text-white px-5 py-2 rounded">
        Retour
    </a>
</div>

@endsection