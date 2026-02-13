<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>GreenTech Solutions</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

<!-- TOP BAR -->
<div class="bg-gray-900 text-gray-300 text-sm py-2 px-6 flex justify-between">
    <span>📞 +212 6 00 00 00 00 | ✉️ contact@greentech.com</span>
    <span>🌿 GreenTech Solutions</span>
</div>

<!-- NAVBAR -->
<nav class="bg-green-800 text-white px-8 py-4 flex justify-between items-center">
    <h1 class="text-2xl font-bold">🌱 GreenTech</h1>
    <ul class="flex gap-6 font-medium">
        <li><a href="{{ route('products.index') }}" class="hover:text-green-200">Accueil</a></li>
        @can('viewAny', App\Models\Role::class)
        <li><a href="{{ route('users.index') }}" class="hover:text-green-200">Users</a></li>
        @endcan
        @auth
        @can('viewAny', App\Models\Role::class)
        <li><a href="{{ route('favorite.index') }}" class="hover:text-green-200">My Favorite</a></li>
        @endcan
        <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button>Logout</button>
                </form>
            @endauth
        </li>
        
        <li>
                @guest
                <a href="{{ route('login') }}">Login</a>
        </li>
        
        <li>
                    <a href="{{ route('register') }}">Register</a>
                    @endguest
        </li>
    </ul>

</nav>

<!-- HERO SECTION -->
<section class="relative h-[70vh]">
    <img src="https://images.unsplash.com/photo-1501004318641-b39e6451bec6"
         class="absolute inset-0 w-full h-full object-cover">
    <div class="absolute inset-0 bg-black/40"></div>

    <div class="relative z-10 h-full flex items-center justify-center text-center">
        <div class="text-white max-w-2xl">
            @guest
            <h2 class="bg-green-600 px-6 py-3 rounded-full text-lg hover:bg-green-700 transition">Veuillez vous connecter pour ajouter un produit à vos favoris</h2>
            
            @endguest
            <h2>
                @auth
                    <span>Welcome {{ Auth::user()->name }}</span>
                @endauth
            </h2>

            <h2 class="text-5xl font-bold mb-4">MAKE THIS WORLD</h2>
            <p class="text-xl mb-6">A Better Place With Green Solutions</p>
<div class="flex justify-center gap-4">
    <a href="#catalogue"
       class="bg-green-600 px-6 py-3 rounded-full text-lg hover:bg-green-700 transition">
        🌿 Découvrir le catalogue
    </a>
    @auth
    @if(Auth::user()->role === 'admin')
    <a href="{{ route('products.create') }}"
       class="bg-white text-green-700 px-6 py-3 rounded-full text-lg font-semibold hover:bg-gray-100 transition">
        ➕ Ajouter un produit
    </a>
    @endif
    @endauth

</div>

        </div>
    </div>
</section>

<!-- CONTENT -->
<main class="max-w-7xl mx-auto px-6 py-12">
    @yield('content')
</main>

<!-- FOOTER -->
<footer class="bg-gray-900 text-gray-300 text-center py-6">
    © {{ date('Y') }} GreenTech Solutions – All rights reserved
</footer>

</body>
</html>
