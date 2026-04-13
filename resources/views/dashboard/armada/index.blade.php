@extends('dashboard.layout')

@section('header', 'Fleet Control v.2')

@section('content')
<div class="space-y-16 animate-in slide-in-from-bottom-10 duration-1000">
    <!-- Fleet Header Area -->
    <div class="flex flex-col xl:flex-row justify-between items-start xl:items-center gap-10">
        <div class="flex items-center gap-8">
            <div class="px-6 py-12 bg-black rounded-[48px] text-construction-yellow flex flex-col items-center justify-center shadow-heavy border-4 border-black group">
                <span class="text-[10px] font-black uppercase tracking-[0.4em] mb-4 opacity-30">Active</span>
                <span class="text-6xl font-black tabular-nums tracking-tighter">15</span>
            </div>
            <div>
                <h3 class="text-4xl font-black uppercase tracking-tighter text-black leading-none">Armada & Equipment Master</h3>
                <p class="text-[10px] font-black text-black/30 uppercase tracking-[0.5em] mt-4 flex items-center gap-4">
                    <span class="w-2 h-2 rounded-full bg-green-500"></span>
                    Operational Monitoring Hub
                </p>
            </div>
        </div>
        
        <div class="w-full xl:w-auto flex flex-col sm:flex-row gap-6">
            <div class="bg-white border-2 border-black p-8 rounded-[40px] flex items-center gap-8 shadow-heavy transition-all hover:bg-black group">
                <div class="hidden sm:block">
                    <span class="text-[8px] font-black text-black/30 group-hover:text-white/30 uppercase tracking-[0.4em]">Fleet Health</span>
                    <div class="flex gap-1 mt-2">
                        @for($i=0; $i<8; $i++)
                            <div class="w-1.5 h-4 bg-green-500 rounded-full"></div>
                        @endfor
                        <div class="w-1.5 h-4 bg-black/10 rounded-full"></div>
                    </div>
                </div>
                <button class="px-10 py-5 bg-construction-yellow text-black rounded-2xl font-black text-[10px] uppercase tracking-[0.4em] border-2 border-black shadow-xl group-hover:bg-white transition-all">
                    Initialize Logistics
                </button>
            </div>
        </div>
    </div>

    <!-- Asset Tag Collection -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
        @php
            $fleet = [
                ['EXCAVATOR CAT 320', 'SN-092-221', 'Location: Site C3', 'Operational', '10.2k Hours'],
                ['DUMP TRUCK HINO', 'SN-881-X41', 'Location: Bekasi Hub', 'Maintenance', '4.5k Hours'],
                ['BULLDOZER D6R', 'SN-002-K92', 'Location: Site 04', 'Operational', '15.1k Hours'],
                ['MOBILE CRANE 50T', 'SN-221-M33', 'Location: BSD HQ', 'Operational', '2.8k Hours'],
            ];
        @endphp

        @foreach($fleet as $unit)
        <div class="bg-white border-2 border-black rounded-[48px] overflow-hidden flex flex-col md:flex-row hover:shadow-heavy transition-all duration-700 group">
            <!-- Asset Plate (Left) -->
            <div class="md:w-56 bg-black p-10 flex flex-col justify-between items-center text-center group-hover:bg-construction-yellow transition-all duration-500">
                <span class="text-[9px] font-black text-white/30 group-hover:text-black/30 uppercase tracking-[0.4em]">Serial Plate</span>
                <div class="rotate-0 md:-rotate-90 origin-center py-10">
                    <span class="text-3xl font-black text-white group-hover:text-black tracking-tighter uppercase whitespace-nowrap">{{ $unit[1] }}</span>
                </div>
                <div class="w-10 h-10 rounded-xl border-2 border-white/20 flex items-center justify-center text-white group-hover:border-black/20 group-hover:text-black transition-all">
                     <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                </div>
            </div>

            <!-- Asset Details (Main) -->
            <div class="flex-1 p-10 md:p-14 space-y-10 relative">
                <div class="hidden md:block absolute top-10 right-10 opacity-5 group-hover:opacity-20 transition-opacity">
                    <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="1"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                </div>
                
                <div>
                    <h4 class="text-3xl font-black uppercase tracking-tighter mb-4 text-black group-hover:text-construction-yellow transition-colors">{{ $unit[0] }}</h4>
                    <div class="flex items-center gap-3">
                        <span class="w-1.5 h-1.5 rounded-full {{ $unit[3] == 'Operational' ? 'bg-green-500' : 'bg-red-500 animate-pulse' }}"></span>
                        <span class="text-[10px] font-black uppercase tracking-widest text-black/40">{{ $unit[3] }} — {{ $unit[2] }}</span>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-10 pt-10 border-t-2 border-black/5">
                    <div>
                        <span class="text-[9px] font-black uppercase tracking-widest text-black/20 block mb-2">Usage Metric</span>
                        <p class="text-xl font-black tabular-nums">{{ $unit[4] }}</p>
                    </div>
                    <div class="flex items-center justify-end">
                        <button class="px-8 py-4 bg-black text-white rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-construction-yellow hover:text-black transition-all shadow-heavy">Update Log</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
