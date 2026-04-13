@extends('dashboard.layout')

@section('header', 'Rencana Anggaran Biaya')

@section('content')
<div class="space-y-16 animate-in slide-in-from-left-5 duration-1000">
    <!-- Budget Overview: Balanced Bi-Color -->
<div class="space-y-10 md:space-y-16 animate-in slide-in-from-left-5 duration-1000">
    <!-- Budget Overview: Balanced Bi-Color -->
    <div class="bg-black rounded-[32px] md:rounded-[40px] shadow-heavy p-8 md:p-14 flex flex-col lg:flex-row gap-10 md:gap-16 items-center justify-between border-4 border-black">
        <div class="space-y-3 md:space-y-4 text-center lg:text-left">
            <h3 class="text-3xl md:text-4xl font-black tracking-tighter text-construction-yellow uppercase italic">Financial Unit</h3>
            <p class="text-[9px] md:text-[11px] font-black text-white/30 uppercase tracking-[0.4em]">Akumulasi Periode {{ date('F Y') }}</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-10 md:gap-20 text-center sm:text-left">
            <div>
                <p class="text-[9px] md:text-[10px] font-black text-white/20 uppercase tracking-[0.3em] mb-3 md:mb-4">Target Allotment</p>
                <div class="text-3xl md:text-4xl font-black tracking-tighter text-white/40 uppercase">Rp 12,840<span class="text-lg md:text-xl">jt</span></div>
            </div>
            <div class="relative group">
                <div class="absolute -top-4 -right-4 md:-top-6 md:-right-6 w-2.5 h-2.5 md:w-3 md:h-3 rounded-sm bg-construction-yellow group-hover:animate-spin"></div>
                <p class="text-[9px] md:text-[10px] font-black text-white/20 uppercase tracking-[0.3em] mb-3 md:mb-4">Execution (Spent)</p>
                <div class="text-3xl md:text-4xl font-black tracking-tighter text-construction-yellow italic">Rp 4,250<span class="text-lg md:text-xl">jt</span></div>
            </div>
        </div>
    </div>

    <!-- Inventory/RAB List: Detailed Table -->
    <div class="bg-white rounded-[32px] md:rounded-[40px] border-2 border-black overflow-hidden shadow-heavy">
        <div class="px-6 md:px-12 py-8 md:py-10 border-b-2 border-black bg-black/[0.02] flex flex-col sm:flex-row items-center justify-between gap-6">
            <h4 class="text-[10px] md:text-[11px] font-black uppercase tracking-[0.3em] md:tracking-[0.4em] text-black">Ledger Anggaran Site</h4>
            <div class="flex gap-4 md:gap-6 w-full sm:w-auto">
                <button class="flex-1 sm:flex-none px-4 md:px-6 py-3 border-2 border-black rounded-xl text-[9px] md:text-[10px] font-black uppercase tracking-widest text-black/40 hover:bg-black hover:text-white transition-all">CSV Audit</button>
                <button class="flex-1 sm:flex-none px-4 md:px-6 py-3 bg-construction-yellow text-black border-2 border-black rounded-xl text-[9px] md:text-[10px] font-black uppercase tracking-widest shadow-apple hover:bg-black hover:text-white transition-all">New Allocation</button>
            </div>
        </div>
        <div class="overflow-x-auto custom-scrollbar">
            <table class="w-full text-left text-sm min-w-[700px] md:min-w-0">
                <thead class="bg-black text-construction-yellow font-black uppercase text-[10px] tracking-[0.3em]">
                    <tr>
                        <th class="px-8 md:px-12 py-5 md:py-7">Prot. Status</th>
                        <th class="px-8 md:px-12 py-5 md:py-7">Identification Site</th>
                        <th class="px-8 md:px-12 py-5 md:py-7 text-right">Target</th>
                        <th class="px-8 md:px-12 py-5 md:py-7 text-right">Consolidated</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-black/[0.05]">
                    <tr class="hover:bg-construction-yellow/10 transition-colors group">
                        <td class="px-8 md:px-12 py-8 md:py-10 text-center sm:text-left">
                            <span class="inline-block px-4 py-1.5 border-2 border-black text-black text-[8px] md:text-[9px] font-black rounded-lg uppercase tracking-widest group-hover:bg-black group-hover:text-construction-yellow transition-all">Authorized</span>
                        </td>
                        <td class="px-8 md:px-12 py-8 md:py-10">
                            <p class="font-black text-sm text-black uppercase tracking-tight">Warehouse C3 Daan Mogot</p>
                            <p class="text-[9px] md:text-[10px] text-black/30 font-black uppercase mt-1 md:mt-2 tracking-widest">Protocol: #RAB-2024-001</p>
                        </td>
                        <td class="px-8 md:px-12 py-8 md:py-10 text-right font-black text-black/30 text-xs">Rp 4.500M</td>
                        <td class="px-8 md:px-12 py-8 md:py-10 text-right">
                            <span class="text-xl md:text-2xl font-black tracking-tighter text-black group-hover:text-construction-yellow transition-colors italic">Rp 1.250</span><span class="text-[10px] md:text-xs font-black text-black/40">jt</span>
                        </td>
                    </tr>
                    <tr class="hover:bg-black transition-all group duration-300">
                        <td class="px-8 md:px-12 py-8 md:py-10 text-center sm:text-left">
                            <span class="inline-block px-4 py-1.5 bg-construction-yellow text-black text-[8px] md:text-[9px] font-black rounded-lg uppercase tracking-widest group-hover:bg-white group-hover:text-black transition-all">Authorized</span>
                        </td>
                        <td class="px-8 md:px-12 py-8 md:py-10">
                            <p class="font-black text-sm text-black uppercase tracking-tight group-hover:text-white transition-colors">Apartemen Green View</p>
                            <p class="text-[9px] md:text-[10px] text-black/30 font-black uppercase mt-1 md:mt-2 tracking-widest group-hover:text-white/40 transition-colors">Protocol: #RAB-2024-042</p>
                        </td>
                        <td class="px-8 md:px-12 py-8 md:py-10 text-right font-black text-black/30 text-xs group-hover:text-white/20 transition-colors">Rp 7.800M</td>
                        <td class="px-8 md:px-12 py-8 md:py-10 text-right">
                            <span class="text-xl md:text-2xl font-black tracking-tighter text-construction-yellow italic">Rp 2.800</span><span class="text-[10px] md:text-xs font-black text-construction-yellow/40">jt</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection
