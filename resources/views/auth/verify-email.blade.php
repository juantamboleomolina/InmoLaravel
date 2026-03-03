<x-guest-layout>
    <div class="flex min-h-screen w-full">

        <div class="hidden lg:flex lg:w-1/2 relative bg-slate-50 items-center justify-center overflow-hidden border-r border-slate-100">
            <div class="text-center p-10">
                <div class="w-24 h-24 bg-slate-200 rounded-full mx-auto flex items-center justify-center mb-6 animate-pulse">
                    <svg class="w-10 h-10 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76" />
                    </svg>
                </div>
                <h3 class="font-serif text-2xl text-slate-900 mb-2">Revisa tu bandeja de entrada</h3>
                <p class="text-slate-500 max-w-sm mx-auto">Hemos enviado un enlace de confirmación a tu correo corporativo.</p>
            </div>
        </div>

        <div class="w-full lg:w-1/2 flex items-center justify-center bg-white px-8 md:px-20 py-12">
            <div class="w-full max-w-[450px]">

                <div class="mb-8">
                    <div class="font-serif text-2xl text-slate-900 tracking-tighter mb-4">
                        Murcia<span class="italic font-light text-slate-400">RealEstate</span>
                    </div>
                    <h1 class="text-xl font-bold text-slate-900">Verificación Necesaria</h1>
                </div>

                <div class="mb-8 text-sm text-slate-500 leading-relaxed bg-slate-50 p-6 rounded-2xl border border-slate-100">
                    {{ __('Gracias por registrarte. Antes de empezar a gestionar propiedades, ¿podrías verificar tu dirección de correo electrónico haciendo clic en el enlace que te acabamos de enviar? Si no recibiste el correo, con gusto te enviaremos otro.') }}
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-6 font-medium text-sm text-green-600 bg-green-50 p-4 rounded-xl border border-green-100">
                        {{ __('Se ha enviado un nuevo enlace de verificación a la dirección de correo que proporcionaste durante el registro.') }}
                    </div>
                @endif

                <div class="space-y-4">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="w-full bg-slate-900 text-white font-bold tracking-widest uppercase text-xs py-4 rounded-xl hover:bg-black transition-all shadow-md">
                            {{ __('Reenviar Correo de Verificación') }}
                        </button>
                    </form>

                    <form method="POST" action="{{ route('logout') }}" class="text-center">
                        @csrf
                        <button type="submit" class="text-sm font-bold text-slate-400 hover:text-red-600 transition uppercase tracking-wider text-[10px]">
                            {{ __('Cerrar Sesión') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
