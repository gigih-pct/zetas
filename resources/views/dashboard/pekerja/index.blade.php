@extends('dashboard.layout')

@section('header', 'Personnel Registry v.1.4')

@section('content')
<div class="space-y-16 animate-in fade-in duration-1000">
    <!-- Dossier Header -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-end gap-10">
        <div class="space-y-6">
            <h3 class="text-5xl font-black tracking-tighter text-black uppercase leading-tight">Human Resource<br>Dossier</h3>
            <div class="flex items-center gap-6">
                <div class="flex -space-x-3">
                    @for($i=0; $i<6; $i++)
                        <div class="w-10 h-10 rounded-full border-4 border-white bg-black flex items-center justify-center text-[9px] text-construction-yellow font-black shadow-lg">OP</div>
                    @endfor
                </div>
                <div class="h-4 w-px bg-black opacity-10"></div>
                <span class="text-[10px] font-black uppercase tracking-widest text-black/40">156 Active Operatives</span>
            </div>
        </div>
        <button class="w-full lg:w-auto px-12 py-6 bg-black text-white rounded-[40px] font-black text-[10px] uppercase tracking-[0.4em] shadow-heavy hover:bg-construction-yellow hover:text-black transition-all flex items-center justify-center gap-4 group">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><line x1="19" y1="8" x2="19" y2="14"></line><line x1="16" y1="11" x2="22" y2="11"></line></svg>
            Enlist Operative
        </button>
    </div>

    <!-- The Dossier Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
        @php
            $workers = [
                ['Ahmad Subarjo', 'Mandor Utama', 'Level 4 Security', 'Sector: Jakarta', '98%'],
                ['Budi Santoso', 'Logistics Lead', 'Level 3 Security', 'Sector: Bekasi', '85%'],
                ['Siti Rahma', 'Site Engineer', 'Level 5 Security', 'Sector: BSD', '94%'],
                ['Eko Prasetyo', 'Fleet Supervisor', 'Level 3 Security', 'Sector: Central', '72%'],
                ['Dewi Lestari', 'Safety Officer', 'Level 4 Security', 'Sector: Jakarta', '89%'],
            ];
        @endphp

        @foreach($workers as $worker)
        <div class="bg-white border-2 border-black rounded-[48px] overflow-hidden group hover:shadow-heavy transition-all duration-700 relative">
            <!-- Dossier Header (Folder Tab Look) -->
            <div class="h-40 bg-black p-10 relative group-hover:bg-construction-yellow transition-colors duration-500">
                <div class="absolute top-0 right-0 p-8">
                    <div class="w-16 h-16 rounded-2xl bg-white/10 group-hover:bg-black/10 flex items-center justify-center text-white/40 group-hover:text-black/40">
                         <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                    </div>
                </div>
                <div class="flex flex-col h-full justify-between">
                    <span class="text-[9px] font-black text-white/40 group-hover:text-black/40 uppercase tracking-[0.4em]">REG: ZT-OP-{{ rand(100,999) }}</span>
                    <span class="inline-block px-4 py-1.5 bg-construction-yellow text-black group-hover:bg-black group-hover:text-white text-[8px] font-black rounded-lg uppercase tracking-widest w-fit border-2 border-black">{{ $worker[2] }}</span>
                </div>
            </div>

            <!-- Operative Body -->
            <div class="p-10 pt-14 space-y-10 relative">
                <!-- Profile Avatar Slot -->
                <div class="absolute -top-12 left-10 w-24 h-24 bg-white border-2 border-black rounded-[32px] shadow-apple flex items-center justify-center text-3xl font-black overflow-hidden group-hover:scale-110 transition-transform">
                    <span class="group-hover:text-construction-yellow transition-colors">{{ substr($worker[0], 0, 1) }}</span>
                </div>

                <div class="pt-4">
                    <h4 class="text-2xl font-black uppercase tracking-tighter mb-2 group-hover:text-construction-yellow transition-colors">{{ $worker[0] }}</h4>
                    <p class="text-[10px] font-black uppercase tracking-[0.2em] text-black/40">{{ $worker[1] }} — {{ $worker[3] }}</p>
                </div>

                <div class="space-y-4">
                    <div class="flex justify-between items-center text-[10px] font-black uppercase tracking-widest">
                        <span>Efficiency Ratio</span>
                        <span class="text-black/40">{{ $worker[4] }}</span>
                    </div>
                    <div class="h-2 bg-black/[0.03] rounded-full overflow-hidden p-0.5 border border-black/5">
                        <div class="h-full bg-black rounded-full" style="width: {{ $worker[4] }}"></div>
                    </div>
                </div>

                <div class="flex gap-4 pt-4">
                    <button class="flex-1 py-4 bg-black text-construction-yellow rounded-2xl font-black text-[9px] uppercase tracking-widest hover:bg-construction-yellow hover:text-black transition-all shadow-heavy">Full Dossier</button>
                    <button class="p-4 border-2 border-black rounded-2xl hover:bg-black hover:text-white transition-all shadow-apple">
                         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                    </button>
                </div>
            </div>
            
            <!-- Bottom Matrix Texture -->
            <div class="absolute bottom-4 right-8 w-16 h-4 matrix-pattern opacity-10"></div>
        </div>
        @endforeach

        <!-- Recruitment Slot -->
        <div class="border-4 border-dashed border-black/10 rounded-[48px] flex flex-col items-center justify-center p-16 hover:bg-black hover:border-black group transition-all duration-500 cursor-pointer text-center">
            <div class="w-20 h-20 bg-black text-construction-yellow rounded-3xl flex items-center justify-center shadow-heavy mb-8 group-hover:bg-construction-yellow group-hover:text-black transition-all">
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><line x1="19" y1="8" x2="19" y2="14"></line><line x1="16" y1="11" x2="22" y2="11"></line></svg>
            </div>
            <p class="text-[10px] font-black text-black/20 group-hover:text-construction-yellow uppercase tracking-[0.5em] leading-relaxed">System Enlistment<br>Active Recruitment</p>
        </div>
    </div>
</div>
@endsection
