<div class="flex flex-col h-full py-6 md:py-10">
    <!-- Brand: Apple Precision x CAT Boldness -->
    <div class="px-8 md:px-10 mb-10 md:mb-14">
        <a href="/" class="flex items-center gap-4 group">
            <div class="w-8 h-8 md:w-10 md:h-10 bg-construction-yellow flex items-center justify-center font-black text-construction-black rounded-lg shadow-apple group-hover:scale-110 transition-transform duration-300">
                Z
            </div>
            <div>
                <h2 class="font-extrabold text-base md:text-lg leading-tight tracking-tight text-white uppercase group-hover:text-construction-yellow transition-colors">ZETAS</h2>
                <div class="flex items-center gap-1.5 mt-0.5">
                    <span class="w-1 h-1 bg-construction-yellow rounded-full"></span>
                    <p class="text-[8px] md:text-[9px] font-bold text-construction-yellow uppercase tracking-[0.3em]">Build & Construct</p>
                </div>
            </div>
        </a>
    </div>

    <!-- Navigation: Structured Sidebar -->
    <nav class="flex-1 px-4 md:px-6 space-y-1.5 md:space-y-2 overflow-y-auto custom-scrollbar">
        @php
            $currentRoute = Route::currentRouteName();
            $navItemClass = "group flex items-center gap-4 px-4 py-3 md:py-3.5 rounded-xl transition-all duration-300 font-semibold text-[12px] md:text-[13px] tracking-tight";
            $activeClass = "bg-white/[0.07] text-construction-yellow shadow-xl border border-white/10";
            $inactiveClass = "text-white/40 hover:text-white hover:bg-white/5";
        @endphp

        <div class="pb-2 md:pb-3 px-4 text-[9px] md:text-[10px] font-bold text-white/20 uppercase tracking-[0.2em]">Dashboard</div>

        <a href="{{ route('dashboard.beranda') }}" class="{{ $navItemClass }} {{ $currentRoute == 'dashboard.beranda' ? $activeClass : $inactiveClass }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="transition-transform group-hover:scale-110"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
            <span>Overview</span>
        </a>

        <div class="pt-6 md:pt-10 pb-2 md:pb-3 px-4 text-[9px] md:text-[10px] font-bold text-white/20 uppercase tracking-[0.2em]">Manajemen</div>

        <a href="{{ route('dashboard.proyek') }}" class="{{ $navItemClass }} {{ $currentRoute == 'dashboard.proyek' ? $activeClass : $inactiveClass }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="transition-transform group-hover:scale-110"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="3" x2="9" y2="21"></line></svg>
            <span>Daftar Proyek</span>
        </a>

        <a href="{{ route('dashboard.rab') }}" class="{{ $navItemClass }} {{ $currentRoute == 'dashboard.rab' ? $activeClass : $inactiveClass }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="transition-transform group-hover:scale-110"><path d="M12 2v20"></path><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
            <span>Anggaran (RAB)</span>
        </a>

        <a href="{{ route('dashboard.bahan') }}" class="{{ $navItemClass }} {{ $currentRoute == 'dashboard.bahan' ? $activeClass : $inactiveClass }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="transition-transform group-hover:scale-110"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
            <span>Inventaris Bahan</span>
        </a>

        <div class="pt-6 md:pt-10 pb-2 md:pb-3 px-4 text-[9px] md:text-[10px] font-bold text-white/20 uppercase tracking-[0.2em]">Aset & SDM</div>

        <a href="{{ route('dashboard.armada') }}" class="{{ $navItemClass }} {{ $currentRoute == 'dashboard.armada' ? $activeClass : $inactiveClass }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="transition-transform group-hover:scale-110"><rect x="1" y="3" width="15" height="13" rx="2" ry="2"></rect><path d="M16 8h4l3 3v5h-7V8z"></path><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
            <span>Armada Alat Berat</span>
        </a>

        <a href="{{ route('dashboard.pekerja') }}" class="{{ $navItemClass }} {{ $currentRoute == 'dashboard.pekerja' ? $activeClass : $inactiveClass }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="transition-transform group-hover:scale-110"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
            <span>Tenaga Kerja</span>
        </a>
    </nav>

    <!-- Logout: Subtle Border Control -->
    <div class="px-4 md:px-6 mt-6 md:mt-auto">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full flex items-center justify-center gap-3 px-4 py-3.5 md:py-4 rounded-2xl bg-white/[0.03] border border-white/[0.05] text-white/40 hover:text-white hover:bg-red-500/20 hover:border-red-500/30 transition-all duration-300 text-[10px] md:text-xs font-bold uppercase tracking-widest">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                <span>Keluar Sistem</span>
            </button>
        </form>
    </div>
</div>
