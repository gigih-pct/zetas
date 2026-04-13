@extends('dashboard.layout')

@section('header', 'Manajemen Armada & Alat Berat')

@section('content')
<div class="space-y-16 animate-in slide-in-from-right-10 duration-1000">
    <div class="flex justify-between items-end border-b-2 border-black pb-8">
        <div>
            <h3 class="text-4xl font-black tracking-tighter text-black uppercase">Technical Assets</h3>
            <p class="text-[10px] font-black text-black/30 uppercase tracking-[0.4em] mt-3">Heavy Machinery Intelligence</p>
        </div>
        <div class="flex gap-8">
            <div class="text-right">
                <p class="text-[9px] font-black text-black/20 uppercase tracking-[0.3em]">Unit Efficiency</p>
                <p class="text-2xl font-black text-black italic uppercase underline decoration-construction-yellow decoration-4 underline-offset-8">84% Optimal</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
        <!-- Machine Card: Strict Industrial Bi-Color -->
        <div class="bg-white rounded-[40px] border-2 border-black p-12 group hover:shadow-heavy transition-all duration-500 relative overflow-hidden">
            <div class="flex justify-between items-start mb-12">
                <div class="w-20 h-20 bg-black rounded-3xl flex items-center justify-center shadow-xl group-hover:bg-construction-yellow transition-colors duration-500 border-2 border-black">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#FFCD00" stroke-width="3" class="group-hover:stroke-black transition-colors"><path d="M1 3h15v13H1z"></path><path d="M16 8h4l3 3v5h-7V8z"></path><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                </div>
                <div class="flex flex-col items-end gap-2">
                    <span class="px-4 py-1.5 bg-black text-white text-[9px] font-black rounded-lg uppercase tracking-[0.2em] group-hover:bg-construction-yellow group-hover:text-black transition-all">Deployed</span>
                    <p class="text-[10px] font-black text-black/20 mt-1 uppercase tracking-tighter">Unit: ZT-HE-001</p>
                </div>
            </div>
            
            <h4 class="font-black text-2xl mb-1 tracking-tighter uppercase group-hover:text-construction-yellow transition-colors italic">Excavator CAT 320 GC</h4>
            <p class="text-[10px] font-black text-black/30 uppercase tracking-[0.3em] mb-10">Site Infrastructure Logic</p>

            <div class="space-y-6 pt-10 border-t-2 border-black/[0.05]">
                <div class="flex justify-between items-center text-xs">
                    <span class="font-black text-black/30 uppercase tracking-widest text-[9px]">Site Location</span>
                    <span class="font-black text-black uppercase italic">Warehouse C3</span>
                </div>
                <div class="flex justify-between items-center text-xs">
                    <span class="font-black text-black/30 uppercase tracking-widest text-[9px]">Maint. Cycle</span>
                    <span class="font-black text-black px-2 py-1 bg-construction-yellow rounded-md text-[10px] uppercase">14 Days Rem.</span>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-[40px] border-2 border-black p-12 group hover:shadow-heavy transition-all duration-500 relative overflow-hidden">
            <div class="flex justify-between items-start mb-12">
                <div class="w-20 h-20 bg-construction-yellow rounded-3xl flex items-center justify-center shadow-xl group-hover:bg-black transition-colors duration-500 border-2 border-black">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="3" class="group-hover:stroke-[#FFCD00] transition-colors"><path d="M22 17h-2.4C18.4 15.2 16.3 14 14 14s-4.4 1.2-5.6 3H1V7h20v10z"></path><path d="M14 6v8"></path></svg>
                </div>
                <div class="flex flex-col items-end gap-2">
                    <span class="px-4 py-1.5 border-2 border-black text-black text-[9px] font-black rounded-lg uppercase tracking-[0.2em] group-hover:bg-black group-hover:text-white transition-all">Standby</span>
                    <p class="text-[10px] font-black text-black/20 mt-1 uppercase tracking-tighter">Unit: ZT-CR-002</p>
                </div>
            </div>
            
            <h4 class="font-black text-2xl mb-1 tracking-tighter uppercase group-hover:text-construction-yellow transition-colors italic">Tower Crane Liebherr</h4>
            <p class="text-[10px] font-black text-black/30 uppercase tracking-[0.3em] mb-10">Lifting Protocol Unit</p>

            <div class="space-y-6 pt-10 border-t-2 border-black/[0.05]">
                <div class="flex justify-between items-center text-xs">
                    <span class="font-black text-black/30 uppercase tracking-widest text-[9px]">Site Location</span>
                    <span class="font-black text-black uppercase italic">Yard Bekasi</span>
                </div>
                <div class="flex justify-between items-center text-xs">
                    <span class="font-black text-black/30 uppercase tracking-widest text-[9px]">Ops Status</span>
                    <span class="font-black text-black uppercase tracking-widest text-[10px]">Optimal Zone</span>
                </div>
            </div>
        </div>

        <div class="bg-black rounded-[40px] border-2 border-black p-12 group hover:shadow-heavy transition-all duration-500 relative overflow-hidden text-white">
            <div class="flex justify-between items-start mb-12">
                <div class="w-20 h-20 bg-construction-yellow rounded-3xl flex items-center justify-center shadow-xl group-hover:bg-white transition-colors duration-500 border-2 border-black">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="3" class="transition-colors"><rect x="1" y="3" width="15" height="13" rx="2" ry="2"></rect><path d="M16 8h4l3 3v5h-7V8z"></path></svg>
                </div>
                <div class="flex flex-col items-end gap-2">
                    <span class="px-4 py-1.5 bg-construction-yellow text-black text-[9px] font-black rounded-lg uppercase tracking-[0.2em] border-2 border-black group-hover:bg-white transition-all">Repairs</span>
                    <p class="text-[10px] font-black text-white/20 mt-1 uppercase tracking-tighter">Unit: ZT-TR-015</p>
                </div>
            </div>
            
            <h4 class="font-black text-2xl mb-1 tracking-tighter uppercase group-hover:text-construction-yellow transition-colors italic">Mixer Truck Hino</h4>
            <p class="text-[10px] font-black text-white/30 uppercase tracking-[0.3em] mb-10">Concrete Logistics</p>

            <div class="space-y-6 pt-10 border-t-2 border-white/10">
                <div class="flex justify-between items-center text-xs">
                    <span class="font-black text-white/30 uppercase tracking-widest text-[9px]">Site Location</span>
                    <span class="font-black text-white uppercase italic">Workshop HQ</span>
                </div>
                <div class="flex justify-between items-center text-xs">
                    <span class="font-black text-white/30 uppercase tracking-widest text-[9px]">Est. Recovery</span>
                    <span class="font-black text-construction-yellow uppercase text-[10px]">Tomorrow, 09:00</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
