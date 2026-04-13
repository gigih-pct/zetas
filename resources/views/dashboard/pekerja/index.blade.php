@extends('dashboard.layout')

@section('header', 'Manajemen Tenaga Kerja')

@section('content')
<div class="space-y-16 animate-in fade-in duration-1000">
    <!-- Workforce Stats: High Contrast Bi-Color -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
        <div class="bg-white p-10 rounded-[30px] border-2 border-black group hover:bg-black transition-all duration-300 shadow-heavy">
            <p class="text-[10px] font-black text-black/20 uppercase tracking-[0.3em] mb-6 group-hover:text-white/40">Total Personnel</p>
            <h3 class="text-5xl font-black tracking-tighter group-hover:text-construction-yellow">156</h3>
            <p class="text-[10px] font-black text-black underline decoration-construction-yellow decoration-2 mt-6 uppercase tracking-widest group-hover:text-white">Active Deployment</p>
        </div>
        <div class="bg-white p-10 rounded-[30px] border-2 border-black group hover:bg-black transition-all duration-300 shadow-heavy">
            <p class="text-[10px] font-black text-black/20 uppercase tracking-[0.3em] mb-6 group-hover:text-white/40">Foreman Squad</p>
            <h3 class="text-5xl font-black tracking-tighter group-hover:text-construction-yellow">12</h3>
            <p class="text-[10px] font-black text-black/40 uppercase mt-6 tracking-widest group-hover:text-white/20 uppercase">Protocol Certified</p>
        </div>
        <div class="bg-construction-yellow p-10 rounded-[30px] border-2 border-black group hover:bg-black transition-all duration-300 shadow-heavy">
            <p class="text-[10px] font-black text-black/40 uppercase tracking-[0.3em] mb-6 group-hover:text-white/40">Skilled Labor</p>
            <h3 class="text-5xl font-black tracking-tighter group-hover:text-construction-yellow">84</h3>
            <p class="text-[10px] font-black text-black uppercase mt-6 tracking-widest font-black group-hover:text-white underline decoration-construction-yellow decoration-2 underline-offset-4 uppercase">Elite Force</p>
        </div>
        <div class="bg-white p-10 rounded-[30px] border-2 border-black group hover:bg-black transition-all duration-300 shadow-heavy">
            <p class="text-[10px] font-black text-black/20 uppercase tracking-[0.3em] mb-6 group-hover:text-white/40">General Labor</p>
            <h3 class="text-5xl font-black tracking-tighter group-hover:text-construction-yellow">60</h3>
            <p class="text-[10px] font-black text-black/40 uppercase mt-6 tracking-widest group-hover:text-white/20 uppercase">On-site Support</p>
        </div>
    </div>

    <!-- Attendance/Assignment Table -->
    <div class="bg-white rounded-[40px] border-2 border-black overflow-hidden shadow-heavy">
        <div class="px-12 py-10 border-b-2 border-black bg-black/[0.02] flex items-center justify-between">
            <h4 class="text-[11px] font-black uppercase tracking-[0.5em] text-black italic">Active Site Verification</h4>
            <div class="flex items-center gap-4">
                <span class="text-[10px] font-black text-black uppercase tracking-widest">Attendance Metric: 91%</span>
            </div>
        </div>
        <table class="w-full text-left text-sm">
            <thead class="bg-black text-construction-yellow font-black uppercase text-[10px] tracking-[0.3em]">
                <tr>
                    <th class="px-12 py-8">Site Assignment</th>
                    <th class="px-12 py-8">Lead Foreman</th>
                    <th class="px-12 py-8 text-center">Unit Count</th>
                    <th class="px-12 py-8">Safety Index</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-black/[0.05]">
                <tr class="hover:bg-construction-yellow/10 transition-colors group">
                    <td class="px-12 py-10">
                        <p class="font-black text-sm text-black uppercase tracking-tight">Warehouse C3 Jakarta</p>
                        <p class="text-[10px] text-black/30 font-black uppercase mt-2 tracking-widest">Protocol ID: SITE-01</p>
                    </td>
                    <td class="px-12 py-10 font-bold text-black/80 uppercase tracking-tighter">
                        Operator Suparno
                    </td>
                    <td class="px-12 py-10 text-center font-black text-2xl tracking-tighter">
                        45 <span class="text-[10px] text-black/30">Personnel</span>
                    </td>
                    <td class="px-12 py-10">
                        <div class="inline-flex items-center gap-3 px-4 py-2 bg-black rounded-xl border-2 border-black">
                            <span class="w-2 h-2 rounded-sm bg-construction-yellow animate-pulse"></span>
                            <span class="text-[9px] font-black text-construction-yellow uppercase tracking-widest">SECURE PROTOCOL</span>
                        </div>
                    </td>
                </tr>
                <tr class="hover:bg-black transition-all group duration-300">
                    <td class="px-12 py-10">
                        <p class="font-black text-sm text-black uppercase tracking-tight group-hover:text-white transition-colors">Zetas HQ Extension</p>
                        <p class="text-[10px] text-black/30 font-black uppercase mt-2 tracking-widest group-hover:text-white/40">Protocol ID: SITE-42</p>
                    </td>
                    <td class="px-12 py-10 font-bold text-black/80 uppercase tracking-tighter group-hover:text-white/60 transition-colors">
                        Operator Ahmad
                    </td>
                    <td class="px-12 py-10 text-center font-black text-2xl tracking-tighter group-hover:text-construction-yellow transition-colors">
                        39 <span class="text-[10px] text-black/30">Personnel</span>
                    </td>
                    <td class="px-12 py-10">
                        <div class="inline-flex items-center gap-3 px-4 py-2 bg-construction-yellow rounded-xl border-2 border-black shadow-xl">
                            <span class="w-2 h-2 rounded-sm bg-black"></span>
                            <span class="text-[9px] font-black text-black uppercase tracking-widest">AUDIT IN PROGRESS</span>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
