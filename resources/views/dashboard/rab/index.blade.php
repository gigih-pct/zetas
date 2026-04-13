@extends('dashboard.layout')

@section('header', 'Audit Matrix v.4')

@section('content')
<div x-data="{ 
    aiOpen: false, 
    aiStep: 1, 
    aiLoading: false,
    aiData: { items: [], grand_total: 0, notes: '' },
    form: {
        building_type: 'Gudang Industri (Warehouse)',
        building_area: 1200,
        quality_level: 'Standar (Medium)',
        location: 'Yogyakarta',
        project_name: 'Proyek Baru Yogyakarta',
        region_id: '{{ $regions->where('name', 'DI Yogyakarta')->first()->id ?? '' }}'
    },
    aiSource: 'ai',
    message: '',
    async calculate() { 
        this.aiStep = 2; 
        try {
            const response = await axios.post('{{ route('dashboard.rab.ai-calculate') }}', this.form);
            if (response.data.status === 'success') {
                this.aiData = response.data.data;
                this.aiSource = response.data.source || 'ai';
                this.aiStep = 3;
            } else {
                alert('Gagal: ' + response.data.message);
                this.aiStep = 1;
            }
        } catch (e) {
            console.error(e);
            alert('Terjadi kesalahan saat menghubungi AI Gemini.');
            this.aiStep = 1;
        }
    },
    async saveToDatabase() {
        try {
            const payload = {
                ...this.form,
                data_breakdown: this.aiData.items,
                total_budget: this.aiData.grand_total,
                status: 'saved'
            };
            const response = await axios.post('{{ route('dashboard.rab.ai-store') }}', payload);
            if (response.data.status === 'success') {
                alert('RAB berhasil disimpan ke database!');
                this.aiOpen = false;
                window.location.reload();
            }
        } catch (e) {
            console.error(e);
            alert('Gagal menyimpan ke database.');
        }
    }
}" class="space-y-12 animate-in fade-in duration-1000">
    <!-- Matrix Header -->
    <div class="flex flex-col xl:flex-row justify-between items-start xl:items-center gap-10">
        <div class="flex gap-10 items-center">
            <div class="w-24 h-24 bg-black rounded-[40px] flex items-center justify-center text-construction-yellow shadow-heavy relative overflow-hidden">
                <div class="absolute inset-0 matrix-pattern opacity-20"></div>
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><line x1="12" y1="2" x2="12" y2="22"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
            </div>
            <div>
                <h3 class="text-3xl font-black uppercase tracking-tighter text-black">Financial Matrix</h3>
                <div class="flex items-center gap-4 mt-2">
                    <span class="text-[9px] font-black uppercase tracking-[0.4em] text-black/20">Audit Trail: Secured</span>
                    <div class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></div>
                </div>
            </div>
        </div>
        
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 w-full xl:w-auto">
            <div class="bg-black p-6 rounded-3xl text-center group hover:bg-construction-yellow transition-all duration-500">
                <span class="text-[8px] font-black text-white/30 group-hover:text-black/30 uppercase tracking-widest block mb-2">Total Budget</span>
                <p class="text-sm font-black text-white group-hover:text-black tracking-tight">Rp 12.4 B</p>
            </div>
            <div class="bg-white border-2 border-black p-6 rounded-3xl text-center group hover:bg-black transition-all duration-500">
                <span class="text-[8px] font-black text-black/30 group-hover:text-white/30 uppercase tracking-widest block mb-2">Deployed</span>
                <p class="text-sm font-black text-black group-hover:text-white tracking-tight">Rp 4.2 B</p>
            </div>
            <div class="bg-white border-2 border-black p-6 rounded-3xl text-center group hover:bg-black transition-all duration-500">
                <span class="text-[8px] font-black text-black/30 group-hover:text-white/30 uppercase tracking-widest block mb-2">Remaining</span>
                <p class="text-sm font-black text-black group-hover:text-white tracking-tight">Rp 8.2 B</p>
            </div>
            <div class="bg-construction-yellow border-2 border-black p-6 rounded-3xl text-center group hover:bg-black transition-all duration-500 shadow-xl">
                <span class="text-[8px] font-black text-black/30 group-hover:text-white/30 uppercase tracking-widest block mb-2">Efficiency</span>
                <p class="text-sm font-black text-black group-hover:text-white tracking-tight">94.2%</p>
            </div>
        </div>
    </div>

    <!-- Data Matrix Grid -->
    <div class="bg-white border-2 border-black rounded-[48px] shadow-heavy overflow-hidden">
        <div class="p-8 md:p-12 border-b-2 border-black bg-black/[0.02] flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-6">
                <div class="flex gap-1">
                    <div class="w-1.5 h-6 bg-black"></div>
                    <div class="w-1.5 h-6 bg-black/20"></div>
                </div>
                <h4 class="text-[11px] font-black uppercase tracking-[0.4em]">Budget Allocation Matrix</h4>
            </div>
            <div class="flex items-center gap-4 w-full md:w-auto">
                <input type="text" placeholder="FILTER NODE..." class="flex-1 md:w-64 px-6 py-3 bg-black/[0.03] border-2 border-black rounded-xl text-[10px] font-black uppercase tracking-widest outline-none focus:bg-construction-yellow/10">
                <button class="p-3 bg-black text-construction-yellow rounded-xl shadow-xl hover:scale-110 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><line x1="4" y1="21" x2="4" y2="14"></line><line x1="4" y1="10" x2="4" y2="3"></line><line x1="12" y1="21" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="3"></line><line x1="20" y1="21" x2="20" y2="16"></line><line x1="20" y1="12" x2="20" y2="3"></line><line x1="1" y1="14" x2="7" y2="14"></line><line x1="9" y1="8" x2="15" y2="8"></line><line x1="17" y1="16" x2="23" y2="16"></line></svg>
                </button>
                <button @click="aiOpen = true; aiStep = 1" class="px-6 py-3 bg-construction-yellow text-black border-2 border-black rounded-xl text-[10px] font-black uppercase tracking-[0.2em] shadow-apple hover:bg-black hover:text-construction-yellow transition-all flex items-center gap-2 group">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" class="group-hover:animate-pulse"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                    Hitung via AI Gemini
                </button>
            </div>
        </div>

        <div class="overflow-x-auto custom-scrollbar">
            <table class="w-full text-left min-w-[1000px]">
                <thead>
                    <tr class="bg-black text-construction-yellow text-[9px] font-black uppercase tracking-[0.3em]">
                        <th class="px-12 py-8">Matrix Node</th>
                        <th class="px-12 py-8">Authorized Limit</th>
                        <th class="px-12 py-8">Current Burn</th>
                        <th class="px-12 py-8 text-center">Utilization</th>
                        <th class="px-12 py-8 text-right">Operational Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-black/5">
                    @php
                        $rabItems = [
                            ['Jakarta C3 Warehouse', '4,250,000,000', '1,500,000,000', 35],
                            ['Zetas Central HQ', '5,800,000,000', '5,336,000,000', 92],
                            ['Bekasi Logistics Hub', '1,200,000,000', '420,000,000', 35],
                            ['Tangerang Site 04', '850,000,000', '125,000,000', 14],
                        ];
                    @endphp

                    @foreach($rabItems as $item)
                    <tr class="hover:bg-black/[0.02] transition-colors group">
                        <td class="px-12 py-10 font-black uppercase tracking-tighter text-black">
                            {{ $item[0] }}
                            <p class="text-[8px] font-bold text-black/20 mt-1 tracking-[0.4em]">UUID: ZT-RAB-{{ rand(100,999) }}</p>
                        </td>
                        <td class="px-12 py-10 tabular-nums font-bold text-sm">
                            <span class="text-[10px] text-black/30 font-black mr-2 italic tracking-tighter">IDR</span>{{ $item[1] }}
                        </td>
                        <td class="px-12 py-10 tabular-nums font-bold text-sm text-red-500">
                            <span class="text-[10px] text-red-500/30 font-black mr-2 italic tracking-tighter">IDR</span>{{ $item[2] }}
                        </td>
                        <td class="px-12 py-10">
                            <div class="flex flex-col gap-3 items-center">
                                <div class="w-full max-w-[120px] h-2 bg-black/5 rounded-full overflow-hidden p-0.5 border border-black/5">
                                    <div class="h-full bg-black rounded-full" style="width: {{ $item[3] }}%"></div>
                                </div>
                                <span class="text-[10px] font-black">{{ $item[3] }}%</span>
                            </div>
                        </td>
                        <td class="px-12 py-10 text-right">
                            <div class="flex items-center justify-end gap-4 overflow-hidden">
                                <button class="px-6 py-2.5 bg-black text-white rounded-lg text-[9px] font-black uppercase tracking-widest hover:bg-construction-yellow hover:text-black transition-all">Audit</button>
                                <button class="px-6 py-2.5 box-border border-2 border-black rounded-lg text-[9px] font-black uppercase tracking-widest hover:bg-black hover:text-white transition-all">Report</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="p-10 bg-black text-white flex flex-col md:flex-row justify-between items-center gap-10">
            <div class="flex items-center gap-10">
                <div>
                    <span class="text-[8px] font-black text-white/30 uppercase tracking-[0.4em] block mb-2">Matrix Aggregation</span>
                    <p class="text-3xl font-black tracking-tighter">Rp 12,456,220,000</p>
                </div>
                <div class="hidden sm:block w-px h-16 bg-white/10"></div>
                <div class="hidden sm:block">
                    <span class="text-[8px] font-black text-white/30 uppercase tracking-[0.4em] block mb-2">Protocol Status</span>
                    <p class="text-xs font-black text-construction-yellow uppercase tracking-widest flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-construction-yellow"></span>
                        Locked For Processing
                    </p>
                </div>
            </div>
            <button class="w-full md:w-auto px-12 py-5 bg-construction-yellow text-black rounded-2xl font-black text-[10px] uppercase tracking-[0.4em] hover:bg-white transition-all shadow-heavy">
                Initialize Export Protocol
            </button>
        </div>
    </div>

    <!-- AI Gemini Modal -->
    <div x-show="aiOpen" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-black/80 backdrop-blur-sm" @click="aiOpen = false"></div>
        
        <!-- Modal Content -->
        <div class="relative w-full max-w-4xl bg-white rounded-[40px] border-4 border-black p-10 lg:p-14 shadow-heavy overflow-hidden max-h-[90vh] overflow-y-auto">
            
            <div class="flex items-center justify-between border-b-2 border-black pb-8 mb-10">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-black rounded-xl flex items-center justify-center shadow-apple border-2 border-construction-yellow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#FFCD00" stroke-width="3" class="animate-pulse"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-black tracking-tighter uppercase">Gemini AI Estimator</h3>
                        <p class="text-[10px] font-black uppercase tracking-[0.3em] text-black/40">Automated Construction RAB</p>
                    </div>
                </div>
                <button @click="aiOpen = false" class="text-black/30 hover:text-black transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>

            <!-- Step 1: Input Matrix -->
            <div x-show="aiStep === 1" x-data="{ fileName: null }" class="space-y-8 animate-in fade-in zoom-in-95 duration-500">
                <p class="text-[11px] font-black uppercase tracking-[0.4em] text-black">Input Blueprint Logic</p>
                
                <!-- Dummy File Upload -->
                <div class="relative w-full border-4 border-dashed border-black/20 rounded-[30px] p-12 hover:border-black hover:bg-black/[0.02] transition-colors group text-center cursor-pointer overflow-hidden">
                    <input type="file" @change="fileName = $event.target.files[0]?.name" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" accept=".pdf,.dwg,.png,.jpg">
                    <div class="flex flex-col items-center justify-center gap-5">
                        <div class="w-16 h-16 bg-black rounded-2xl flex items-center justify-center border-2 border-transparent group-hover:bg-construction-yellow group-hover:border-black transition-colors shadow-apple">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#FFCD00" stroke-width="3" class="group-hover:stroke-black transition-colors"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
                        </div>
                        <div>
                            <template x-if="!fileName">
                                <div>
                                    <h4 class="text-xl font-black uppercase tracking-tight text-black">Upload Blueprint Disain</h4>
                                    <p class="text-[10px] font-black uppercase tracking-widest text-black/40 mt-2">Format: PDF, DWG, PNG (Max 50MB)</p>
                                </div>
                            </template>
                            <template x-if="fileName">
                                <div>
                                    <h4 class="text-xl font-black uppercase tracking-tight text-black px-4 py-2 bg-construction-yellow border-2 border-black rounded-xl inline-block" x-text="fileName"></h4>
                                    <p class="text-[10px] font-black uppercase tracking-widest text-black/40 mt-3">Disain siap di-scan AI</p>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-widest mb-3">Tipe Pembangunan</label>
                        <select x-model="form.building_type" class="w-full bg-black/[0.03] border-2 border-black/10 focus:border-black rounded-xl px-5 py-4 text-xs font-bold outline-none transition-all">
                            <option>Gudang Industri (Warehouse)</option>
                            <option>Kantor Komersial</option>
                            <option>Perumahan (Residensial)</option>
                            <option>Jembatan / Infrastruktur</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-widest mb-3">Luas Bangunan (m2)</label>
                        <input x-model="form.building_area" type="number" class="w-full bg-black/[0.03] border-2 border-black/10 focus:border-black rounded-xl px-5 py-4 text-xs font-bold outline-none transition-all">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-widest mb-3">Tingkat Kualitas Material</label>
                        <select x-model="form.quality_level" class="w-full bg-black/[0.03] border-2 border-black/10 focus:border-black rounded-xl px-5 py-4 text-xs font-bold outline-none transition-all">
                            <option>Premium (Heavy Duty)</option>
                            <option>Standar (Medium)</option>
                            <option>Ekonomis</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-widest mb-3">Wilayah Utama</label>
                        <select x-model="form.region_id" class="w-full bg-black/[0.03] border-2 border-black/10 focus:border-black rounded-xl px-5 py-4 text-xs font-bold outline-none transition-all">
                            <option value="">Pilih Wilayah...</option>
                            @foreach($regions as $region)
                                <option value="{{ $region->id }}">{{ $region->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-widest mb-3">Lokasi Proyek Spesifik</label>
                        <input x-model="form.location" type="text" class="w-full bg-black/[0.03] border-2 border-black/10 focus:border-black rounded-xl px-5 py-4 text-xs font-bold outline-none transition-all">
                    </div>
                </div>

                <div class="pt-8 flex justify-between items-center">
                    <p class="text-[9px] font-black uppercase tracking-widest text-black/30 w-1/2">AI akan menggabungkan struktur dari file upload dengan spesifikasi manual form ini.</p>
                    <button @click="calculate()" class="px-10 py-5 bg-construction-yellow text-black font-black uppercase tracking-[0.3em] rounded-xl border-2 border-black shadow-heavy hover:bg-black hover:text-construction-yellow transition-all text-[11px] flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                        Proses Algoritma AI
                    </button>
                </div>
            </div>

            <!-- Step 2: Loading State -->
            <div x-show="aiStep === 2" class="py-20 flex flex-col items-center justify-center animate-in fade-in duration-500">
                <div class="relative w-24 h-24 mb-8">
                    <div class="absolute inset-0 rounded-full border-4 border-black/10"></div>
                    <div class="absolute inset-0 rounded-full border-4 border-construction-yellow border-t-transparent animate-spin"></div>
                    <div class="absolute inset-0 flex items-center justify-center text-black font-black text-2xl">Z</div>
                </div>
                <h4 class="text-xl font-black uppercase tracking-tighter mb-2 text-center animate-pulse">Gemini AI is Calculating</h4>
                <p class="text-[10px] font-black uppercase tracking-[0.3em] text-black/40 text-center">Estimating Material Volumes & Live Market Pricing</p>
            </div>

            <!-- Step 3: Result Breakdown -->
            <div x-show="aiStep === 3" class="animate-in slide-in-from-bottom-10 fade-in duration-700 w-full" id="rab-printable">
                <style>
                    @media print {
                        body * { visibility: hidden; }
                        #rab-printable, #rab-printable * { visibility: visible; }
                        #rab-printable {
                            position: absolute;
                            left: 0;
                            top: 0;
                            width: 100vw;
                            box-shadow: none !important;
                            border: none !important;
                            background: white !important;
                            color: black !important;
                            margin: 0 !important;
                            padding: 20px !important;
                            max-height: none !important;
                            overflow: visible !important;
                        }
                        .no-print { display: none !important; }
                    }
                </style>

                <!-- Document Header -->
                <div class="mb-8 border-b-4 border-black pb-6 flex justify-between items-start">
                    <div>
                        <h2 class="text-3xl font-black uppercase tracking-tighter">Dokumen RAB Terkomputasi</h2>
                        <p class="text-[10px] font-black uppercase tracking-[0.3em] text-black/40 mt-1">Estimasi Generasi Algoritma AI Gemini</p>
                    </div>
                    <div class="text-right">
                        <p class="text-[9px] font-black uppercase tracking-widest text-white px-3 py-1 bg-blue-600 rounded-lg inline-block mb-1" x-show="aiSource === 'ai'">Source: Gemini AI Progresif</p>
                        <p class="text-[9px] font-black uppercase tracking-widest text-black px-3 py-1 bg-construction-yellow rounded-lg inline-block mb-1" x-show="aiSource === 'fallback'">Source: Algoritma Standar (Fallback)</p>
                        <p class="text-[10px] font-bold uppercase text-black/60 block">Tgl: {{ date('d M Y') }}</p>
                    </div>
                </div>

                <div class="mb-8 grid grid-cols-2 gap-4 text-xs font-bold uppercase tracking-widest bg-black/[0.02] p-6 border-2 border-black/10 rounded-2xl">
                    <div>
                        <span class="text-black/40 block mb-1">Nama Proyek:</span>
                        <input type="text" x-model="form.project_name" class="bg-transparent border-none p-0 text-black font-black focus:ring-0 w-full" placeholder="Masukkan Nama Proyek...">
                    </div>
                    <div>
                        <span class="text-black/40 block mb-1">Lokasi Dasar:</span>
                        <span class="text-black font-black" x-text="form.location"></span>
                    </div>
                </div>

                <!-- Structured RAB Table -->
                <div class="border-2 border-black rounded-2xl overflow-hidden mb-8">
                    <table class="w-full text-[10px] sm:text-xs text-left">
                        <thead class="bg-black text-construction-yellow font-black uppercase text-[9px] tracking-widest border-b-2 border-black">
                            <tr>
                                <th class="py-4 px-4 w-12 text-center">No.</th>
                                <th class="py-4 px-4 border-l border-black/20">Uraian Pekerjaan</th>
                                <th class="py-4 px-4 w-16 text-center border-l border-black/20">Sat.</th>
                                <th class="py-4 px-4 w-16 text-center border-l border-black/20">Vol.</th>
                                <th class="py-4 px-4 text-right border-l border-black/20">Harga Satuan (Rp)</th>
                                <th class="py-4 px-4 text-right border-l border-black/20">Jumlah Harga (Rp)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-black/10">
                            <template x-for="item in aiData.items" :key="item.no">
                                <tr class="hover:bg-black/[0.02] transition-colors">
                                    <td class="py-3 px-4 text-center" x-text="item.no"></td>
                                    <td class="py-3 px-4 font-bold border-l border-black/5" x-text="item.description"></td>
                                    <td class="py-3 px-4 text-center border-l border-black/5" x-text="item.unit"></td>
                                    <td class="py-3 px-4 text-center border-l border-black/5" x-text="item.volume"></td>
                                    <td class="py-3 px-4 text-right border-l border-black/5" x-text="new Intl.NumberFormat('id-ID').format(item.unit_price)"></td>
                                    <td class="py-3 px-4 text-right font-black border-l border-black/5" x-text="new Intl.NumberFormat('id-ID').format(item.total_price)"></td>
                                </tr>
                            </template>
                            
                            <!-- Totals -->
                            <tr class="border-t-4 border-black font-black uppercase text-xs">
                                <td colspan="5" class="py-4 px-4 text-right border-l border-black/5">Total Pekerjaan</td>
                                <td class="py-4 px-4 text-right border-l border-black/5" x-text="new Intl.NumberFormat('id-ID').format(aiData.grand_total)"></td>
                            </tr>
                            <tr class="font-black uppercase text-xs text-blue-600 bg-blue-50">
                                <td colspan="5" class="py-3 px-4 text-right border-l border-black/5">Referensi Harga Tanah (Info)</td>
                                <td class="py-3 px-4 text-right border-l border-black/5" x-text="aiData.land_reference"></td>
                            </tr>
                            <tr class="font-black uppercase text-xs text-black/60">
                                <td colspan="5" class="py-3 px-4 text-right border-l border-black/5">Catatan AI (Analisis Material)</td>
                                <td class="py-3 px-4 text-right border-l border-black/5" x-text="aiData.notes"></td>
                            </tr>
                            <tr class="bg-black text-construction-yellow font-black uppercase text-sm">
                                <td colspan="5" class="py-5 px-4 text-right border-l border-white/20">Grand Total RAB Estimasi</td>
                                <td class="py-5 px-4 text-right border-l border-white/20">Rp <span x-text="new Intl.NumberFormat('id-ID').format(aiData.grand_total)"></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="pt-6 flex justify-between items-center border-t-2 border-black/10 no-print">
                    <button @click="aiStep = 1" class="text-[10px] font-black uppercase tracking-widest text-black/40 hover:text-black transition-colors">&lt; Recalculate</button>
                    <div class="flex gap-4">
                        <button @click="window.print()" class="px-8 py-4 border-2 border-black text-black font-black uppercase tracking-widest rounded-xl hover:bg-black hover:text-white transition-all text-[10px] flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                            Download PDF
                        </button>
                        <button @click="saveToDatabase()" class="px-8 py-4 bg-construction-yellow text-black border-2 border-black font-black uppercase tracking-widest rounded-xl hover:bg-black hover:text-construction-yellow shadow-apple transition-all text-[10px]">
                            Simpan ke Database
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
