@extends('dashboard.layout')

@section('header', 'Architectural Log')

@section('content')
<div class="space-y-16 animate-in slide-in-from-right-10 duration-1000">
    <!-- Blueprint Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-10 relative">
        <div class="hidden lg:block absolute -left-16 bottom-0 w-8 h-32 matrix-pattern opacity-10"></div>
        <div>
            <div class="flex items-center gap-4 mb-4">
                <span class="px-3 py-1 bg-black text-construction-yellow text-[9px] font-bold uppercase tracking-[0.3em] rounded">Site Management</span>
                <div class="h-px w-12 bg-black opacity-10"></div>
            </div>
            <h3 class="text-4xl font-black tracking-tighter text-black uppercase leading-tight">Project Execution<br>Blueprint</h3>
            <p class="text-[10px] font-black text-black/20 uppercase tracking-[0.5em] mt-6 italic">Secure Site Monitoring / Level 4 Access</p>
        </div>
        <button class="w-full md:w-auto px-12 py-6 bg-construction-yellow text-black font-black rounded-3xl text-[10px] uppercase tracking-[0.4em] shadow-heavy hover:bg-black hover:text-white transition-all transform active:scale-95 border-2 border-black flex items-center justify-center gap-4 group">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" class="group-hover:rotate-180 transition-transform"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            Initialize Project
        </button>
    </div>

    <!-- The Architectural Strip View -->
    <div class="space-y-0 relative">
        <!-- Vertical Measuring Line -->
        <div class="absolute left-6 md:left-12 top-0 bottom-0 w-px bg-black/10 border-l border-dashed border-black"></div>

        <!-- Project Strip 01 -->
        <div class="relative pl-16 md:pl-28 py-12 group">
            <!-- Node Marker -->
            <div class="absolute left-4 md:left-10 top-16 w-4 h-4 rounded-full bg-black border-4 border-construction-yellow z-10 shadow-xl group-hover:scale-125 transition-transform"></div>
            
            <div class="bg-white border-2 border-black rounded-[40px] overflow-hidden hover:shadow-heavy transition-all duration-700 flex flex-col xl:flex-row">
                <!-- Visual Sector (Blueprint Grid) -->
                <div class="xl:w-80 bg-black flex flex-col justify-between p-10 relative overflow-hidden group-hover:bg-construction-yellow transition-colors duration-500">
                    <div class="w-full h-full absolute inset-0 bg-[radial-gradient(#ffffff_1px,transparent_1px)] [background-size:20px_20px] opacity-10 group-hover:opacity-20 group-hover:bg-[radial-gradient(#000000_1px,transparent_1px)]"></div>
                    <div class="relative z-10 flex flex-col h-full">
                        <span class="text-[9px] font-black text-white/30 group-hover:text-black/30 uppercase tracking-[0.4em] mb-auto">NODE ZT-01</span>
                        <div class="mt-20">
                            <span class="text-4xl font-black text-construction-yellow group-hover:text-black tracking-tighter">35%</span>
                            <p class="text-[9px] font-black text-white group-hover:text-black uppercase tracking-widest mt-2">Completion Mask</p>
                        </div>
                    </div>
                </div>
                
                <!-- Content Sector -->
                <div class="flex-1 p-10 md:p-14 space-y-10">
                    <div class="flex flex-col md:flex-row justify-between items-start gap-6">
                        <div>
                            <h4 class="text-2xl font-black text-black uppercase tracking-tighter mb-2 group-hover:text-construction-yellow transition-colors">Warehouse C3 Jakarta</h4>
                            <div class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2" class="opacity-30"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                <span class="text-[10px] font-bold text-black/40 uppercase tracking-widest">Jl. Daan Mogot, Jakarta Barat</span>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="px-6 py-2 border-2 border-black rounded-xl text-[9px] font-black uppercase tracking-widest text-black">Active Zone</div>
                            <div class="px-6 py-2 bg-black text-white rounded-xl text-[9px] font-black uppercase tracking-widest">Priority 01</div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 pt-10 border-t border-black/5">
                        <div class="space-y-4">
                            <p class="text-[10px] font-black text-black/20 uppercase tracking-widest">Team Deployment</p>
                            <div class="flex -space-x-4">
                                @for($i=0; $i<4; $i++)
                                    <div class="w-12 h-12 rounded-full border-4 border-white bg-black flex items-center justify-center text-[10px] text-construction-yellow font-black shadow-xl">OP</div>
                                @endfor
                                <div class="w-12 h-12 rounded-full border-4 border-white bg-construction-yellow flex items-center justify-center text-[10px] text-black font-black shadow-xl">+12</div>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <p class="text-[10px] font-black text-black/20 uppercase tracking-widest">Next Milestone</p>
                            <div class="space-y-2">
                                <p class="text-xs font-black uppercase">Pondasi Zona C-4</p>
                                <p class="text-[9px] font-bold text-black/40 uppercase tracking-widest">TGT: 24 Oct 2024</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-end gap-6">
                            <button class="px-10 py-5 bg-black text-construction-yellow rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-construction-yellow hover:text-black transition-all shadow-heavy">Site Command</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Project Strip 02 -->
        <div class="relative pl-16 md:pl-28 py-12 group">
            <!-- Node Marker -->
            <div class="absolute left-4 md:left-10 top-16 w-12 h-0.5 bg-black z-10"></div>
            
            <div class="bg-black border-2 border-black rounded-[40px] overflow-hidden hover:shadow-heavy transition-all duration-700 flex flex-col xl:flex-row">
                <!-- Visual Sector (High Contrast Grey) -->
                <div class="xl:w-80 bg-white flex flex-col justify-between p-10 relative overflow-hidden group-hover:bg-construction-yellow transition-colors duration-500">
                    <div class="w-full h-full absolute inset-0 matrix-pattern opacity-10"></div>
                    <div class="relative z-10 flex flex-col h-full">
                        <span class="text-[9px] font-black text-black/30 uppercase tracking-[0.4em] mb-auto">NODE ZT-42</span>
                        <div class="mt-20">
                            <span class="text-4xl font-black text-black tracking-tighter">92%</span>
                            <p class="text-[9px] font-black text-black/40 uppercase tracking-widest mt-2">Completion Mask</p>
                        </div>
                    </div>
                </div>
                
                <!-- Content Sector (Dark Mode) -->
                <div class="flex-1 p-10 md:p-14 space-y-10 text-white">
                    <div class="flex flex-col md:flex-row justify-between items-start gap-6">
                        <div>
                            <h4 class="text-2xl font-black uppercase tracking-tighter mb-2 group-hover:text-construction-yellow transition-colors">Zetas HQ Extension</h4>
                            <div class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" class="opacity-30"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                <span class="text-[10px] font-bold text-white/40 uppercase tracking-widest">BSD City, Tangerang</span>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="px-6 py-2 border-2 border-white/20 rounded-xl text-[9px] font-black uppercase tracking-widest text-construction-yellow">Verification</div>
                            <div class="px-6 py-2 bg-construction-yellow text-black rounded-xl text-[9px] font-black uppercase tracking-widest">Final Phase</div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 pt-10 border-t border-white/10">
                        <div class="space-y-4">
                            <p class="text-[10px] font-black text-white/20 uppercase tracking-widest">Team Deployment</p>
                            <div class="flex -space-x-4">
                                @for($i=0; $i<3; $i++)
                                    <div class="w-12 h-12 rounded-full border-4 border-black bg-white flex items-center justify-center text-[10px] text-black font-black shadow-xl">ENG</div>
                                @endfor
                            </div>
                        </div>
                        <div class="space-y-4">
                            <p class="text-[10px] font-black text-white/20 uppercase tracking-widest">Handover Status</p>
                            <div class="space-y-2">
                                <p class="text-xs font-black uppercase text-construction-yellow">Site Clearing Complete</p>
                                <p class="text-[9px] font-bold text-white/40 uppercase tracking-widest">Status: Ready for Audit</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-end gap-6">
                            <button class="px-10 py-5 bg-white text-black rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-construction-yellow transition-all shadow-heavy">Verify Blueprint</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
