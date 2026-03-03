<x-app-layout>
    <x-slot name="header">
        <h2 class="font-serif text-3xl text-white leading-tight">
            {{ __('Mi Perfil') }}
        </h2>
        <p class="text-slate-500 text-sm mt-1">Gestiona tu información personal y seguridad</p>
    </x-slot>

    <div class="space-y-8 pb-12">
        <div class="p-8 bg-slate-900 border border-slate-800 rounded-[2rem] shadow-2xl relative overflow-hidden">
            <div class="absolute top-0 right-0 -mr-16 -mt-16 w-64 h-64 bg-slate-800/20 rounded-full blur-3xl pointer-events-none"></div>

            <div class="max-w-xl relative z-10">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="p-8 bg-slate-900 border border-slate-800 rounded-[2rem] shadow-2xl relative overflow-hidden">
            <div class="max-w-xl relative z-10">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="p-8 bg-slate-900 border border-red-900/30 rounded-[2rem] shadow-2xl relative overflow-hidden">
            <div class="absolute top-0 right-0 -mr-16 -mt-16 w-64 h-64 bg-red-900/10 rounded-full blur-3xl pointer-events-none"></div>

            <div class="max-w-xl relative z-10">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
