<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">

<body class="bg-[#fcfdfd] min-h-screen font-['Inter']">
    <nav class="print:hidden sticky top-0 z-50 bg-white/60 backdrop-blur-xl border-b border-slate-100 py-6 px-10 mb-16">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-slate-900 rounded-2xl flex items-center justify-center shadow-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <span class="font-black text-slate-900 text-2xl tracking-tighter italic uppercase">Analytics<span class="text-emerald-500">.</span></span>
            </div>
            <a href="{{ route('dashboard') }}" class="h-12 px-8 flex items-center bg-slate-50 border border-slate-200 rounded-2xl text-[10px] font-black text-slate-500 hover:bg-emerald-600 hover:text-white transition-all uppercase tracking-widest">
                Dashboard
            </a>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-10">
        <div class="hidden print:block text-center mb-16 border-b-[6px] border-slate-900 pb-8">
            <h1 class="text-4xl font-black uppercase italic tracking-tighter">Manifest Sirkulasi Literatur</h1>
            <p class="text-lg font-bold text-slate-600 mt-2 tracking-widest">PERPUSTAKAAN DIGITAL CENTRAL ARSIP</p>
            <p class="text-[10px] text-slate-400 font-black mt-4 uppercase tracking-[0.4em]">Timestamp: {{ date('d.m.Y / H:i') }}</p>
        </div>

        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6 print:hidden">
            <div class="space-y-2">
                <h2 class="text-5xl font-black text-slate-900 tracking-tighter uppercase italic leading-none">Log <span class="text-emerald-500">Sirkulasi.</span></h2>
                <p class="text-slate-400 font-bold text-sm italic tracking-wide">Pemantauan transmisi aset pustaka secara real-time.</p>
            </div>
            <button onclick="window.print()" class="h-16 px-12 bg-emerald-600 hover:bg-slate-900 text-white text-[11px] font-black rounded-[2rem] shadow-2xl shadow-emerald-100 transition-all uppercase tracking-[0.2em] flex items-center gap-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" /></svg>
                Ekspor Dokumen Resmi
            </button>
        </div>

        <div class="bg-white rounded-[3rem] border border-slate-100 shadow-[0_50px_100px_-20px_rgba(0,0,0,0.03)] overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/50 text-[10px] font-black text-emerald-700/50 uppercase tracking-[0.3em]">
                            <th class="py-10 px-12">Subjek Peminjam</th>
                            <th>Entitas Literatur</th>
                            <th class="text-center">Kronologi Pinjam</th>
                            <th class="text-center">Status Akses</th>
                            <th class="text-right px-12 print:hidden">Validasi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @foreach($laporan as $lp)
                        <tr class="group hover:bg-emerald-50/30 transition-all duration-300">
                            <td class="py-10 px-12">
                                <div class="flex flex-col">
                                    <span class="font-black text-slate-800 text-base uppercase tracking-tight">{{ $lp->user->NamaLengkap ?? 'Identitas Hilang' }}</span>
                                    <span class="text-[9px] font-black text-emerald-500 uppercase tracking-widest mt-1">Status: Terverifikasi</span>
                                </div>
                            </td>
                            <td>
                                <span class="px-5 py-2 bg-white border border-slate-100 text-slate-700 text-[11px] font-black rounded-2xl uppercase shadow-sm">
                                    {{ $lp->buku->Judul ?? 'Aset Dihapus' }}
                                </span>
                            </td>
                            <td class="text-center">
                                <span class="text-xs font-black text-slate-500 italic">{{ \Carbon\Carbon::parse($lp->TanggalPeminjaman)->format('d . m . Y') }}</span>
                            </td>
                            <td class="text-center">
                                @if($lp->StatusPeminjaman == 'Sudah Dikembalikan')
                                    <span class="inline-flex items-center px-5 py-2 rounded-full bg-emerald-100 text-emerald-700 text-[9px] font-black uppercase tracking-widest">
                                        Arsip Selesai
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-5 py-2 rounded-full bg-amber-100 text-amber-700 text-[9px] font-black uppercase tracking-widest animate-pulse">
                                        Dalam Pengawasan
                                    </span>
                                @endif
                            </td>
                            <td class="text-right px-12 print:hidden">
                                @if($lp->StatusPeminjaman == 'Dipinjam')
                                    <form action="{{ route('peminjaman.kembali', $lp->PeminjamanID) }}" method="POST">
                                        @csrf @method('PUT')
                                        <button type="submit" onclick="return confirm('Konfirmasi pengembalian aset?')" class="h-12 px-8 bg-slate-900 hover:bg-emerald-600 text-white text-[10px] font-black rounded-2xl transition-all shadow-xl shadow-slate-200 uppercase tracking-widest">
                                            Konfirmasi
                                        </button>
                                    </form>
                                @else
                                    <div class="inline-flex items-center justify-center w-12 h-12 bg-emerald-50 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                                    </div>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="hidden print:grid grid-cols-2 mt-24 text-sm font-black italic">
            <div></div>
            <div class="text-center space-y-20">
                <p class="uppercase tracking-widest text-[10px]">Otoritas Penanggung Jawab,</p>
                <div class="flex flex-col items-center">
                    <p class="underline decoration-4 underline-offset-8 text-lg">{{ auth()->user()->NamaLengkap }}</p>
                    <p class="text-[9px] mt-2 tracking-[0.5em] text-slate-400">ADMINISTRATOR LEVEL 1</p>
                </div>
            </div>
        </div>
    </div>
</body>