<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">

<body class="bg-[radial-gradient(circle_at_top_right,_#f0fdf4,_#ffffff,_#dcfce7)] min-h-screen font-['Inter'] flex items-center justify-center p-6 md:p-12">
    <div class="max-w-xl w-full">
        <div class="text-center mb-12 space-y-4">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-emerald-600 rounded-[2rem] shadow-2xl shadow-emerald-200 mb-2 rotate-6 hover:rotate-0 transition-all duration-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </div>
            <div>
                <h1 class="text-3xl font-black tracking-tighter text-slate-800 uppercase italic">Update <span class="text-emerald-600">Kredensial</span></h1>
                <p class="text-slate-400 font-bold text-[10px] uppercase tracking-[0.3em] mt-2">Indeks Pegawai: #{{ $petugas->UserID }}</p>
            </div>
        </div>

        <div class="bg-white/60 backdrop-blur-2xl rounded-[3rem] p-10 md:p-14 shadow-[0_40px_80px_-15px_rgba(0,0,0,0.08)] border border-white relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-2 bg-emerald-600/20"></div>

            <form action="{{ route('petugas.update', $petugas->UserID) }}" method="POST" class="space-y-8">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">ID Akses</label>
                        <input type="text" name="Username" value="{{ $petugas->Username }}" class="w-full h-16 px-8 rounded-3xl bg-white border border-emerald-50 focus:border-emerald-500 transition-all outline-none text-slate-700 font-black italic" required>
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Email Aktif</label>
                        <input type="email" name="Email" value="{{ $petugas->Email }}" class="w-full h-16 px-8 rounded-3xl bg-white border border-emerald-50 focus:border-emerald-500 transition-all outline-none text-slate-700 font-bold" required>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Identitas Lengkap Petugas</label>
                    <input type="text" name="NamaLengkap" value="{{ $petugas->NamaLengkap }}" class="w-full h-16 px-8 rounded-3xl bg-white border border-emerald-50 focus:border-emerald-500 transition-all outline-none text-slate-700 font-bold" required>
                </div>

                <div class="p-8 bg-emerald-50/50 rounded-[2rem] border border-emerald-100 space-y-4">
                    <div class="flex items-center justify-between">
                        <label class="text-[10px] font-black text-emerald-700 uppercase tracking-widest block">Reset Kunci Akses</label>
                        <span class="text-[9px] font-black text-emerald-400 uppercase italic">Opsi Keamanan</span>
                    </div>
                    <input type="password" name="Password" class="w-full h-16 px-8 rounded-2xl bg-white border border-white focus:border-emerald-400 transition-all outline-none text-slate-700 font-bold" placeholder="••••••••">
                    <p class="text-[10px] text-emerald-600 font-bold italic flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Kosongkan jika tidak ada perubahan protokol keamanan.
                    </p>
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Level Otoritas</label>
                    <select name="role" class="w-full h-16 px-8 rounded-3xl bg-white border border-emerald-50 focus:border-emerald-500 outline-none text-slate-600 font-black uppercase text-[11px] appearance-none cursor-pointer" required>
                        <option value="petugas" {{ $petugas->role == 'petugas' ? 'selected' : '' }}>Staf Operasional</option>
                        <option value="administrator" {{ $petugas->role == 'administrator' ? 'selected' : '' }}>Root Administrator</option>
                    </select>
                </div>

                <div class="pt-4 flex flex-col gap-5">
                    <button type="submit" class="w-full h-16 bg-slate-900 hover:bg-emerald-600 text-white font-black rounded-3xl shadow-2xl shadow-slate-200 transition-all active:scale-95 uppercase tracking-widest text-[11px]">
                        Sinkronisasi Perubahan
                    </button>
                    <a href="{{ route('petugas.index') }}" class="text-center text-[10px] font-black text-slate-400 hover:text-emerald-600 uppercase tracking-[0.2em] transition-colors">
                        Batalkan Modifikasi
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>