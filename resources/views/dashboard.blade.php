<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">

<body class="bg-[radial-gradient(circle_at_top_right,_#f0fdf4,_#ffffff,_#dcfce7)] min-h-screen font-['Inter'] text-slate-700 overflow-x-hidden">

    <nav class="sticky top-0 z-50 bg-white/40 backdrop-blur-2xl border-b border-emerald-50 py-5 px-6 md:px-12">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a class="flex items-center gap-3 group" href="#">
                <div class="p-2.5 bg-emerald-600 rounded-2xl group-hover:scale-110 transition-all shadow-xl shadow-emerald-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
                <span class="font-black text-slate-800 text-2xl tracking-tighter uppercase italic">Perpus<span class="text-emerald-600 font-light">Digital</span></span>
            </a>
            
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="h-12 px-8 bg-white/50 text-rose-600 text-[10px] font-black rounded-2xl border border-rose-100 hover:bg-rose-600 hover:text-white transition-all uppercase tracking-widest shadow-sm shadow-rose-50" onclick="return confirm('Terminasi sesi akses?')">
                    Terminasi Sesi
                </button>
            </form>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-6 md:px-12 py-16">
        <header class="mb-24 relative">
            <div class="relative z-10 space-y-4">
                <span class="inline-block px-5 py-2 bg-emerald-100/50 backdrop-blur-sm text-emerald-700 text-[10px] font-black rounded-full uppercase tracking-[0.3em] border border-emerald-200">
                    Protokol {{ auth()->user()->role }} Aktif
                </span>
                <h1 class="text-6xl md:text-7xl font-black text-slate-900 tracking-tighter leading-[0.9] mb-4">
                    SELAMAT DATANG,<br> 
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-teal-500 italic">{{ strtoupper(auth()->user()->NamaLengkap) }}</span>
                </h1>
                <p class="text-slate-500 font-medium text-lg max-w-xl leading-relaxed">
                    Sistem siap. Silahkan pilih modul navigasi untuk mengelola pustaka digital dalam kendali penuh.
                </p>
            </div>
            <div class="absolute -top-20 -right-20 w-96 h-96 bg-emerald-200/30 rounded-full blur-[100px] -z-10"></div>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 md:gap-14">
            
            <div class="group relative">
                <div class="absolute -inset-4 bg-emerald-100/20 rounded-[3rem] scale-95 opacity-0 group-hover:opacity-100 group-hover:scale-100 transition-all duration-500 -z-10"></div>
                <div class="space-y-6">
                    <div class="w-20 h-20 bg-emerald-50 rounded-3xl flex items-center justify-center text-emerald-600 shadow-sm border border-emerald-100 group-hover:bg-emerald-600 group-hover:text-white transition-all duration-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="font-black text-slate-800 text-2xl tracking-tighter uppercase">Katalog Utama</h3>
                    <p class="text-sm text-slate-500 font-medium leading-relaxed">Eksplorasi koleksi literasi digital dan kurasi buku terbaik tahun ini.</p>
                    <a href="{{ route('buku.index') }}" class="inline-flex items-center h-14 px-8 bg-emerald-600 text-white text-[10px] font-black rounded-2xl uppercase tracking-[0.2em] hover:bg-slate-900 transition-all shadow-lg shadow-emerald-200">
                        Jelajahi Pustaka
                    </a>
                </div>
            </div>

            @if(auth()->user()->role == 'peminjam')
            <div class="group relative">
                <div class="absolute -inset-4 bg-blue-100/20 rounded-[3rem] scale-95 opacity-0 group-hover:opacity-100 group-hover:scale-100 transition-all duration-500 -z-10"></div>
                <div class="space-y-6">
                    <div class="w-20 h-20 bg-blue-50 rounded-3xl flex items-center justify-center text-blue-600 shadow-sm border border-blue-100 group-hover:bg-blue-600 group-hover:text-white transition-all duration-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="font-black text-slate-800 text-2xl tracking-tighter uppercase">Arsip Pinjaman</h3>
                    <p class="text-sm text-slate-500 font-medium leading-relaxed">Pantau status buku yang sedang Anda pelajari secara real-time.</p>
                    <a href="{{ route('peminjam.pinjaman') }}" class="inline-flex items-center h-14 px-8 bg-blue-600 text-white text-[10px] font-black rounded-2xl uppercase tracking-[0.2em] hover:bg-slate-900 transition-all shadow-lg shadow-blue-100">
                        Cek Validitas
                    </a>
                </div>
            </div>

            <div class="group relative">
                <div class="absolute -inset-4 bg-rose-100/20 rounded-[3rem] scale-95 opacity-0 group-hover:opacity-100 group-hover:scale-100 transition-all duration-500 -z-10"></div>
                <div class="space-y-6">
                    <div class="w-20 h-20 bg-rose-50 rounded-3xl flex items-center justify-center text-rose-600 shadow-sm border border-rose-100 group-hover:bg-rose-600 group-hover:text-white transition-all duration-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                    <h3 class="font-black text-slate-800 text-2xl tracking-tighter uppercase">Koleksi Favorit</h3>
                    <p class="text-sm text-slate-500 font-medium leading-relaxed">Daftar tunggu bacaan impian yang telah Anda tandai sebelumnya.</p>
                    <a href="{{ route('koleksi.index') }}" class="inline-flex items-center h-14 px-8 bg-rose-500 text-white text-[10px] font-black rounded-2xl uppercase tracking-[0.2em] hover:bg-slate-900 transition-all shadow-lg shadow-rose-100">
                        Buka Koleksi
                    </a>
                </div>
            </div>
            @endif

            @if(auth()->user()->role == 'administrator' || auth()->user()->role == 'petugas')
            <div class="group relative">
                <div class="absolute -inset-4 bg-slate-100/50 rounded-[3rem] scale-95 opacity-0 group-hover:opacity-100 group-hover:scale-100 transition-all duration-500 -z-10"></div>
                <div class="space-y-6">
                    <div class="w-20 h-20 bg-white rounded-3xl flex items-center justify-center text-slate-800 shadow-sm border border-slate-100 group-hover:bg-slate-900 group-hover:text-white transition-all duration-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                    </div>
                    <h3 class="font-black text-slate-800 text-2xl tracking-tighter uppercase">Klasifikasi Data</h3>
                    <p class="text-sm text-slate-500 font-medium leading-relaxed">Sinkronisasi kategori dan pengelompokan database pustaka.</p>
                    <a href="{{ route('kategori.index') }}" class="inline-flex items-center h-14 px-8 bg-slate-800 text-white text-[10px] font-black rounded-2xl uppercase tracking-[0.2em] hover:bg-emerald-600 transition-all">
                        Kelola Struktur
                    </a>
                </div>
            </div>

            <div class="group relative">
                <div class="absolute -inset-4 bg-teal-100/20 rounded-[3rem] scale-95 opacity-0 group-hover:opacity-100 group-hover:scale-100 transition-all duration-500 -z-10"></div>
                <div class="space-y-6">
                    <div class="w-20 h-20 bg-teal-50 rounded-3xl flex items-center justify-center text-teal-600 shadow-sm border border-teal-100 group-hover:bg-teal-600 group-hover:text-white transition-all duration-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="font-black text-slate-800 text-2xl tracking-tighter uppercase">Ekstraksi Laporan</h3>
                    <p class="text-sm text-slate-500 font-medium leading-relaxed">Hasilkan rekapitulasi transaksi pustaka dalam format dokumen PDF.</p>
                    <a href="{{ route('laporan.generate') }}" class="inline-flex items-center h-14 px-8 bg-teal-600 text-white text-[10px] font-black rounded-2xl uppercase tracking-[0.2em] hover:bg-slate-900 transition-all shadow-lg shadow-teal-100">
                        Generate PDF
                    </a>
                </div>
            </div>
            @endif

            @if(auth()->user()->role == 'administrator')
            <div class="group relative">
                <div class="absolute -inset-4 bg-amber-100/20 rounded-[3rem] scale-95 opacity-0 group-hover:opacity-100 group-hover:scale-100 transition-all duration-500 -z-10"></div>
                <div class="space-y-6">
                    <div class="w-20 h-20 bg-amber-50 rounded-3xl flex items-center justify-center text-amber-600 shadow-sm border border-amber-100 group-hover:bg-amber-500 group-hover:text-white transition-all duration-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <h3 class="font-black text-slate-800 text-2xl tracking-tighter uppercase">Otoritas User</h3>
                    <p class="text-sm text-slate-500 font-medium leading-relaxed">Manajemen identitas petugas dan konfigurasi hak akses sistem.</p>
                    <a href="{{ route('petugas.index') }}" class="inline-flex items-center h-14 px-8 bg-amber-500 text-white text-[10px] font-black rounded-2xl uppercase tracking-[0.2em] hover:bg-slate-900 transition-all shadow-lg shadow-amber-100">
                        Otorisasi Akun
                    </a>
                </div>
            </div>
            @endif

        </div>

        <footer class="mt-32 pt-12 border-t border-emerald-50 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-4">
                <p class="text-[10px] font-black text-emerald-800/20 uppercase tracking-[0.5em] italic">
                    &copy; 2026 LibrisCore Infrastructure &bull; SMKN 11 Malang
                </p>
            </div>
            <div class="flex gap-6 opacity-20 grayscale">
                <i class="fab fa-laravel text-2xl"></i>
                <i class="fab fa-php text-2xl"></i>
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/></svg>
            </div>
        </footer>
    </main>
</body>