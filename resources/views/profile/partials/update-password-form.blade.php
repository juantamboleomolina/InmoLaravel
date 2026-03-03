<section>
    <header>
        <h2 class="text-xl font-serif text-white">
            {{ __('Actualizar Contraseña') }}
        </h2>

        <p class="mt-2 text-sm text-slate-400">
            {{ __('Asegúrate de usar una contraseña larga y aleatoria para mantener tu cuenta segura.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-8 space-y-6">
        @csrf
        @method('put')

        <div class="space-y-2">
            <label for="update_password_current_password" class="block text-xs font-bold uppercase tracking-wider text-slate-500 ml-1">
                {{ __('Contraseña Actual') }}
            </label>
            <input id="update_password_current_password" name="current_password" type="password" class="w-full bg-slate-950 border border-slate-800 text-white rounded-xl focus:ring-2 focus:ring-slate-700 focus:border-transparent transition-all py-3 px-4 placeholder-slate-600" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div class="space-y-2">
            <label for="update_password_password" class="block text-xs font-bold uppercase tracking-wider text-slate-500 ml-1">
                {{ __('Nueva Contraseña') }}
            </label>
            <input id="update_password_password" name="password" type="password" class="w-full bg-slate-950 border border-slate-800 text-white rounded-xl focus:ring-2 focus:ring-slate-700 focus:border-transparent transition-all py-3 px-4 placeholder-slate-600" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div class="space-y-2">
            <label for="update_password_password_confirmation" class="block text-xs font-bold uppercase tracking-wider text-slate-500 ml-1">
                {{ __('Confirmar Nueva Contraseña') }}
            </label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="w-full bg-slate-950 border border-slate-800 text-white rounded-xl focus:ring-2 focus:ring-slate-700 focus:border-transparent transition-all py-3 px-4 placeholder-slate-600" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4 pt-4">
            <button type="submit" class="bg-white text-slate-900 px-6 py-3 rounded-xl font-bold text-xs uppercase tracking-widest hover:bg-slate-200 transition shadow-lg hover:shadow-white/10">
                {{ __('Actualizar') }}
            </button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-400 font-medium flex items-center gap-2"
                >
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                    {{ __('Contraseña actualizada.') }}
                </p>
            @endif
        </div>
    </form>
</section>
