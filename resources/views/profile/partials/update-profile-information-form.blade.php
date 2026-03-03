<section>
    <header>
        <h2 class="text-xl font-serif text-white">
            {{ __('Información Personal') }}
        </h2>

        <p class="mt-2 text-sm text-slate-400">
            {{ __("Actualiza la información de tu cuenta y tu dirección de correo electrónico profesional.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-8 space-y-6">
        @csrf
        @method('patch')

        <div class="space-y-2">
            <label for="name" class="block text-xs font-bold uppercase tracking-wider text-slate-500 ml-1">
                {{ __('Nombre Completo') }}
            </label>
            <input id="name" name="name" type="text" class="w-full bg-slate-950 border border-slate-800 text-white rounded-xl focus:ring-2 focus:ring-slate-700 focus:border-transparent transition-all py-3 px-4 placeholder-slate-600"
                   value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="space-y-2">
            <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-500 ml-1">
                {{ __('Correo Corporativo') }}
            </label>
            <input id="email" name="email" type="email" class="w-full bg-slate-950 border border-slate-800 text-white rounded-xl focus:ring-2 focus:ring-slate-700 focus:border-transparent transition-all py-3 px-4 placeholder-slate-600"
                   value="{{ old('email', $user->email) }}" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-4 p-4 bg-slate-950/50 rounded-xl border border-yellow-900/30">
                    <p class="text-sm text-yellow-500">
                        {{ __('Tu dirección de correo no está verificada.') }}

                        <button form="send-verification" class="underline hover:text-yellow-400 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Haz clic aquí para reenviar el correo de verificación.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-400">
                            {{ __('Se ha enviado un nuevo enlace de verificación a tu correo.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4 pt-4">
            <button type="submit" class="bg-white text-slate-900 px-6 py-3 rounded-xl font-bold text-xs uppercase tracking-widest hover:bg-slate-200 transition shadow-lg hover:shadow-white/10">
                {{ __('Guardar Cambios') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-400 font-medium flex items-center gap-2"
                >
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                    {{ __('Guardado correctamente.') }}
                </p>
            @endif
        </div>
    </form>
</section>
