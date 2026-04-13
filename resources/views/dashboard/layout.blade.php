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
<body class="bg-white text-black font-sans antialiased selection:bg-construction-yellow selection:text-black">
    <div class="flex min-h-screen">
        <!-- Sidebar: Strict Industrial Black -->
        <aside class="w-72 bg-construction-black hidden lg:flex flex-col sticky top-0 h-screen z-20">
            @include('dashboard.sidebar/index')
        </aside>

        <!-- Main Content: Elegant White Hub -->
        <main class="flex-1 flex flex-col min-w-0 bg-white">
            <!-- Topbar: Minimalism -->
            <header class="h-20 bg-white border-b border-black/[0.05] flex items-center justify-between px-12 sticky top-0 z-10">
                <div class="flex items-center gap-8">
                    <button class="lg:hidden text-black/60 hover:text-black transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                    </button>
                    <div class="flex flex-col">
                        <span class="text-[9px] font-black uppercase tracking-[0.4em] text-black/20 leading-none mb-1">Navigation Hub</span>
                        <h1 class="text-sm font-black tracking-tight uppercase">@yield('header', 'Overview')</h1>
                    </div>
                </div>
                
                <div class="flex items-center gap-10">
                    <div class="hidden md:flex items-center gap-3 px-4 py-2 bg-black text-construction-yellow rounded-xl shadow-xl">
                        <span class="w-1.5 h-1.5 rounded-full bg-construction-yellow animate-pulse"></span>
                        <span class="text-[10px] font-black uppercase tracking-[0.2em]">Otoritas Aktif</span>
                    </div>
                    
                    <div class="flex items-center gap-5 pl-10 border-l border-black/[0.05]">
                        <div class="text-right hidden sm:block">
                            <p class="text-[11px] font-black uppercase tracking-tight">{{ Auth::user()->name ?? 'Administrator' }}</p>
                            <p class="text-[9px] text-black/30 font-bold uppercase tracking-widest mt-0.5">Level: Pusat</p>
                        </div>
                        <div class="w-10 h-10 rounded-xl bg-construction-yellow flex items-center justify-center text-black font-black text-sm shadow-xl transition-transform hover:scale-110 cursor-pointer">
                            {{ substr(Auth::user()->name ?? 'Z', 0, 1) }}
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content: Strict Proportions -->
            <div class="p-12 lg:p-16 max-w-[1700px] mx-auto w-full">
                @yield('content')
            </div>
            
            <!-- Footer: Legal Industrial -->
            <footer class="mt-auto px-12 py-10 border-t border-black/[0.03] text-black/20 text-[9px] font-black uppercase tracking-[0.4em] flex justify-between">
                <p>&copy; {{ date('Y') }} ZETAS Build & Construct &mdash; Proprietary Bi-Color Interface</p>
                <div class="flex gap-8">
                    <a href="#" class="hover:text-black transition-colors border-b border-transparent hover:border-construction-yellow">Security</a>
                    <a href="#" class="hover:text-black transition-colors border-b border-transparent hover:border-construction-yellow">Node ID: SC-01</a>
                </div>
            </footer>
        </main>
    </div>
</body>
</html>
