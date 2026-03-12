<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap" rel="stylesheet">

<body class="bg-[radial-gradient(circle_at_bottom_right,_#f0fdf4,_#ffffff,_#f0fdf4)] min-h-screen font-['Inter'] px-6 py-24">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col lg:flex-row items-center gap-10 mb-20 bg-white/40 backdrop-blur-xl p-12 rounded-[4rem] border border-white">
            <div class="w-24 h-24 bg-slate-900 rounded-[2.5rem] flex items-center justify-center text-emerald-500 rotate-6 shadow-2xl shadow-slate-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            </div>
            <div class="text-center lg:text-left flex-1">
                <h3 class="text-5xl font-black text-slate-800 tracking-tighter uppercase italic leading-none">Log <span class="text-emerald-500 font-thin">Aktivitas.</span></h3>
                <p class="text-slate-400 font-black text-[10px] uppercase tracking-[0.4em] mt-3 italic">Sinkronisasi Jejak Literasi Digital</p>
            </div>
            <div class="hidden lg:block w-32 h-1 bg-emerald-100 rounded-full"></div>
        </div>

        <div class="bg-white/60 backdrop-blur-2xl border border-white rounded-[3.5rem] overflow-hidden shadow-[0_50px_100px_-20px_rgba(16,185,129,0.1)]">
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-slate-50/50 text-[10px] font-black text-emerald-600/40 uppercase tracking-[0.3em] italic">
                            <th class="py-10 px-12 text-left">Entitas Pustaka</th>
                            <th class="py-10 text-left">Timeline Transaksi</th>
                            <th class="py-10 px-12 text-center">Status Operasional</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-emerald-50/50">
                        @forelse($pinjaman as $p)
                        <tr class="group hover:bg-white transition-all duration-300">
                            <td class="py-10 px-12">
                                <div class="flex items-center gap-6">
                                    <div class="w-14 h-14 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-500 group-hover:bg-slate-900 group-hover:text-white transition-all duration-500 shadow-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                                    </div>
                                    <div>
                                        <span class="block font-black text-slate-800 text-base uppercase tracking-tight italic group-hover:text-emerald-600 transition-colors">{{ $p->buku->Judul ?? 'Koleksi Terhapus' }}</span>
                                        <span class="text-[10px] font-black text-slate-300 uppercase tracking-widest italic">Kreator: {{ $p->buku->Penulis ?? 'Unknown' }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="py-10">
                                <div class="text-[10px] font-black space-y-1">
                                    <div class="flex items-center gap-2">
                                        <span class="text-emerald-500 w-8">IN:</span> 
                                        <span class="text-slate-500 tracking-widest">{{ \Carbon\Carbon::parse($p->TanggalPeminjaman)->format('d . m . Y') }}</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="text-rose-400 w-8">OUT:</span> 
                                        <span class="text-slate-300 tracking-widest">{{ $p->TanggalPengembalian ? \Carbon\Carbon::parse($p->TanggalPengembalian)->format('d . m . Y') : 'PENDING' }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="py-10 px-12 text-center">
                                @if($p->StatusPeminjaman == 'Sudah Dikembalikan')
                                    <span class="inline-flex px-6 py-2.5 bg-emerald-500 text-white text-[9px] font-black rounded-xl shadow-lg shadow-emerald-100 uppercase tracking-widest italic">Terselesaikan</span>
                                @else
                                    <span class="inline-flex px-6 py-2.5 bg-slate-900 text-emerald-400 text-[9px] font-black rounded-xl border border-emerald-500/20 uppercase italic animate-pulse shadow-2xl">Akses Aktif</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="py-32 text-center">
                                <p class="text-slate-300 font-black uppercase tracking-[0.5em] italic text-sm">Tidak ada transmisi data riwayat.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>