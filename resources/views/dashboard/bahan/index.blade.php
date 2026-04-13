@extends('dashboard.layout')

@section('header', 'Warehouse Matrix v.1')

@section('content')
<div class="space-y-16 animate-in fade-in duration-1000">
    <!-- Warehouse Header -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-end gap-10">
        <div class="space-y-6">
            <div class="inline-flex items-center gap-4 bg-black/[0.03] border-2 border-black rounded-full px-6 py-2">
                <div class="w-1.5 h-1.5 rounded-full bg-construction-yellow"></div>
                <span class="text-[9px] font-black uppercase tracking-[0.4em] text-black">Inventory Monitoring Unit</span>
            </div>
            <h3 class="text-5xl md:text-6xl font-black tracking-tighter text-black uppercase leading-[0.9]">Physical Store<br>Registry</h3>
        </div>
        <div class="flex flex-col sm:flex-row gap-6 w-full lg:w-auto">
            <div class="bg-black text-white p-8 rounded-[40px] shadow-heavy flex flex-col justify-between group hover:bg-construction-yellow transition-all duration-500 min-w-[240px]">
                <span class="text-[9px] font-black text-white/30 group-hover:text-black/30 uppercase tracking-[0.4em] mb-4">Stock Value Index</span>
                <p class="text-3xl font-black group-hover:text-black transition-colors tabular-nums">Rp 1.84 <span class="text-lg opacity-40 italic">M</span></p>
            </div>
            <button class="px-10 py-8 bg-construction-yellow text-black font-black rounded-[40px] border-2 border-black shadow-heavy hover:bg-black hover:text-white transition-all transform active:scale-95 flex items-center justify-center gap-4 group">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                <span class="text-[10px] uppercase tracking-[0.3em]">Stock Inbound</span>
            </button>
        </div>
    </div>

    <!-- Inventory Mosaic -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10">
        @php
            $materials = [
                ['Semen Portland', 'Binder', '720', 'Zak', 'Stable'],
                ['Besi Beton 13mm', 'Struktur', '1.2k', 'Btg', 'Incoming'],
                ['Pasir Pasang', 'Agregat', '420', 'm3', 'Low'],
                ['Kayu Meranti', 'Struktur', '85', 'm3', 'Stable'],
                ['Bata Merah', 'Dinding', '12k', 'Pcs', 'High'],
                ['Pipa HDPE 2"', 'Plumbing', '240', 'Mtr', 'Stable'],
            ];
        @endphp

        @foreach($materials as $material)
        <div class="bg-white border-2 border-black rounded-[48px] overflow-hidden group hover:shadow-heavy transition-all duration-500 relative flex flex-col">
            <!-- Material Head -->
            <div class="p-10 border-b-2 border-black flex-1">
                <div class="flex items-center justify-between mb-8">
                    <span class="text-[9px] font-black text-black/20 uppercase tracking-[0.4em]">{{ $material[1] }}</span>
                    @if($material[4] == 'Low')
                        <div class="px-3 py-1 bg-red-500 text-white text-[8px] font-black rounded uppercase tracking-widest animate-pulse">Critical</div>
                    @else
                        <div class="w-2 h-2 rounded-full border border-black group-hover:bg-black transition-colors"></div>
                    @endif
                </div>
                <h4 class="text-3xl font-black uppercase tracking-tighter mb-4 group-hover:text-construction-yellow transition-colors leading-none">{{ $material[0] }}</h4>
                <div class="flex items-baseline gap-2">
                    <span class="text-6xl font-black tracking-tighter tabular-nums">{{ $material[2] }}</span>
                    <span class="text-[10px] font-black uppercase tracking-widest text-black/30 border-l-2 border-black/10 pl-3 ml-2">{{ $material[3] }}</span>
                </div>
            </div>
            
            <!-- Material Actions -->
            <div class="px-10 py-8 bg-black/[0.02] flex items-center justify-between">
                <div class="flex flex-col">
                    <span class="text-[8px] font-black uppercase tracking-widest text-black/20 mb-1 italic">Availability</span>
                    <span class="text-[10px] font-black uppercase">{{ $material[4] }}</span>
                </div>
                <div class="flex gap-2">
                    <button class="p-4 bg-black text-white rounded-2xl hover:bg-construction-yellow hover:text-black transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M12 20h9M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                    </button>
                </div>
            </div>
            
            <!-- Blueprint Accent Background -->
            <div class="absolute bottom-0 right-0 w-24 h-24 matrix-pattern opacity-0 group-hover:opacity-10 transition-opacity"></div>
        </div>
        @endforeach

        <!-- Add Protocol Item -->
        <div class="border-4 border-dashed border-black/10 rounded-[48px] flex flex-col items-center justify-center p-16 hover:bg-black hover:border-black group transition-all duration-500 cursor-pointer text-center">
            <div class="w-20 h-20 bg-black text-construction-yellow rounded-3xl flex items-center justify-center shadow-heavy mb-8 group-hover:bg-construction-yellow group-hover:text-black transition-all transform group-hover:rotate-45">
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            </div>
            <p class="text-[10px] font-black text-black/20 group-hover:text-construction-yellow uppercase tracking-[0.5em] leading-relaxed">System Index<br>New Entry</p>
        </div>
    </div>
</div>
@endsection
