<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap" rel="stylesheet">

<body class="bg-[radial-gradient(circle_at_bottom_left,_#f0fdf4,_#ffffff,_#f0fdf4)] min-h-screen font-['Inter']">
    <nav class="sticky top-0 z-50 bg-white/60 backdrop-blur-2xl border-b border-emerald-50 py-5 px-8 flex justify-center">
        <div class="max-w-7xl w-full flex justify-between items-center">
            <a class="flex items-center gap-4 group" href="/dashboard">
                <div class="w-12 h-12 bg-emerald-600 rounded-2xl flex items-center justify-center shadow-xl shadow-emerald-200 group-hover:rotate-[15deg] transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                </div>
                <span class="font-black text-slate-800 text-2xl tracking-tighter italic uppercase">Neo<span class="text-emerald-500 font-light lowercase">Library</span></span>
            </a>
            <div class="flex items-center gap-10">
                <a href="/dashboard" class="hidden md:block text-[10px] font-black text-slate-400 hover:text-emerald-600 transition-colors uppercase tracking-[0.3em]">Arsip Utama</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="h-12 px-8 bg-rose-500 rounded-2xl text-[10px] font-black text-white hover:bg-slate-900 transition-all shadow-lg shadow-rose-100 uppercase tracking-widest active:scale-90">Terminasi Sesi</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-8 py-20">
        <header class="mb-24 relative">
            <div class="relative z-10">
                <h2 class="text-6xl font-black text-slate-900 tracking-tighter uppercase italic leading-none">Discovery <br><span class="text-emerald-500 font-thin">Portal.</span></h2>
                <p class="mt-6 text-slate-400 font-medium text-lg max-w-xl">Aksesibilitas pengetahuan tanpa batas melalui kurasi literatur digital terbaik.</p>
            </div>
            <div class="absolute -top-10 -left-10 w-40 h-40 bg-emerald-100 rounded-full mix-blend-multiply filter blur-3xl opacity-30"></div>
        </header>

        @if(session('success'))
            <div class="mb-12 p-6 bg-emerald-600 text-white text-xs font-black rounded-3xl shadow-2xl shadow-emerald-200 flex items-center gap-4 animate-bounce">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg>
                OPERASI BERHASIL: {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-10">
            @foreach($buku as $b)
            <div class="group relative flex flex-col bg-white/40 p-5 rounded-[2.5rem] border border-white hover:bg-white hover:shadow-[0_40px_80px_-20px_rgba(16,185,129,0.2)] transition-all duration-500">
                <div class="aspect-[3/4] bg-slate-900 rounded-[2rem] mb-6 flex items-center justify-center relative overflow-hidden group-hover:-rotate-2 transition-transform shadow-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-emerald-500/20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                    <div class="absolute inset-0 bg-gradient-to-t from-emerald-600/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                </div>
                
                <div class="flex-1 px-2 space-y-1 mb-6">
                    <h6 class="font-black text-slate-800 text-sm truncate uppercase tracking-tight group-hover:text-emerald-600 transition-colors">{{ $b->Judul }}</h6>
                    <p class="text-[9px] font-black text-slate-300 uppercase tracking-widest italic">{{ $b->Penulis }}</p>
                </div>

                <form action="{{ route('peminjam.store', $b->BukuID) }}" method="POST">
                    @csrf
                    <input type="hidden" name="BukuID" value="{{ $b->BukuID }}">
                    <button type="submit" class="w-full h-14 bg-emerald-50 group-hover:bg-emerald-600 group-hover:text-white text-emerald-600 text-[10px] font-black rounded-2xl transition-all uppercase tracking-[0.2em] shadow-inner active:scale-95">
                        Reservasi
                    </button>
                </form>
            </div>
            @endforeach
        </div>

        <section class="mt-32">
            <div class="flex items-center gap-5 mb-12">
                <div class="h-[2px] w-12 bg-emerald-500"></div>
                <h4 class="font-black text-slate-900 text-3xl tracking-tighter uppercase italic">Status <span class="text-emerald-500 font-light text-2xl lowercase italic">peminjaman.</span></h4>
            </div>

            <div class="bg-white/40 backdrop-blur-2xl rounded-[3rem] border border-white p-1 shadow-2xl">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="text-[10px] font-black text-emerald-600/40 uppercase tracking-[0.3em]">
                                <th class="py-10 px-12">Arsip Koleksi</th>
                                <th class="py-10">Stempel Waktu</th>
                                <th class="py-10 px-12 text-center">Fase Operasi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-emerald-50/50">
                            @forelse($pinjaman as $p)
                                @if($p->StatusPeminjaman != 'Sudah Dikembalikan')
                                <tr class="group hover:bg-emerald-50/30 transition-colors">
                                    <td class="py-8 px-12 font-black text-slate-800 text-base tracking-tight italic">"{{ $p->buku->Judul ?? 'Metadata Error' }}"</td>
                                    <td class="py-8 text-xs font-bold text-slate-400 uppercase tracking-widest">{{ \Carbon\Carbon::parse($p->TanggalPeminjaman)->format('d . M . Y') }}</td>
                                    <td class="py-8 px-12 text-center">
                                        <span class="inline-flex px-6 py-2 bg-emerald-500 text-white text-[9px] font-black rounded-full shadow-lg shadow-emerald-100 uppercase tracking-widest">Active Access</span>
                                    </td>
                                </tr>
                                @endif
                            @empty
                                <tr><td colspan="3" class="py-20 text-center text-slate-300 font-black uppercase tracking-[0.5em] italic text-sm">Log aktivitas kosong.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>

    <footer class="py-20 text-center border-t border-emerald-50">
        <p class="text-[10px] font-black text-slate-300 uppercase tracking-[0.5em]">&copy; 2026 Core Library System • Precision Engineering</p>
    </footer>
</body>