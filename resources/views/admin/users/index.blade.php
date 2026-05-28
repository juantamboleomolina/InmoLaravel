<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-end">
            <div>
                <h2 class="font-serif text-3xl text-white leading-tight">
                    {{ __('Gestión de Usuarios') }}
                </h2>
                <p class="text-slate-500 text-sm mt-1">Control de administradores y clientes.</p>
            </div>
            <div class="flex gap-4">
                <a href="{{ route('dashboard') }}" class="px-6 py-3 rounded-full border border-slate-700 text-slate-300 hover:bg-slate-800 hover:text-white text-xs font-bold uppercase tracking-widest transition">
                    Volver
                </a>
                <a href="{{ route('admin.users.pdf') }}" class="px-6 py-3 rounded-full bg-blue-500 hover:bg-blue-600 text-white text-xs font-bold uppercase tracking-widest transition shadow-lg shadow-blue-500/20 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" /></svg>
                    Descargar PDF
                </a>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto pb-20">

        @if(session('status'))
            <div class="mb-6 p-4 bg-green-500/10 border border-green-500/20 rounded-2xl text-green-400 text-sm">
                {{ session('status') }}
            </div>
        @endif
        @if(session('error'))
            <div class="mb-6 p-4 bg-red-500/10 border border-red-500/20 rounded-2xl text-red-400 text-sm">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-slate-900 rounded-[2rem] border border-slate-800 shadow-2xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                    <tr class="bg-slate-950/50">
                        <th class="px-8 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em]">Usuario</th>
                        <th class="px-8 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em]">Correo</th>
                        <th class="px-8 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em]">Rol</th>
                        <th class="px-8 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em]">Fecha Registro</th>
                        <th class="px-8 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] text-right">Acciones</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800">
                    @foreach($users as $user)
                        <tr class="group hover:bg-slate-800/50 transition-colors">
                            <td class="px-8 py-5 text-white font-medium">
                                {{ $user->name }}
                                @if($user->id === auth()->id())
                                    <span class="text-xs text-slate-500 ml-2">(Tú)</span>
                                @endif
                            </td>
                            <td class="px-8 py-5 text-slate-400">{{ $user->email }}</td>
                            <td class="px-8 py-5">
                                @if($user->hasRole('admin'))
                                    <span class="bg-purple-500/10 text-purple-400 text-[10px] font-bold px-3 py-1 rounded-full border border-purple-500/20 tracking-widest">ADMIN</span>
                                @else
                                    <span class="bg-emerald-500/10 text-emerald-400 text-[10px] font-bold px-3 py-1 rounded-full border border-emerald-500/20 tracking-widest">CLIENTE</span>
                                @endif
                            </td>
                            <td class="px-8 py-5 text-slate-500 text-sm">{{ $user->created_at->format('d/m/Y') }}</td>

                            <td class="px-8 py-5 text-right">
                                <div class="flex items-center justify-end gap-2 opacity-40 group-hover:opacity-100 transition-opacity">
                                    <a href="{{ route('admin.users.edit', $user) }}" class="p-2 text-slate-400 hover:text-white hover:bg-slate-700 rounded-lg transition-all" title="Cambiar Rol">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                                    </a>

                                    @if($user->id !== auth()->id())
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar a este usuario? Esta acción es irreversible.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 text-slate-400 hover:text-red-400 hover:bg-red-500/10 rounded-lg transition-all" title="Eliminar cuenta">
                                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
