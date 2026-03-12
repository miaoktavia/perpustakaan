<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap" rel="stylesheet">

<body class="bg-[radial-gradient(circle_at_top_left,_#f0fdf4,_#ffffff,_#f0fdf4)] min-h-screen font-['Inter'] selection:bg-emerald-100 selection:text-emerald-900 px-6 py-20">
    <div class="max-w-7xl mx-auto">
        <header class="flex flex-col md:flex-row justify-between items-center mb-24 gap-10 bg-white/40 backdrop-blur-2xl p-12 rounded-[3.5rem] border border-white/60 shadow-[0_32px_64px_-15px_rgba(16,185,129,0.1)]">
            <div class="text-center md:text-left space-y-2">
                <span class="text-emerald-500 font-black text-[10px] tracking-[0.4em] uppercase block">Personal Vault</span>
                <h2 class="text-6xl font-black text-slate-900 tracking-tighter uppercase italic leading-none">Arsip <span class="text-emerald-500 font-thin">Favorit.</span></h2>
            </div>
            
            <a href="{{ route('buku.index') }}" class="group h-16 px-10 flex items-center bg-slate-900 rounded-3xl text-[11px] font-black text-white hover:bg-emerald-600 transition-all shadow-2xl shadow-slate-200 uppercase tracking-[0.2em] active:scale-95">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-3 group-hover:rotate-90 transition-transform duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4" /></svg>
                Eksplorasi Baru
            </a>
        </header>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">
            @forelse($koleksi as $k)
            <div class="group relative bg-white/60 backdrop-blur-md p-10 rounded-[3rem] border border-white hover:border-emerald-200 shadow-sm hover:shadow-[0_40px_80px_-20px_rgba(16,185,129,0.15)] transition-all duration-500 flex flex-col items-center text-center">
                <div class="w-24 h-24 bg-emerald-50 rounded-[2.5rem] flex items-center justify-center text-emerald-500 mb-8 group-hover:scale-110 group-hover:-rotate-3 transition-all duration-500 shadow-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" /></svg>
                </div>

                <div class="space-y-1 mb-10">
                    <h6 class="font-black text-slate-800 text-base uppercase tracking-tight line-clamp-1 italic group-hover:text-emerald-600 transition-colors">{{ $k->buku->Judul }}</h6>
                    <p class="text-[10px] font-black text-slate-300 uppercase tracking-widest italic">{{ $k->buku->Penulis }}</p>
                </div>

                <div class="w-full space-y-3 mt-auto">
                    <form action="{{ route('peminjam.store', $k->BukuID) }}" method="POST">
                        @csrf
                        <button class="w-full h-14 bg-slate-900 text-white text-[10px] font-black rounded-2xl uppercase tracking-[0.2em] hover:bg-emerald-600 transition-all shadow-lg active:scale-95">Inisiasi Pinjam</button>
                    </form>
                    <form action="{{ route('koleksi.destroy', $k->KoleksiID) }}" method="POST">
                        @csrf @method('DELETE')
                        <button class="w-full h-14 bg-rose-50 text-rose-500 text-[10px] font-black rounded-2xl uppercase tracking-[0.2em] hover:bg-rose-500 hover:text-white transition-all border border-rose-100 active:scale-95">Terminasi</button>
                    </form>
                </div>
            </div>
            @empty
            <div class="col-span-full py-40 text-center bg-white/30 backdrop-blur-xl border-4 border-dashed border-emerald-100 rounded-[4rem] flex flex-col items-center">
                <div class="w-20 h-20 bg-emerald-50 rounded-full flex items-center justify-center mb-6 text-emerald-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                </div>
                <p class="text-slate-400 font-black uppercase tracking-[0.4em] italic text-sm">Belum ada kurasi dalam galeri Anda.</p>
            </div>
            @endforelse
        </div>
    </div>
</body>