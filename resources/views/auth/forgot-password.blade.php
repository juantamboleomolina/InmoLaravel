<x-guest-layout>
    <div class="flex min-h-screen w-full">

        <div class="hidden lg:flex lg:w-1/2 relative bg-slate-900 items-center justify-center overflow-hidden">
            <img src="https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?q=80&w=1600&auto=format&fit=crop"
                 class="absolute inset-0 w-full h-full object-cover opacity-60" alt="Interior Minimalista">
            <div class="absolute inset-0 bg-gradient-to-r from-slate-900/90 to-transparent"></div>

            <div class="relative z-10 px-16 text-white max-w-lg mr-auto">
                <h2 class="text-4xl font-serif leading-tight mb-4">¿Olvidaste tu clave?</h2>
                <p class="text-slate-300 font-light text-lg">No te preocupes. Es algo que ocurre en las mejores firmas.</p>
            </div>
        </div>

        <div class="w-full lg:w-1/2 flex items-center justify-center bg-white px-8 md:px-20 py-12">
            <div class="w-full max-w-[450px]">

                <div class="mb-8">
                    <div class="font-serif text-2xl text-slate-900 tracking-tighter mb-6">
                        Murcia<span class="italic font-light text-slate-400">RealEstate</span>
                    </div>
                    <h1 class="text-xl font-bold text-slate-900">Recuperación de Acceso</h1>
                    <p class="mt-4 text-slate-500 text-sm leading-relaxed">
                        Introduce tu correo electrónico corporativo y te enviaremos un enlace seguro para que puedas restablecer tu contraseña inmediatamente.
                    </p>
                </div>

                <x-auth-session-status class="mb-6" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                    @csrf

                    <div class="space-y-1">
                        <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-500 ml-1">Correo Corporativo</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400 group-focus-within:text-slate-900 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <input id="email" type="email" name="email" :value="old('email')" required autofocus
                                   class="block w-full pl-12 pr-4 py-4 bg-slate-50 border-0 text-slate-900 rounded-xl ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 focus:bg-white transition-all placeholder:text-slate-300 font-medium"
                                   placeholder="tu@email.com">
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs font-medium text-red-500 pl-1" />
                    </div>

                    <button type="submit" class="w-full bg-slate-900 text-white font-bold tracking-widest uppercase text-xs py-5 rounded-xl hover:bg-black hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300 shadow-md">
                        Enviar Enlace de Recuperación
                    </button>

                    <div class="text-center mt-6">
                        <a href="{{ route('login') }}" class="text-sm font-bold text-slate-400 hover:text-slate-900 transition">
                            ← Volver al inicio de sesión
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
