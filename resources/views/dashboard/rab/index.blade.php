@extends('dashboard.layout')

@section('header', 'Rencana Anggaran Biaya')

@section('content')
<div class="space-y-16 animate-in slide-in-from-left-5 duration-1000">
    <!-- Budget Overview: Balanced Bi-Color -->
    <div class="bg-black rounded-[40px] shadow-heavy p-14 flex flex-col md:flex-row gap-16 items-center justify-between border-4 border-black">
        <div class="space-y-4">
            <h3 class="text-4xl font-black tracking-tighter text-construction-yellow uppercase italic">Financial Unit</h3>
            <p class="text-[11px] font-black text-white/30 uppercase tracking-[0.4em]">Akumulasi Periode {{ date('F Y') }}</p>
        </div>
        <div class="flex gap-20">
            <div>
                <p class="text-[10px] font-black text-white/20 uppercase tracking-[0.3em] mb-4">Target Allotment</p>
                <div class="text-4xl font-black tracking-tighter text-white/40 uppercase">Rp 12,840<span class="text-xl">jt</span></div>
            </div>
            <div class="relative group">
                <div class="absolute -top-6 -right-6 w-3 h-3 rounded-sm bg-construction-yellow group-hover:animate-spin"></div>
                <p class="text-[10px] font-black text-white/20 uppercase tracking-[0.3em] mb-4">Execution (Spent)</p>
                <div class="text-4xl font-black tracking-tighter text-construction-yellow italic">Rp 4,250<span class="text-xl">jt</span></div>
            </div>
        </div>
    </div>

    <!-- Inventory/RAB List: Detailed Table -->
    <div class="bg-white rounded-[40px] border-2 border-black overflow-hidden shadow-heavy">
        <div class="px-12 py-10 border-b-2 border-black bg-black/[0.02] flex items-center justify-between">
            <h4 class="text-[11px] font-black uppercase tracking-[0.4em] text-black">Ledger Anggaran Site</h4>
            <div class="flex gap-6">
                <button class="px-6 py-3 border-2 border-black rounded-xl text-[10px] font-black uppercase tracking-widest text-black/40 hover:bg-black hover:text-white transition-all">CSV Audit</button>
                <button class="px-6 py-3 bg-construction-yellow text-black border-2 border-black rounded-xl text-[10px] font-black uppercase tracking-widest shadow-apple hover:bg-black hover:text-white transition-all">New Allocation</button>
            </div>
        </div>
        <table class="w-full text-left text-sm">
            <thead class="bg-black text-construction-yellow font-black uppercase text-[10px] tracking-[0.3em]">
                <tr>
                    <th class="px-12 py-7 px-10">Prot. Status</th>
                    <th class="px-12 py-7">Identification Site</th>
                    <th class="px-12 py-7 text-right">Target</th>
                    <th class="px-12 py-7 text-right">Consolidated</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-black/[0.05]">
                <tr class="hover:bg-construction-yellow/10 transition-colors group">
                    <td class="px-12 py-10">
                        <span class="px-4 py-1.5 border-2 border-black text-black text-[9px] font-black rounded-lg uppercase tracking-widest group-hover:bg-black group-hover:text-construction-yellow transition-all">Authorized</span>
                    </td>
                    <td class="px-12 py-10">
                        <p class="font-black text-sm text-black uppercase tracking-tight">Warehouse C3 Daan Mogot</p>
                        <p class="text-[10px] text-black/30 font-black uppercase mt-2 tracking-widest">Protocol: #RAB-2024-001</p>
                    </td>
                    <td class="px-12 py-10 text-right font-black text-black/30 text-xs">Rp 4.500M</td>
                    <td class="px-12 py-10 text-right">
                        <span class="text-2xl font-black tracking-tighter text-black group-hover:text-construction-yellow transition-colors italic">Rp 1.250</span><span class="text-xs font-black text-black/40">jt</span>
                    </td>
                </tr>
                <tr class="hover:bg-black transition-all group duration-300">
                    <td class="px-12 py-10">
                        <span class="px-4 py-1.5 bg-construction-yellow text-black text-[9px] font-black rounded-lg uppercase tracking-widest group-hover:bg-white group-hover:text-black transition-all">Authorized</span>
                    </td>
                    <td class="px-12 py-10">
                        <p class="font-black text-sm text-black uppercase tracking-tight group-hover:text-white transition-colors">Apartemen Green View</p>
                        <p class="text-[10px] text-black/30 font-black uppercase mt-2 tracking-widest group-hover:text-white/40 transition-colors">Protocol: #RAB-2024-042</p>
                    </td>
                    <td class="px-12 py-10 text-right font-black text-black/30 text-xs group-hover:text-white/20 transition-colors">Rp 7.800M</td>
                    <td class="px-12 py-10 text-right">
                        <span class="text-2xl font-black tracking-tighter text-construction-yellow italic">Rp 2.800</span><span class="text-xs font-black text-construction-yellow/40">jt</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
