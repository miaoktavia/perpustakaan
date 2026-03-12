<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">

<body class="bg-[radial-gradient(circle_at_bottom_left,_#f0fdf4,_#ffffff,_#ecfdf5)] min-h-screen font-['Inter'] flex items-center justify-center p-6 md:p-12">
    <div class="max-w-6xl w-full grid grid-cols-1 lg:grid-cols-12 gap-0 overflow-hidden rounded-[3rem] shadow-[0_50px_100px_-15px_rgba(16,185,129,0.15)] bg-white/40 backdrop-blur-2xl border border-white/60">
        
        <div class="lg:col-span-5 bg-emerald-600 p-12 flex flex-col justify-between relative overflow-hidden">
            <div class="relative z-10">
                <div class="w-14 h-14 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center mb-8 border border-white/30 shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-white tracking-tighter italic leading-tight uppercase">Ekspansi <br><span class="text-emerald-200">Katalog.</span></h2>
                <p class="text-emerald-100/80 font-medium mt-4 text-sm leading-relaxed">Tambahkan aset literatur baru ke dalam ekosistem digital untuk memperluas cakrawala pengetahuan pengguna.</p>
            </div>
            
            <div class="relative z-10 mt-12">
                <a href="{{ route('buku.index') }}" class="inline-flex items-center gap-3 text-[10px] font-black text-white/70 hover:text-white uppercase tracking-[0.3em] transition-all group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                    Kembali ke Koleksi
                </a>
            </div>

            <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-emerald-500 rounded-full mix-blend-multiply filter blur-3xl opacity-50"></div>
        </div>

        <div class="lg:col-span-7 p-8 md:p-16 bg-white/80">
            <form action="{{ route('buku.store') }}" method="POST" class="space-y-8">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="md:col-span-2 space-y-2">
                        <label class="text-[10px] font-black text-emerald-600/50 uppercase tracking-[0.2em] ml-2">Judul Literatur</label>
                        <input type="text" name="Judul" class="w-full h-16 px-8 rounded-3xl bg-emerald-50/50 border-2 border-transparent focus:border-emerald-400 focus:bg-white transition-all outline-none text-slate-800 font-bold placeholder:text-slate-300" placeholder="Contoh: Arsitektur Perangkat Lunak Modern" required>
                    </div>

                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-emerald-600/50 uppercase tracking-[0.2em] ml-2">Identitas Penulis</label>
                        <input type="text" name="Penulis" class="w-full h-16 px-8 rounded-3xl bg-emerald-50/50 border-2 border-transparent focus:border-emerald-400 focus:bg-white transition-all outline-none text-slate-700 font-semibold" placeholder="Nama Lengkap Penulis" required>
                    </div>

                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-emerald-600/50 uppercase tracking-[0.2em] ml-2">Entitas Penerbit</label>
                        <input type="text" name="Penerbit" class="w-full h-16 px-8 rounded-3xl bg-emerald-50/50 border-2 border-transparent focus:border-emerald-400 focus:bg-white transition-all outline-none text-slate-700 font-semibold" placeholder="Nama Perusahaan" required>
                    </div>

                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-emerald-600/50 uppercase tracking-[0.2em] ml-2">Tahun Terbit</label>
                        <input type="number" name="TahunTerbit" class="w-full h-16 px-8 rounded-3xl bg-emerald-50/50 border-2 border-transparent focus:border-emerald-400 focus:bg-white transition-all outline-none text-slate-700 font-semibold" placeholder="2026" required>
                    </div>

                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-emerald-600/50 uppercase tracking-[0.2em] ml-2">Klasifikasi</label>
                        <div class="relative">
                            <select name="KategoriID" class="w-full h-16 px-8 rounded-3xl bg-emerald-50/50 border-2 border-transparent focus:border-emerald-400 focus:bg-white transition-all outline-none text-slate-700 font-bold appearance-none cursor-pointer" required>
                                <option value="" selected disabled>Pilih Kategori...</option>
                                @foreach($kategori as $k)
                                    <option value="{{ $k->KategoriID }}">{{ $k->NamaKategori }}</option>
                                @endforeach
                            </select>
                            <div class="absolute right-6 top-1/2 -translate-y-1/2 pointer-events-none text-emerald-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-10 flex flex-col sm:flex-row items-center justify-between gap-6">
                    <button type="reset" class="text-[10px] font-black text-slate-300 hover:text-rose-500 uppercase tracking-widest transition-colors">Reset Parameter</button>
                    <button type="submit" class="w-full sm:w-auto h-16 px-12 bg-emerald-600 hover:bg-slate-900 text-white font-black rounded-3xl shadow-2xl shadow-emerald-200 transition-all active:scale-95 uppercase tracking-widest text-[10px]">
                        Finalisasi Data <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>