@extends('dashboard.layout')

@section('header', 'Manajemen Bahan Baku')

@section('content')
<div class="space-y-10 md:space-y-16 animate-in fade-in duration-1000">
    <div class="flex flex-col lg:flex-row gap-10 md:gap-12">
        <!-- Inventory List (62%) -->
        <div class="lg:w-[62%] space-y-6 md:space-y-10">
            <h4 class="text-[10px] md:text-[11px] font-black uppercase tracking-[0.3em] md:tracking-[0.5em] text-black px-2 border-l-4 border-construction-yellow">Stock Inventory Ledger</h4>
            
            <div class="bg-white rounded-[32px] md:rounded-[40px] border-2 border-black overflow-hidden shadow-heavy">
                <div class="overflow-x-auto custom-scrollbar">
                    <table class="w-full text-left text-sm min-w-[600px] md:min-w-0">
                        <thead class="bg-black text-construction-yellow font-black uppercase text-[10px] tracking-[0.3em]">
                            <tr>
                                <th class="px-8 md:px-12 py-5 md:py-8">Material Unit</th>
                                <th class="px-8 md:px-12 py-5 md:py-8 text-center">Qty</th>
                                <th class="px-8 md:px-12 py-5 md:py-8">Security Protocol</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-black/[0.05]">
                            <tr class="hover:bg-construction-yellow/10 transition-colors group">
                                <td class="px-8 md:px-12 py-6 md:py-10">
                                    <p class="font-black text-sm text-black uppercase tracking-tight group-hover:tracking-widest transition-all">Semen Padang Type 1</p>
                                    <p class="text-[9px] md:text-[10px] text-black/30 font-black uppercase mt-1 md:mt-2 tracking-widest">Storage: HQ-Main</p>
                                </td>
                                <td class="px-8 md:px-12 py-6 md:py-10 text-center">
                                    <span class="text-2xl md:text-3xl font-black tracking-tighter">450</span>
                                    <span class="text-[9px] md:text-[10px] font-black text-black/40 uppercase ml-1 md:ml-2 tracking-widest">Sak</span>
                                </td>
                                <td class="px-8 md:px-12 py-6 md:py-10">
                                    <div class="flex items-center gap-3 md:gap-4">
                                        <div class="flex-1 bg-black/10 h-2 md:h-2.5 rounded-full overflow-hidden max-w-[80px] md:max-w-[120px]">
                                            <div class="bg-black h-full w-[80%] transition-all duration-1000"></div>
                                        </div>
                                        <span class="text-[9px] md:text-[10px] font-black text-black uppercase tracking-widest">Optimized</span>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-black transition-all duration-300 group">
                                <td class="px-8 md:px-12 py-6 md:py-10">
                                    <p class="font-black text-sm text-black uppercase tracking-tight group-hover:text-white transition-colors">Besi Tulangan 12mm</p>
                                    <p class="text-[9px] md:text-[10px] text-black/30 font-black uppercase mt-1 md:mt-2 tracking-widest group-hover:text-white/40">Storage: Site-BKS</p>
                                </td>
                                <td class="px-8 md:px-12 py-6 md:py-10 text-center">
                                    <span class="text-2xl md:text-3xl font-black tracking-tighter group-hover:text-construction-yellow transition-colors">85</span>
                                    <span class="text-[9px] md:text-[10px] font-black text-black/40 uppercase ml-1 md:ml-2 tracking-widest group-hover:text-white/20">Batang</span>
                                </td>
                                <td class="px-8 md:px-12 py-6 md:py-10">
                                    <div class="flex items-center gap-3 md:gap-4">
                                        <div class="flex-1 bg-black/10 group-hover:bg-white/10 h-2 md:h-2.5 rounded-full overflow-hidden max-w-[80px] md:max-w-[120px]">
                                            <div class="bg-construction-yellow h-full w-[25%] transition-all duration-1000 shadow-[0_0_15px_#FFCD00]"></div>
                                        </div>
                                        <span class="text-[9px] md:text-[10px] font-black text-construction-yellow uppercase tracking-widest">Warning</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Procurement (38%) -->
        <div class="lg:w-[38%] space-y-6 md:space-y-10">
            <h4 class="text-[10px] md:text-[11px] font-black uppercase tracking-[0.3em] md:tracking-[0.5em] text-black px-2 text-center md:text-right border-construction-yellow border-b-2 md:border-b-0 md:border-r-4 pb-2 md:pb-0">Procurement Hub</h4>
            
            <div class="bg-white rounded-[32px] md:rounded-[40px] border-2 border-black p-6 md:p-12 space-y-8 md:space-y-12 shadow-heavy">
                <div class="relative p-6 md:p-8 bg-black border-2 border-black rounded-[24px] md:rounded-[30px] flex items-center gap-4 md:gap-8 group overflow-hidden">
                    <div class="absolute inset-0 bg-construction-yellow/5 group-hover:bg-construction-yellow/10 transition-colors"></div>
                    <div class="w-10 h-10 md:w-14 md:h-14 rounded-xl md:rounded-2xl bg-construction-yellow flex items-center justify-center flex-none shadow-[0_0_20px_rgba(255,205,0,0.3)] border-2 border-black z-10">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="4" class="md:w-6 md:h-6"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
                    </div>
                    <div class="z-10 overflow-hidden">
                        <p class="text-xs md:text-sm font-black text-construction-yellow uppercase tracking-tight truncate">Pasir Beton Cor</p>
                        <p class="text-[9px] md:text-[10px] font-black text-white/40 uppercase tracking-widest mt-1 md:mt-2 group-hover:text-white transition-colors truncate">Allotment: 12 M3</p>
                    </div>
                    <button class="ml-auto w-10 h-10 md:w-12 md:h-12 bg-construction-yellow border-2 border-black rounded-xl md:rounded-2xl flex items-center justify-center shadow-xl hover:scale-110 transition-all z-10 flex-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="4" class="md:w-5 md:h-5"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                    </button>
                </div>

                <div class="space-y-4 md:space-y-6">
                    <h5 class="text-[8px] md:text-[9px] font-black text-black/20 uppercase tracking-[0.4em]">Core Operations</h5>
                    <div class="grid grid-cols-2 gap-4 md:gap-6">
                        <button class="p-4 md:p-8 bg-black rounded-xl md:rounded-[24px] border-2 border-black text-center group hover:bg-construction-yellow transition-all duration-300">
                            <p class="text-[9px] md:text-[10px] font-black uppercase tracking-widest text-construction-yellow group-hover:text-black transition-colors">Buy Logic</p>
                        </button>
                        <button class="p-4 md:p-8 bg-white border-2 border-black rounded-xl md:rounded-[24px] text-center group hover:bg-black transition-all duration-300">
                            <p class="text-[9px] md:text-[10px] font-black uppercase tracking-widest text-black/40 group-hover:text-construction-yellow transition-colors">Transfer</p>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
