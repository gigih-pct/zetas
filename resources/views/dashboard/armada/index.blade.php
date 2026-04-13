@extends('dashboard.layout')

@section('header', 'Fleet Control v.2')

@section('content')
<div x-data="{ 
    showCreateModal: false, 
    showEditModal: false, 
    editingUnit: {},
    editUnit(unit) {
        this.editingUnit = unit;
        this.showEditModal = true;
    }
}" class="space-y-16 animate-in slide-in-from-bottom-10 duration-1000">

    @if(session('success'))
    <div class="fixed top-24 right-10 z-50 animate-in slide-in-from-right-10 duration-500">
        <div class="bg-black border-2 border-construction-yellow p-6 rounded-2xl shadow-heavy flex items-center gap-4">
            <div class="w-10 h-10 rounded-full bg-construction-yellow flex items-center justify-center text-black">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4"><polyline points="20 6 9 17 4 12"></polyline></svg>
            </div>
            <div>
                <p class="text-[10px] font-black uppercase text-construction-yellow tracking-widest">Fleet Alert</p>
                <p class="text-xs font-bold text-white uppercase tracking-tight">{{ session('success') }}</p>
            </div>
            <button @click="showModal = false" class="ml-4 text-white/40 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
        </div>
    </div>
    @endif

    <!-- Fleet Header Area -->
    <div class="flex flex-col xl:flex-row justify-between items-start xl:items-center gap-10">
        <div class="flex items-center gap-8">
            <div class="px-6 py-12 bg-black rounded-[48px] text-construction-yellow flex flex-col items-center justify-center shadow-heavy border-4 border-black group">
                <span class="text-[10px] font-black uppercase tracking-[0.4em] mb-4 opacity-30">Active</span>
                <span class="text-6xl font-black tabular-nums tracking-tighter">{{ $activeCount }}</span>
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
                    <span class="text-[8px] font-black text-black/30 group-hover:text-white/30 uppercase tracking-[0.4em]">Fleet Health Index</span>
                    <div class="flex gap-1 mt-2">
                        @php $healthBars = round($fleetHealth / 12.5); @endphp
                        @for($i=0; $i<8; $i++)
                            <div class="w-1.5 h-4 {{ $i < $healthBars ? 'bg-green-500' : 'bg-black/10' }} rounded-full"></div>
                        @endfor
                    </div>
                </div>
                <button @click="showCreateModal = true" class="px-10 py-5 bg-construction-yellow text-black rounded-2xl font-black text-[10px] uppercase tracking-[0.4em] border-2 border-black shadow-xl group-hover:bg-white transition-all">
                    Initialize Logistics
                </button>
            </div>
        </div>
    </div>

    <!-- Asset Tag Collection -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
        @foreach($fleets as $unit)
        <div class="bg-white border-2 border-black rounded-[48px] overflow-hidden flex flex-col md:flex-row hover:shadow-heavy transition-all duration-700 group">
            <!-- Asset Plate (Left) -->
            <div class="md:w-56 bg-black p-10 flex flex-col justify-between items-center text-center group-hover:bg-construction-yellow transition-all duration-500 relative">
                <span class="text-[9px] font-black text-white/30 group-hover:text-black/30 uppercase tracking-[0.4em]">Serial Plate</span>
                <div class="rotate-0 md:-rotate-90 origin-center py-10">
                    <span class="text-3xl font-black text-white group-hover:text-black tracking-tighter uppercase whitespace-nowrap">{{ $unit->serial_plate }}</span>
                </div>
                <form action="{{ route('dashboard.armada.destroy', $unit->id) }}" method="POST" onsubmit="return confirm('Decommission this asset from master registry?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-10 h-10 rounded-xl border-2 border-white/20 flex items-center justify-center text-white group-hover:border-black/20 group-hover:text-black hover:bg-red-500 hover:text-white hover:border-red-500 transition-all">
                         <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                    </button>
                </form>
            </div>

            <!-- Asset Details (Main) -->
            <div class="flex-1 p-10 md:p-14 space-y-10 relative">
                <div class="hidden md:block absolute top-10 right-10 opacity-5 group-hover:opacity-20 transition-opacity">
                    <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="1"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                </div>
                
                <div>
                    <h4 class="text-3xl font-black uppercase tracking-tighter mb-4 text-black group-hover:text-construction-yellow transition-colors leading-none">{{ $unit->name }}</h4>
                    <div class="flex items-center gap-3">
                        <span class="w-1.5 h-1.5 rounded-full {{ $unit->status == 'Operational' ? 'bg-green-500' : 'bg-red-500 animate-pulse' }}"></span>
                        <span class="text-[10px] font-black uppercase tracking-widest text-black/40">{{ $unit->status }} — {{ $unit->location }} Hub</span>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-10 pt-10 border-t-2 border-black/5">
                    <div>
                        <span class="text-[9px] font-black uppercase tracking-widest text-black/20 block mb-2">Usage Metric</span>
                        <p class="text-xl font-black tabular-nums">{{ number_format($unit->usage_value, 1) }} <span class="text-[10px] opacity-40">{{ $unit->usage_unit }}</span></p>
                    </div>
                    <div class="flex items-center justify-end">
                        <button @click="editUnit({{ json_encode($unit) }})" class="px-8 py-4 bg-black text-white rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-construction-yellow hover:text-black transition-all shadow-heavy text-center">Update Log</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Modals Layer -->
    <div x-show="showCreateModal || showEditModal" class="fixed inset-0 z-[60] flex items-center justify-center p-6" x-cloak>
        <div class="fixed inset-0 bg-black/80 backdrop-blur-sm" @click="showCreateModal = false; showEditModal = false"></div>
        
        <!-- Create Modal -->
        <div x-show="showCreateModal" class="bg-white border-4 border-black w-full max-w-2xl rounded-[48px] shadow-heavy relative z-10 overflow-hidden">
            <div class="bg-black p-8 flex justify-between items-center text-white">
                <h3 class="text-xl font-black text-construction-yellow uppercase tracking-tighter">Initialize Fleet Protocol</h3>
                <button @click="showCreateModal = false" class="text-white/40 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <form action="{{ route('dashboard.armada.store') }}" method="POST" class="p-10 space-y-6">
                @csrf
                <div class="grid grid-cols-2 gap-6">
                    <div class="flex flex-col gap-2">
                        <label class="text-[9px] font-black uppercase text-black/40">Unit Name</label>
                        <input type="text" name="name" required class="px-6 py-4 bg-black/[0.03] border-2 border-black rounded-2xl outline-none focus:bg-construction-yellow/10 font-bold uppercase text-xs">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-[9px] font-black uppercase text-black/40">Serial Plate</label>
                        <input type="text" name="serial_plate" required placeholder="SN-XXX-XXX" class="px-6 py-4 bg-black/[0.03] border-2 border-black rounded-2xl outline-none font-bold uppercase text-xs">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div class="flex flex-col gap-2">
                        <label class="text-[9px] font-black uppercase text-black/40">Type</label>
                        <select name="type" required class="px-6 py-4 bg-black/[0.03] border-2 border-black rounded-2xl outline-none font-bold uppercase text-xs">
                            <option value="Heavy Equipment">Heavy Equipment</option>
                            <option value="Logistics">Logistics</option>
                            <option value="Utility">Utility</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-[9px] font-black uppercase text-black/40">Hub / Sector</label>
                        <input type="text" name="location" required class="px-6 py-4 bg-black/[0.03] border-2 border-black rounded-2xl outline-none font-bold uppercase text-xs">
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-6">
                    <div class="flex flex-col gap-2">
                        <label class="text-[9px] font-black uppercase text-black/40">Usage Metric</label>
                        <input type="number" step="0.1" name="usage_value" required class="px-6 py-4 bg-black/[0.03] border-2 border-black rounded-2xl outline-none font-bold text-xs uppercase">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-[9px] font-black uppercase text-black/40">Unit</label>
                        <select name="usage_unit" required class="px-6 py-4 bg-black/[0.03] border-2 border-black rounded-2xl outline-none font-bold uppercase text-xs">
                            <option value="Hours">Hours</option>
                            <option value="KM">Kilometers</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-[9px] font-black uppercase text-black/40">Status</label>
                        <select name="status" required class="px-6 py-4 bg-black/[0.03] border-2 border-black rounded-2xl outline-none font-bold uppercase text-xs">
                            <option value="Operational">Operational</option>
                            <option value="Maintenance">Maintenance</option>
                            <option value="Off-Hire">Off-Hire</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="w-full py-5 bg-black text-construction-yellow font-black rounded-2xl uppercase tracking-[0.3em] hover:bg-construction-yellow hover:text-black transition-all shadow-heavy mt-4">Execute Initialization</button>
            </form>
        </div>

        <!-- Edit Modal -->
        <div x-show="showEditModal" class="bg-white border-4 border-black w-full max-w-2xl rounded-[48px] shadow-heavy relative z-10 overflow-hidden">
            <div class="bg-construction-yellow p-8 flex justify-between items-center text-black">
                <h3 class="text-xl font-black uppercase tracking-tighter">Adjust Fleet Matrix</h3>
                <button @click="showEditModal = false" class="text-black/40 hover:text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <form :action="`/dashboard/internal/armada/${editingUnit.id}`" method="POST" class="p-10 space-y-6">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-2 gap-6">
                    <div class="flex flex-col gap-2">
                        <label class="text-[9px] font-black uppercase text-black/40">Unit Name</label>
                        <input type="text" name="name" x-model="editingUnit.name" required class="px-6 py-4 bg-black/[0.03] border-2 border-black rounded-2xl outline-none font-bold uppercase text-xs">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-[9px] font-black uppercase text-black/40">Serial Plate</label>
                        <input type="text" name="serial_plate" x-model="editingUnit.serial_plate" required class="px-6 py-4 bg-black/[0.03] border-2 border-black rounded-2xl outline-none font-bold uppercase text-xs">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div class="flex flex-col gap-2">
                        <label class="text-[9px] font-black uppercase text-black/40">Hub / Sector</label>
                        <input type="text" name="location" x-model="editingUnit.location" required class="px-6 py-4 bg-black/[0.03] border-2 border-black rounded-2xl outline-none font-bold uppercase text-xs">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-[9px] font-black uppercase text-black/40">Operational Status</label>
                        <select name="status" x-model="editingUnit.status" required class="px-6 py-4 bg-black/[0.03] border-2 border-black rounded-2xl outline-none font-bold uppercase text-xs">
                            <option value="Operational">Operational</option>
                            <option value="Maintenance">Maintenance</option>
                            <option value="Off-Hire">Off-Hire</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div class="flex flex-col gap-2">
                        <label class="text-[9px] font-black uppercase text-black/40">Updated Usage Metric</label>
                        <input type="number" step="0.1" name="usage_value" x-model="editingUnit.usage_value" required class="px-6 py-4 bg-black/[0.03] border-2 border-black rounded-2xl outline-none font-bold text-xs">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-[9px] font-black uppercase text-black/40">Usage Unit</label>
                        <select name="usage_unit" x-model="editingUnit.usage_unit" required class="px-6 py-4 bg-black/[0.03] border-2 border-black rounded-2xl outline-none font-bold uppercase text-xs">
                            <option value="Hours">Hours</option>
                            <option value="KM">Kilometers</option>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="type" x-model="editingUnit.type">
                <button type="submit" class="w-full py-5 bg-black text-construction-yellow font-black rounded-2xl uppercase tracking-[0.3em] hover:bg-construction-yellow hover:text-black transition-all shadow-heavy mt-4">Commit Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
