@extends('dashboard.layout')

@section('header', 'Daftar Harga Bahan')

@section('content')
<div x-data="{ 
    showCreateModal: false, 
    showEditModal: false, 
    editingItem: { id: null, name: '', category: '', unit: '', min_price: 0, max_price: 0 },
    openEdit(item) {
        this.editingItem = { ...item };
        this.showEditModal = true;
    }
}" class="space-y-10 md:space-y-16 animate-in fade-in duration-1000">
    
    @if(session('success'))
    <div class="fixed top-10 right-10 z-[100] animate-in slide-in-from-right-10 duration-500">
        <div class="bg-black text-construction-yellow px-8 py-4 rounded-2xl border-2 border-construction-yellow shadow-heavy flex items-center gap-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
            <span class="text-[11px] font-black uppercase tracking-widest">{{ session('success') }}</span>
        </div>
    </div>
    @endif

    <!-- Header Actions -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div>
            <h2 class="text-3xl md:text-4xl font-black tracking-tighter text-black uppercase">Market Price Index</h2>
            <p class="text-[10px] md:text-[11px] font-black text-black/30 uppercase mt-2 tracking-[0.3em]">Last Updated: {{ date('d M Y') }} — Regional Jakarta/Jawa Barat</p>
        </div>
        <div class="flex flex-col sm:flex-row items-center gap-4">
            <form action="{{ route('dashboard.harga-bahan') }}" method="GET" class="flex flex-col sm:flex-row items-center gap-4 w-full sm:w-auto">
                <div class="relative w-full sm:w-64">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search Material..." class="w-full pl-12 pr-6 py-4 bg-black/[0.03] border-2 border-black rounded-xl focus:bg-construction-yellow/10 transition-all font-black text-[11px] uppercase tracking-widest outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" class="absolute left-4 top-1/2 -translate-y-1/2 text-black/20"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                </div>
                <select name="category" onchange="this.form.submit()" class="w-full sm:w-auto pl-6 pr-10 py-4 bg-black/[0.03] border-2 border-black rounded-xl focus:bg-construction-yellow/10 transition-all font-black text-[11px] uppercase tracking-widest outline-none appearance-none cursor-pointer">
                    <option value="">All Categories</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>
            </form>
            <button @click="showCreateModal = true" class="w-full sm:w-auto px-8 py-4 bg-black text-white rounded-xl font-black text-[10px] uppercase tracking-widest hover:bg-construction-yellow hover:text-black transition-all duration-300 shadow-heavy flex items-center justify-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                Add Material
            </button>
        </div>
    </div>

    <!-- Pricing Table -->
    <div class="bg-white rounded-[32px] md:rounded-[40px] border-2 border-black overflow-hidden shadow-heavy">
        <div class="px-6 md:px-12 py-8 md:py-10 border-b-2 border-black bg-black/[0.02] flex flex-col sm:flex-row items-center justify-between gap-4">
            <h4 class="text-[10px] md:text-[11px] font-black uppercase tracking-[0.5em] text-black italic">Material Valuation Matrix</h4>
            <div class="flex items-center gap-3">
                <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                <span class="text-[9px] md:text-[10px] font-black text-black uppercase tracking-widest">Database: Synchronized</span>
            </div>
        </div>
        <div class="overflow-x-auto custom-scrollbar">
            <table class="w-full text-left text-sm min-w-[800px] md:min-w-0">
                <thead class="bg-black text-construction-yellow font-black uppercase text-[10px] tracking-[0.3em]">
                    <tr>
                        <th class="px-8 md:px-12 py-5 md:py-8">Material Name</th>
                        <th class="px-8 md:px-12 py-5 md:py-8">Category</th>
                        <th class="px-8 md:px-12 py-5 md:py-8">Unit</th>
                        <th class="px-8 md:px-12 py-5 md:py-8 text-right">Base Price Index</th>
                        <th class="px-8 md:px-12 py-5 md:py-8 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-black/[0.05]">
                    @foreach($groupedMaterials as $category => $items)
                        <tr class="bg-black/[0.02]">
                            <td colspan="5" class="px-8 md:px-12 py-3 border-y border-black/10">
                                <span class="text-[9px] font-black uppercase tracking-[0.3em] text-black/40">{{ $category }}</span>
                            </td>
                        </tr>
                        @foreach($items as $item)
                        <tr class="hover:bg-construction-yellow/10 transition-colors group">
                            <td class="px-8 md:px-12 py-5 md:py-6">
                                <p class="font-black text-sm text-black uppercase tracking-tight">{{ $item->name }}</p>
                            </td>
                            <td class="px-8 md:px-12 py-5 md:py-6">
                                <span class="text-[10px] font-bold text-black/40 uppercase tracking-widest">{{ $item->category }}</span>
                            </td>
                            <td class="px-8 md:px-12 py-5 md:py-6">
                                <span class="text-[11px] font-black text-black uppercase tracking-tighter">{{ $item->unit }}</span>
                            </td>
                            <td class="px-8 md:px-12 py-5 md:py-6 text-right font-black text-black">
                                <p class="text-[9px] text-black/30 font-bold mb-1 tracking-widest">EST. RANGE</p>
                                Rp {{ number_format($item->min_price, 0, ',', '.') }} - {{ number_format($item->max_price, 0, ',', '.') }}
                            </td>
                            <td class="px-8 md:px-12 py-5 md:py-6 text-right">
                                <div class="flex items-center justify-end gap-3 transition-opacity">
                                    <button 
                                        @click="openEdit({{ $item->toJson() }})"
                                        class="p-2 bg-black text-white hover:bg-construction-yellow hover:text-black rounded-lg transition-all shadow-heavy"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                    </button>
                                    <form action="{{ route('dashboard.harga-bahan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Archive this data permanently?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="p-2 bg-red-500 text-white hover:bg-red-600 rounded-lg transition-all shadow-heavy">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Create Modal -->
    <div x-show="showCreateModal" class="fixed inset-0 z-[110] flex items-center justify-center px-6" x-cloak>
        <div @click="showCreateModal = false" class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity"></div>
        <div class="bg-white rounded-[40px] border-2 border-black shadow-heavy w-full max-w-xl relative overflow-hidden z-[120] animate-in zoom-in-95 duration-300">
            <div class="px-10 py-8 border-b-2 border-black bg-black text-construction-yellow flex items-center justify-between">
                <h3 class="text-xs font-black uppercase tracking-[0.4em]">Initialize New Project Material</h3>
                <button @click="showCreateModal = false" class="text-white/40 hover:text-white transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <form action="{{ route('dashboard.harga-bahan.store') }}" method="POST" class="p-10 space-y-6">
                @csrf
                <div class="grid grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-black/40">Category Group</label>
                        <input type="text" name="category" required class="w-full px-5 py-3 bg-black/[0.03] border-2 border-black rounded-xl focus:bg-construction-yellow/10 transition-all font-bold text-sm outline-none" placeholder="e.g. Beton & Semen">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-black/40">Material Name</label>
                        <input type="text" name="name" required class="w-full px-5 py-3 bg-black/[0.03] border-2 border-black rounded-xl focus:bg-construction-yellow/10 transition-all font-bold text-sm outline-none" placeholder="e.g. Semen OPC 50kg">
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-black/40">Unit</label>
                        <input type="text" name="unit" required class="w-full px-5 py-3 bg-black/[0.03] border-2 border-black rounded-xl focus:bg-construction-yellow/10 transition-all font-bold text-sm outline-none" placeholder="e.g. Sak">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-black/40">Min Price (IDR)</label>
                        <input type="number" name="min_price" required class="w-full px-5 py-3 bg-black/[0.03] border-2 border-black rounded-xl focus:bg-construction-yellow/10 transition-all font-bold text-sm outline-none" placeholder="0">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-black/40">Max Price (IDR)</label>
                        <input type="number" name="max_price" required class="w-full px-5 py-3 bg-black/[0.03] border-2 border-black rounded-xl focus:bg-construction-yellow/10 transition-all font-bold text-sm outline-none" placeholder="0">
                    </div>
                </div>
                <button type="submit" class="w-full py-5 bg-black text-construction-yellow rounded-2xl font-black uppercase tracking-[0.3em] hover:bg-black/90 transition-all shadow-heavy mt-4">
                    Commit To Registry
                </button>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    <div x-show="showEditModal" class="fixed inset-0 z-[110] flex items-center justify-center px-6" x-cloak>
        <div @click="showEditModal = false" class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity"></div>
        <div class="bg-white rounded-[40px] border-2 border-black shadow-heavy w-full max-w-xl relative overflow-hidden z-[120] animate-in zoom-in-95 duration-300">
            <div class="px-10 py-8 border-b-2 border-black bg-construction-yellow text-black flex items-center justify-between">
                <h3 class="text-xs font-black uppercase tracking-[0.4em]">Modify Registered Index</h3>
                <button @click="showEditModal = false" class="text-black/40 hover:text-black transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <form :action="'{{ url('dashboard/internal/harga-bahan') }}/' + editingItem.id" method="POST" class="p-10 space-y-6">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-black/40">Category Group</label>
                        <input type="text" name="category" x-model="editingItem.category" required class="w-full px-5 py-3 bg-black/[0.03] border-2 border-black rounded-xl focus:bg-construction-yellow/10 transition-all font-bold text-sm outline-none">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-black/40">Material Name</label>
                        <input type="text" name="name" x-model="editingItem.name" required class="w-full px-5 py-3 bg-black/[0.03] border-2 border-black rounded-xl focus:bg-construction-yellow/10 transition-all font-bold text-sm outline-none">
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-black/40">Unit</label>
                        <input type="text" name="unit" x-model="editingItem.unit" required class="w-full px-5 py-3 bg-black/[0.03] border-2 border-black rounded-xl focus:bg-construction-yellow/10 transition-all font-bold text-sm outline-none">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-black/40">Min Price (IDR)</label>
                        <input type="number" name="min_price" x-model="editingItem.min_price" required class="w-full px-5 py-3 bg-black/[0.03] border-2 border-black rounded-xl focus:bg-construction-yellow/10 transition-all font-bold text-sm outline-none">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-black/40">Max Price (IDR)</label>
                        <input type="number" name="max_price" x-model="editingItem.max_price" required class="w-full px-5 py-3 bg-black/[0.03] border-2 border-black rounded-xl focus:bg-construction-yellow/10 transition-all font-bold text-sm outline-none">
                    </div>
                </div>
                <button type="submit" class="w-full py-5 bg-black text-construction-yellow rounded-2xl font-black uppercase tracking-[0.3em] hover:bg-black/90 transition-all shadow-heavy mt-4">
                    Finalize Modifications
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
