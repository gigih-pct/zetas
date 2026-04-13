@extends('dashboard.layout')

@section('header', 'Warehouse Matrix v.1')

@section('content')
<div x-data="{ 
    showCreateModal: false, 
    showEditModal: false, 
    editingItem: {},
    editItem(item) {
        this.editingItem = item;
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
                <p class="text-[10px] font-black uppercase text-construction-yellow tracking-widest">Stock Alert</p>
                <p class="text-xs font-bold text-white uppercase tracking-tight">{{ session('success') }}</p>
            </div>
            <button @click="showModal = false" class="ml-4 text-white/40 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
        </div>
    </div>
    @endif

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
                <p class="text-3xl font-black group-hover:text-black transition-colors tabular-nums">
                    Rp {{ number_format($totalValuation / 1000000000, 2) }} <span class="text-lg opacity-40 italic">M</span>
                </p>
            </div>
            <button @click="showCreateModal = true" class="px-10 py-8 bg-construction-yellow text-black font-black rounded-[40px] border-2 border-black shadow-heavy hover:bg-black hover:text-white transition-all transform active:scale-95 flex items-center justify-center gap-4 group">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                <span class="text-[10px] uppercase tracking-[0.3em]">Stock Inbound</span>
            </button>
        </div>
    </div>

    <!-- Inventory Mosaic -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10">
        @foreach($inventories as $item)
        <div class="bg-white border-2 border-black rounded-[48px] overflow-hidden group hover:shadow-heavy transition-all duration-500 relative flex flex-col">
            <!-- Material Head -->
            <div class="p-10 border-b-2 border-black flex-1">
                <div class="flex items-center justify-between mb-8">
                    <span class="text-[9px] font-black text-black/20 uppercase tracking-[0.4em]">{{ $item->category }}</span>
                    @if($item->status == 'Critical' || $item->status == 'Low')
                        <div class="px-3 py-1 bg-red-500 text-white text-[8px] font-black rounded uppercase tracking-widest animate-pulse">Critical</div>
                    @else
                        <div class="w-2 h-2 rounded-full border border-black group-hover:bg-black transition-colors"></div>
                    @endif
                </div>
                <h4 class="text-3xl font-black uppercase tracking-tighter mb-4 group-hover:text-construction-yellow transition-colors leading-none">{{ $item->name }}</h4>
                <div class="flex items-baseline gap-2">
                    <span class="text-6xl font-black tracking-tighter tabular-nums">{{ $item->stock >= 1000 ? number_format($item->stock / 1000, 1) . 'k' : $item->stock }}</span>
                    <span class="text-[10px] font-black uppercase tracking-widest text-black/30 border-l-2 border-black/10 pl-3 ml-2">{{ $item->unit }}</span>
                </div>
            </div>
            
            <!-- Material Actions -->
            <div class="px-10 py-8 bg-black/[0.02] flex items-center justify-between">
                <div class="flex flex-col">
                    <span class="text-[8px] font-black uppercase tracking-widest text-black/20 mb-1 italic">Availability</span>
                    <span class="text-[10px] font-black uppercase">{{ $item->status }}</span>
                </div>
                <div class="flex gap-2">
                    <button @click="editItem({{ json_encode($item) }})" class="p-4 bg-black text-white rounded-2xl hover:bg-construction-yellow hover:text-black transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M12 20h9M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                    </button>
                    <form action="{{ route('dashboard.bahan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Decommission this material from physical store?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-4 bg-black/[0.05] text-black hover:bg-red-500 hover:text-white rounded-2xl transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- Blueprint Accent Background -->
            <div class="absolute bottom-0 right-0 w-24 h-24 matrix-pattern opacity-0 group-hover:opacity-10 transition-opacity"></div>
        </div>
        @endforeach

        <!-- Add Protocol Item -->
        <div @click="showCreateModal = true" class="border-4 border-dashed border-black/10 rounded-[48px] flex flex-col items-center justify-center p-16 hover:bg-black hover:border-black group transition-all duration-500 cursor-pointer text-center">
            <div class="w-20 h-20 bg-black text-construction-yellow rounded-3xl flex items-center justify-center shadow-heavy mb-8 group-hover:bg-construction-yellow group-hover:text-black transition-all transform group-hover:rotate-45">
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            </div>
            <p class="text-[10px] font-black text-black/20 group-hover:text-construction-yellow uppercase tracking-[0.5em] leading-relaxed">System Index<br>New Entry</p>
        </div>
    </div>

    <!-- Modals Layer -->
    <div x-show="showCreateModal || showEditModal" class="fixed inset-0 z-[60] flex items-center justify-center p-6" x-cloak>
        <div class="fixed inset-0 bg-black/80 backdrop-blur-sm" @click="showCreateModal = false; showEditModal = false"></div>
        
        <!-- Create Modal -->
        <div x-show="showCreateModal" class="bg-white border-4 border-black w-full max-w-2xl rounded-[48px] shadow-heavy relative z-10 overflow-hidden">
            <div class="bg-black p-8 flex justify-between items-center">
                <h3 class="text-xl font-black text-construction-yellow uppercase tracking-tighter">Stock Inbound Protocol</h3>
                <button @click="showCreateModal = false" class="text-white/40 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <form action="{{ route('dashboard.bahan.store') }}" method="POST" class="p-10 space-y-6">
                @csrf
                <div class="grid grid-cols-2 gap-6">
                    <div class="flex flex-col gap-2">
                        <label class="text-[9px] font-black uppercase text-black/40">Material Name</label>
                        <input type="text" name="name" required class="px-6 py-4 bg-black/[0.03] border-2 border-black rounded-2xl outline-none focus:bg-construction-yellow/10 font-bold uppercase text-xs">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-[9px] font-black uppercase text-black/40">Category Tag</label>
                        <select name="category" required class="px-6 py-4 bg-black/[0.03] border-2 border-black rounded-2xl outline-none font-bold uppercase text-xs cursor-pointer">
                            <option value="Binder">Binder</option>
                            <option value="Structure">Structure</option>
                            <option value="Aggregates">Aggregates</option>
                            <option value="Finishing">Finishing</option>
                            <option value="Plumbing">Plumbing</option>
                            <option value="Electrical">Electrical</option>
                            <option value="Logistics">Logistics</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-6">
                    <div class="flex flex-col gap-2">
                        <label class="text-[9px] font-black uppercase text-black/40">Init Stock</label>
                        <input type="number" name="stock" required class="px-6 py-4 bg-black/[0.03] border-2 border-black rounded-2xl outline-none font-bold text-xs uppercase">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-[9px] font-black uppercase text-black/40">Unit</label>
                        <input type="text" name="unit" required placeholder="Zak / Btg" class="px-6 py-4 bg-black/[0.03] border-2 border-black rounded-2xl outline-none font-bold uppercase text-xs">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-[9px] font-black uppercase text-black/40">Unit Price</label>
                        <input type="number" name="unit_price" required class="px-6 py-4 bg-black/[0.03] border-2 border-black rounded-2xl outline-none font-bold text-xs uppercase">
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-[9px] font-black uppercase text-black/40">Availability Status</label>
                    <select name="status" required class="px-6 py-4 bg-black/[0.03] border-2 border-black rounded-2xl outline-none font-bold uppercase text-xs cursor-pointer">
                        <option value="Stable">Stable</option>
                        <option value="Low">Low</option>
                        <option value="Critical">Critical</option>
                        <option value="Incoming">Incoming</option>
                        <option value="High">High</option>
                    </select>
                </div>
                <button type="submit" class="w-full py-5 bg-black text-construction-yellow font-black rounded-2xl uppercase tracking-[0.3em] hover:bg-construction-yellow hover:text-black transition-all shadow-heavy mt-4">Execute Inbound</button>
            </form>
        </div>

        <!-- Edit Modal -->
        <div x-show="showEditModal" class="bg-white border-4 border-black w-full max-w-2xl rounded-[48px] shadow-heavy relative z-10 overflow-hidden">
            <div class="bg-construction-yellow p-8 flex justify-between items-center text-black">
                <h3 class="text-xl font-black uppercase tracking-tighter">Adjust Material Matrix</h3>
                <button @click="showEditModal = false" class="text-black/40 hover:text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <form :action="`/dashboard/internal/bahan/${editingItem.id}`" method="POST" class="p-10 space-y-6">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-2 gap-6">
                    <div class="flex flex-col gap-2">
                        <label class="text-[9px] font-black uppercase text-black/40">Material Name</label>
                        <input type="text" name="name" x-model="editingItem.name" required class="px-6 py-4 bg-black/[0.03] border-2 border-black rounded-2xl font-bold uppercase text-xs">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-[9px] font-black uppercase text-black/40">Category Tag</label>
                        <select name="category" x-model="editingItem.category" required class="px-6 py-4 bg-black/[0.03] border-2 border-black rounded-2xl font-bold uppercase text-xs">
                            <option value="Binder">Binder</option>
                            <option value="Structure">Structure</option>
                            <option value="Aggregates">Aggregates</option>
                            <option value="Finishing">Finishing</option>
                            <option value="Plumbing">Plumbing</option>
                            <option value="Electrical">Electrical</option>
                            <option value="Logistics">Logistics</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-6">
                    <div class="flex flex-col gap-2">
                        <label class="text-[9px] font-black uppercase text-black/40">Current Stock</label>
                        <input type="number" name="stock" x-model="editingItem.stock" required class="px-6 py-4 bg-black/[0.03] border-2 border-black rounded-2xl font-bold text-xs uppercase">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-[9px] font-black uppercase text-black/40">Unit</label>
                        <input type="text" name="unit" x-model="editingItem.unit" required class="px-6 py-4 bg-black/[0.03] border-2 border-black rounded-2xl font-bold uppercase text-xs">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-[9px] font-black uppercase text-black/40">Unit Price</label>
                        <input type="number" name="unit_price" x-model="editingItem.unit_price" required class="px-6 py-4 bg-black/[0.03] border-2 border-black rounded-2xl font-bold text-xs uppercase">
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-[9px] font-black uppercase text-black/40">Availability Status</label>
                    <select name="status" x-model="editingItem.status" required class="px-6 py-4 bg-black/[0.03] border-2 border-black rounded-2xl font-bold uppercase text-xs cursor-pointer">
                        <option value="Stable">Stable</option>
                        <option value="Low">Low</option>
                        <option value="Critical">Critical</option>
                        <option value="Incoming">Incoming</option>
                        <option value="High">High</option>
                    </select>
                </div>
                <button type="submit" class="w-full py-5 bg-black text-construction-yellow font-black rounded-2xl uppercase tracking-[0.3em] hover:bg-construction-yellow hover:text-black transition-all shadow-heavy mt-4">Commit Adjustment</button>
            </form>
        </div>
    </div>
</div>
@endsection
