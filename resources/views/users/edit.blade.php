@extends('layouts.app')

@section('content')

<h2 class="text-2xl font-bold mb-6">Modifier utilisateur</h2>

<form method="POST" action="{{ route('users.update', $user->id) }}"
      class="bg-white p-6 rounded shadow max-w-md">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label class="block mb-1">Nom</label>
        <input type="text" name="name"
               value="{{ $user->name }}"
               class="w-full border px-3 py-2 rounded">
    </div>
    <div class="mb-4">
    <label class="block mb-1">Role</label>
    <select name="role_id">
        @foreach($roles as $role)
        <option value="{{$role->id}}">{{"$role->name"}}</option>
        @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label class="block mb-1">Email</label>
        <input type="email" name="email"
               value="{{ $user->email }}"
               class="w-full border px-3 py-2 rounded">
    </div>

    <button class="bg-green-700 text-white px-5 py-2 rounded">
        Mettre à jour
    </button>
</form>

@endsection