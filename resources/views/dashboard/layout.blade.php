<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard' }} | Zetas Build & Construct</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        ::selection {
            background-color: #FFCD00;
            color: #000;
        }
    </style>
</head>
<body class="bg-white text-black font-sans antialiased selection:bg-construction-yellow selection:text-black" x-data="{ mobileMenuOpen: false, userDropdownOpen: false }">
    <div class="flex min-h-screen relative">
        <!-- Mobile Sidebar Overlay -->
        <div 
            x-show="mobileMenuOpen" 
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-black/60 z-40 lg:hidden backdrop-blur-sm"
            @click="mobileMenuOpen = false"
        ></div>

        <!-- Mobile Sidebar Drawer -->
        <aside 
            x-show="mobileMenuOpen"
            x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="-translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full"
            class="fixed inset-y-0 left-0 w-72 bg-construction-black z-50 lg:hidden flex flex-col shadow-2xl"
        >
            <div class="flex justify-end p-6">
                <button @click="mobileMenuOpen = false" class="text-white/40 hover:text-white transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            @include('dashboard.sidebar/index')
        </aside>

        <!-- Sidebar: Strict Industrial Black (Desktop) -->
        <aside class="w-72 bg-construction-black hidden lg:flex flex-col sticky top-0 h-screen z-20">
            @include('dashboard.sidebar/index')
        </aside>

        <!-- Main Content: Elegant White Hub -->
        <main class="flex-1 flex flex-col min-w-0 bg-white">
            <!-- Topbar: Minimalism -->
            <header class="h-20 bg-white border-b border-black/[0.05] flex items-center justify-between px-6 md:px-12 sticky top-0 z-10">
                <div class="flex items-center gap-4 md:gap-8">
                    <button @click="mobileMenuOpen = true" class="lg:hidden text-black/60 hover:text-black transition-colors p-2 -ml-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                    </button>
                    <div class="flex flex-col">
                        <span class="text-[9px] font-black uppercase tracking-[0.4em] text-black/20 leading-none mb-1">Navigation Hub</span>
                        <h1 class="text-xs md:text-sm font-black tracking-tight uppercase truncate max-w-[150px] md:max-w-none">@yield('header', 'Overview')</h1>
                    </div>
                </div>
                
                <div class="flex items-center gap-4 md:gap-10">
                    <div class="hidden md:flex items-center gap-3 px-4 py-2 bg-black text-construction-yellow rounded-xl shadow-xl">
                        <span class="w-1.5 h-1.5 rounded-full bg-construction-yellow animate-pulse"></span>
                        <span class="text-[10px] font-black uppercase tracking-[0.2em]">Otoritas Aktif</span>
                    </div>
                    
                    <div class="flex items-center gap-3 md:gap-5 pl-4 md:pl-10 border-l border-black/[0.05] relative">
                        <div class="text-right hidden sm:block">
                            <p class="text-[10px] md:text-[11px] font-black uppercase tracking-tight truncate max-w-[100px]">{{ Auth::user()->name ?? 'Administrator' }}</p>
                            <p class="text-[9px] text-black/30 font-bold uppercase tracking-widest mt-0.5">Level: Pusat</p>
                        </div>
                        <button 
                            @click="userDropdownOpen = !userDropdownOpen"
                            @click.away="userDropdownOpen = false"
                            class="w-8 h-8 md:w-10 md:h-10 rounded-lg md:rounded-xl bg-construction-yellow flex items-center justify-center text-black font-black text-xs md:text-sm shadow-xl transition-transform hover:scale-110 cursor-pointer outline-none focus:ring-2 focus:ring-black/5"
                        >
                            {{ substr(Auth::user()->name ?? 'Z', 0, 1) }}
                        </button>

                        <!-- User Dropdown Menu -->
                        <div 
                            x-show="userDropdownOpen"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-95"
                            class="absolute top-full right-0 mt-4 w-64 bg-white border-2 border-black rounded-3xl shadow-heavy py-4 z-50"
                            x-cloak
                        >
                            <div class="px-6 py-4 border-b border-black/5 mb-2 sm:hidden text-left">
                                <p class="text-[11px] font-black uppercase text-black">{{ Auth::user()->name ?? 'Administrator' }}</p>
                                <p class="text-[9px] text-black/30 font-bold uppercase tracking-widest mt-0.5">Level: Pusat</p>
                            </div>
                            
                            <a href="{{ route('profile.edit') }}" class="flex items-center gap-4 px-6 py-3 text-black/60 hover:text-black hover:bg-black/[0.03] transition-colors group">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="transition-transform group-hover:scale-110"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                <span class="text-[11px] font-black uppercase tracking-widest">Profile Settings</span>
                            </a>
                            
                            <div class="mx-6 my-2 border-t border-black/5"></div>
                            
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full flex items-center gap-4 px-6 py-3 text-red-500 hover:bg-red-50 transition-colors group text-left">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="transition-transform group-hover:scale-110"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                    <span class="text-[11px] font-black uppercase tracking-widest">Keluar Sistem</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content: Strict Proportions -->
            <div class="p-6 md:p-10 lg:p-16 max-w-[1700px] mx-auto w-full">
                @yield('content')
            </div>
            
            <!-- Footer: Legal Industrial -->
            <footer class="mt-auto px-6 md:px-12 py-10 border-t border-black/[0.03] text-black/20 text-[9px] font-black uppercase tracking-[0.4em] flex flex-col md:flex-row justify-between gap-6">
                <p class="text-center md:text-left">&copy; {{ date('Y') }} ZETAS Build & Construct &mdash; Proprietary Bi-Color Interface</p>
                <div class="flex justify-center md:justify-end gap-8">
                    <a href="#" class="hover:text-black transition-colors border-b border-transparent hover:border-construction-yellow">Security</a>
                    <a href="#" class="hover:text-black transition-colors border-b border-transparent hover:border-construction-yellow">Node ID: SC-01</a>
                </div>
            </footer>
        </main>
    </div>
</body>
</html>
