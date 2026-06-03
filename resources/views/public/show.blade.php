<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $property->title }} | Murcia Real Estate</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,800;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }
        html { scroll-behavior: smooth; }
    </style>

    <script>
        window.toggleGallery = function() {
            const gallery = document.getElementById('fullGallery');
            if (gallery) {
                gallery.classList.toggle('hidden');

                // Si la acabamos de mostrar, hacemos scroll suave hacia ella
                if (!gallery.classList.contains('hidden')) {
                    setTimeout(() => {
                        gallery.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }, 50); // Un mini retraso para asegurar que el navegador ya la ha dibujado
                }
            }
        };
    </script>
</head>
<body class="antialiased bg-slate-950 text-slate-200 selection:bg-orange-500 selection:text-white pb-20">

<nav class="w-full z-50 px-6 md:px-12 py-6 bg-slate-950 border-b border-white/5">
    <div class="flex justify-between items-center max-w-7xl mx-auto">
        <a href="{{ url('/catalogo') }}" class="flex items-center gap-2 text-slate-400 hover:text-white transition text-xs font-bold uppercase tracking-widest">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
            Volver al catálogo
        </a>
        <div class="font-serif text-xl text-white tracking-tighter hidden md:block">
            Murcia<span class="italic font-light text-slate-500">RealEstate</span>
        </div>
    </div>
</nav>

<main class="max-w-7xl mx-auto px-6 pt-12">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 mb-16">

        <div class="flex flex-col gap-4 lg:h-[700px]">

            <div class="relative rounded-[2rem] overflow-hidden border border-white/10 shadow-2xl flex-1 cursor-pointer hover:opacity-90 transition-opacity" onclick="window.toggleGallery()">
                <img src="{{ $property->image }}" alt="{{ $property->title }}" class="w-full h-full object-cover">
                <div class="absolute top-6 left-6 px-4 py-2 bg-black/50 backdrop-blur-md rounded-full border border-white/10 text-orange-400 text-[10px] font-bold uppercase tracking-widest z-10">
                    {{ $property->location }}
                </div>
            </div>

            <div class="grid grid-cols-3 gap-4 h-32 md:h-40">
                <div class="rounded-[1.5rem] overflow-hidden border border-white/10 shadow-lg cursor-pointer hover:opacity-80 transition-opacity" onclick="window.toggleGallery()">
                    <img src="https://images.unsplash.com/photo-1600585154340-be6199f7a096?auto=format&fit=crop&w=600&q=80" alt="Interior 1" class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                </div>
                <div class="rounded-[1.5rem] overflow-hidden border border-white/10 shadow-lg cursor-pointer hover:opacity-80 transition-opacity" onclick="window.toggleGallery()">
                    <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=600&q=80" alt="Interior 2" class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                </div>

                <div class="rounded-[1.5rem] overflow-hidden border border-white/10 shadow-lg cursor-pointer relative group" onclick="window.toggleGallery()">
                    <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=600&q=80" alt="Interior 3" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-slate-900/60 flex items-center justify-center backdrop-blur-[1px] group-hover:bg-slate-900/40 transition-colors">
                        <span class="text-white font-bold text-sm md:text-base tracking-wider uppercase group-hover:scale-105 transition-transform">+5 fotos</span>
                    </div>
                </div>
            </div>

        </div>

        <div class="flex flex-col justify-center">

            <h1 class="font-serif text-4xl md:text-5xl text-white mb-6 leading-tight">{{ $property->title }}</h1>

            <div class="text-3xl font-serif text-white mb-8 pb-8 border-b border-white/10">
                {{ number_format($property->price, 0, ',', '.') }} <span class="text-xl text-slate-500">€</span>
            </div>

            <div class="grid grid-cols-3 gap-6 mb-12">
                <div class="text-center p-6 bg-slate-900 rounded-2xl border border-white/5">
                    <svg class="w-6 h-6 text-slate-500 mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
                    <div class="text-2xl font-bold text-white">{{ $property->rooms }}</div>
                    <div class="text-[10px] uppercase tracking-widest text-slate-500">Habitaciones</div>
                </div>
                <div class="text-center p-6 bg-slate-900 rounded-2xl border border-white/5">
                    <svg class="w-6 h-6 text-slate-500 mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                    <div class="text-2xl font-bold text-white">{{ $property->bathrooms }}</div>
                    <div class="text-[10px] uppercase tracking-widest text-slate-500">Baños</div>
                </div>
                <div class="text-center p-6 bg-slate-900 rounded-2xl border border-white/5">
                    <svg class="w-6 h-6 text-slate-500 mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" /></svg>
                    <div class="text-2xl font-bold text-white">{{ $property->area }}</div>
                    <div class="text-[10px] uppercase tracking-widest text-slate-500">Metros m²</div>
                </div>
            </div>

            <div class="prose prose-invert prose-slate mb-12">
                <p class="text-slate-400 font-light leading-relaxed">
                    Esta magnífica propiedad de alto standing ofrece un estándar de vida inigualable. Con sus espacios generosos, acabados de primera calidad y diseño elegante, es una oportunidad única en el mercado inmobiliario actual.
                </p>
            </div>

            @if(session('mensaje_enviado'))
                <div class="mb-6 p-4 bg-green-500/10 border border-green-500/20 rounded-2xl flex items-center gap-3 text-green-400 text-sm shadow-lg shadow-green-500/5 animate-pulse">
                    <svg class="w-6 h-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <p class="font-medium">{{ session('mensaje_enviado') }}</p>
                </div>
            @endif

            @if(session('error_login'))
                <div class="mb-6 p-4 bg-red-500/10 border border-red-500/20 rounded-2xl flex items-center gap-3 text-red-400 text-sm shadow-lg shadow-red-500/5">
                    <svg class="w-6 h-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                    <div class="flex flex-col">
                        <p class="font-medium">{{ session('error_login') }}</p>
                        <a href="{{ route('login') }}" class="text-xs font-bold underline mt-1 hover:text-red-300 transition-colors">Ir a la página de Login</a>
                    </div>
                </div>
            @endif

            <div class="flex items-center gap-4">
                <form action="{{ route('catalogo.contact', $property) }}" method="POST" class="flex-1">
                    @csrf
                    <button type="submit" class="w-full bg-white text-slate-900 px-8 py-4 rounded-full font-bold uppercase tracking-widest text-xs hover:bg-orange-500 hover:text-white transition shadow-lg text-center">
                        Contactar Agente
                    </button>
                </form>

                @auth
                    <form action="{{ route('properties.favorite', $property) }}" method="POST">
                        @csrf
                        <button type="submit" class="flex items-center justify-center w-14 h-14 bg-slate-900 border border-white/10 rounded-full text-slate-400 hover:text-red-500 hover:border-red-500/50 transition-all group" title="Añadir a favoritos">
                            @if(auth()->user()->favorites->contains($property->id))
                                <svg class="w-6 h-6 text-red-500 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                            @else
                                <svg class="w-6 h-6 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                            @endif
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="flex items-center justify-center w-14 h-14 bg-slate-900 border border-white/10 rounded-full text-slate-400 hover:text-red-500 hover:border-red-500/50 transition-all group" title="Inicia sesión para guardar">
                        <svg class="w-6 h-6 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                    </a>
                @endauth
            </div>

        </div>
    </div>

    <div id="fullGallery" class="hidden mt-12 pt-12 border-t border-white/10">
        <div class="flex justify-between items-end mb-8">
            <div>
                <h2 class="font-serif text-3xl text-white">Galería Completa</h2>
                <p class="text-slate-500 text-xs mt-1">Tour fotográfico detallado de la propiedad.</p>
            </div>
            <button onclick="window.toggleGallery()" class="text-xs font-bold text-slate-400 hover:text-white uppercase tracking-widest flex items-center gap-2 transition-colors border border-white/10 px-4 py-2 rounded-full bg-slate-900">
                Ocultar fotos
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" /></svg>
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="rounded-[2rem] overflow-hidden border border-white/5 aspect-[4/3] bg-slate-900">
                <img src="https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?auto=format&fit=crop&w=800&q=80" alt="Salón principal" class="w-full h-full object-cover">
            </div>
            <div class="rounded-[2rem] overflow-hidden border border-white/5 aspect-[4/3] bg-slate-900">
                <img src="https://images.unsplash.com/photo-1600585154340-be6199f7a096?auto=format&fit=crop&w=800&q=80" alt="Cocina abierta" class="w-full h-full object-cover">
            </div>
            <div class="rounded-[2rem] overflow-hidden border border-white/5 aspect-[4/3] bg-slate-900">
                <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=800&q=80" alt="Dormitorio principal" class="w-full h-full object-cover">
            </div>
            <div class="rounded-[2rem] overflow-hidden border border-white/5 aspect-[4/3] bg-slate-900">
                <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=800&q=80" alt="Baño suite" class="w-full h-full object-cover">
            </div>
            <div class="rounded-[2rem] overflow-hidden border border-white/5 aspect-[4/3] lg:col-span-2 bg-slate-900">
                <img src="https://images.unsplash.com/photo-1600047509807-ba8f99d2cdde?auto=format&fit=crop&w=1200&q=80" alt="Piscina y jardín" class="w-full h-full object-cover">
            </div>
        </div>
    </div>
</main>

</body>
</html>
