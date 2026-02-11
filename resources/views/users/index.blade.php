@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">Liste des utilisateurs</h2>
    
    <a href="{{ route('roles.index') }}"
       class="bg-green-700 text-white px-5 py-2 rounded hover:bg-green-800">
        ROLES
    </a>
    <a href="{{ route('users.create') }}"
       class="bg-green-700 text-white px-5 py-2 rounded hover:bg-green-800">
        ➕ Ajouter utilisateur
    </a>
</div>

<table class="w-full bg-white rounded shadow overflow-hidden">
    <thead class="bg-green-700 text-white">
        <tr>
            <th class="p-3 text-left">ID</th>
            <th class="p-3 text-left">Nom</th>
            <th class="p-3 text-left">Email</th>
            <th class="p-3 text-left">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr class="border-b">
            <td class="p-3">{{ $user->id }}</td>
            <td class="p-3">{{ $user->name }}</td>
            <td class="p-3">{{ $user->email }}</td>
            <td class="p-3 flex gap-2">

                <a href="{{ route('users.edit', $user->id) }}"
                   class="bg-blue-600 text-white px-3 py-1 rounded">
                    Edit
                </a>
                <a href="{{ route('users.show', $user->id) }}"
                   class="bg-orange-600 text-white px-3 py-1 rounded">
                    show
                </a>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-600 text-white px-3 py-1 rounded">
                        Delete
                    </button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection