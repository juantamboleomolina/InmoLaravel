<x-guest-layout>
    <div class="flex min-h-screen w-full">

        <div class="hidden lg:flex lg:w-1/2 relative bg-slate-900 items-center justify-center overflow-hidden">
            <img src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?q=80&w=1600&auto=format&fit=crop"
                 class="absolute inset-0 w-full h-full object-cover opacity-70" alt="Puerta Moderna">
            <div class="absolute inset-0 bg-slate-900/40"></div>

            <div class="relative z-10 px-16 text-white text-center">
                <h2 class="text-5xl font-serif mb-6">Nuevo comienzo</h2>
                <p class="text-slate-200 text-lg">Establece una contraseña segura para proteger tu cuenta.</p>
            </div>
        </div>

        <div class="w-full lg:w-1/2 flex items-center justify-center bg-white px-8 md:px-20 py-12">
            <div class="w-full max-w-[450px]">

                <div class="mb-10">
                    <div class="font-serif text-2xl text-slate-900 tracking-tighter mb-2">
                        Murcia<span class="italic font-light text-slate-400">RealEstate</span>
                    </div>
                    <h1 class="text-2xl font-bold text-slate-900">Restablecer Contraseña</h1>
                </div>

                <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
                    @csrf

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="space-y-1">
                        <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-500 ml-1">Email</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                            </div>
                            <input id="email" type="email" name="email" :value="old('email', $request->email)" required autofocus
                                   class="block w-full pl-12 pr-4 py-4 bg-slate-50 border-0 text-slate-900 rounded-xl ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 focus:bg-white transition-all font-medium"
                                   placeholder="tu@email.com">
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs font-medium text-red-500" />
                    </div>

                    <div class="space-y-1">
                        <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-500 ml-1">Nueva Contraseña</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400 group-focus-within:text-slate-900 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input id="password" type="password" name="password" required autocomplete="new-password"
                                   class="block w-full pl-12 pr-4 py-4 bg-slate-50 border-0 text-slate-900 rounded-xl ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 focus:bg-white transition-all font-medium"
                                   placeholder="••••••••••••">
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs font-medium text-red-500" />
                    </div>

                    <div class="space-y-1">
                        <label for="password_confirmation" class="block text-xs font-bold uppercase tracking-wider text-slate-500 ml-1">Confirmar Contraseña</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400 group-focus-within:text-slate-900 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <input id="password_confirmation" type="password" name="password_confirmation" required
                                   class="block w-full pl-12 pr-4 py-4 bg-slate-50 border-0 text-slate-900 rounded-xl ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 focus:bg-white transition-all font-medium"
                                   placeholder="Repite la contraseña">
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-xs font-medium text-red-500" />
                    </div>

                    <button type="submit" class="w-full bg-slate-900 text-white font-bold tracking-widest uppercase text-xs py-5 rounded-xl hover:bg-black transition-all shadow-md">
                        Actualizar Contraseña
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
