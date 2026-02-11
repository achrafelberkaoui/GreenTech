@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white shadow-md rounded-xl p-6">

    <h1 class="text-2xl font-bold text-green-800 mb-6">
        Créer un rôle
    </h1>

    <form method="POST" action="{{ route('roles.store') }}">
        @csrf

        <label class="block mb-2 font-medium">Nom du rôle</label>
        <input type="text"
               name="name"
               class="w-full border p-2 rounded mb-4"
               placeholder="Ex: Admin">

        <h3 class="font-semibold mb-2">Permissions</h3>

        <div class="grid grid-cols-2 gap-2 mb-6">
            @foreach($permissions as $permission)
                <label class="flex items-center gap-2">
                    <input type="checkbox"
                           name="permissions[]"
                           value="{{ $permission->id }}">
                    {{ $permission->name }}
                </label>
            @endforeach
        </div>

        <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Enregistrer
        </button>

    </form>
</div>
@endsection