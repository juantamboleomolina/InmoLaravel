<x-app-layout>
    <div class="absolute inset-0 -z-10 bg-slate-950 min-h-screen"></div>

    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h2 class="font-serif text-4xl text-white leading-tight">
                    {{ __('Panel de Control') }}
                </h2>
                <div class="flex items-center gap-2 text-slate-400 text-sm mt-2">
                    <span>Bienvenido, <span class="font-bold text-slate-200">{{ Auth::user()->name }}</span></span>
                    <span class="w-1 h-1 bg-slate-600 rounded-full"></span>
                    <span class="text-slate-500">{{ now()->format('d M, Y') }}</span>
                </div>
            </div>

            <a href="{{ route('properties.create') }}" class="group relative bg-white text-slate-900 px-8 py-4 rounded-2xl font-bold text-xs uppercase tracking-widest hover:bg-slate-200 transition-all shadow-[0_0_20px_rgba(255,255,255,0.1)] hover:shadow-[0_0_30px_rgba(255,255,255,0.2)] hover:-translate-y-0.5 overflow-hidden">
                <div class="flex items-center gap-3 relative z-10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>Nueva Propiedad</span>
                </div>
            </a>
        </div>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">

        <div class="bg-slate-900/50 backdrop-blur-xl relative overflow-hidden rounded-[2rem] p-8 border border-slate-800 shadow-2xl group hover:border-slate-700 transition-all duration-300">
            <div class="absolute top-0 right-0 p-8 opacity-10 group-hover:opacity-20 transition-opacity">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-32 w-32 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
            </div>

            <div class="relative z-10">
                <div class="flex justify-between items-start mb-8">
                    <div class="p-3 bg-slate-800 rounded-2xl text-white border border-slate-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </div>
                    <span class="bg-emerald-500/10 text-emerald-400 text-[10px] font-bold px-3 py-1 rounded-full border border-emerald-500/20 flex items-center gap-1">
                        +12%
                    </span>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-500 uppercase tracking-[0.2em]">En Cartera</p>
                    <p class="text-5xl font-serif text-white mt-2 tracking-tight">12</p>
                </div>
            </div>
        </div>

        <div class="bg-slate-900/50 backdrop-blur-xl relative overflow-hidden rounded-[2rem] p-8 border border-slate-800 shadow-2xl group hover:border-slate-700 transition-all duration-300">
            <div class="relative z-10">
                <div class="flex justify-between items-start mb-8">
                    <div class="p-3 bg-slate-800 rounded-2xl text-white border border-slate-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <span class="bg-blue-500/10 text-blue-400 text-[10px] font-bold px-3 py-1 rounded-full border border-blue-500/20 flex items-center gap-1">
                        Nuevos
                    </span>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-500 uppercase tracking-[0.2em]">Clientes</p>
                    <p class="text-5xl font-serif text-white mt-2 tracking-tight">5</p>
                </div>
            </div>
        </div>

        <div class="bg-slate-900/50 backdrop-blur-xl relative overflow-hidden rounded-[2rem] p-8 border border-slate-800 shadow-2xl group hover:border-slate-700 transition-all duration-300">
            <div class="relative z-10">
                <div class="flex justify-between items-start mb-8">
                    <div class="p-3 bg-slate-800 rounded-2xl text-white border border-slate-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span class="bg-emerald-500/10 text-emerald-400 text-[10px] font-bold px-3 py-1 rounded-full border border-emerald-500/20 flex items-center gap-1">
                        Estable
                    </span>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-500 uppercase tracking-[0.2em]">Valor Total</p>
                    <p class="text-5xl font-serif text-white mt-2 tracking-tight">2.4M<span class="text-2xl text-slate-600 ml-1">€</span></p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-slate-900 rounded-[2rem] border border-slate-800 shadow-2xl overflow-hidden">

        <div class="p-8 border-b border-slate-800 flex flex-col md:flex-row justify-between items-center gap-4">
            <div>
                <h3 class="font-serif text-2xl text-white">Cartera Activa</h3>
                <p class="text-slate-500 text-sm mt-1">Gestión de inventario en tiempo real</p>
            </div>

            <div class="flex items-center gap-3">
                <div class="relative">
                    <input type="text" placeholder="Buscar..." class="pl-10 pr-4 py-2 bg-slate-950 border border-slate-800 rounded-xl text-sm text-white focus:ring-1 focus:ring-slate-700 w-48 transition-all placeholder:text-slate-600">
                    <svg class="w-4 h-4 text-slate-600 absolute left-3 top-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                <tr class="bg-slate-950/50">
                    <th class="px-8 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em]">Propiedad</th>
                    <th class="px-8 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em]">Ubicación</th>
                    <th class="px-8 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em]">Precio</th>
                    <th class="px-8 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] text-right">Acciones</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-slate-800">
                @forelse($properties ?? [] as $property)
                    <tr class="group hover:bg-slate-800/50 transition-colors duration-200">
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-5">
                                <div class="h-16 w-20 rounded-xl bg-slate-800 overflow-hidden border border-slate-700">
                                    <img src="{{ $property->image }}" alt="{{ $property->title }}" class="h-full w-full object-cover opacity-80 group-hover:opacity-100 transition-opacity">
                                </div>
                                <div>
                                    <p class="font-bold text-slate-200 text-base line-clamp-1">{{ $property->title }}</p>
                                    <p class="text-slate-500 text-xs mt-1 font-medium">Ref: #MUR-{{ str_pad($property->id, 4, '0', STR_PAD_LEFT) }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-5 text-slate-400 text-sm">
                            {{ $property->location }}
                        </td>
                        <td class="px-8 py-5 font-serif text-white text-lg">
                            {{ number_format($property->price, 0, ',', '.') }} <span class="text-sm text-slate-500 ml-1">€</span>
                        </td>
                        <td class="px-8 py-5 text-right">
                            <div class="flex items-center justify-end gap-2 opacity-50 group-hover:opacity-100 transition-opacity">
                                <a href="#" class="p-2 text-slate-400 hover:text-white hover:bg-slate-700 rounded-lg transition-all" title="Editar">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                                </a>
                                <form action="#" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="p-2 text-slate-400 hover:text-red-400 hover:bg-red-500/10 rounded-lg transition-all" title="Eliminar">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-8 py-10 text-center text-slate-500">
                            Aún no tienes propiedades en tu cartera. ¡Sube la primera!
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
