<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Otentikasi | LibrisCore</title>
</head>
<body class="bg-[radial-gradient(circle_at_top_right,_#f0fdf4,_#ffffff,_#dcfce7)] min-h-screen font-['Inter'] flex items-center justify-center p-6 md:p-12">

    <div class="w-full max-w-6xl flex flex-col md:flex-row items-center gap-12 lg:gap-24">
        
        <div class="hidden md:flex flex-col flex-1 space-y-8">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-emerald-600 rounded-[2rem] shadow-2xl shadow-emerald-200 transform rotate-3 hover:rotate-0 transition-transform duration-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
            </div>
            <div>
                <h1 class="text-5xl lg:text-6xl font-black text-slate-800 tracking-tighter leading-none">
                    Perpus<span class="text-emerald-600">Digital.</span>
                </h1>
                <p class="mt-6 text-xl text-slate-500 font-medium max-w-md leading-relaxed">
                    Akses ekosistem literasi digital masa depan dengan presisi tinggi dan antarmuka mutakhir.
                </p>
            </div>
            <div class="flex gap-4">
                <div class="h-1 w-12 bg-emerald-600 rounded-full"></div>
                <div class="h-1 w-4 bg-emerald-200 rounded-full"></div>
                <div class="h-1 w-4 bg-emerald-200 rounded-full"></div>
            </div>
        </div>

        <div class="w-full max-w-[480px] bg-white/60 backdrop-blur-2xl border border-white rounded-[3rem] p-10 md:p-14 shadow-[0_32px_64px_-16px_rgba(16,185,129,0.1)] relative">
            
            <div class="mb-10 text-center md:text-left">
                <h2 class="text-2xl font-bold text-slate-800 tracking-tight">Otentikasi Sesi</h2>
                <p class="text-sm text-slate-500 mt-2 font-medium">Gunakan identitas akses untuk masuk ke sistem.</p>
            </div>

            @if(session('success'))
                <div class="bg-emerald-500/10 text-emerald-700 p-4 rounded-2xl text-xs font-bold mb-8 border border-emerald-100 flex items-center animate-bounce">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->has('loginError'))
                <div class="bg-rose-500/10 text-rose-600 p-4 rounded-2xl text-xs font-bold mb-8 border border-rose-100">
                    {{ $errors->first('loginError') }}
                </div>
            @endif

            <form action="/login" method="POST" class="space-y-6">
                @csrf
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-emerald-700/60 uppercase tracking-[0.2em] ml-2">ID Akses Pengguna</label>
                    <input type="text" name="Username" 
                        class="w-full h-16 px-6 rounded-3xl bg-white/80 border border-slate-100 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/5 outline-none transition-all placeholder:text-slate-300 text-slate-700 font-semibold" 
                        placeholder="ID Akses" required autofocus>
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-black text-emerald-700/60 uppercase tracking-[0.2em] ml-2">Kunci Keamanan</label>
                    <input type="password" name="Password" 
                        class="w-full h-16 px-6 rounded-3xl bg-white/80 border border-slate-100 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/5 outline-none transition-all placeholder:text-slate-300 text-slate-700 font-semibold" 
                        placeholder="••••••••" required>
                </div>

                <button type="submit" 
                    class="w-full h-16 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-3xl shadow-xl shadow-emerald-200 transition-all active:scale-95 flex items-center justify-center group uppercase tracking-widest text-xs">
                    <span>Konfirmasi Masuk</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </button>
            </form>

            <div class="mt-12 pt-8 border-t border-slate-100 text-center">
                <p class="text-sm text-slate-400 font-medium">
                    Belum terdaftar? <a href="/register" class="text-emerald-600 font-black hover:text-emerald-800 transition-colors ml-1">Inisiasi Akun Baru</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>