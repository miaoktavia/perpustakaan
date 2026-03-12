<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap" rel="stylesheet">

<body class="bg-[radial-gradient(circle_at_top_right,_#f0fdf4,_#ffffff,_#f0fdf4)] min-h-screen font-['Inter'] selection:bg-emerald-100 selection:text-emerald-900">
    <div class="max-w-6xl mx-auto py-20 px-8">
        <header class="flex flex-col md:flex-row justify-between items-end mb-24 gap-8 bg-white/40 backdrop-blur-xl p-10 rounded-[3rem] border border-white/60 shadow-[0_32px_64px_-15px_rgba(16,185,129,0.1)]">
            <div class="space-y-3">
                <div class="flex items-center gap-3">
                    <div class="w-3 h-3 bg-emerald-500 rounded-full animate-pulse"></div>
                    <span class="text-[10px] font-black text-emerald-600 uppercase tracking-[0.4em]">Ecosystem Feedback</span>
                </div>
                <h1 class="text-5xl font-black text-slate-900 tracking-tighter italic leading-none uppercase">Resonansi <br><span class="text-emerald-500 font-light">Pembaca.</span></h1>
            </div>
            <a href="{{ route('buku.index') }}" class="group h-16 px-10 flex items-center bg-slate-900 rounded-3xl text-[11px] font-black text-white hover:bg-emerald-600 transition-all shadow-2xl shadow-slate-200 uppercase tracking-widest active:scale-95">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-3 group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                Kembali ke Lab
            </a>
        </header>

        <div class="space-y-12">
            @forelse($ulasan as $u)
                <article class="group relative flex flex-col md:flex-row gap-12 p-12 bg-white/60 backdrop-blur-md rounded-[3.5rem] border border-white hover:border-emerald-200 transition-all hover:shadow-[0_40px_80px_-20px_rgba(16,185,129,0.15)] hover:-translate-y-1">
                    <div class="flex-shrink-0 flex md:flex-col items-center gap-6 md:w-32">
                        <div class="w-20 h-20 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-[2rem] flex items-center justify-center text-white text-2xl font-black shadow-xl shadow-emerald-100 rotate-3 group-hover:rotate-0 transition-transform duration-500">
                            {{ substr($u->user->NamaLengkap, 0, 1) }}
                        </div>
                        <div class="bg-amber-400 px-4 py-2 rounded-2xl flex items-center gap-2 shadow-lg shadow-amber-100/50 -rotate-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-white fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                            <span class="font-black text-white text-xs leading-none">{{ $u->Rating }}.0</span>
                        </div>
                    </div>

                    <div class="flex-1 space-y-6">
                        <div class="flex flex-wrap items-center gap-4">
                            <h4 class="text-2xl font-black text-slate-800 tracking-tighter uppercase italic">{{ $u->user->NamaLengkap }}</h4>
                            <span class="px-4 py-1 bg-emerald-50 rounded-full text-[9px] font-black text-emerald-500 uppercase tracking-widest border border-emerald-100">Verified Reader</span>
                        </div>

                        <div class="relative">
                            <span class="text-[10px] font-black text-emerald-600/40 uppercase tracking-[0.3em] block mb-3">Objek Analisis:</span>
                            <div class="inline-flex px-6 py-3 bg-slate-900 rounded-2xl text-emerald-400 font-bold text-sm italic shadow-xl">
                                "{{ $u->buku->Judul }}"
                            </div>
                        </div>

                        <div class="relative pt-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="absolute -top-4 -left-6 h-16 w-16 text-emerald-500/5 -z-10" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.154c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" /></svg>
                            <p class="text-slate-600 text-xl font-medium leading-relaxed italic pr-10">
                                {{ $u->Ulasan }}
                            </p>
                        </div>
                    </div>
                </article>
            @empty
                <div class="flex flex-col items-center justify-center py-32 bg-white/40 backdrop-blur-xl rounded-[4rem] border-4 border-dashed border-emerald-100">
                    <div class="w-24 h-24 bg-emerald-50 rounded-full flex items-center justify-center mb-8">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-emerald-200" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" /></svg>
                    </div>
                    <p class="text-slate-400 font-black uppercase tracking-[0.5em] italic text-sm">Belum ada transmisi data.</p>
                </div>
            @endforelse
        </div>
    </div>
</body>