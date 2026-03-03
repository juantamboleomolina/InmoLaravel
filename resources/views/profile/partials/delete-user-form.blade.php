<section class="space-y-6">
    <header>
        <h2 class="text-xl font-serif text-white">
            {{ __('Borrar Cuenta') }}
        </h2>

        <p class="mt-2 text-sm text-slate-400">
            {{ __('Una vez que se elimine tu cuenta, todos sus recursos y datos se eliminarán permanentemente. Antes de eliminar tu cuenta, descarga cualquier dato o información que desees conservar.') }}
        </p>
    </header>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="bg-red-500/10 text-red-500 border border-red-500/50 px-6 py-3 rounded-xl font-bold text-xs uppercase tracking-widest hover:bg-red-500 hover:text-white transition-all shadow-lg hover:shadow-red-500/20"
    >
        {{ __('Eliminar Cuenta') }}
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 bg-slate-900 border border-slate-800 text-white">
            @csrf
            @method('delete')

            <h2 class="text-lg font-serif text-white">
                {{ __('¿Estás seguro de que quieres eliminar tu cuenta?') }}
            </h2>

            <p class="mt-2 text-sm text-slate-400">
                {{ __('Una vez que se elimine tu cuenta, todos sus recursos y datos se eliminarán permanentemente. Por favor, introduce tu contraseña para confirmar que deseas eliminar tu cuenta de forma permanente.') }}
            </p>

            <div class="mt-6 space-y-2">
                <label for="password" class="sr-only">{{ __('Contraseña') }}</label>

                <input
                    id="password"
                    name="password"
                    type="password"
                    class="w-3/4 bg-slate-950 border border-slate-800 text-white rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all py-3 px-4 placeholder-slate-500"
                    placeholder="{{ __('Contraseña') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <button type="button" x-on:click="$dispatch('close')" class="px-4 py-2 text-slate-400 hover:text-white transition text-sm font-bold uppercase tracking-wider">
                    {{ __('Cancelar') }}
                </button>

                <button type="submit" class="bg-red-600 text-white px-6 py-3 rounded-xl font-bold text-xs uppercase tracking-widest hover:bg-red-700 transition shadow-lg">
                    {{ __('Eliminar Cuenta') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>
