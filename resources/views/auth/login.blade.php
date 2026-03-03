<x-guest-layout>
    <div class="flex min-h-screen w-full">

        <div class="hidden lg:flex lg:w-1/2 relative bg-slate-900 items-center justify-center overflow-hidden">

            <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?q=80&w=1600&auto=format&fit=crop"
                 class="absolute inset-0 w-full h-full object-cover opacity-80"
                 alt="Luxury Real Estate">

            <div class="absolute inset-0 bg-gradient-to-tr from-slate-950/90 via-slate-900/30 to-transparent"></div>

            <div class="relative z-10 px-16 text-white max-w-xl mr-auto">
                <p class="text-xs font-bold tracking-[0.3em] uppercase text-white/60 mb-6 pl-1 border-l-2 border-white/40">
                    Panel de Control
                </p>
                <h2 class="text-5xl font-serif leading-tight mb-8 drop-shadow-lg">
                    Excelencia en cada <br> <span class="italic font-light text-white/80">gestión</span>.
                </h2>

                <div class="bg-white/10 backdrop-blur-md p-6 rounded-2xl border border-white/20 shadow-2xl flex items-center gap-6 max-w-xs transform hover:scale-105 transition-transform duration-500 select-none">
                    <div class="bg-white p-3 rounded-full text-slate-900 shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-3xl font-serif font-bold text-white">128%</p>
                        <p class="text-xs text-white/70 uppercase tracking-widest font-medium">Crecimiento Anual</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full lg:w-1/2 flex items-center justify-center bg-white px-8 md:px-20 py-12 overflow-y-auto">
            <div class="w-full max-w-[450px]">

                <div class="mb-10 text-center lg:text-left">
                    <a href="/" class="group inline-block mb-8 hover:opacity-80 transition">
                        <div class="font-serif text-3xl text-slate-900 tracking-tighter">
                            Murcia<span class="italic font-light text-slate-400">RealEstate</span>
                        </div>
                    </a>
                    <h1 class="text-2xl font-bold text-slate-900">Bienvenido de nuevo</h1>
                    <p class="mt-2 text-slate-500 text-sm">Introduce tus credenciales para acceder al sistema.</p>
                </div>

                <x-auth-session-status class="mb-6" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <div class="space-y-1">
                        <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-500 ml-1">
                            Correo Corporativo
                        </label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400 group-focus-within:text-slate-900 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                            </div>
                            <input id="email" type="email" name="email" :value="old('email')" required autofocus
                                   class="block w-full pl-12 pr-4 py-4 bg-slate-50 border-0 text-slate-900 rounded-xl ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 focus:bg-white transition-all placeholder:text-slate-300 font-medium"
                                   placeholder="agente@murciarealestate.com">
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs font-medium text-red-500 pl-1" />
                    </div>

                    <div class="space-y-1">
                        <div class="flex items-center justify-between ml-1">
                            <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-500">
                                Contraseña
                            </label>
                            @if (Route::has('password.request'))
                                <a class="text-xs font-bold text-slate-400 hover:text-slate-900 transition underline decoration-2 underline-offset-4" href="{{ route('password.request') }}">
                                    ¿Olvidaste la clave?
                                </a>
                            @endif
                        </div>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400 group-focus-within:text-slate-900 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                                </svg>
                            </div>
                            <input id="password" type="password" name="password" required autocomplete="current-password"
                                   class="block w-full pl-12 pr-4 py-4 bg-slate-50 border-0 text-slate-900 rounded-xl ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 focus:bg-white transition-all placeholder:text-slate-300 font-medium"
                                   placeholder="••••••••••••">
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs font-medium text-red-500 pl-1" />
                    </div>

                    <div class="flex items-center ml-1">
                        <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                            <input id="remember_me" type="checkbox" class="rounded border-slate-300 text-slate-900 shadow-sm focus:ring-slate-900 w-5 h-5 cursor-pointer transition" name="remember">
                            <span class="ms-3 text-sm font-medium text-slate-500 group-hover:text-slate-800 transition">Mantener sesión iniciada</span>
                        </label>
                    </div>

                    <button type="submit" class="w-full bg-slate-900 text-white font-bold tracking-widest uppercase text-xs py-5 rounded-xl hover:bg-black hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300 shadow-md">
                        Acceder al Panel
                    </button>
                </form>

                <div class="mt-10 pt-6 border-t border-slate-100 text-center">
                    <p class="text-sm text-slate-500">
                        ¿Nuevo agente?
                        <a href="{{ route('register') }}" class="font-bold text-slate-900 hover:underline decoration-2 underline-offset-4 ml-1">
                            Solicitar acceso aquí
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
