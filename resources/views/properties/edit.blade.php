<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-end">
            <div>
                <h2 class="font-serif text-3xl text-white leading-tight">
                    {{ __('Editar Propiedad') }}
                </h2>
                <p class="text-slate-500 text-sm mt-1">Estás modificando: <span class="text-white">{{ $property->title }}</span></p>
            </div>
            <a href="{{ route('dashboard') }}" class="group flex items-center gap-2 text-slate-400 hover:text-white text-xs font-bold uppercase tracking-widest transition">
                <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                Cancelar y Volver
            </a>
        </div>
    </x-slot>

    <div class="max-w-5xl mx-auto pb-20">

        <form action="{{ route('properties.update', $property) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="lg:col-span-2 space-y-8">

                    <div class="bg-slate-900 border border-white/5 rounded-[2rem] p-8 shadow-2xl relative overflow-hidden group hover:border-white/10 transition-colors">
                        <div class="absolute top-0 right-0 p-6 opacity-5 group-hover:opacity-10 transition-opacity">
                            <svg class="w-24 h-24 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                        </div>

                        <h3 class="text-white font-serif text-xl mb-6 flex items-center gap-2">
                            <span class="w-8 h-px bg-orange-500"></span> Información General
                        </h3>

                        <div class="space-y-6 relative z-10">
                            <div>
                                <label class="block text-[10px] font-bold uppercase tracking-[0.2em] text-slate-500 mb-2">Título del Anuncio</label>
                                <input type="text" name="title" value="{{ old('title', $property->title) }}"
                                       class="w-full bg-slate-950 border border-slate-800 rounded-xl px-5 py-4 text-white text-lg focus:ring-1 focus:ring-orange-500 focus:border-orange-500 placeholder-slate-600 transition-all" required>
                                @error('title') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-[10px] font-bold uppercase tracking-[0.2em] text-slate-500 mb-2">Narrativa de la Propiedad</label>
                                <textarea name="description" rows="6"
                                          class="w-full bg-slate-950 border border-slate-800 rounded-xl px-5 py-4 text-slate-300 focus:ring-1 focus:ring-orange-500 focus:border-orange-500 placeholder-slate-600 transition-all resize-none leading-relaxed" required>{{ old('description', $property->description) }}</textarea>
                                @error('description') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="bg-slate-900 border border-white/5 rounded-[2rem] p-8 shadow-2xl">
                        <h3 class="text-white font-serif text-xl mb-6 flex items-center gap-2">
                            <span class="w-8 h-px bg-blue-500"></span> Especificaciones
                        </h3>

                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div class="bg-slate-950 p-4 rounded-xl border border-slate-800 flex flex-col items-center justify-center text-center group hover:border-slate-600 transition-colors">
                                <label class="text-[10px] font-bold uppercase tracking-widest text-slate-500 mb-2">Habitaciones</label>
                                <div class="flex items-center gap-2">
                                    <button type="button" onclick="decrement('rooms')" class="w-6 h-6 rounded-full bg-slate-800 text-white hover:bg-orange-500 flex items-center justify-center transition">-</button>
                                    <input type="number" id="rooms" name="rooms" value="{{ old('rooms', $property->rooms) }}" class="w-12 bg-transparent border-none text-center text-white font-serif text-xl p-0 focus:ring-0" readonly>
                                    <button type="button" onclick="increment('rooms')" class="w-6 h-6 rounded-full bg-slate-800 text-white hover:bg-orange-500 flex items-center justify-center transition">+</button>
                                </div>
                            </div>

                            <div class="bg-slate-950 p-4 rounded-xl border border-slate-800 flex flex-col items-center justify-center text-center group hover:border-slate-600 transition-colors">
                                <label class="text-[10px] font-bold uppercase tracking-widest text-slate-500 mb-2">Baños</label>
                                <div class="flex items-center gap-2">
                                    <button type="button" onclick="decrement('bathrooms')" class="w-6 h-6 rounded-full bg-slate-800 text-white hover:bg-orange-500 flex items-center justify-center transition">-</button>
                                    <input type="number" id="bathrooms" name="bathrooms" value="{{ old('bathrooms', $property->bathrooms) }}" class="w-12 bg-transparent border-none text-center text-white font-serif text-xl p-0 focus:ring-0" readonly>
                                    <button type="button" onclick="increment('bathrooms')" class="w-6 h-6 rounded-full bg-slate-800 text-white hover:bg-orange-500 flex items-center justify-center transition">+</button>
                                </div>
                            </div>

                            <div class="bg-slate-950 p-4 rounded-xl border border-slate-800 col-span-2 flex flex-col justify-center px-6 relative group hover:border-slate-600 transition-colors">
                                <label class="text-[10px] font-bold uppercase tracking-widest text-slate-500 mb-1">Superficie Total</label>
                                <div class="flex items-baseline gap-1">
                                    <input type="number" name="area" value="{{ old('area', $property->area) }}" class="w-full bg-transparent border-none text-white font-serif text-2xl p-0 focus:ring-0" required>
                                    <span class="text-slate-500 font-serif">m²</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-slate-900 border border-white/5 rounded-[2rem] p-8 shadow-2xl">
                        <h3 class="text-white font-serif text-xl mb-6 flex items-center gap-2">
                            <span class="w-8 h-px bg-purple-500"></span> Zona Geográfica
                        </h3>

                        <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                            @php
                                $locations = [
                                    'Murcia Centro', 'La Manga', 'Cartagena',
                                    'Los Alcázares', 'San Pedro', 'Cabo de Palos',
                                    'Lorca', 'Águilas', 'Molina de Segura'
                                ];
                            @endphp

                            @foreach($locations as $loc)
                                <label class="cursor-pointer group">
                                    <input type="radio" name="location" value="{{ $loc }}" class="peer sr-only" required {{ old('location', $property->location) == $loc ? 'checked' : '' }}>
                                    <div class="px-4 py-3 rounded-xl border border-slate-800 bg-slate-950 text-slate-500 peer-checked:bg-purple-500/10 peer-checked:border-purple-500 peer-checked:text-purple-400 hover:border-slate-600 hover:text-slate-300 transition-all text-center text-[10px] font-bold uppercase tracking-wider shadow-lg">
                                        {{ $loc }}
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>

                </div>

                <div class="space-y-8">

                    <div class="bg-slate-900 border border-white/5 rounded-[2rem] p-8 shadow-2xl">
                        <h3 class="text-white font-serif text-xl mb-6 flex items-center gap-2">
                            <span class="w-8 h-px bg-emerald-500"></span> Mercado
                        </h3>

                        <div class="space-y-5">
                            <div>
                                <label class="block text-[10px] font-bold uppercase tracking-[0.2em] text-slate-500 mb-2">Valoración</label>
                                <div class="relative group">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-500 font-serif text-xl group-focus-within:text-white transition-colors">€</span>
                                    <input type="number" name="price" value="{{ old('price', $property->price) }}"
                                           class="w-full bg-slate-950 border border-slate-800 rounded-xl pl-10 pr-4 py-3 text-white font-serif text-xl focus:ring-1 focus:ring-emerald-500 focus:border-emerald-500 placeholder-slate-700 transition-all" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-slate-900 border border-white/5 rounded-[2rem] p-1 shadow-2xl">
                        <div class="relative w-full aspect-[4/5] bg-slate-950 rounded-[1.8rem] overflow-hidden border-2 border-dashed border-slate-800 hover:border-orange-500/50 transition-colors group cursor-pointer" id="dropzone">

                            <input type="file" name="image" id="image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20" onchange="previewImage(event)">

                            <div class="absolute inset-0 flex flex-col items-center justify-center text-center p-6 z-10 transition-opacity duration-300 {{ $property->image ? 'opacity-0' : '' }}" id="placeholder">
                                <div class="w-16 h-16 rounded-full bg-slate-900/80 backdrop-blur-md flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                                    <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                </div>
                                <p class="text-xs font-bold uppercase tracking-widest text-white drop-shadow-md">Cambiar Portada</p>
                            </div>

                            <img id="preview" src="{{ $property->image }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-500 z-0 {{ $property->image ? 'opacity-100' : 'opacity-0' }}">
                        </div>
                    </div>

                    <button type="submit" class="w-full py-5 bg-blue-500 hover:bg-blue-600 text-white rounded-2xl font-bold uppercase tracking-widest text-xs shadow-lg shadow-blue-500/20 transform hover:-translate-y-1 transition-all flex items-center justify-center gap-3">
                        <span>Guardar Cambios</span>
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                    </button>

                </div>
            </div>
        </form>
    </div>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function(){
                const output = document.getElementById('preview');
                const placeholder = document.getElementById('placeholder');
                output.src = reader.result;
                output.classList.remove('opacity-0');
                output.classList.add('opacity-100');
                placeholder.classList.add('opacity-0');
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        function increment(id) {
            const input = document.getElementById(id);
            input.value = parseInt(input.value) + 1;
        }
        function decrement(id) {
            const input = document.getElementById(id);
            if (parseInt(input.value) > 0) {
                input.value = parseInt(input.value) - 1;
            }
        }
    </script>
</x-app-layout>
