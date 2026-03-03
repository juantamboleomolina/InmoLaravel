<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Catálogo Exclusivo | Murcia Real Estate</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,800;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }

        /* Ocultar scrollbar pero permitir scroll */
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="antialiased bg-slate-950 text-slate-200 selection:bg-orange-500 selection:text-white">

<nav class="fixed top-0 w-full z-50 px-6 md:px-12 py-6 transition-all duration-300 bg-slate-950/80 backdrop-blur-md border-b border-white/5">
    <div class="flex justify-between items-center max-w-7xl mx-auto">
        <a href="{{ url('/') }}" class="text-white font-serif text-2xl tracking-tighter hover:opacity-80 transition">
            Murcia<span class="italic font-light text-slate-500">RealEstate</span>
        </a>

        <div class="flex items-center gap-6">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-xs font-bold uppercase tracking-widest hover:text-orange-400 transition">Panel</a>
            @else
                <a href="{{ route('login') }}" class="text-xs font-bold uppercase tracking-widest hover:text-orange-400 transition">Iniciar Sesión</a>
            @endauth
            <a href="{{ route('register') }}" class="px-5 py-2 rounded-full border border-white/20 text-xs font-bold uppercase tracking-widest hover:bg-white hover:text-slate-900 transition">
                Registrarse
            </a>
        </div>
    </div>
</nav>

<header class="relative pt-40 pb-20 px-6">
    <div class="absolute inset-0 z-0 overflow-hidden">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[500px] bg-orange-500/10 rounded-full blur-[120px] pointer-events-none"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto text-center">
        <p class="text-orange-500 font-bold uppercase tracking-[0.3em] text-xs mb-4 animate-pulse">Colección 2026</p>
        <h1 class="font-serif text-5xl md:text-7xl text-white mb-6">Nuestra Selección</h1>
        <p class="text-slate-400 text-lg max-w-2xl mx-auto font-light">
            Explora las propiedades más distinguidas de la región. Desde villas costeras hasta áticos urbanos, cada propiedad ha sido verificada por nuestros expertos.
        </p>
    </div>
</header>

<div class="sticky top-24 z-40 px-6 mb-16">
    <div class="max-w-5xl mx-auto bg-slate-900/80 backdrop-blur-xl border border-white/10 rounded-full p-2 flex flex-col md:flex-row items-center gap-2 shadow-2xl shadow-black/50">
        <div class="w-full md:w-auto flex-1 relative group">
            <svg class="w-5 h-5 text-slate-500 absolute left-4 top-3.5 group-focus-within:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
            <input type="text" placeholder="Buscar por zona (ej: La Manga)..." class="w-full bg-transparent border-none text-white placeholder-slate-500 focus:ring-0 pl-12 py-3">
        </div>

        <div class="hidden md:block w-px h-8 bg-white/10"></div>

        <div class="flex items-center gap-2 w-full md:w-auto overflow-x-auto no-scrollbar px-2">
            <button class="px-4 py-2 rounded-full bg-white/10 text-white text-xs font-bold uppercase tracking-wider hover:bg-white hover:text-slate-900 transition whitespace-nowrap">Todas</button>
            <button class="px-4 py-2 rounded-full text-slate-400 hover:bg-white/5 hover:text-white text-xs font-bold uppercase tracking-wider transition whitespace-nowrap">Venta</button>
            <button class="px-4 py-2 rounded-full text-slate-400 hover:bg-white/5 hover:text-white text-xs font-bold uppercase tracking-wider transition whitespace-nowrap">Alquiler</button>
        </div>

        <button class="w-full md:w-auto bg-orange-500 hover:bg-orange-600 text-white px-8 py-3 rounded-full font-bold uppercase tracking-widest text-xs transition shadow-lg shadow-orange-500/20">
            Filtrar
        </button>
    </div>
</div>

<main class="px-6 pb-32 max-w-[1600px] mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

        @forelse($properties as $property)
            <div class="group relative bg-slate-900 rounded-[2rem] overflow-hidden border border-white/5 hover:border-white/20 transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-orange-500/10">

                <div class="aspect-[4/5] overflow-hidden relative">
                    <div class="absolute top-4 left-4 z-20">
                            <span class="px-3 py-1 bg-slate-950/50 backdrop-blur-md border border-white/10 text-white text-[10px] font-bold uppercase tracking-widest rounded-full">
                                {{ $property->type }}
                            </span>
                    </div>

                    <button class="absolute top-4 right-4 z-20 p-2 rounded-full bg-slate-950/20 hover:bg-white text-white hover:text-red-500 backdrop-blur-md transition-all">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                    </button>

                    <img src="{{ $property->image }}"
                         alt="{{ $property->title }}"
                         class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">

                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/20 to-transparent opacity-60 group-hover:opacity-40 transition-opacity"></div>

                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <button class="px-6 py-3 bg-white/10 backdrop-blur-md border border-white/30 text-white font-bold uppercase tracking-widest text-xs rounded-full hover:bg-white hover:text-slate-900 transition-all transform translate-y-4 group-hover:translate-y-0">
                            Ver Detalles
                        </button>
                    </div>
                </div>

                <div class="p-6 relative">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <p class="text-orange-500 text-[10px] font-bold uppercase tracking-widest mb-1">{{ $property->location }}</p>
                            <h3 class="text-xl font-serif text-white leading-tight group-hover:text-orange-400 transition-colors line-clamp-1">{{ $property->title }}</h3>
                        </div>
                    </div>

                    <div class="h-px w-full bg-white/5 my-4"></div>

                    <div class="flex justify-between items-end">
                        <div class="flex items-center gap-4 text-slate-400">
                            <div class="flex items-center gap-1.5" title="Habitaciones">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
                                <span class="text-xs font-bold">{{ $property->rooms }}</span>
                            </div>
                            <div class="flex items-center gap-1.5" title="Baños">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                <span class="text-xs font-bold">{{ $property->bathrooms }}</span>
                            </div>
                            <div class="flex items-center gap-1.5" title="Superficie">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" /></svg>
                                <span class="text-xs font-bold">{{ $property->area }}m²</span>
                            </div>
                        </div>

                        <div class="text-right">
                            <p class="font-serif text-2xl text-white">{{ number_format($property->price, 0, ',', '.') }}<span class="text-sm text-slate-500 ml-1">€</span></p>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full py-32 text-center">
                <div class="inline-flex justify-center items-center w-20 h-20 rounded-full bg-slate-900 border border-white/10 mb-6">
                    <svg class="w-8 h-8 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                </div>
                <h3 class="text-2xl font-serif text-white mb-2">Sin resultados</h3>
                <p class="text-slate-500">No hemos encontrado propiedades con esos criterios.</p>
            </div>
        @endforelse

    </div>

    <div class="mt-20 flex justify-center">
        <button class="group flex items-center gap-2 px-8 py-4 rounded-full border border-white/10 hover:bg-white hover:text-slate-900 transition-all text-xs font-bold uppercase tracking-widest text-white">
            Cargar más propiedades
            <svg class="w-4 h-4 group-hover:translate-y-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
        </button>
    </div>
</main>

<footer class="border-t border-white/5 bg-slate-950 pt-20 pb-10 px-6">
    <div class="max-w-7xl mx-auto flex flex-col items-center justify-center">
        <div class="font-serif text-3xl text-white mb-8">Murcia<span class="italic text-slate-600">RealEstate</span></div>
        <div class="flex gap-8 text-[10px] font-bold uppercase tracking-[0.2em] text-slate-500 mb-8">
            <a href="#" class="hover:text-white transition">Privacidad</a>
            <a href="#" class="hover:text-white transition">Términos</a>
            <a href="#" class="hover:text-white transition">Cookies</a>
        </div>
        <p class="text-slate-700 text-xs">© 2026 Murcia Real Estate. Designed for Excellence.</p>
    </div>
</footer>

</body>
</html>
