@extends('dashboard.layout')

@section('header', 'Daftar Harga Bahan')

@section('content')
<div class="space-y-10 md:space-y-16 animate-in fade-in duration-1000">
    <!-- Header Actions -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div>
            <h2 class="text-3xl md:text-4xl font-black tracking-tighter text-black uppercase">Market Price Index</h2>
            <p class="text-[10px] md:text-[11px] font-black text-black/30 uppercase mt-2 tracking-[0.3em]">Last Updated: {{ date('d M Y') }} — Regional Jakarta/Jawa Barat</p>
        </div>
        <div class="flex items-center gap-4">
            <button class="px-6 py-3 bg-black text-white rounded-xl font-black text-[10px] uppercase tracking-widest hover:bg-construction-yellow hover:text-black transition-all duration-300 shadow-heavy">
                Update Index
            </button>
        </div>
    </div>

    <!-- Pricing Table -->
    <div class="bg-white rounded-[32px] md:rounded-[40px] border-2 border-black overflow-hidden shadow-heavy">
        <div class="px-6 md:px-12 py-8 md:py-10 border-b-2 border-black bg-black/[0.02] flex flex-col sm:flex-row items-center justify-between gap-4">
            <h4 class="text-[10px] md:text-[11px] font-black uppercase tracking-[0.5em] text-black italic">Material Valuation Matrix</h4>
            <div class="flex items-center gap-3">
                <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                <span class="text-[9px] md:text-[10px] font-black text-black uppercase tracking-widest">Pricing: Stable</span>
            </div>
        </div>
        <div class="overflow-x-auto custom-scrollbar">
            <table class="w-full text-left text-sm min-w-[800px] md:min-w-0">
                <thead class="bg-black text-construction-yellow font-black uppercase text-[10px] tracking-[0.3em]">
                    <tr>
                        <th class="px-8 md:px-12 py-5 md:py-8">Material Name</th>
                        <th class="px-8 md:px-12 py-5 md:py-8">Category</th>
                        <th class="px-8 md:px-12 py-5 md:py-8">Unit</th>
                        <th class="px-8 md:px-12 py-5 md:py-8 text-right">Base Price</th>
                        <th class="px-8 md:px-12 py-5 md:py-8">Trend</th>
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
                                <p class="text-[10px] text-black/30 font-bold mb-1 tracking-widest">EST. PRICE</p>
                                Rp {{ number_format($item->min_price, 0, ',', '.') }} - {{ number_format($item->max_price, 0, ',', '.') }}
                            </td>
                            <td class="px-8 md:px-12 py-5 md:py-6">
                                <span class="text-black/30 font-bold text-[10px] tracking-widest uppercase italic">● Verified Index</span>
                            </td>
                        </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
