<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-end">
            <div>
                <h2 class="font-serif text-3xl text-white leading-tight">
                    {{ __('Nueva Propiedad') }}
                </h2>
                <p class="text-slate-500 text-sm mt-1">Añade una nueva joya a tu colección exclusiva.</p>
            </div>
            <a href="{{ route('dashboard') }}" class="group flex items-center gap-2 text-slate-400 hover:text-white text-xs font-bold uppercase tracking-widest transition">
                <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                Cancelar y Volver
            </a>
        </div>
    </x-slot>

    <div class="max-w-5xl mx-auto pb-20">

        <form action="{{ route('properties.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

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
                                <input type="text" name="title" value="{{ old('title') }}"
                                       class="w-full bg-slate-950 border border-slate-800 rounded-xl px-5 py-4 text-white text-lg focus:ring-1 focus:ring-orange-500 focus:border-orange-500 placeholder-slate-600 transition-all"
                                       placeholder="Ej: Villa Minimalista con Vistas al Mar" required>
                                @error('title') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-[10px] font-bold uppercase tracking-[0.2em] text-slate-500 mb-2">Narrativa de la Propiedad</label>
                                <textarea name="description" rows="6"
                                          class="w-full bg-slate-950 border border-slate-800 rounded-xl px-5 py-4 text-slate-300 focus:ring-1 focus:ring-orange-500 focus:border-orange-500 placeholder-slate-600 transition-all resize-none leading-relaxed"
                                          placeholder="Describe la experiencia de vivir aquí. Detalla los acabados, la luz y el entorno..." required>{{ old('description') }}</textarea>
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
                                    <input type="number" id="rooms" name="rooms" value="{{ old('rooms', 2) }}" class="w-12 bg-transparent border-none text-center text-white font-serif text-xl p-0 focus:ring-0" readonly>
                                    <button type="button" onclick="increment('rooms')" class="w-6 h-6 rounded-full bg-slate-800 text-white hover:bg-orange-500 flex items-center justify-center transition">+</button>
                                </div>
                            </div>

                            <div class="bg-slate-950 p-4 rounded-xl border border-slate-800 flex flex-col items-center justify-center text-center group hover:border-slate-600 transition-colors">
                                <label class="text-[10px] font-bold uppercase tracking-widest text-slate-500 mb-2">Baños</label>
                                <div class="flex items-center gap-2">
                                    <button type="button" onclick="decrement('bathrooms')" class="w-6 h-6 rounded-full bg-slate-800 text-white hover:bg-orange-500 flex items-center justify-center transition">-</button>
                                    <input type="number" id="bathrooms" name="bathrooms" value="{{ old('bathrooms', 1) }}" class="w-12 bg-transparent border-none text-center text-white font-serif text-xl p-0 focus:ring-0" readonly>
                                    <button type="button" onclick="increment('bathrooms')" class="w-6 h-6 rounded-full bg-slate-800 text-white hover:bg-orange-500 flex items-center justify-center transition">+</button>
                                </div>
                            </div>

                            <div class="bg-slate-950 p-4 rounded-xl border border-slate-800 col-span-2 flex flex-col justify-center px-6 relative group hover:border-slate-600 transition-colors">
                                <label class="text-[10px] font-bold uppercase tracking-widest text-slate-500 mb-1">Superficie Total</label>
                                <div class="flex items-baseline gap-1">
                                    <input type="number" name="area" value="{{ old('area') }}" class="w-full bg-transparent border-none text-white font-serif text-2xl p-0 focus:ring-0 placeholder-slate-700" placeholder="0" required>
                                    <span class="text-slate-500 font-serif">m²</span>
                                </div>
                                <svg class="w-5 h-5 text-slate-700 absolute right-4 top-1/2 -translate-y-1/2 group-focus-within:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" /></svg>
                            </div>
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
                                    <input type="number" name="price" value="{{ old('price') }}"
                                           class="w-full bg-slate-950 border border-slate-800 rounded-xl pl-10 pr-4 py-3 text-white font-serif text-xl focus:ring-1 focus:ring-emerald-500 focus:border-emerald-500 placeholder-slate-700 transition-all"
                                           placeholder="0" required>
                                </div>
                            </div>

                            <div>
                                <label class="block text-[10px] font-bold uppercase tracking-[0.2em] text-slate-500 mb-2">Localización</label>
                                <div class="relative group">
                                    <svg class="w-5 h-5 text-slate-500 absolute left-4 top-1/2 -translate-y-1/2 group-focus-within:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                                    <input type="text" name="location" value="{{ old('location') }}"
                                           class="w-full bg-slate-950 border border-slate-800 rounded-xl pl-12 pr-4 py-3 text-white text-sm focus:ring-1 focus:ring-emerald-500 focus:border-emerald-500 placeholder-slate-700 transition-all"
                                           placeholder="Ciudad, Zona..." required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-slate-900 border border-white/5 rounded-[2rem] p-1 shadow-2xl">
                        <div class="relative w-full aspect-[4/5] bg-slate-950 rounded-[1.8rem] overflow-hidden border-2 border-dashed border-slate-800 hover:border-orange-500/50 transition-colors group cursor-pointer" id="dropzone">

                            <input type="file" name="image" id="image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20" required onchange="previewImage(event)">

                            <div class="absolute inset-0 flex flex-col items-center justify-center text-center p-6 z-10 transition-opacity duration-300" id="placeholder">
                                <div class="w-16 h-16 rounded-full bg-slate-900 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                                    <svg class="w-8 h-8 text-slate-500 group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                </div>
                                <p class="text-xs font-bold uppercase tracking-widest text-slate-400 group-hover:text-white transition-colors">Subir Portada</p>
                                <p class="text-[10px] text-slate-600 mt-2">Click o arrastra aquí</p>
                            </div>

                            <img id="preview" class="absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500 z-0">
                        </div>
                        @error('image') <p class="text-red-500 text-xs text-center mt-2">{{ $message }}</p> @enderror
                    </div>

                    <button type="submit" class="w-full py-5 bg-orange-500 hover:bg-orange-600 text-white rounded-2xl font-bold uppercase tracking-widest text-xs shadow-lg shadow-orange-500/20 transform hover:-translate-y-1 transition-all flex items-center justify-center gap-3">
                        <span>Publicar Propiedad</span>
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                    </button>

                </div>
            </div>
        </form>
    </div>

    <script>
        // Previsualizar imagen
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function(){
                const output = document.getElementById('preview');
                const placeholder = document.getElementById('placeholder');
                output.src = reader.result;
                output.classList.remove('opacity-0');
                placeholder.classList.add('opacity-0');
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        // Botones +/-
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
