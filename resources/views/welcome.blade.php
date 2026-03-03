<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inmobiliaria Murcia | Real Estate Boutique</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,800;1,400;1,600&family=Plus+Jakarta+Sans:wght@200;300;400;500;600&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }

        /* Animación suave de Zoom para el fondo */
        @keyframes slowZoom {
            0% { transform: scale(1); }
            100% { transform: scale(1.1); }
        }
        .animate-slow-zoom {
            animation: slowZoom 20s ease-out forwards;
        }

        /* Animaciones de entrada de texto */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-up {
            animation: fadeInUp 1s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
            opacity: 0;
        }
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.3s; }
        .delay-300 { animation-delay: 0.5s; }
    </style>
</head>
<body class="antialiased bg-slate-950 overflow-x-hidden selection:bg-orange-500 selection:text-white">

<nav class="absolute top-0 w-full z-50 px-6 md:px-16 py-8 flex justify-between items-center transition-all duration-300">
    <div class="text-white font-serif text-3xl tracking-tighter cursor-default">
        Murcia<span class="italic font-light text-white/60">RealEstate</span>
    </div>

    <div class="flex items-center gap-8">
        @if (Route::has('login'))
            <div class="hidden md:flex items-center gap-6">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-xs font-bold uppercase tracking-[0.2em] text-white hover:text-orange-400 transition">
                        Mi Panel
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-xs font-bold uppercase tracking-[0.2em] text-white hover:text-orange-400 transition">
                        Iniciar Sesión
                    </a>
                @endauth
            </div>

            @guest
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="group relative px-6 py-3 overflow-hidden rounded-full bg-white text-slate-900 transition-all hover:bg-orange-500 hover:text-white">
                        <span class="relative z-10 text-xs font-bold uppercase tracking-widest group-hover:text-white transition-colors">Registrarse</span>
                    </a>
                @endif
            @endguest
        @endif
    </div>
</nav>

<main class="relative h-screen w-full overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?q=80&w=2000&auto=format&fit=crop"
             class="w-full h-full object-cover animate-slow-zoom brightness-[0.6]"
             alt="Arquitectura de Lujo">

        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-slate-950/30"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-slate-950/80 via-transparent to-transparent"></div>
    </div>

    <div class="relative z-10 h-full flex flex-col justify-center px-6 md:px-16 max-w-7xl mx-auto">

        <div class="animate-fade-up">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-white/20 bg-white/5 backdrop-blur-md mb-8">
                <span class="w-1.5 h-1.5 rounded-full bg-orange-500 animate-pulse"></span>
                <span class="text-[10px] font-bold uppercase tracking-[0.3em] text-white/80">Nº1 en Lujo Mediterráneo</span>
            </div>
        </div>

        <h1 class="font-serif text-6xl md:text-8xl lg:text-9xl text-white leading-[0.9] mb-8 animate-fade-up delay-100">
            El arte de <br>
            <span class="italic font-light text-white/70">vivir bien</span>.
        </h1>

        <p class="text-white/60 text-lg md:text-xl font-light max-w-xl leading-relaxed mb-12 animate-fade-up delay-200 border-l border-white/30 pl-6">
            Descubre una colección curada de propiedades exclusivas en el corazón de Murcia. Donde la arquitectura moderna abraza la calidez del hogar.
        </p>

        <div class="flex flex-col sm:flex-row gap-5 animate-fade-up delay-300">
            <a href="{{ url('/catalogo') }}" class="group relative px-8 py-4 bg-white text-slate-900 rounded-full overflow-hidden flex items-center justify-center gap-3 transition-transform hover:scale-105 active:scale-95 shadow-[0_0_40px_rgba(255,255,255,0.3)]">
                <span class="text-sm font-bold uppercase tracking-widest relative z-10">Explorar Catálogo</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 relative z-10 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
                <div class="absolute inset-0 bg-slate-200 transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left duration-500"></div>
            </a>

            <a href="{{ route('register') }}" class="px-8 py-4 rounded-full border border-white/30 text-white hover:bg-white/10 backdrop-blur-sm transition-all text-sm font-bold uppercase tracking-widest flex items-center justify-center text-center">
                Vender mi propiedad
            </a>
        </div>
    </div>

    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 animate-bounce opacity-50">
        <span class="text-[10px] uppercase tracking-widest text-white">Descubre más</span>
        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 14l-7 7m0 0l-7-7" />
        </svg>
    </div>
</main>

<section class="bg-slate-950 py-32 px-6 md:px-16 border-t border-white/5 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-orange-500/5 rounded-full blur-[100px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="font-serif text-4xl md:text-6xl text-white leading-tight mb-8">
                    Más que casas, <br>
                    <span class="italic text-white/50">vendemos futuros.</span>
                </h2>
                <p class="text-slate-400 text-lg leading-relaxed mb-8">
                    En Murcia RealEstate, no solo mostramos propiedades. Curamos espacios que inspiran. Nuestro equipo de expertos analiza cada metro cuadrado para asegurar que tu inversión sea sinónimo de calidad y prestigio.
                </p>

                <div class="grid grid-cols-2 gap-8 mt-12">
                    <div>
                        <p class="text-4xl font-serif text-white mb-2">15+</p>
                        <p class="text-xs uppercase tracking-widest text-slate-500">Años de Experiencia</p>
                    </div>
                    <div>
                        <p class="text-4xl font-serif text-white mb-2">250M€</p>
                        <p class="text-xs uppercase tracking-widest text-slate-500">En ventas gestionadas</p>
                    </div>
                </div>
            </div>

            <div class="grid gap-6">
                <div class="group p-8 rounded-2xl bg-white/5 border border-white/10 hover:bg-white/10 transition-colors cursor-pointer">
                    <div class="flex items-center gap-4 mb-3">
                        <div class="p-2 bg-orange-500/20 rounded-lg text-orange-400 group-hover:text-white group-hover:bg-orange-500 transition-colors">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        </div>
                        <h3 class="text-xl font-serif text-white">Certificación de Calidad</h3>
                    </div>
                    <p class="text-slate-400 text-sm pl-14">Cada propiedad pasa una rigurosa inspección de 50 puntos antes de ser listada.</p>
                </div>

                <div class="group p-8 rounded-2xl bg-white/5 border border-white/10 hover:bg-white/10 transition-colors cursor-pointer">
                    <div class="flex items-center gap-4 mb-3">
                        <div class="p-2 bg-blue-500/20 rounded-lg text-blue-400 group-hover:text-white group-hover:bg-blue-500 transition-colors">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                        </div>
                        <h3 class="text-xl font-serif text-white">Transacción Segura</h3>
                    </div>
                    <p class="text-slate-400 text-sm pl-14">Equipo legal interno para garantizar que tu compra sea 100% segura y transparente.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="bg-black text-white py-20 px-6 border-t border-white/10">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center md:items-start gap-10">
        <div class="text-center md:text-left">
            <div class="font-serif text-2xl mb-4">Murcia<span class="italic text-slate-500">RealEstate</span></div>
            <p class="text-slate-500 text-sm max-w-xs">
                Gran Vía Escultor Salzillo, Murcia <br>
                hola@murciarealestate.es
            </p>
        </div>

        <div class="flex gap-8 text-[10px] font-bold uppercase tracking-[0.2em] text-slate-500">
            <a href="#" class="hover:text-white transition">Instagram</a>
            <a href="#" class="hover:text-white transition">LinkedIn</a>
            <a href="#" class="hover:text-white transition">Aviso Legal</a>
        </div>
    </div>
    <div class="text-center mt-16 text-slate-700 text-xs">
        © 2026 Murcia Real Estate Project. All rights reserved.
    </div>
</footer>

</body>
</html>
