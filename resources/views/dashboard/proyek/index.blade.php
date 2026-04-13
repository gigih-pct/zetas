@extends('dashboard.layout')

@section('header', 'Proyek Pekerjaan')

@section('content')
<div class="space-y-10 md:space-y-16 animate-in slide-in-from-bottom-5 duration-1000">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-8 md:gap-10">
        <div>
            <h3 class="text-2xl md:text-3xl font-black tracking-tighter text-black uppercase">Operasional Lapangan</h3>
            <p class="text-[9px] md:text-[10px] font-black text-black/30 uppercase tracking-[0.3em] mt-2 md:mt-3">Infrastructure Monitoring Unit</p>
        </div>
        <button class="w-full md:w-auto px-6 md:px-10 py-4 md:py-5 bg-construction-yellow text-black font-black rounded-xl md:rounded-2xl text-[9px] md:text-[10px] uppercase tracking-[0.3em] shadow-apple hover:bg-black hover:text-construction-yellow transition-all active:scale-95 border-2 border-black">
            + Tambah Proyek Baru
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-12">
        <!-- Project Card 1: Strict Industrial -->
        <div class="bg-white rounded-[32px] md:rounded-[40px] border-2 border-black overflow-hidden group hover:shadow-heavy transition-all duration-500">
            <div class="h-40 md:h-48 bg-black relative flex items-center justify-center">
                <div class="w-full h-full bg-[radial-gradient(#FFCD00_1px,transparent_1px)] [background-size:20px_20px] opacity-20"></div>
                <div class="absolute top-6 md:top-8 right-6 md:right-8">
                    <span class="px-3 md:px-4 py-1.5 bg-construction-yellow text-black text-[8px] md:text-[9px] font-black rounded-lg uppercase tracking-widest border-2 border-black">In-Progress</span>
                </div>
                <div class="absolute bottom-6 md:bottom-8 left-6 md:left-10">
                    <p class="text-[9px] md:text-[10px] font-black text-construction-yellow/40 uppercase tracking-[0.4em]">Node: ZT-PR-01</p>
                </div>
            </div>
            <div class="p-6 md:p-10">
                <h4 class="font-black text-xl md:text-2xl mb-2 tracking-tighter uppercase group-hover:text-construction-yellow transition-colors">Warehouse C3 Jakarta</h4>
                <p class="text-[9px] md:text-[10px] text-black/40 mb-8 md:mb-10 border-b border-black/[0.05] pb-4 md:pb-6 font-bold uppercase tracking-widest truncate">Jl. Daan Mogot, Jakarta Barat</p>
                
                <div class="space-y-4 md:space-y-6">
                    <div class="flex justify-between text-[10px] md:text-[11px] font-black uppercase tracking-widest">
                        <span class="text-black/30">Completion</span>
                        <span class="text-black">35.4%</span>
                    </div>
                    <div class="w-full bg-black/10 h-2 md:h-3 rounded-full overflow-hidden">
                        <div class="bg-black h-full w-[35%] transition-all duration-1000"></div>
                    </div>
                </div>
            </div>
            <div class="px-6 md:px-10 py-6 md:py-8 bg-black/[0.02] border-t-2 border-black flex gap-4 md:gap-6">
                <button class="flex-1 py-3 md:py-4 text-[9px] md:text-[10px] font-black uppercase tracking-widest text-black/40 hover:text-black transition-colors">Audit File</button>
                <button class="flex-1 py-3 md:py-4 text-[9px] md:text-[10px] font-black uppercase tracking-widest bg-construction-yellow text-black rounded-lg md:rounded-xl border-2 border-black hover:bg-black hover:text-white transition-all">Update Site</button>
            </div>
        </div>

        <!-- Project Card 2 -->
        <div class="bg-white rounded-[32px] md:rounded-[40px] border-2 border-black overflow-hidden group hover:shadow-heavy transition-all duration-500">
            <div class="h-40 md:h-48 bg-construction-yellow relative flex items-center justify-center">
                <div class="w-full h-full bg-[radial-gradient(#000_1px,transparent_1px)] [background-size:20px_20px] opacity-10"></div>
                <div class="absolute top-6 md:top-8 right-6 md:right-8">
                    <span class="px-3 md:px-4 py-1.5 bg-black text-construction-yellow text-[8px] md:text-[9px] font-black rounded-lg uppercase tracking-widest border-2 border-black">Verification</span>
                </div>
                <div class="absolute bottom-6 md:bottom-8 left-6 md:left-10">
                    <p class="text-[9px] md:text-[10px] font-black text-black/40 uppercase tracking-[0.4em]">Node: ZT-PR-42</p>
                </div>
            </div>
            <div class="p-6 md:p-10">
                <h4 class="font-black text-xl md:text-2xl mb-2 tracking-tighter uppercase group-hover:text-construction-yellow transition-colors">Zetas HQ Extension</h4>
                <p class="text-[9px] md:text-[10px] text-black/40 mb-8 md:mb-10 border-b border-black/[0.05] pb-4 md:pb-6 font-bold uppercase tracking-widest truncate">BSD City, Tangerang</p>
                
                <div class="space-y-4 md:space-y-6">
                    <div class="flex justify-between text-[10px] md:text-[11px] font-black uppercase tracking-widest">
                        <span class="text-black/30">Completion</span>
                        <span class="text-black">92.0%</span>
                    </div>
                    <div class="w-full bg-black/10 h-2 md:h-3 rounded-full overflow-hidden">
                        <div class="bg-construction-yellow h-full w-[92%] transition-all duration-1000"></div>
                    </div>
                </div>
            </div>
            <div class="px-6 md:px-10 py-6 md:py-8 bg-black/[0.02] border-t-2 border-black flex gap-4 md:gap-6">
                <button class="flex-1 py-3 md:py-4 text-[9px] md:text-[10px] font-black uppercase tracking-widest text-black/40 hover:text-black transition-colors">Audit File</button>
                <button class="flex-1 py-3 md:py-4 text-[9px] md:text-[10px] font-black uppercase tracking-widest bg-black text-white rounded-lg md:rounded-xl border-2 border-black hover:bg-construction-yellow hover:text-black transition-all">Serah Terima</button>
            </div>
        </div>

        <!-- Add New Card: High Contrast -->
        <div class="border-4 border-dashed border-black/[0.1] rounded-[32px] md:rounded-[40px] flex flex-col items-center justify-center p-12 md:p-16 hover:border-construction-yellow hover:bg-black group transition-all duration-500 cursor-pointer">
            <div class="w-16 h-16 md:w-20 md:h-20 rounded-xl md:rounded-2xl border-2 border-black flex items-center justify-center mb-6 md:mb-8 group-hover:bg-construction-yellow group-hover:scale-110 transition-all shadow-heavy bg-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="4" class="md:w-8 md:h-8 transition-transform group-hover:rotate-90"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            </div>
            <p class="font-black text-[10px] md:text-[11px] uppercase tracking-[0.3em] md:tracking-[0.4em] text-black/20 group-hover:text-construction-yellow transition-colors text-center leading-loose">Secure Input<br>Protocol 092</p>
        </div>
    </div>
</div>
@endsection
