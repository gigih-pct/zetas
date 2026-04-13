@extends('dashboard.layout')

@section('header', 'System Terminal v1.0')

@section('content')
<div class="space-y-12 animate-in fade-in duration-1000">
    <!-- Asymmetrical HUD Header -->
    <div class="flex flex-col lg:flex-row gap-8 items-stretch">
        <!-- Main Cockpit Stats (2/3) -->
        <div class="lg:w-2/3 grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Project Node -->
            <div class="bg-black p-8 rounded-[40px] shadow-heavy flex flex-col justify-between group hover:bg-construction-yellow transition-all duration-700 relative overflow-hidden">
                <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-100 transition-opacity">
                    <span class="text-[60px] font-black text-white group-hover:text-black tracking-tighter leading-none">01</span>
                </div>
                <div>
                    <p class="text-[9px] font-black text-white/30 uppercase tracking-[0.4em] mb-8 group-hover:text-black transition-colors">Project Matrix</p>
                    <h3 class="text-6xl font-black text-construction-yellow tracking-tighter group-hover:text-black transition-colors">24</h3>
                </div>
                <div class="flex items-center gap-4 mt-10">
                    <div class="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></div>
                    <span class="text-[10px] font-black text-white group-hover:text-black uppercase tracking-widest">Active Nodes</span>
                </div>
            </div>

            <!-- Financial Flux (Double Column Weight) -->
            <div class="md:col-span-2 bg-white border-2 border-black p-8 rounded-[40px] shadow-heavy flex flex-col justify-between relative overflow-hidden group">
                <div class="absolute top-0 right-0 p-8">
                    <div class="flex flex-col items-end">
                        <span class="text-[8px] font-black text-black/20 uppercase tracking-[0.4em]">Resource Flow</span>
                        <div class="w-24 h-6 mt-2 matrix-pattern opacity-10"></div>
                    </div>
                </div>
                <div>
                    <p class="text-[9px] font-black text-black/30 uppercase tracking-[0.4em] mb-8">Currency Deployment</p>
                    <div class="flex items-baseline gap-3">
                        <span class="text-xl font-black italic text-black/20">IDR</span>
                        <h3 class="text-5xl font-black text-black tracking-tighter tabular-nums">4.25<span class="text-2xl ml-1 text-black/30">M</span></h3>
                    </div>
                </div>
                <div class="mt-12 space-y-4">
                    <div class="flex justify-between items-center text-[10px] font-black uppercase tracking-widest">
                        <span>Utilization Mask</span>
                        <span class="text-black/40">78.2%</span>
                    </div>
                    <div class="h-4 bg-black/[0.03] rounded-full p-1 border border-black/5">
                        <div class="h-full bg-black rounded-full w-[78%] transition-all duration-1000 shadow-xl"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- System Intelligence Side Panel (1/3) -->
        <div class="lg:w-1/3 bg-black/[0.03] border-2 border-black border-dashed rounded-[40px] p-8 flex flex-col justify-between group hover:border-solid hover:bg-white transition-all duration-500">
            <div>
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-10 h-10 rounded-xl bg-black flex items-center justify-center text-construction-yellow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"></path></svg>
                    </div>
                    <span class="text-[10px] font-black uppercase tracking-[0.3em] text-black">Fleet Intel</span>
                </div>
                <div class="space-y-6">
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] font-bold text-black/40 uppercase tracking-widest">Active Units</span>
                        <span class="text-sm font-black text-black">15 / 18</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] font-bold text-black/40 uppercase tracking-widest">Labor Force</span>
                        <span class="text-sm font-black text-black">156 OPS</span>
                    </div>
                    <div class="flex gap-1 h-1.5 opacity-20">
                        @for($i=0; $i<20; $i++)
                            <div class="flex-1 bg-black rounded-full"></div>
                        @endfor
                    </div>
                </div>
            </div>
            <button class="w-full mt-10 py-5 bg-black text-construction-yellow rounded-2xl font-black text-[10px] uppercase tracking-[0.4em] hover:bg-construction-yellow hover:text-black transition-all shadow-heavy">
                Access Telemetry
            </button>
        </div>
    </div>

    <!-- Secondary Matrix Section -->
    <div class="flex flex-col xl:flex-row gap-12">
        <!-- Site Log Stacks (65%) -->
        <div class="xl:w-2/3 space-y-8">
            <div class="flex items-center gap-6">
                <h4 class="text-xs font-black uppercase tracking-[0.5em] text-black">Tactical Site Registry</h4>
                <div class="flex-1 h-px bg-black opacity-10"></div>
                <span class="text-[9px] font-black text-black/20 uppercase tracking-widest">v.2024.0.1</span>
            </div>

            <div class="space-y-6">
                <!-- Site Strip 01 -->
                <div class="bg-white border-2 border-black rounded-[32px] p-8 flex flex-col md:flex-row items-center gap-10 hover:shadow-heavy transition-all group">
                    <div class="w-20 h-20 bg-black rounded-2xl flex-none flex flex-col items-center justify-center text-construction-yellow group-hover:bg-construction-yellow group-hover:text-black transition-colors">
                        <span class="text-[8px] font-black uppercase tracking-widest opacity-40">Sec</span>
                        <span class="text-2xl font-black">C3</span>
                    </div>
                    <div class="flex-1 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 w-full text-center md:text-left">
                        <div>
                            <p class="text-[10px] font-black text-black/20 uppercase tracking-widest mb-1">Identification</p>
                            <h5 class="text-lg font-black uppercase tracking-tight">Warehouse Jakarta</h5>
                            <p class="text-[9px] font-bold text-black/40 uppercase tracking-widest">Sector: West</p>
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-black/30 uppercase tracking-widest mb-1">Status Protocol</p>
                            <span class="px-3 py-1 bg-black text-white text-[9px] font-black rounded-md uppercase tracking-widest">Structure Verified</span>
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-black/30 uppercase tracking-widest mb-3">Construction Step</p>
                            <div class="flex items-center gap-4">
                                <div class="flex-1 h-1.5 bg-black/5 rounded-full overflow-hidden">
                                    <div class="h-full bg-black w-[35%]"></div>
                                </div>
                                <span class="text-xs font-black">35%</span>
                            </div>
                        </div>
                    </div>
                    <button class="w-full md:w-auto p-4 border-2 border-black rounded-xl hover:bg-black hover:text-white transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </button>
                </div>

                <!-- Site Strip 02 -->
                <div class="bg-white border-2 border-black rounded-[32px] p-8 flex flex-col md:flex-row items-center gap-10 hover:shadow-heavy transition-all group">
                    <div class="w-20 h-20 border-2 border-black rounded-2xl flex-none flex flex-col items-center justify-center text-black group-hover:bg-black group-hover:text-construction-yellow transition-colors">
                        <span class="text-[8px] font-black uppercase tracking-widest opacity-40">Dpt</span>
                        <span class="text-2xl font-black">HQ</span>
                    </div>
                    <div class="flex-1 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 w-full text-center md:text-left">
                        <div>
                            <p class="text-[10px] font-black text-black/20 uppercase tracking-widest mb-1">Identification</p>
                            <h5 class="text-lg font-black uppercase tracking-tight">Zetas HQ Extension</h5>
                            <p class="text-[9px] font-bold text-black/40 uppercase tracking-widest">Sector: Central</p>
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-black/30 uppercase tracking-widest mb-1">Status Protocol</p>
                            <span class="px-3 py-1 bg-construction-yellow text-black text-[9px] font-black rounded-md uppercase tracking-widest">Finishing Mode</span>
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-black/30 uppercase tracking-widest mb-3">Construction Step</p>
                            <div class="flex items-center gap-4">
                                <div class="flex-1 h-1.5 bg-black/5 rounded-full overflow-hidden">
                                    <div class="h-full bg-construction-yellow w-[92%]"></div>
                                </div>
                                <span class="text-xs font-black">92%</span>
                            </div>
                        </div>
                    </div>
                    <button class="w-full md:w-auto p-4 border-2 border-black rounded-xl hover:bg-black hover:text-white transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Terminal Logs (35%) -->
        <div class="xl:w-1/3 bg-black rounded-[40px] p-10 flex flex-col shadow-heavy relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 matrix-pattern opacity-10 -mr-10 -mt-10"></div>
            <h4 class="text-[10px] font-black text-construction-yellow uppercase tracking-[0.5em] mb-10">Live Intelligence Feed</h4>
            
            <div class="flex-1 space-y-10">
                <div class="relative pl-8 border-l-2 border-white/10">
                    <div class="absolute left-[-9px] top-0 w-4 h-4 rounded-full bg-construction-yellow border-4 border-black"></div>
                    <div>
                        <span class="text-[8px] font-black text-white/30 uppercase tracking-widest">12:34 PM — SECURITY</span>
                        <p class="text-xs font-bold text-white mt-2 leading-relaxed uppercase tracking-tight">Kolom struktur zona B Jakarta telah diverifikasi mandor.</p>
                    </div>
                </div>

                <div class="relative pl-8 border-l-2 border-white/10">
                    <div class="absolute left-[-9px] top-0 w-4 h-4 rounded-full bg-red-500 border-4 border-black animate-pulse"></div>
                    <div>
                        <span class="text-[8px] font-black text-red-500 uppercase tracking-widest">11:02 AM — CRITICAL</span>
                        <p class="text-xs font-bold text-white mt-2 leading-relaxed uppercase tracking-tight">Stock semen di gudang Bekasi di bawah threshold (20 SAK).</p>
                    </div>
                </div>

                <div class="relative pl-8 border-l-2 border-white/10 pb-8">
                    <div class="absolute left-[-9px] top-0 w-4 h-4 rounded-full bg-white/20 border-4 border-black"></div>
                    <div>
                        <span class="text-[8px] font-black text-white/30 uppercase tracking-widest">09:15 AM — LOGISTICS</span>
                        <p class="text-xs font-bold text-white mt-2 leading-relaxed uppercase tracking-tight">Armada DT-04 telah berangkat menuju lokasi BSD.</p>
                    </div>
                </div>
            </div>

            <button class="mt-10 w-full py-5 border border-white/10 text-white/40 rounded-2xl font-black text-[9px] uppercase tracking-[0.4em] hover:text-construction-yellow hover:border-construction-yellow transition-all">Download Audit Archive</button>
        </div>
    </div>
</div>
@endsection
