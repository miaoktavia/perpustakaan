<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Registrasi | PerpusDigital</title>
</head>
<body class="bg-[radial-gradient(circle_at_bottom_left,_#f0fdf4,_#ffffff,_#dcfce7)] min-h-screen font-['Inter'] flex items-center justify-center p-6 py-12">

    <div class="w-full max-w-4xl">
        <div class="flex flex-col items-center mb-12">
            <div class="p-4 bg-white/50 backdrop-blur-md rounded-[2rem] border border-white shadow-sm mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
            </div>
            <h1 class="text-3xl font-black text-slate-800 tracking-tighter">Registrasi <span class="text-emerald-600">Protokol</span></h1>
        </div>

        <div class="bg-white/70 backdrop-blur-3xl border border-white rounded-[4rem] p-8 md:p-16 shadow-[0_40px_100px_-20px_rgba(16,185,129,0.1)]">
            
            <form action="/register" method="POST" class="space-y-10">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-10">
                    <div class="space-y-3">
                        <label class="text-[10px] font-black text-emerald-700/50 uppercase tracking-[0.3em] ml-2">ID Akses Baru</label>
                        <input type="text" name="Username" 
                            class="w-full h-16 px-6 rounded-3xl bg-white border border-slate-50 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/5 outline-none transition-all placeholder:text-slate-300 text-slate-700 font-semibold" 
                            placeholder="@unik_id" required>
                    </div>

                    <div class="space-y-3">
                        <label class="text-[10px] font-black text-emerald-700/50 uppercase tracking-[0.3em] ml-2">Surel Aktif</label>
                        <input type="email" name="Email" 
                            class="w-full h-16 px-6 rounded-3xl bg-white border border-slate-50 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/5 outline-none transition-all placeholder:text-slate-300 text-slate-700 font-semibold" 
                            placeholder="mail@domain.com" required>
                    </div>

                    <div class="space-y-3">
                        <label class="text-[10px] font-black text-emerald-700/50 uppercase tracking-[0.3em] ml-2">Kunci Keamanan</label>
                        <input type="password" name="Password" 
                            class="w-full h-16 px-6 rounded-3xl bg-white border border-slate-50 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/5 outline-none transition-all placeholder:text-slate-300 text-slate-700" 
                            placeholder="Enkripsi Sandi" required>
                    </div>

                    <div class="space-y-3">
                        <label class="text-[10px] font-black text-emerald-700/50 uppercase tracking-[0.3em] ml-2">Identitas Lengkap</label>
                        <input type="text" name="NamaLengkap" 
                            class="w-full h-16 px-6 rounded-3xl bg-white border border-slate-50 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/5 outline-none transition-all placeholder:text-slate-300 text-slate-700 font-semibold" 
                            placeholder="Nama Lengkap" required>
                    </div>
                </div>

                <div class="space-y-3">
                    <label class="text-[10px] font-black text-emerald-700/50 uppercase tracking-[0.3em] ml-2">Titik Domisili</label>
                    <textarea name="Alamat" rows="2"
                        class="w-full p-6 rounded-[2.5rem] bg-white border border-slate-50 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/5 outline-none transition-all placeholder:text-slate-300 text-slate-700 font-semibold resize-none" 
                        placeholder="Detail alamat domisili..." required></textarea>
                </div>

                <div class="pt-6">
                    <button type="submit" 
                        class="w-full h-16 bg-emerald-600 hover:bg-emerald-700 text-white font-black rounded-3xl shadow-2xl shadow-emerald-200 transition-all active:scale-[0.97] flex items-center justify-center space-x-3 uppercase tracking-widest text-xs">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                        <span>Finalisasi Registrasi</span>
                    </button>
                    <div class="mt-8 text-center">
                        <a href="/login" class="text-xs font-black text-slate-400 hover:text-emerald-600 transition-colors tracking-widest uppercase">Kembali ke Gerbang Masuk</a>
                    </div>
                </div>
            </form>
        </div>

        <footer class="mt-16 text-center">
            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-[0.5em]">
                &copy; 2026 Core Infrastructure &bull; SMKN 11 Malang
            </p>
        </footer>
    </div>
</body>
</html>