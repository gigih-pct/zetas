@extends('dashboard.layout')

@section('header', 'Personnel Registry v.1.4')

@section('content')
<div x-data="{ 
    showCreateModal: false, 
    showEditModal: false, 
    editingWorker: {},
    editWorker(worker) {
        this.editingWorker = worker;
        this.showEditModal = true;
    }
}" class="space-y-16 animate-in fade-in duration-1000">

    @if(session('success'))
    <div class="fixed top-24 right-10 z-50 animate-in slide-in-from-right-10 duration-500">
        <div class="bg-black border-2 border-construction-yellow p-6 rounded-2xl shadow-heavy flex items-center gap-4">
            <div class="w-10 h-10 rounded-full bg-construction-yellow flex items-center justify-center text-black">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4"><polyline points="20 6 9 17 4 12"></polyline></svg>
            </div>
            <div>
                <p class="text-[10px] font-black uppercase text-construction-yellow tracking-widest">Dossier Alert</p>
                <p class="text-xs font-bold text-white uppercase tracking-tight">{{ session('success') }}</p>
            </div>
            <button @click="showModal = false" class="ml-4 text-white/40 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
        </div>
    </div>
    @endif

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
                <span class="text-[10px] font-black uppercase tracking-widest text-black/40">{{ $activeCount }} Active Operatives — {{ number_format($avgEfficiency, 1) }}% Efficiency</span>
            </div>
        </div>
        <button @click="showCreateModal = true" class="w-full lg:w-auto px-12 py-6 bg-black text-white rounded-[40px] font-black text-[10px] uppercase tracking-[0.4em] shadow-heavy hover:bg-construction-yellow hover:text-black transition-all flex items-center justify-center gap-4 group">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><line x1="19" y1="8" x2="19" y2="14"></line><line x1="16" y1="11" x2="22" y2="11"></line></svg>
            Enlist Operative
        </button>
    </div>

    <!-- The Dossier Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
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
                    <span class="text-[9px] font-black text-white/40 group-hover:text-black/40 uppercase tracking-[0.4em]">REG: {{ $worker->registration_id }}</span>
                    <span class="inline-block px-4 py-1.5 bg-construction-yellow text-black group-hover:bg-black group-hover:text-white text-[8px] font-black rounded-lg uppercase tracking-widest w-fit border-2 border-black">{{ $worker->security_level }}</span>
                </div>
            </div>

            <!-- Operative Body -->
            <div class="p-10 pt-14 space-y-10 relative">
                <!-- Profile Avatar Slot -->
                <div class="absolute -top-12 left-10 w-24 h-24 bg-white border-2 border-black rounded-[32px] shadow-apple flex items-center justify-center text-3xl font-black overflow-hidden group-hover:scale-110 transition-transform">
                    <span class="group-hover:text-construction-yellow transition-colors">{{ substr($worker->name, 0, 1) }}</span>
                </div>

                <div class="pt-4">
                    <h4 class="text-2xl font-black uppercase tracking-tighter mb-2 group-hover:text-construction-yellow transition-colors">{{ $worker->name }}</h4>
                    <p class="text-[10px] font-black uppercase tracking-[0.2em] text-black/40">{{ $worker->position }} — {{ $worker->sector }} Sector</p>
                </div>

                <div class="space-y-4">
                    <div class="flex justify-between items-center text-[10px] font-black uppercase tracking-widest">
                        <span>Efficiency Ratio</span>
                        <span class="text-black/40">{{ $worker->efficiency }}%</span>
                    </div>
                    <div class="h-2 bg-black/[0.03] rounded-full overflow-hidden p-0.5 border border-black/5">
                        <div class="h-full bg-black rounded-full" style="width: {{ $worker->efficiency }}%"></div>
                    </div>
                </div>

                <div class="flex gap-4 pt-4">
                    <button @click="editWorker({{ json_encode($worker) }})" class="flex-1 py-4 bg-black text-construction-yellow rounded-2xl font-black text-[9px] uppercase tracking-widest hover:bg-construction-yellow hover:text-black transition-all shadow-heavy">Modify Dossier</button>
                    <form action="{{ route('dashboard.pekerja.destroy', $worker->id) }}" method="POST" onsubmit="return confirm('Decommission this operative from active registry?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-4 border-2 border-black rounded-2xl hover:bg-red-500 hover:text-white hover:border-red-500 transition-all shadow-apple">
                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- Bottom Matrix Texture -->
            <div class="absolute bottom-4 right-8 w-16 h-4 matrix-pattern opacity-10"></div>
        </div>
        @endforeach

        <!-- Recruitment Slot -->
        <div @click="showCreateModal = true" class="border-4 border-dashed border-black/10 rounded-[48px] flex flex-col items-center justify-center p-16 hover:bg-black hover:border-black group transition-all duration-500 cursor-pointer text-center">
            <div class="w-20 h-20 bg-black text-construction-yellow rounded-3xl flex items-center justify-center shadow-heavy mb-8 group-hover:bg-construction-yellow group-hover:text-black transition-all">
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><line x1="19" y1="8" x2="19" y2="14"></line><line x1="16" y1="11" x2="22" y2="11"></line></svg>
            </div>
            <p class="text-[10px] font-black text-black/20 group-hover:text-construction-yellow uppercase tracking-[0.5em] leading-relaxed">System Enlistment<br>Active Recruitment</p>
        </div>
    </div>

    <!-- Modals Layer -->
    <div x-show="showCreateModal || showEditModal" class="fixed inset-0 z-[60] flex items-center justify-center p-6" x-cloak>
        <div class="fixed inset-0 bg-black/80 backdrop-blur-sm" @click="showCreateModal = false; showEditModal = false"></div>
        
        <!-- Create Modal -->
        <div x-show="showCreateModal" class="bg-white border-4 border-black w-full max-w-2xl rounded-[48px] shadow-heavy relative z-10 overflow-hidden">
            <div class="bg-black p-8 flex justify-between items-center">
                <h3 class="text-xl font-black text-construction-yellow uppercase tracking-tighter">New Enlistment Protocol</h3>
                <button @click="showCreateModal = false" class="text-white/40 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <form action="{{ route('dashboard.pekerja.store') }}" method="POST" class="p-10 space-y-6">
                @csrf
                <div class="grid grid-cols-2 gap-6">
                    <div class="flex flex-col gap-2">
                        <label class="text-[9px] font-black uppercase text-black/40">Full Name</label>
                        <input type="text" name="name" required class="px-6 py-4 bg-black/[0.03] border-2 border-black rounded-2xl outline-none focus:bg-construction-yellow/10 font-bold uppercase text-xs">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-[9px] font-black uppercase text-black/40">Position / Role</label>
                        <select name="position" required class="px-6 py-4 bg-black/[0.03] border-2 border-black rounded-2xl outline-none font-bold uppercase text-xs">
                            <option value="Mandor Utama">Mandor Utama</option>
                            <option value="Site Engineer">Site Engineer</option>
                            <option value="Logistics Lead">Logistics Lead</option>
                            <option value="Safety Officer">Safety Officer</option>
                            <option value="Operator">Operator</option>
                            <option value="Surveyor">Surveyor</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div class="flex flex-col gap-2">
                        <label class="text-[9px] font-black uppercase text-black/40">Security Access</label>
                        <select name="security_level" required class="px-6 py-4 bg-black/[0.03] border-2 border-black rounded-2xl outline-none font-bold uppercase text-xs">
                            <option value="Level 1 Security">Level 1</option>
                            <option value="Level 2 Security">Level 2</option>
                            <option value="Level 3 Security">Level 3</option>
                            <option value="Level 4 Security">Level 4</option>
                            <option value="Level 5 Security">Level 5</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-[9px] font-black uppercase text-black/40">Assignment Sector</label>
                        <select name="sector" required class="px-6 py-4 bg-black/[0.03] border-2 border-black rounded-2xl outline-none font-bold uppercase text-xs">
                            <option value="Jakarta">Jakarta Central</option>
                            <option value="BSD">BSD Hub</option>
                            <option value="Bekasi">Bekasi Sector</option>
                            <option value="Tangerang">Tangerang Unit</option>
                            <option value="Bogor">Bogor Unit</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div class="flex flex-col gap-2">
                        <label class="text-[9px] font-black uppercase text-black/40">Initial Efficiency %</label>
                        <input type="number" name="efficiency" value="70" min="0" max="100" class="px-6 py-4 bg-black/[0.03] border-2 border-black rounded-2xl outline-none font-bold text-xs">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-[9px] font-black uppercase text-black/40">Contact Number</label>
                        <input type="text" name="contact" required placeholder="08XX-XXXX-XXXX" class="px-6 py-4 bg-black/[0.03] border-2 border-black rounded-2xl outline-none font-bold text-xs uppercase">
                    </div>
                </div>
                <button type="submit" class="w-full py-5 bg-black text-construction-yellow font-black rounded-2xl uppercase tracking-[0.3em] hover:bg-construction-yellow hover:text-black transition-all shadow-heavy mt-4">Execute Enlistment</button>
            </form>
        </div>

        <!-- Edit Modal -->
        <div x-show="showEditModal" class="bg-white border-4 border-black w-full max-w-2xl rounded-[48px] shadow-heavy relative z-10 overflow-hidden">
            <div class="bg-construction-yellow p-8 flex justify-between items-center text-black">
                <h3 class="text-xl font-black uppercase tracking-tighter">Modify Operative Dossier</h3>
                <button @click="showEditModal = false" class="text-black/40 hover:text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <form :action="`/dashboard/internal/pekerja/${editingWorker.id}`" method="POST" class="p-10 space-y-6">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-2 gap-6">
                    <div class="flex flex-col gap-2">
                        <label class="text-[9px] font-black uppercase text-black/40">Full Name</label>
                        <input type="text" name="name" x-model="editingWorker.name" required class="px-6 py-4 bg-black/[0.03] border-2 border-black rounded-2xl outline-none font-bold uppercase text-xs">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-[9px] font-black uppercase text-black/40">Position / Role</label>
                        <select name="position" x-model="editingWorker.position" required class="px-6 py-4 bg-black/[0.03] border-2 border-black rounded-2xl outline-none font-bold uppercase text-xs">
                            <option value="Mandor Utama">Mandor Utama</option>
                            <option value="Site Engineer">Site Engineer</option>
                            <option value="Logistics Lead">Logistics Lead</option>
                            <option value="Safety Officer">Safety Officer</option>
                            <option value="Operator">Operator</option>
                            <option value="Surveyor">Surveyor</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div class="flex flex-col gap-2">
                        <label class="text-[9px] font-black uppercase text-black/40">Security Access</label>
                        <select name="security_level" x-model="editingWorker.security_level" required class="px-6 py-4 bg-black/[0.03] border-2 border-black rounded-2xl outline-none font-bold uppercase text-xs">
                            <option value="Level 1 Security">Level 1</option>
                            <option value="Level 2 Security">Level 2</option>
                            <option value="Level 3 Security">Level 3</option>
                            <option value="Level 4 Security">Level 4</option>
                            <option value="Level 5 Security">Level 5</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-[9px] font-black uppercase text-black/40">Assignment Sector</label>
                        <select name="sector" x-model="editingWorker.sector" required class="px-6 py-4 bg-black/[0.03] border-2 border-black rounded-2xl outline-none font-bold uppercase text-xs">
                            <option value="Jakarta">Jakarta Central</option>
                            <option value="BSD">BSD Hub</option>
                            <option value="Bekasi">Bekasi Sector</option>
                            <option value="Tangerang">Tangerang Unit</option>
                            <option value="Bogor">Bogor Unit</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div class="flex flex-col gap-2">
                        <label class="text-[9px] font-black uppercase text-black/40">Efficiency %</label>
                        <input type="number" name="efficiency" x-model="editingWorker.efficiency" required class="px-6 py-4 bg-black/[0.03] border-2 border-black rounded-2xl outline-none font-bold text-xs">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-[9px] font-black uppercase text-black/40">Contact Number</label>
                        <input type="text" name="contact" x-model="editingWorker.contact" required class="px-6 py-4 bg-black/[0.03] border-2 border-black rounded-2xl outline-none font-bold text-xs uppercase">
                    </div>
                </div>
                <button type="submit" class="w-full py-5 bg-black text-construction-yellow font-black rounded-2xl uppercase tracking-[0.3em] hover:bg-construction-yellow hover:text-black transition-all shadow-heavy mt-4">Update Dossier</button>
            </form>
        </div>
    </div>
</div>
@endsection
