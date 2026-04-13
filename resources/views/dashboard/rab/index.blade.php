@extends('dashboard.layout')

@section('header', 'Audit Matrix v.4')

@section('content')
<div class="space-y-12 animate-in fade-in duration-1000">
    <!-- Matrix Header -->
    <div class="flex flex-col xl:flex-row justify-between items-start xl:items-center gap-10">
        <div class="flex gap-10 items-center">
            <div class="w-24 h-24 bg-black rounded-[40px] flex items-center justify-center text-construction-yellow shadow-heavy relative overflow-hidden">
                <div class="absolute inset-0 matrix-pattern opacity-20"></div>
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><line x1="12" y1="2" x2="12" y2="22"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
            </div>
            <div>
                <h3 class="text-3xl font-black uppercase tracking-tighter text-black">Financial Matrix</h3>
                <div class="flex items-center gap-4 mt-2">
                    <span class="text-[9px] font-black uppercase tracking-[0.4em] text-black/20">Audit Trail: Secured</span>
                    <div class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></div>
                </div>
            </div>
        </div>
        
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 w-full xl:w-auto">
            <div class="bg-black p-6 rounded-3xl text-center group hover:bg-construction-yellow transition-all duration-500">
                <span class="text-[8px] font-black text-white/30 group-hover:text-black/30 uppercase tracking-widest block mb-2">Total Budget</span>
                <p class="text-sm font-black text-white group-hover:text-black tracking-tight">Rp 12.4 B</p>
            </div>
            <div class="bg-white border-2 border-black p-6 rounded-3xl text-center group hover:bg-black transition-all duration-500">
                <span class="text-[8px] font-black text-black/30 group-hover:text-white/30 uppercase tracking-widest block mb-2">Deployed</span>
                <p class="text-sm font-black text-black group-hover:text-white tracking-tight">Rp 4.2 B</p>
            </div>
            <div class="bg-white border-2 border-black p-6 rounded-3xl text-center group hover:bg-black transition-all duration-500">
                <span class="text-[8px] font-black text-black/30 group-hover:text-white/30 uppercase tracking-widest block mb-2">Remaining</span>
                <p class="text-sm font-black text-black group-hover:text-white tracking-tight">Rp 8.2 B</p>
            </div>
            <div class="bg-construction-yellow border-2 border-black p-6 rounded-3xl text-center group hover:bg-black transition-all duration-500 shadow-xl">
                <span class="text-[8px] font-black text-black/30 group-hover:text-white/30 uppercase tracking-widest block mb-2">Efficiency</span>
                <p class="text-sm font-black text-black group-hover:text-white tracking-tight">94.2%</p>
            </div>
        </div>
    </div>

    <!-- Data Matrix Grid -->
    <div class="bg-white border-2 border-black rounded-[48px] shadow-heavy overflow-hidden">
        <div class="p-8 md:p-12 border-b-2 border-black bg-black/[0.02] flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-6">
                <div class="flex gap-1">
                    <div class="w-1.5 h-6 bg-black"></div>
                    <div class="w-1.5 h-6 bg-black/20"></div>
                </div>
                <h4 class="text-[11px] font-black uppercase tracking-[0.4em]">Budget Allocation Matrix</h4>
            </div>
            <div class="flex items-center gap-4 w-full md:w-auto">
                <input type="text" placeholder="FILTER NODE..." class="flex-1 md:w-64 px-6 py-3 bg-black/[0.03] border-2 border-black rounded-xl text-[10px] font-black uppercase tracking-widest outline-none focus:bg-construction-yellow/10">
                <button class="p-3 bg-black text-construction-yellow rounded-xl shadow-xl hover:scale-110 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><line x1="4" y1="21" x2="4" y2="14"></line><line x1="4" y1="10" x2="4" y2="3"></line><line x1="12" y1="21" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="3"></line><line x1="20" y1="21" x2="20" y2="16"></line><line x1="20" y1="12" x2="20" y2="3"></line><line x1="1" y1="14" x2="7" y2="14"></line><line x1="9" y1="8" x2="15" y2="8"></line><line x1="17" y1="16" x2="23" y2="16"></line></svg>
                </button>
            </div>
        </div>

        <div class="overflow-x-auto custom-scrollbar">
            <table class="w-full text-left min-w-[1000px]">
                <thead>
                    <tr class="bg-black text-construction-yellow text-[9px] font-black uppercase tracking-[0.3em]">
                        <th class="px-12 py-8">Matrix Node</th>
                        <th class="px-12 py-8">Authorized Limit</th>
                        <th class="px-12 py-8">Current Burn</th>
                        <th class="px-12 py-8 text-center">Utilization</th>
                        <th class="px-12 py-8 text-right">Operational Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-black/5">
                    @php
                        $rabItems = [
                            ['Jakarta C3 Warehouse', '4,250,000,000', '1,500,000,000', 35],
                            ['Zetas Central HQ', '5,800,000,000', '5,336,000,000', 92],
                            ['Bekasi Logistics Hub', '1,200,000,000', '420,000,000', 35],
                            ['Tangerang Site 04', '850,000,000', '125,000,000', 14],
                        ];
                    @endphp

                    @foreach($rabItems as $item)
                    <tr class="hover:bg-black/[0.02] transition-colors group">
                        <td class="px-12 py-10 font-black uppercase tracking-tighter text-black">
                            {{ $item[0] }}
                            <p class="text-[8px] font-bold text-black/20 mt-1 tracking-[0.4em]">UUID: ZT-RAB-{{ rand(100,999) }}</p>
                        </td>
                        <td class="px-12 py-10 tabular-nums font-bold text-sm">
                            <span class="text-[10px] text-black/30 font-black mr-2 italic tracking-tighter">IDR</span>{{ $item[1] }}
                        </td>
                        <td class="px-12 py-10 tabular-nums font-bold text-sm text-red-500">
                            <span class="text-[10px] text-red-500/30 font-black mr-2 italic tracking-tighter">IDR</span>{{ $item[2] }}
                        </td>
                        <td class="px-12 py-10">
                            <div class="flex flex-col gap-3 items-center">
                                <div class="w-full max-w-[120px] h-2 bg-black/5 rounded-full overflow-hidden p-0.5 border border-black/5">
                                    <div class="h-full bg-black rounded-full" style="width: {{ $item[3] }}%"></div>
                                </div>
                                <span class="text-[10px] font-black">{{ $item[3] }}%</span>
                            </div>
                        </td>
                        <td class="px-12 py-10 text-right">
                            <div class="flex items-center justify-end gap-4 overflow-hidden">
                                <button class="px-6 py-2.5 bg-black text-white rounded-lg text-[9px] font-black uppercase tracking-widest hover:bg-construction-yellow hover:text-black transition-all">Audit</button>
                                <button class="px-6 py-2.5 box-border border-2 border-black rounded-lg text-[9px] font-black uppercase tracking-widest hover:bg-black hover:text-white transition-all">Report</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="p-10 bg-black text-white flex flex-col md:flex-row justify-between items-center gap-10">
            <div class="flex items-center gap-10">
                <div>
                    <span class="text-[8px] font-black text-white/30 uppercase tracking-[0.4em] block mb-2">Matrix Aggregation</span>
                    <p class="text-3xl font-black tracking-tighter">Rp 12,456,220,000</p>
                </div>
                <div class="hidden sm:block w-px h-16 bg-white/10"></div>
                <div class="hidden sm:block">
                    <span class="text-[8px] font-black text-white/30 uppercase tracking-[0.4em] block mb-2">Protocol Status</span>
                    <p class="text-xs font-black text-construction-yellow uppercase tracking-widest flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-construction-yellow"></span>
                        Locked For Processing
                    </p>
                </div>
            </div>
            <button class="w-full md:w-auto px-12 py-5 bg-construction-yellow text-black rounded-2xl font-black text-[10px] uppercase tracking-[0.4em] hover:bg-white transition-all shadow-heavy">
                Initialize Export Protocol
            </button>
        </div>
    </div>
</div>
@endsection
