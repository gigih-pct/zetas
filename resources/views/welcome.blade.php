<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ZETAS | Build & Construct Official</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=outfit:400,600,800,900" rel="stylesheet" />
        <script src="https://unpkg.com/@phosphor-icons/web"></script>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body { font-family: 'Outfit', sans-serif; }
            .matrix-pattern {
                background-image: radial-gradient(rgba(0,0,0,0.1) 1px, transparent 0);
                background-size: 30px 30px;
            }
            [x-cloak] { display: none !important; }
        </style>
    </head>
    <body class="bg-white text-black antialiased selection:bg-construction-yellow selection:text-black">
        
        <!-- Navigation -->
        <nav x-data="{ scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 20)" :class="scrolled ? 'bg-white/90 backdrop-blur-md py-4 shadow-heavy' : 'bg-transparent py-8'" class="fixed w-full z-50 transition-all duration-500 px-10">
            <div class="max-w-7xl mx-auto flex justify-between items-center">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-black text-construction-yellow flex items-center justify-center rounded-2xl shadow-heavy">
                        <i class="ph-bold ph-sketch-logo text-2xl"></i>
                    </div>
                    <span class="text-2xl font-black uppercase tracking-tighter">ZETAS <span class="text-construction-yellow">BUILD</span></span>
                </div>
                
                <div class="hidden lg:flex items-center gap-12 font-bold text-[10px] uppercase tracking-[0.3em]">
                    <a href="#metrics" class="hover:text-construction-yellow transition-colors">Operations</a>
                    <a href="#projects" class="hover:text-construction-yellow transition-colors">Projects</a>
                    <a href="#inquiry" class="hover:text-construction-yellow transition-colors">Contact</a>
                </div>

                <div class="flex items-center gap-6">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-8 py-4 bg-black text-white rounded-full font-bold text-[10px] uppercase tracking-widest shadow-heavy hover:bg-construction-yellow hover:text-black transition-all">Command Center</a>
                    @else
                        <a href="{{ route('login') }}" class="font-bold text-[10px] uppercase tracking-widest hover:text-construction-yellow transition-colors">Login</a>
                        <a href="{{ route('register') }}" class="px-8 py-4 bg-black text-white rounded-full font-bold text-[10px] uppercase tracking-widest shadow-heavy hover:bg-construction-yellow hover:text-black transition-all">Join Protocol</a>
                    @endauth
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="relative min-h-screen flex items-center pt-20 overflow-hidden">
            <div class="absolute inset-0 matrix-pattern opacity-50"></div>
            <div class="absolute -top-40 -right-40 w-[800px] h-[800px] bg-construction-yellow/10 rounded-full blur-[120px]"></div>
            
            <div class="max-w-7xl mx-auto px-10 relative z-10">
                <div class="flex flex-col lg:flex-row items-center gap-20">
                    <div class="lg:w-2/3 space-y-10">
                        <div class="inline-flex items-center gap-4 px-6 py-2 bg-black text-[10px] text-construction-yellow font-black uppercase tracking-[0.4em] rounded-full">
                            <span class="relative flex h-2 w-2">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-construction-yellow opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-construction-yellow"></span>
                            </span>
                            Active Infrastructure Ready
                        </div>
                        <h1 class="text-7xl lg:text-9xl font-black uppercase tracking-tighter leading-[0.85] text-black">
                            Architecting <br> <span class="text-neutral-200">the Future</span> <br> Matrix
                        </h1>
                        <p class="text-lg text-black/40 font-medium max-w-xl leading-relaxed">
                            A high-performance construction management ecosystem designed for precision infrastructure, logistics orchestration, and human capital mastery.
                        </p>
                        <div class="flex gap-6 pt-6">
                            <a href="{{ route('register') }}" class="px-12 py-6 bg-black text-white rounded-[40px] font-black text-xs uppercase tracking-[0.4em] shadow-heavy hover:bg-construction-yellow hover:text-black transition-all">Initialize</a>
                            <a href="#metrics" class="px-12 py-6 border-4 border-black text-black rounded-[40px] font-black text-xs uppercase tracking-[0.4em] hover:bg-black hover:text-white transition-all">System Specs</a>
                        </div>
                    </div>
                    
                    <div class="lg:w-1/3 relative hidden lg:block">
                        <div class="w-full aspect-square border-8 border-black rounded-[64px] relative bg-neutral-100 overflow-hidden group">
                           <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-10 transition-opacity"></div>
                           <div class="p-12 space-y-8">
                               <div class="w-16 h-1 w-black"></div>
                               <div class="space-y-4">
                                   <div class="text-[10px] font-black uppercase tracking-[0.5em] text-black/20">System ID</div>
                                   <div class="text-4xl font-black tracking-tighter">ZT-BUILD V1.0</div>
                               </div>
                               <div class="space-y-4 pt-10">
                                   <div class="flex justify-between text-[10px] font-black uppercase">
                                       <span>Structural Integrity</span>
                                       <span>99.9%</span>
                                   </div>
                                   <div class="h-2 bg-black/5 rounded-full overflow-hidden">
                                       <div class="h-full bg-black w-[99%]"></div>
                                   </div>
                               </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Live Metrics -->
        <section id="metrics" class="py-40 bg-black text-white relative">
            <div class="max-w-7xl mx-auto px-10">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-20">
                    <div class="space-y-6 group">
                        <div class="text-construction-yellow text-7xl font-black tabular-nums tracking-tighter group-hover:scale-110 transition-transform origin-left">{{ $stats['projects'] }}</div>
                        <div>
                            <h4 class="text-xl font-black uppercase tracking-widest mb-2">Active Projects</h4>
                            <p class="text-xs text-white/40 uppercase tracking-[0.2em] leading-loose">Large-scale infrastructure nodes currently under construction orchestration.</p>
                        </div>
                    </div>
                    <div class="space-y-6 group">
                        <div class="text-construction-yellow text-7xl font-black tabular-nums tracking-tighter group-hover:scale-110 transition-transform origin-left">{{ $stats['workers'] }}</div>
                        <div>
                            <h4 class="text-xl font-black uppercase tracking-widest mb-2">Operatives</h4>
                            <p class="text-xs text-white/40 uppercase tracking-[0.2em] leading-loose">Skilled personnel dossiers active within the site management matrix.</p>
                        </div>
                    </div>
                    <div class="space-y-6 group">
                        <div class="text-construction-yellow text-7xl font-black tabular-nums tracking-tighter group-hover:scale-110 transition-transform origin-left">{{ $stats['fleets'] }}</div>
                        <div>
                            <h4 class="text-xl font-black uppercase tracking-widest mb-2">Fleet Assets</h4>
                            <p class="text-xs text-white/40 uppercase tracking-[0.2em] leading-loose">Operational heavy equipment units ready for deployment protocols.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Projects Grid -->
        <section id="projects" class="py-40 bg-neutral-50 overflow-hidden relative">
            <div class="max-w-7xl mx-auto px-10">
                <div class="flex justify-between items-end mb-24">
                    <div class="space-y-4">
                        <h4 class="text-[10px] font-black text-construction-yellow uppercase tracking-[0.8em]">Operational Archive</h4>
                        <h2 class="text-6xl font-black uppercase tracking-tighter">Current Build <br> <span class="text-black/20">Protocols</span></h2>
                    </div>
                    <a href="{{ route('login') }}" class="hidden lg:flex items-center gap-4 text-[10px] font-black uppercase tracking-[0.4em] group">
                        Full Matrix Registry
                        <div class="w-12 h-12 bg-black text-white rounded-full flex items-center justify-center group-hover:bg-construction-yellow group-hover:text-black transition-all">
                            <i class="ph ph-arrow-right"></i>
                        </div>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                    @foreach($recentProjects as $project)
                    <div class="bg-white border-2 border-black rounded-[48px] overflow-hidden group hover:shadow-heavy transition-all duration-700">
                        <div class="h-64 bg-neutral-200 relative overflow-hidden">
                            <div class="absolute inset-0 bg-black/5 group-hover:bg-construction-yellow/20 transition-all"></div>
                            <div class="absolute top-8 left-8 bg-black text-white px-4 py-1 rounded-full text-[8px] font-black uppercase tracking-widest">P-{{ $project->id }}</div>
                        </div>
                        <div class="p-10 space-y-6">
                            <h3 class="text-2xl font-black uppercase tracking-tighter group-hover:text-construction-yellow transition-colors leading-tight">{{ $project->name }}</h3>
                            <div class="flex items-center gap-3 text-[9px] font-black uppercase text-black/40">
                                <span class="w-1.5 h-1.5 rounded-full bg-construction-yellow"></span>
                                {{ $project->status }} — {{ $project->location }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Inquiry Form -->
        <section id="inquiry" class="py-40 relative">
            <div class="max-w-3xl mx-auto px-10 text-center space-y-20">
                <div class="space-y-6">
                    <h2 class="text-7xl font-black uppercase tracking-tighter">Contact Protocol</h2>
                    <p class="text-black/40 font-medium tracking-wide">Request a system integration for your next large-scale project node.</p>
                </div>
                
                <form class="space-y-8 text-left" x-data="{ sent: false }" @submit.prevent="sent = true">
                    <div x-show="sent" x-cloak class="p-10 bg-black text-construction-yellow rounded-[40px] shadow-heavy text-center mb-10 animate-in fade-in slide-in-from-bottom-5">
                       <i class="ph-bold ph-check-circle text-5xl mb-4"></i>
                       <h4 class="text-2xl font-black uppercase tracking-tighter">Transmission Successful</h4>
                       <p class="text-[10px] uppercase tracking-widest opacity-60">Wait for administrative response</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-3">
                            <label class="text-[9px] font-black uppercase tracking-widest ml-4">Entity Identity</label>
                            <input type="text" placeholder="Full Name" required class="w-full px-8 py-5 rounded-[24px] border-4 border-black focus:bg-construction-yellow/10 outline-none font-bold text-xs uppercase transition-all">
                        </div>
                        <div class="space-y-3">
                            <label class="text-[9px] font-black uppercase tracking-widest ml-4">Terminal Address</label>
                            <input type="email" placeholder="Email@domain.com" required class="w-full px-8 py-5 rounded-[24px] border-4 border-black focus:bg-construction-yellow/10 outline-none font-bold text-xs uppercase transition-all">
                        </div>
                    </div>
                    <div class="space-y-3">
                        <label class="text-[9px] font-black uppercase tracking-widest ml-4">Inquiry Parameters</label>
                        <textarea rows="4" placeholder="Describe Project Scope" required class="w-full px-8 py-5 rounded-[32px] border-4 border-black focus:bg-construction-yellow/10 outline-none font-bold text-xs uppercase transition-all resize-none"></textarea>
                    </div>
                    <button type="submit" class="w-full py-8 bg-black text-white rounded-[40px] font-black text-xs uppercase tracking-[0.5em] shadow-heavy hover:bg-construction-yellow hover:text-black transition-all">Execute Transmission</button>
                </form>
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-20 border-t-2 border-black/5 bg-neutral-50">
            <div class="max-w-7xl mx-auto px-10 flex flex-col md:flex-row justify-between items-center gap-10 text-[9px] font-black uppercase tracking-[0.4em] text-black/30">
                <div class="flex items-center gap-4">
                    <div class="w-8 h-8 bg-black text-construction-yellow flex items-center justify-center rounded-xl">
                        <i class="ph-bold ph-sketch-logo"></i>
                    </div>
                    <span>Zetas Build & Construct © 2026</span>
                </div>
                <div class="flex gap-12">
                    <a href="#" class="hover:text-black">Privacy Protocol</a>
                    <a href="#" class="hover:text-black">Terms of Operation</a>
                    <a href="#" class="hover:text-black">System Status</a>
                </div>
            </div>
        </footer>

    </body>
</html>
