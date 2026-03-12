<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">

<body class="bg-[radial-gradient(circle_at_top_right,_#f0fdf4,_#ffffff,_#dcfce7)] min-h-screen font-['Inter'] text-slate-700 pb-20 overflow-x-hidden">
    <nav class="sticky top-0 z-50 bg-white/40 backdrop-blur-2xl border-b border-emerald-50 py-5 px-6 md:px-12">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <div class="flex items-center gap-4">
                <div class="p-2.5 bg-emerald-600 rounded-2xl shadow-xl shadow-emerald-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <span class="text-2xl font-black tracking-tighter text-slate-800 uppercase italic">Perpus<span class="text-emerald-600 font-light">Digital</span></span>
            </div>
            <a href="/dashboard" class="group flex items-center text-sm font-bold text-slate-400 hover:text-emerald-600 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Pusat Kendali
            </a>
        </div>
    </nav>

    <div class="max-w-6xl mx-auto px-6 mt-16">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-8 mb-16">
            <div class="space-y-2">
                <h2 class="text-5xl font-black text-slate-900 tracking-tighter leading-none italic">Katalog Kategori</h2>
                <p class="text-slate-500 font-medium text-lg italic">Organisir genre dan sistem klasifikasi literasi.</p>
            </div>
            <button data-bs-toggle="modal" data-bs-target="#modalTambah"
                class="h-16 px-10 bg-emerald-600 hover:bg-slate-900 text-white font-black rounded-3xl shadow-2xl shadow-emerald-200 transition-all active:scale-95 flex items-center justify-center space-x-3 uppercase tracking-widest text-[11px]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                <span>Inisiasi Entri Baru</span>
            </button>
        </div>

        @if(session('success'))
            <div class="bg-white/80 backdrop-blur-md border-l-4 border-emerald-500 p-6 rounded-3xl shadow-xl shadow-emerald-100/50 mb-12 flex items-center animate-bounce">
                <div class="w-10 h-10 bg-emerald-100 text-emerald-600 rounded-2xl flex items-center justify-center mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </div>
                <span class="text-sm font-bold text-slate-700 uppercase tracking-tight">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white/50 backdrop-blur-xl rounded-[3rem] overflow-hidden shadow-2xl shadow-emerald-100/40 border border-white/60">
            <table class="w-full">
                <thead>
                    <tr class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] border-b border-emerald-50/50">
                        <th class="px-10 py-8 text-center w-24">Urutan</th>
                        <th class="px-6 py-8 text-left uppercase">Label Klasifikasi</th>
                        <th class="px-10 py-8 text-right">Manajemen</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-emerald-50/30">
                    @forelse($kategori as $index => $k)
                        <tr class="group hover:bg-emerald-50/40 transition-all">
                            <td class="px-10 py-8 text-center text-sm font-black text-slate-300 group-hover:text-emerald-600">#{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</td>
                            <td class="px-6 py-8 text-xl font-bold text-slate-700 group-hover:translate-x-2 transition-transform duration-500">
                                {{ $k->NamaKategori }}
                            </td>
                            <td class="px-10 py-8">
                                <form action="{{ route('kategori.destroy', $k->KategoriID) }}" method="POST" class="flex justify-end">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Hapus protokol klasifikasi ini?')"
                                        class="w-14 h-14 flex items-center justify-center bg-white text-rose-500 rounded-2xl hover:bg-rose-500 hover:text-white transition-all shadow-sm border border-rose-50 group-hover:rotate-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-8 py-32 text-center">
                                <p class="text-slate-300 font-black uppercase tracking-[0.5em] text-xs">Arsip Data Nihil</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content !rounded-[3rem] border-0 bg-white/90 backdrop-blur-2xl p-4 shadow-[0_35px_60px_-15px_rgba(16,185,129,0.2)]">
                <form action="{{ route('kategori.store') }}" method="POST">
                    @csrf
                    <div class="p-10 space-y-8">
                        <div class="space-y-2 text-center">
                            <h5 class="text-3xl font-black text-slate-900 tracking-tighter italic uppercase">Tambah Klasifikasi</h5>
                            <p class="text-sm text-slate-500 font-medium">Masukan label unik untuk kategori database.</p>
                        </div>

                        <div class="space-y-4">
                            <label class="text-[10px] font-black text-emerald-600 uppercase tracking-widest ml-1 block">ID Label Kategori</label>
                            <input type="text" name="NamaKategori"
                                class="w-full h-16 px-8 rounded-[1.5rem] bg-emerald-50/50 border border-emerald-100 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 outline-none transition-all placeholder:text-emerald-200 text-slate-700 font-bold text-lg"
                                placeholder="Misal: Teknologi Terapan" required>
                        </div>

                        <div class="flex gap-4 pt-4">
                            <button type="button" data-bs-dismiss="modal"
                                class="flex-1 h-16 rounded-[1.5rem] font-black text-slate-400 hover:bg-slate-50 transition-all uppercase text-[10px] tracking-widest">Batalkan</button>
                            <button type="submit"
                                class="flex-[2] h-16 bg-emerald-600 text-white rounded-[1.5rem] font-black shadow-xl shadow-emerald-200 transition-all hover:bg-slate-900 active:scale-95 uppercase text-[10px] tracking-widest">Verifikasi & Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>