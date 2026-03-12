<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">

<body class="bg-[radial-gradient(circle_at_top_left,_#f0fdf4,_#ffffff,_#ecfdf5)] min-h-screen font-['Inter'] flex items-center justify-center p-6 md:p-12">
    <div class="max-w-6xl w-full grid grid-cols-1 lg:grid-cols-12 gap-0 overflow-hidden rounded-[3rem] shadow-[0_50px_100px_-15px_rgba(16,185,129,0.15)] bg-white/40 backdrop-blur-2xl border border-white/60">
        
        <div class="lg:col-span-5 bg-slate-900 p-12 flex flex-col justify-between relative overflow-hidden">
            <div class="relative z-10">
                <div class="inline-flex px-4 py-2 bg-emerald-500/10 border border-emerald-500/20 rounded-xl text-[10px] font-black text-emerald-400 uppercase tracking-[0.2em] mb-8 shadow-inner">
                    Ref ID: #{{ $buku->BukuID }}
                </div>
                <h2 class="text-4xl font-black text-white tracking-tighter italic leading-tight uppercase">Modifikasi <br><span class="text-emerald-500">Metadata.</span></h2>
                <p class="text-slate-400 font-medium mt-4 text-sm leading-relaxed">Pastikan setiap perubahan data tetap sinkron dengan database pusat untuk menjaga integritas informasi perpustakaan.</p>
            </div>
            
            <div class="relative z-10 mt-12 flex flex-col gap-4">
                <p class="text-[9px] font-black text-slate-500 uppercase tracking-widest italic">Aksi Terakhir: {{ date('d M Y') }}</p>
                <a href="{{ route('buku.index') }}" class="text-[10px] font-black text-slate-400 hover:text-white uppercase tracking-[0.3em] transition-all">Batalkan Operasi</a>
            </div>

            <div class="absolute top-0 right-0 w-full h-full opacity-10 pointer-events-none">
                <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"><defs><pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse"><path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="1"/></pattern></defs><rect width="100%" height="100%" fill="url(#grid)" /></svg>
            </div>
        </div>

        <div class="lg:col-span-7 p-8 md:p-16 bg-white/90">
            <form action="{{ route('buku.update', $buku->BukuID) }}" method="POST" class="space-y-8">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="md:col-span-2 space-y-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] ml-2">Label Judul</label>
                        <input type="text" name="Judul" value="{{ $buku->Judul }}" class="w-full h-20 px-8 rounded-3xl bg-slate-50 border-2 border-slate-100 focus:border-emerald-500 transition-all outline-none text-slate-800 font-black text-xl" required>
                    </div>

                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] ml-2">Kreator / Penulis</label>
                        <input type="text" name="Penulis" value="{{ $buku->Penulis }}" class="w-full h-16 px-8 rounded-3xl bg-slate-50 border-2 border-slate-100 focus:border-emerald-500 transition-all outline-none text-slate-700 font-bold" required>
                    </div>

                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] ml-2">Penerbit</label>
                        <input type="text" name="Penerbit" value="{{ $buku->Penerbit }}" class="w-full h-16 px-8 rounded-3xl bg-slate-50 border-2 border-slate-100 focus:border-emerald-500 transition-all outline-none text-slate-700 font-bold" required>
                    </div>

                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] ml-2">Tahun Rilis</label>
                        <input type="number" name="TahunTerbit" value="{{ $buku->TahunTerbit }}" class="w-full h-16 px-8 rounded-3xl bg-slate-50 border-2 border-slate-100 focus:border-emerald-500 transition-all outline-none text-slate-700 font-bold" required>
                    </div>

                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] ml-2">Kategori</label>
                        <select name="KategoriID" class="w-full h-16 px-8 rounded-3xl bg-slate-50 border-2 border-slate-100 focus:border-emerald-500 transition-all outline-none text-slate-700 font-black appearance-none" required>
                            @foreach($kategori as $k)
                                <option value="{{ $k->KategoriID }}" {{ $buku->KategoriID == $k->KategoriID ? 'selected' : '' }}>
                                    {{ $k->NamaKategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="pt-10 flex justify-end">
                    <button type="submit" class="h-16 px-16 bg-emerald-600 hover:bg-slate-900 text-white font-black rounded-3xl shadow-2xl transition-all active:scale-95 uppercase tracking-widest text-[10px] group flex items-center gap-4">
                        Sinkronkan Perubahan 
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:rotate-180 transition-transform duration-700" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" /></svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>