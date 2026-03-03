<x-guest-layout>
    <div class="flex min-h-screen w-full">

        <div class="hidden lg:flex lg:w-1/2 relative bg-slate-900 items-center justify-center overflow-hidden">
            <img src="https://images.unsplash.com/photo-1558036117-15d82a90b9b1?q=80&w=1600&auto=format&fit=crop"
                 class="absolute inset-0 w-full h-full object-cover opacity-50" alt="Security">
            <div class="absolute inset-0 bg-slate-900/50"></div>

            <div class="relative z-10 px-16 text-white text-center">
                <div class="w-20 h-20 border-2 border-white/30 rounded-full mx-auto flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <h2 class="text-3xl font-serif mb-2">Seguridad ante todo</h2>
                <p class="text-slate-300">Confirma tu identidad para continuar.</p>
            </div>
        </div>

        <div class="w-full lg:w-1/2 flex items-center justify-center bg-white px-8 md:px-20 py-12">
            <div class="w-full max-w-[450px]">

                <div class="mb-8">
                    <h1 class="text-xl font-bold text-slate-900">Confirmar Acceso</h1>
                    <p class="mt-4 text-sm text-slate-500 leading-relaxed">
                        Esta es un área segura de la aplicación. Por favor, confirma tu contraseña antes de continuar.
                    </p>
                </div>

                <form method="POST" action="{{ route('password.confirm') }}" class="space-y-6">
                    @csrf

                    <div class="space-y-1">
                        <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-500 ml-1">Contraseña Actual</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400 group-focus-within:text-slate-900 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input id="password" type="password" name="password" required autocomplete="current-password"
                                   class="block w-full pl-12 pr-4 py-4 bg-slate-50 border-0 text-slate-900 rounded-xl ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 focus:bg-white transition-all font-medium"
                                   placeholder="••••••••••••">
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs font-medium text-red-500" />
                    </div>

                    <button type="submit" class="w-full bg-slate-900 text-white font-bold tracking-widest uppercase text-xs py-5 rounded-xl hover:bg-black transition-all shadow-md">
                        Confirmar
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
