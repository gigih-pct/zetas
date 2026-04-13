<x-guest-layout>
    <div class="mb-10 text-center">
        <h3 class="text-2xl font-black tracking-tight text-black mb-2 uppercase">Registrasi Otoritas</h3>
        <p class="text-xs text-black/40 font-bold uppercase tracking-widest">Inisialisasi Profil Administrator</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <!-- Name -->
        <div>
            <label class="block text-[10px] font-black text-black uppercase tracking-[0.2em] mb-3" for="name">Operator Name</label>
            <input id="name" class="block w-full bg-black/[0.03] border-b-2 border-black/10 focus:border-construction-yellow px-4 py-4 text-sm font-bold focus:ring-0 transition-all outline-none" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-[10px] font-bold text-black uppercase tracking-widest" />
        </div>

        <!-- Email Address -->
        <div>
            <label class="block text-[10px] font-black text-black uppercase tracking-[0.2em] mb-3" for="email">Digital Identification</label>
            <input id="email" class="block w-full bg-black/[0.03] border-b-2 border-black/10 focus:border-construction-yellow px-4 py-4 text-sm font-bold focus:ring-0 transition-all outline-none" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-[10px] font-bold text-black uppercase tracking-widest" />
        </div>

        <!-- Password -->
        <div>
            <label class="block text-[10px] font-black text-black uppercase tracking-[0.2em] mb-3" for="password">Encrypted Access Code</label>
            <input id="password" class="block w-full bg-black/[0.03] border-b-2 border-black/10 focus:border-construction-yellow px-4 py-4 text-sm font-bold focus:ring-0 transition-all outline-none"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-[10px] font-bold text-black uppercase tracking-widest" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label class="block text-[10px] font-black text-black uppercase tracking-[0.2em] mb-3" for="password_confirmation">Security Double-Check</label>
            <input id="password_confirmation" class="block w-full bg-black/[0.03] border-b-2 border-black/10 focus:border-construction-yellow px-4 py-4 text-sm font-bold focus:ring-0 transition-all outline-none"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-[10px] font-bold text-black uppercase tracking-widest" />
        </div>

        <div class="pt-6 flex flex-col gap-6">
            <button type="submit" class="w-full bg-construction-black hover:bg-construction-yellow hover:text-construction-black text-construction-yellow font-black py-5 rounded-2xl transition-all shadow-xl active:scale-95 uppercase tracking-[0.3em] text-xs">
                Buat Akun Otoritas
            </button>
            
            <a href="{{ route('login') }}" class="text-center text-[10px] font-black text-black hover:text-construction-yellow uppercase tracking-widest underline decoration-construction-yellow decoration-2 underline-offset-4">
                Kembali ke Portal Masuk
            </a>
        </div>
    </form>
</x-guest-layout>
