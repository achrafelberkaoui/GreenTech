@extends('layouts.app')

@section('content')
<table class="w-full border border-gray-200 rounded-lg overflow-hidden">
    <thead class="bg-green-700 text-white">
        <tr>
            <th class="p-3 text-left">ID</th>
            <th class="p-3 text-left">Nom</th>
            <th class="p-3 text-left">Permissions</th>
            <th class="p-3 text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($roles as $role)
        <tr class="border-t hover:bg-gray-50">
            <td class="p-3">{{ $role->id }}</td>
            <td class="p-3 font-medium">{{ $role->name }}</td>
            <td class="p-3">
                @foreach($role->permissions as $permission)
                    <span class="bg-gray-200 text-gray-700 px-2 py-1 rounded-full text-sm mr-1">
                        {{ $permission->name }}
                    </span>
                @endforeach
            </td>
            <td class="p-3 text-center flex justify-center gap-3">
                <a href="{{ route('roles.edit', $role) }}"
                   class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                    Modifier
                </a>

                <form action="{{ route('roles.destroy', $role) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Supprimer ce rôle ?')"
                            class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                        Supprimer
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
@endsection