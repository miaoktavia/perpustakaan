<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap" rel="stylesheet">

<body class="bg-[radial-gradient(circle_at_bottom_left,_#f0fdf4,_#ffffff,_#f0fdf4)] min-h-screen font-['Inter'] selection:bg-emerald-100 flex items-center justify-center p-0 md:p-12">

    <div class="w-full max-w-6xl min-h-[700px] flex flex-col md:flex-row bg-white/40 backdrop-blur-3xl shadow-[0_50px_100px_-20px_rgba(16,185,129,0.15)] md:rounded-[4rem] overflow-hidden border border-white">
        
        <div class="flex-1 bg-slate-900 p-12 md:p-20 flex flex-col justify-between relative overflow-hidden">
            <div class="absolute top-[-10%] right-[-10%] w-64 h-64 bg-emerald-500/20 rounded-full blur-[80px]"></div>
            
            <div class="relative z-10">
                <div class="w-16 h-16 bg-emerald-500 rounded-2xl flex items-center justify-center mb-10 shadow-2xl shadow-emerald-500/40">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-7.714 2.143L11 21l-2.286-6.857L1 12l7.714-2.143L11 3z" />
                    </svg>
                </div>
                <h2 class="text-5xl font-black text-white tracking-tighter uppercase italic leading-[1.1]">Suara <br><span class="text-emerald-400 font-light">Inspirasi.</span></h2>
                <p class="text-slate-400 mt-6 font-medium text-lg leading-relaxed">Kontribusikan perspektif unik Anda untuk memperkaya ekosistem literasi digital kami.</p>
            </div>

            <div class="relative z-10 pt-12 border-t border-white/10">
                <span class="text-[10px] font-black text-emerald-500 uppercase tracking-[0.4em] block mb-2">Sedang Diulas:</span>
                <h3 class="text-xl font-bold text-white italic group">"{{ $buku->Judul }}"</h3>
                <p class="text-slate-500 text-sm mt-1">Karya: {{ $buku->Penulis }}</p>
            </div>
        </div>

        <div class="flex-[1.2] p-12 md:p-20 bg-white/20 backdrop-blur-sm flex flex-col justify-center">
            
            <form action="{{ route('ulasan.store') }}" method="POST" class="space-y-10">
                @csrf
                <input type="hidden" name="BukuID" value="{{ $buku->BukuID }}">

                <div class="space-y-4">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] ml-2">Analisis Narasi</label>
                    <textarea name="Ulasan" rows="5" required
                        class="w-full px-8 py-6 bg-white border border-emerald-50 rounded-[2rem] focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-500 outline-none transition-all placeholder:text-slate-300 font-medium text-slate-600 shadow-sm"
                        placeholder="Bagaimana impresi Anda terhadap buku ini?"></textarea>
                </div>

                <div class="space-y-4">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] ml-2">Metrik Kepuasan</label>
                    <div class="relative">
                        <select name="Rating" required
                            class="w-full px-8 h-14 bg-white border border-emerald-50 rounded-2xl focus:ring-4 focus:ring-emerald-500/10 outline-none transition-all font-bold text-slate-700 appearance-none shadow-sm cursor-pointer">
                            <option value="5">Magnitude 5.0 (Sempurna)</option>
                            <option value="4">Magnitude 4.0 (Sangat Bagus)</option>
                            <option value="3">Magnitude 3.0 (Standar)</option>
                            <option value="2">Magnitude 2.0 (Dibawah Ekspektasi)</option>
                            <option value="1">Magnitude 1.0 (Evaluasi Total)</option>
                        </select>
                        <div class="absolute right-6 top-1/2 -translate-y-1/2 pointer-events-none text-emerald-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 pt-6">
                    <a href="{{ route('buku.index') }}" 
                       class="flex-1 h-14 flex items-center justify-center bg-slate-50 hover:bg-rose-50 hover:text-rose-500 text-slate-400 text-[10px] font-black rounded-2xl transition-all uppercase tracking-widest border border-transparent hover:border-rose-100">
                        Batalkan
                    </a>
                    <button type="submit" 
                        class="flex-[2] h-14 bg-emerald-600 hover:bg-slate-900 text-white text-[10px] font-black rounded-2xl shadow-2xl shadow-emerald-200 transition-all active:scale-95 uppercase tracking-[0.2em]">
                        Publikasikan Resonansi
                    </button>
                </div>
            </form>

            <footer class="mt-16 text-center md:text-left">
                <p class="text-[9px] font-bold text-slate-300 uppercase tracking-[0.5em] italic">NeoLibrary Feedback Protocol v2.6</p>
            </footer>
        </div>
    </div>
</body>