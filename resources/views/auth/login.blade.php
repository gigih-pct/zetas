<x-guest-layout>
    <div class="mb-10 text-center">
        <h3 class="text-2xl font-black tracking-tight text-black mb-2 uppercase">Log masuk</h3>
        <p class="text-xs text-black/40 font-bold uppercase tracking-widest">Kredensial Otoritas Pusat</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4 text-sm font-bold text-construction-yellow bg-black p-3 rounded-lg" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-8">
        @csrf

        <!-- Email Address -->
        <div>
            <label class="block text-[10px] font-black text-black uppercase tracking-[0.2em] mb-3" for="email">User Authentication ID</label>
            <input id="email" class="block w-full bg-black/[0.03] border-b-2 border-black/10 focus:border-construction-yellow px-4 py-4 text-sm font-bold focus:ring-0 transition-all outline-none" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-[10px] font-bold text-black uppercase tracking-widest" />
        </div>

        <!-- Password -->
        <div>
            <label class="block text-[10px] font-black text-black uppercase tracking-[0.2em] mb-3" for="password">Security Protocol Code</label>
            <input id="password" class="block w-full bg-black/[0.03] border-b-2 border-black/10 focus:border-construction-yellow px-4 py-4 text-sm font-bold focus:ring-0 transition-all outline-none"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-[10px] font-bold text-black uppercase tracking-widest" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                <input id="remember_me" type="checkbox" class="w-4 h-4 bg-black/[0.05] border-black/10 rounded text-black focus:ring-0 focus:ring-offset-0" name="remember">
                <span class="ms-2 text-[10px] font-black uppercase text-black/30 group-hover:text-black transition-colors">Tetap Terhubung</span>
            </label>
            
            @if (Route::has('password.request'))
                <a class="text-[10px] font-black uppercase text-black/20 hover:text-black transition-colors" href="{{ route('password.request') }}">
                    Ganti Sandi?
                </a>
            @endif
        </div>

        <div class="pt-6">
            <button type="submit" class="w-full bg-construction-black hover:bg-construction-yellow hover:text-construction-black text-construction-yellow font-black py-5 rounded-2xl transition-all shadow-xl active:scale-95 uppercase tracking-[0.3em] text-xs">
                Verifikasi & Masuk
            </button>
        </div>
        
        <div class="text-center pt-4 border-t border-black/[0.03]">
            <span class="text-[10px] font-bold text-black/20 uppercase">Otoritas Baru?</span>
            <a href="{{ route('register') }}" class="text-[10px] font-black text-black hover:text-construction-yellow uppercase ml-2 tracking-widest underline decoration-construction-yellow decoration-2 underline-offset-4">Daftar Admin</a>
        </div>
    </form>
</x-guest-layout>
