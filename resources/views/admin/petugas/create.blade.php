<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">

<body class="bg-[radial-gradient(circle_at_top_right,_#f0fdf4,_#ffffff,_#dcfce7)] min-h-screen font-['Inter'] flex items-center justify-center p-6 md:p-12">
    <div class="max-w-5xl w-full flex flex-col md:flex-row items-center gap-12 md:gap-20">
        
        <div class="w-full md:w-1/2 space-y-8 text-center md:text-left">
            <div class="inline-flex items-center gap-4 bg-white/40 p-3 pr-6 rounded-3xl backdrop-blur-sm border border-white/50">
                <div class="w-12 h-12 bg-emerald-600 rounded-2xl flex items-center justify-center shadow-xl shadow-emerald-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                </div>
                <span class="text-xl font-black tracking-tighter text-slate-800 uppercase italic">Perpus<span class="text-emerald-600 font-light">Digital</span></span>
            </div>
            
            <div class="space-y-4">
                <h1 class="text-5xl md:text-6xl font-black text-slate-900 tracking-tighter leading-none italic uppercase">Inisiasi <br><span class="text-emerald-600">Otoritas</span></h1>
                <p class="text-slate-500 font-medium text-lg leading-relaxed max-w-sm mx-auto md:mx-0">Konfigurasi hak akses dan identitas digital untuk staf pusat perpus.</p>
            </div>
        </div>

        <div class="w-full md:w-1/2">
            <div class="bg-white/60 backdrop-blur-2xl rounded-[3rem] p-10 md:p-14 shadow-[0_40px_80px_-15px_rgba(16,185,129,0.15)] border border-white/80">
                <form action="{{ route('petugas.store') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div class="space-y-1.5">
                        <label class="text-[10px] font-black text-emerald-600 uppercase tracking-widest ml-1">ID Akses Unik</label>
                        <input type="text" name="Username" class="w-full h-16 px-8 rounded-3xl bg-white/50 border border-emerald-100 focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 outline-none transition-all placeholder:text-slate-300 text-slate-700 font-bold" placeholder="revan_admin2026" required>
                    </div>

                    <div class="space-y-1.5">
                        <label class="text-[10px] font-black text-emerald-600 uppercase tracking-widest ml-1">Email Kependudukan</label>
                        <input type="email" name="Email" class="w-full h-16 px-8 rounded-3xl bg-white/50 border border-emerald-100 focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 outline-none transition-all placeholder:text-slate-300 text-slate-700 font-bold" placeholder="nama@perpusdigital.id" required>
                    </div>

                    <div class="space-y-1.5">
                        <label class="text-[10px] font-black text-emerald-600 uppercase tracking-widest ml-1">Nama Lengkap Sesuai ID</label>
                        <input type="text" name="NamaLengkap" class="w-full h-16 px-8 rounded-3xl bg-white/50 border border-emerald-100 focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 outline-none transition-all placeholder:text-slate-300 text-slate-700 font-bold" placeholder="Nama Petugas Resmi..." required>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <label class="text-[10px] font-black text-emerald-600 uppercase tracking-widest ml-1">Kunci Keamanan</label>
                            <input type="password" name="Password" class="w-full h-16 px-8 rounded-3xl bg-white/50 border border-emerald-100 focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 outline-none transition-all text-slate-700 font-bold" required>
                        </div>
                        <div class="space-y-1.5">
                            <label class="text-[10px] font-black text-emerald-600 uppercase tracking-widest ml-1">Level Otoritas</label>
                            <select name="role" class="w-full h-16 px-6 rounded-3xl bg-white/50 border border-emerald-100 focus:border-emerald-500 outline-none text-slate-600 font-black uppercase text-[11px] tracking-tighter appearance-none cursor-pointer" required>
                                <option value="petugas">Petugas Lapangan</option>
                                <option value="administrator">Admin Utama</option>
                            </select>
                        </div>
                    </div>

                    <div class="pt-6 space-y-4">
                        <button type="submit" class="w-full h-16 bg-emerald-600 hover:bg-slate-900 text-white font-black rounded-3xl shadow-2xl shadow-emerald-200 transition-all active:scale-95 uppercase tracking-widest text-[11px]">
                            Konfirmasi Registrasi
                        </button>
                        <a href="{{ route('petugas.index') }}" class="flex items-center justify-center text-[10px] font-black text-slate-400 hover:text-emerald-600 uppercase tracking-[0.2em] transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Kembali ke Direktori
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>