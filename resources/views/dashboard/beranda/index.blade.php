@extends('dashboard.layout')

@section('header', 'Operasional Overview')

@section('content')
<div class="space-y-16 animate-in fade-in duration-1000">
    <!-- Quick Stats: High Contrast -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
        <div class="bg-white p-10 rounded-[30px] border-2 border-black sm:hover:scale-[1.02] transition-all group hover:bg-construction-yellow duration-500 shadow-heavy">
            <p class="text-[10px] font-black text-black/30 uppercase tracking-[0.3em] mb-6 group-hover:text-black transition-colors">Total Proyek</p>
            <div class="flex items-baseline gap-3">
                <h3 class="text-5xl font-black tracking-tighter">24</h3>
                <span class="text-[10px] font-black uppercase tracking-widest text-black/40 group-hover:text-black">Units</span>
            </div>
            <div class="mt-8 flex items-center gap-3 text-[10px] font-black uppercase tracking-widest text-black/40 group-hover:text-black">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline></svg>
                Infrastruktur Aktif
            </div>
        </div>

        <div class="bg-black p-10 rounded-[30px] shadow-heavy group hover:bg-construction-yellow transition-all duration-500">
            <p class="text-[10px] font-black text-white/30 uppercase tracking-[0.3em] mb-6 group-hover:text-black transition-colors">Anggaran Berjalan</p>
            <div class="flex items-baseline gap-2 text-construction-yellow group-hover:text-black transition-colors">
                <span class="text-base font-black italic">Rp</span>
                <h3 class="text-4xl font-black tracking-tighter">4.25 <span class="text-xl">M</span></h3>
            </div>
            <div class="mt-8">
                <div class="w-full bg-white/10 group-hover:bg-black/10 h-2 rounded-full overflow-hidden">
                    <div class="bg-construction-yellow group-hover:bg-black h-full w-[78%] transition-all duration-500"></div>
                </div>
                <p class="text-[9px] font-black text-white/20 group-hover:text-black/40 mt-4 uppercase tracking-[0.3em]">Utilization Threshold</p>
            </div>
        </div>

        <div class="bg-white p-10 rounded-[30px] border-2 border-black group hover:bg-construction-yellow transition-all duration-500 shadow-heavy">
            <p class="text-[10px] font-black text-black/30 uppercase tracking-[0.3em] mb-6 group-hover:text-black transition-colors">Aset Armada</p>
            <h3 class="text-5xl font-black tracking-tighter">15</h3>
            <div class="mt-8 flex items-center gap-3 text-[10px] font-black uppercase tracking-widest text-black/40 group-hover:text-black">
                <div class="w-2.5 h-2.5 bg-black rounded-sm group-hover:bg-black group-hover:animate-pulse"></div>
                Deployment Unit
            </div>
        </div>

        <div class="bg-white p-10 rounded-[30px] border-2 border-black group hover:bg-construction-yellow transition-all duration-500 shadow-heavy">
            <p class="text-[10px] font-black text-black/30 uppercase tracking-[0.3em] mb-6 group-hover:text-black transition-colors">Tenaga Kerja</p>
            <h3 class="text-5xl font-black tracking-tighter">156</h3>
            <div class="mt-8">
                <span class="px-3 py-1.5 bg-black text-construction-yellow text-[9px] font-black rounded-lg uppercase tracking-widest group-hover:bg-black group-hover:text-white transition-all">Verified ID</span>
            </div>
        </div>
    </div>

    <!-- Main Grid -->
    <div class="flex flex-col lg:flex-row gap-12">
        <!-- Project List (62%) -->
        <div class="lg:w-[62%] space-y-8">
            <div class="flex items-center justify-between px-2">
                <h4 class="text-xs font-black uppercase tracking-[0.5em] text-black">Master Project Log</h4>
                <div class="w-12 h-0.5 bg-construction-yellow"></div>
            </div>
            
            <div class="bg-white rounded-[32px] border-2 border-black overflow-hidden shadow-heavy">
                <table class="w-full text-left text-sm">
                    <thead class="bg-black text-construction-yellow font-black uppercase text-[10px] tracking-[0.3em]">
                        <tr>
                            <th class="px-10 py-7">Identification</th>
                            <th class="px-10 py-7">Security Status</th>
                            <th class="px-10 py-7">Progress</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-black/[0.05]">
                        <tr class="hover:bg-construction-yellow/10 transition-colors group">
                            <td class="px-10 py-8">
                                <p class="font-black text-sm uppercase tracking-tight">Warehouse C3 Jakarta</p>
                                <p class="text-[9px] text-black/40 font-bold uppercase mt-1 tracking-widest">Sector: West Java</p>
                            </td>
                            <td class="px-10 py-8">
                                <span class="px-4 py-1.5 border-2 border-black text-black text-[10px] font-black rounded-xl uppercase tracking-widest group-hover:bg-black group-hover:text-construction-yellow transition-all">Active Site</span>
                            </td>
                            <td class="px-10 py-8">
                                <div class="flex items-center gap-5">
                                    <div class="w-32 bg-black/10 h-2 rounded-full overflow-hidden">
                                        <div class="bg-black h-full w-[35%]"></div>
                                    </div>
                                    <span class="text-xs font-black">35%</span>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-construction-yellow/10 transition-colors group">
                            <td class="px-10 py-8">
                                <p class="font-black text-sm uppercase tracking-tight">Zetas HQ Extension</p>
                                <p class="text-[9px] text-black/40 font-bold uppercase mt-1 tracking-widest">Sector: Center</p>
                            </td>
                            <td class="px-10 py-8">
                                <span class="px-4 py-1.5 bg-black text-construction-yellow text-[10px] font-black rounded-xl uppercase tracking-widest">Final Step</span>
                            </td>
                            <td class="px-10 py-8">
                                <div class="flex items-center gap-5">
                                    <div class="w-32 bg-black/10 h-2 rounded-full overflow-hidden">
                                        <div class="bg-construction-yellow h-full w-[92%]"></div>
                                    </div>
                                    <span class="text-xs font-black">92%</span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Activity Feed (38%) -->
        <div class="lg:w-[38%] space-y-8">
            <h4 class="text-xs font-black uppercase tracking-[0.5em] text-black px-2 text-right">Site Intelligence</h4>
            <div class="bg-white rounded-[32px] border-2 border-black p-10 space-y-10 shadow-heavy">
                <div class="flex gap-6 items-start">
                    <div class="w-12 h-12 bg-construction-yellow flex-none rounded-2xl flex items-center justify-center border-2 border-black shadow-apple">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="3"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>
                    </div>
                    <div>
                        <p class="text-xs font-black uppercase tracking-tight">Security Protocol C3</p>
                        <p class="text-[11px] text-black/60 mt-2 font-bold leading-relaxed uppercase">Inspeksi struktural kolom zona B telah diverifikasi oleh mandor.</p>
                        <span class="text-[9px] font-black text-black/20 mt-4 block uppercase tracking-[0.2em]">12 Minutes Ago</span>
                    </div>
                </div>

                <div class="flex gap-6 items-start">
                    <div class="w-12 h-12 bg-black flex-none rounded-2xl flex items-center justify-center border-2 border-black shadow-apple">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#FFCD00" stroke-width="3"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                    </div>
                    <div>
                        <p class="text-xs font-black uppercase tracking-tight text-black">Critical Warning: Logistics</p>
                        <p class="text-[11px] text-black/60 mt-2 font-bold leading-relaxed uppercase tracking-tighter">Gudang Bekasi melaporkan stok semen di bawah ambang batas (20 SAK).</p>
                        <span class="text-[9px] font-black text-black/20 mt-4 block uppercase tracking-[0.2em]">1 Hour Ago</span>
                    </div>
                </div>

                <button class="w-full py-5 bg-black text-construction-yellow rounded-2xl text-[10px] font-black uppercase tracking-[0.4em] hover:bg-construction-yellow hover:text-black transition-all shadow-xl">Audit Log System</button>
            </div>
        </div>
    </div>
</div>
@endsection
