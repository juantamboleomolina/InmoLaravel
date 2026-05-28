<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-end">
            <div>
                <h2 class="font-serif text-3xl text-white leading-tight">
                    {{ __('Modificar Rango de Usuario') }}
                </h2>
                <p class="text-slate-500 text-sm mt-1">Cambiando permisos para: <span class="text-white font-bold">{{ $user->name }}</span></p>
            </div>
            <a href="{{ route('admin.users.index') }}" class="group flex items-center gap-2 text-slate-400 hover:text-white text-xs font-bold uppercase tracking-widest transition">
                <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                Cancelar y Volver
            </a>
        </div>
    </x-slot>

    <div class="max-w-3xl mx-auto pb-20">
        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="bg-slate-900 border border-white/5 rounded-[2rem] p-8 shadow-2xl space-y-8">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-slate-950 p-6 rounded-2xl border border-slate-800">
                    <div>
                        <span class="text-[10px] font-bold uppercase tracking-widest text-slate-500 block mb-1">Nombre Completo</span>
                        <span class="text-slate-200 text-sm font-medium">{{ $user->name }}</span>
                    </div>
                    <div>
                        <span class="text-[10px] font-bold uppercase tracking-widest text-slate-500 block mb-1">Dirección de Correo</span>
                        <span class="text-slate-200 text-sm font-medium">{{ $user->email }}</span>
                    </div>
                </div>

                <div>
                    <label class="block text-[10px] font-bold uppercase tracking-[0.2em] text-slate-400 mb-4">Selecciona el nuevo rol del usuario</label>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @php
                            $roles = [
                                'cliente' => ['title' => 'Cliente / Usuario Normal', 'color' => 'peer-checked:border-emerald-500 peer-checked:text-emerald-400 peer-checked:bg-emerald-500/5'],
                                'admin' => ['title' => 'Administrador Global', 'color' => 'peer-checked:border-purple-500 peer-checked:text-purple-400 peer-checked:bg-purple-500/5']
                            ];
                        @endphp

                        @foreach($roles as $roleKey => $roleData)
                            <label class="cursor-pointer">
                                <input type="radio" name="role" value="{{ $roleKey }}" class="peer sr-only"
                                    {{ ($roleKey === 'admin' && $user->hasRole('admin')) || ($roleKey === 'cliente' && !$user->hasRole('admin')) ? 'checked' : '' }}
                                    {{ $user->id === auth()->id() && $roleKey !== 'admin' ? 'disabled' : '' }}>

                                <div class="p-5 rounded-2xl border border-slate-800 bg-slate-950 text-slate-500 transition-all text-center text-xs font-bold uppercase tracking-wider hover:border-slate-700 hover:text-slate-300 {{ $roleData['color'] }} h-full flex flex-col justify-center items-center shadow-lg">
                                    <span>{{ $roleData['title'] }}</span>

                                    @if($user->id === auth()->id() && $roleKey !== 'admin')
                                        <span class="text-[8px] text-red-500/70 lowercase mt-1 font-light tracking-normal">(No puedes quitarte tu propio rango)</span>
                                    @endif
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full py-5 bg-white text-slate-900 hover:bg-orange-500 hover:text-white rounded-2xl font-bold uppercase tracking-widest text-xs shadow-lg transition-all transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                        Actualizar Cuenta
                    </button>
                </div>

            </div>
        </form>
    </div>
</x-app-layout>
