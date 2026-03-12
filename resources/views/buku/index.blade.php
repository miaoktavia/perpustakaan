<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap"
    rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<body
    class="bg-[radial-gradient(at_top_left,_#f0fdf4,_#ffffff,_#dcfce7)] font-['Plus_Jakarta_Sans'] min-h-screen antialiased text-slate-700">

    <nav class="sticky top-6 z-50 px-6">
        <div
            class="max-w-6xl mx-auto bg-white/60 backdrop-blur-xl border border-white/40 shadow-sm rounded-[2.5rem] px-8 py-4 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div
                    class="w-10 h-10 bg-emerald-600 rounded-2xl flex items-center justify-center shadow-lg shadow-emerald-200 rotate-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <span class="text-xl font-extrabold tracking-tight italic uppercase text-emerald-950">Lensa<span
                        class="text-emerald-500">Pustaka.</span></span>
            </div>
            <a href="{{ route('dashboard') }}"
                class="h-11 px-6 flex items-center bg-white/80 hover:bg-emerald-50 border border-emerald-100 rounded-2xl text-[11px] font-bold text-emerald-700 transition-all shadow-sm tracking-[0.2em] uppercase">
                Panel Kendali
            </a>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-6 pt-16 pb-24">
        <div class="flex flex-col md:flex-row items-center gap-12 mb-20">
            <div class="flex-1 space-y-4 text-center md:text-left">
                <h1
                    class="text-5xl md:text-6xl font-black tracking-tighter text-emerald-950 leading-[0.9] italic uppercase">
                    Kurasi <span class="text-emerald-500">Literasi</span> <br>Terbaik.
                </h1>
                <p class="text-emerald-700/60 font-medium italic text-lg max-w-md">Eksplorasi koleksi digital eksklusif
                    SMKN 11 Malang.</p>
            </div>

            @if(auth()->user()->role != 'peminjam')
                <div class="shrink-0">
                    <a href="{{ route('buku.create') }}"
                        class="group relative h-16 px-10 flex items-center bg-emerald-600 hover:bg-emerald-700 text-white rounded-3xl shadow-2xl shadow-emerald-200 transition-all active:scale-95 overflow-hidden">
                        <span class="relative z-10 text-xs font-black uppercase tracking-[0.2em]">Registrasi
                            Literatur</span>
                        <div
                            class="absolute inset-0 bg-white/10 translate-y-12 group-hover:translate-y-0 transition-transform duration-300">
                        </div>
                    </a>
                </div>
            @endif
        </div>

        @if(session('success'))
            <div
                class="mb-12 p-5 bg-white/80 backdrop-blur-md border-l-4 border-emerald-500 rounded-3xl flex items-center gap-5 shadow-sm">
                <div class="w-10 h-10 bg-emerald-100 rounded-full flex items-center justify-center text-emerald-600">
                    <i class="fas fa-check-circle"></i>
                </div>
                <p class="text-emerald-900 font-bold text-sm tracking-tight">{{ session('success') }}</p>
            </div>
        @endif

        <div class="grid grid-cols-1 gap-6">
            @foreach($buku as $b)
                <div
                    class="group relative flex flex-col lg:flex-row items-center gap-8 p-8 bg-white/40 hover:bg-white border border-white/60 hover:border-emerald-200 rounded-[3rem] transition-all duration-500 hover:shadow-[0_30px_60px_-15px_rgba(5,150,105,0.15)] overflow-hidden">

                    <div class="relative shrink-0">
                        <div
                            class="w-28 h-36 bg-gradient-to-br from-emerald-100 to-teal-50 rounded-[2rem] flex items-center justify-center text-emerald-200 group-hover:scale-105 group-hover:rotate-3 transition-all duration-500 shadow-inner">
                            <i class="fas fa-book-bookmark text-4xl group-hover:text-emerald-500"></i>
                        </div>
                    </div>

                    <div class="flex-1 text-center lg:text-left">
                        <div
                            class="inline-block px-4 py-1 bg-emerald-100/50 text-emerald-600 text-[10px] font-black uppercase tracking-widest rounded-full mb-3 italic">
                            Koleksi Tersedia
                        </div>
                        <h3
                            class="text-2xl font-extrabold text-emerald-950 uppercase italic tracking-tight group-hover:text-emerald-600 transition-colors">
                            {{ $b->Judul }}</h3>
                        <div
                            class="flex flex-wrap justify-center lg:justify-start items-center gap-6 mt-4 text-[11px] font-bold text-emerald-800/40 uppercase tracking-widest">
                            <span class="flex items-center gap-2"><i class="fas fa-pen-nib text-emerald-500"></i>
                                {{ $b->Penulis }}</span>
                            <span class="flex items-center gap-2"><i class="fas fa-microchip text-emerald-500"></i>
                                {{ $b->Penerbit }}</span>
                            <span class="bg-white/60 px-3 py-1 rounded-lg">{{ $b->TahunTerbit }}</span>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row items-center gap-8 w-full lg:w-auto">
                        <div class="flex flex-col items-center lg:items-end px-8 lg:border-r border-emerald-100">
                            <span
                                class="text-[9px] font-black text-emerald-300 uppercase tracking-widest mb-1 italic text-center">Skor
                                Review</span>
                            <div class="flex items-center gap-3">
                                <span
                                    class="text-2xl font-black text-emerald-950 leading-none">{{ number_format($b->ulasan()->avg('Rating') ?? 0, 1) }}</span>
                                <div class="flex text-amber-400 text-[10px]">
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 h-14">
                            <a href="{{ route('buku.show', $b->BukuID) }}"
                                class="h-full aspect-square flex items-center justify-center bg-emerald-50 text-emerald-600 rounded-2xl hover:bg-emerald-600 hover:text-white transition-all shadow-sm"
                                title="Inspeksi">
                                <i class="fas fa-expand-alt"></i>
                            </a>

                            @if(auth()->user()->role != 'peminjam')
                                <a href="{{ route('buku.edit', $b->BukuID) }}"
                                    class="h-full aspect-square flex items-center justify-center bg-amber-50 text-amber-600 rounded-2xl hover:bg-amber-500 hover:text-white transition-all shadow-sm">
                                    <i class="fas fa-sliders-h"></i>
                                </a>
                                <form action="{{ route('buku.destroy', $b->BukuID) }}" method="POST" class="h-full">
                                    @csrf @method('DELETE')
                                    <button
                                        class="h-full aspect-square flex items-center justify-center bg-rose-50 text-rose-500 rounded-2xl hover:bg-rose-500 hover:text-white transition-all shadow-sm">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('peminjam.store', $b->BukuID) }}" method="POST" class="h-full">
                                    @csrf
                                    <button
                                        class="h-full px-6 flex items-center bg-emerald-600 text-white rounded-2xl hover:bg-emerald-900 transition-all font-black text-[10px] uppercase tracking-widest shadow-lg shadow-emerald-100">
                                        Ajukan Pinjam
                                    </button>
                                </form>

                                <form action="{{ route('koleksi.store') }}" method="POST" class="h-full">
                                    @csrf
                                    <input type="hidden" name="BukuID" value="{{ $b->BukuID }}">
                                    <button
                                        class="h-full aspect-square flex items-center justify-center bg-rose-50 text-rose-500 rounded-2xl hover:bg-rose-600 hover:text-white transition-all shadow-sm">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                </form>

                                <a href="{{ route('ulasan.create', $b->BukuID) }}"
                                    class="h-full aspect-square flex items-center justify-center bg-sky-50 text-sky-600 rounded-2xl hover:bg-sky-600 hover:text-white transition-all shadow-sm">
                                    <i class="fas fa-comment-dots"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <footer class="mt-32 text-center opacity-40">
            <p class="text-[9px] font-black uppercase tracking-[0.8em] text-emerald-950 italic">
                Sistem Pustaka Terpadu &bull; v2.0.26 &bull; Malang
            </p>
        </footer>
    </main>

</body>