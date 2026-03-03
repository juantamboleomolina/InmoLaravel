<x-guest-layout>
    <div class="flex min-h-screen w-full">

        <div class="w-full lg:w-1/2 flex items-center justify-center bg-white px-8 md:px-20 py-12 overflow-y-auto">
            <div class="w-full max-w-[480px]">

                <div class="mb-10 text-center lg:text-left">
                    <a href="/" class="group inline-block mb-6">
                        <div class="font-serif text-3xl text-slate-900 tracking-tighter">
                            Murcia<span class="italic font-light text-slate-400">RealEstate</span>
                        </div>
                    </a>
                    <h1 class="text-2xl font-bold text-slate-900">Solicitud de Alta</h1>
                    <p class="mt-2 text-slate-500 text-sm">Rellena tus datos para unirte a nuestra red de agentes.</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <div class="space-y-1">
                        <label for="name" class="block text-xs font-bold uppercase tracking-wider text-slate-500 ml-1">
                            Nombre Completo
                        </label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400 group-focus-within:text-slate-900 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                                   class="block w-full pl-12 pr-4 py-4 bg-slate-50 border-0 text-slate-900 rounded-xl ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 focus:bg-white transition-all placeholder:text-slate-300 font-medium"
                                   placeholder="Ej. Roberto García">
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-1 text-xs font-medium text-red-500 pl-1" />
                    </div>

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
                            <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username"
                                   class="block w-full pl-12 pr-4 py-4 bg-slate-50 border-0 text-slate-900 rounded-xl ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 focus:bg-white transition-all placeholder:text-slate-300 font-medium"
                                   placeholder="agente@murciarealestate.com">
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs font-medium text-red-500 pl-1" />
                    </div>

                    <div class="space-y-1">
                        <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-500 ml-1">
                            Contraseña
                        </label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400 group-focus-within:text-slate-900 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input id="password" type="password" name="password" required autocomplete="new-password"
                                   class="block w-full pl-12 pr-4 py-4 bg-slate-50 border-0 text-slate-900 rounded-xl ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 focus:bg-white transition-all placeholder:text-slate-300 font-medium"
                                   placeholder="Mínimo 8 caracteres">
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs font-medium text-red-500 pl-1" />
                    </div>

                    <div class="space-y-1">
                        <label for="password_confirmation" class="block text-xs font-bold uppercase tracking-wider text-slate-500 ml-1">
                            Confirmar Contraseña
                        </label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400 group-focus-within:text-slate-900 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                                   class="block w-full pl-12 pr-4 py-4 bg-slate-50 border-0 text-slate-900 rounded-xl ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 focus:bg-white transition-all placeholder:text-slate-300 font-medium"
                                   placeholder="Repite la contraseña">
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-xs font-medium text-red-500 pl-1" />
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full bg-slate-900 text-white font-bold tracking-widest uppercase text-xs py-5 rounded-xl hover:bg-black hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300 shadow-md">
                            Crear Cuenta Profesional
                        </button>
                    </div>
                </form>

                <div class="mt-8 pt-6 border-t border-slate-100 text-center">
                    <p class="text-sm text-slate-500">
                        ¿Ya formas parte del equipo?
                        <a href="{{ route('login') }}" class="font-bold text-slate-900 hover:underline decoration-2 underline-offset-4 ml-1">
                            Iniciar Sesión
                        </a>
                    </p>
                </div>
            </div>
        </div>

        <div class="hidden lg:flex lg:w-1/2 relative bg-slate-100 items-center justify-center overflow-hidden">
            <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?q=80&w=1600&auto=format&fit=crop"
                 class="absolute inset-0 w-full h-full object-cover opacity-90"
                 alt="Modern House Exterior">

            <div class="absolute inset-0 bg-slate-900/10"></div>

            <div class="relative z-10 px-16 text-white text-right max-w-2xl ml-auto">
                <h2 class="text-5xl font-serif leading-tight mb-6 drop-shadow-lg">
                    Construye tu <br> <span class="italic font-light">legado</span>.
                </h2>
                <div class="bg-white/10 backdrop-blur-md p-6 rounded-2xl border border-white/20 shadow-2xl inline-block text-left max-w-sm">
                    <p class="text-white font-medium text-lg leading-relaxed">
                        "Unirse a Murcia Real Estate ha sido el paso definitivo en mi carrera. La plataforma es simplemente otro nivel."
                    </p>
                    <div class="mt-4 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-slate-200 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=100&q=80" alt="Avatar" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <p class="text-sm font-bold">Laura Méndez</p>
                            <p class="text-xs text-white/70">Agente Senior</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
