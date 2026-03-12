<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">

<body class="bg-[radial-gradient(circle_at_top_right,_#f0fdf4,_#ffffff,_#dcfce7)] min-h-screen font-['Inter'] text-slate-700 pb-20 overflow-x-hidden">
    <nav class="sticky top-0 z-50 bg-white/40 backdrop-blur-2xl border-b border-emerald-50 py-5 px-6 md:px-12">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center gap-4">
                <div class="p-2.5 bg-emerald-600 rounded-2xl shadow-xl shadow-emerald-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <span class="text-2xl font-black tracking-tighter text-slate-800 uppercase italic">Perpus<span class="text-emerald-600 font-light">Digital</span></span>
            </div>
            <a href="/dashboard" class="group flex items-center text-sm font-bold text-slate-400 hover:text-emerald-600 transition-all uppercase tracking-widest">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Panel Utama
            </a>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-6 mt-16">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-8 mb-16">
            <div class="space-y-2">
                <h2 class="text-5xl font-black text-slate-900 tracking-tighter leading-none italic uppercase">Direktori Otoritas</h2>
                <p class="text-slate-500 font-medium text-lg italic">Verifikasi kredensial dan manajemen tingkat akses staf.</p>
            </div>
            <a href="{{ route('petugas.create') }}" 
                class="h-16 px-10 bg-emerald-600 hover:bg-slate-900 text-white font-black rounded-3xl shadow-2xl shadow-emerald-200 transition-all active:scale-95 flex items-center justify-center space-x-3 uppercase tracking-widest text-[11px]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
                <span>Registrasi Petugas</span>
            </a>
        </div>

        @if(session('success'))
            <div class="bg-white border-l-4 border-emerald-500 p-6 rounded-3xl shadow-xl shadow-emerald-100/30 mb-12 flex items-center animate-pulse">
                <div class="w-10 h-10 bg-emerald-100 text-emerald-600 rounded-2xl flex items-center justify-center mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                </div>
                <span class="text-sm font-black text-slate-700 uppercase tracking-tight">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white/50 backdrop-blur-xl rounded-[3rem] shadow-[0_40px_80px_-15px_rgba(0,0,0,0.05)] overflow-hidden border border-white/80">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-emerald-50/50">
                            <th class="px-10 py-8 text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] text-center w-24">Urutan</th>
                            <th class="px-6 py-8 text-[10px] font-black text-slate-400 uppercase tracking-[0.3em]">ID Akses</th>
                            <th class="px-6 py-8 text-[10px] font-black text-slate-400 uppercase tracking-[0.3em]">Identitas Resmi</th>
                            <th class="px-6 py-8 text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] text-center">Otoritas</th>
                            <th class="px-10 py-8 text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] text-right">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-emerald-50/30">
                        @foreach($petugas as $index => $p)
                        <tr class="group hover:bg-white/70 transition-all duration-300">
                            <td class="px-10 py-8 text-center">
                                <span class="text-sm font-black text-slate-300 group-hover:text-emerald-600 transition-colors">#{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                            </td>
                            <td class="px-6 py-8">
                                <div class="flex flex-col gap-1">
                                    <span class="text-base font-black text-slate-800 tracking-tighter italic">@ {{ $p->Username }}</span>
                                    <span class="text-xs font-semibold text-slate-400 lowercase tracking-wider">{{ $p->Email }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-8">
                                <span class="text-sm font-bold text-slate-600 tracking-tight">{{ $p->NamaLengkap }}</span>
                            </td>
                            <td class="px-6 py-8 text-center">
                                @if($p->role == 'administrator')
                                    <span class="inline-flex items-center px-5 py-2 rounded-full bg-emerald-50 text-emerald-600 text-[9px] font-black uppercase tracking-[0.2em] border border-emerald-100 shadow-sm shadow-emerald-50">
                                        Root Admin
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-5 py-2 rounded-full bg-slate-100/50 text-slate-500 text-[9px] font-black uppercase tracking-[0.2em] border border-slate-100">
                                        Staf Operasional
                                    </span>
                                @endif
                            </td>
                            <td class="px-10 py-8">
                                <div class="flex justify-end items-center space-x-4">
                                    <a href="{{ route('petugas.edit', $p->UserID) }}" 
                                        class="w-14 h-14 flex items-center justify-center rounded-2xl bg-white border border-slate-100 text-emerald-500 hover:bg-emerald-500 hover:text-white transition-all shadow-sm group-hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </a>

                                    @if($p->UserID != auth()->user()->UserID)
                                    <form action="{{ route('petugas.destroy', $p->UserID) }}" method="POST" class="m-0">
                                        @csrf @method('DELETE')
                                        <button onclick="return confirm('Terminasi otoritas petugas ini?')" 
                                            class="w-14 h-14 flex items-center justify-center rounded-2xl bg-white border border-slate-100 text-rose-500 hover:bg-rose-500 hover:text-white transition-all shadow-sm group-hover:rotate-12">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                    @else
                                    <div class="w-14 h-14 flex items-center justify-center rounded-2xl bg-emerald-50 text-emerald-300 border border-emerald-100 shadow-inner" title="Sesi Terenkripsi">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                    </div>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            @if($petugas->isEmpty())
            <div class="py-32 text-center space-y-4">
                <div class="w-24 h-24 bg-emerald-50/50 rounded-full flex items-center justify-center mx-auto border border-dashed border-emerald-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-emerald-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <p class="text-slate-300 font-black tracking-[0.4em] uppercase text-xs italic">Sistem Keamanan Kosong</p>
            </div>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>