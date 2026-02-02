@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-[60vh]">

    <div class="bg-white shadow-xl rounded-2xl w-full max-w-md p-8">
        <h2 class="text-3xl font-bold text-center text-green-700 mb-6">
            🔐 Connexion
        </h2>

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                       class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-600 focus:outline-none">
                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-medium mb-1">Mot de passe</label>
                <input type="password" name="password"
                       class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-600 focus:outline-none">
                @error('password')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Button -->
            <button type="submit"
                    class="w-full bg-green-700 text-white py-3 rounded-lg hover:bg-green-800 transition">
                Se connecter
            </button>
        </form>

        <p class="text-center text-sm mt-6">
            Pas encore de compte ?
            <a href="#" class="text-green-700 font-semibold hover:underline">
                Créer un compte
            </a>
        </p>
    </div>

</div>
@endsection
