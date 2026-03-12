<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AuthController, BukuController, PeminjamanController, PetugasController, KategoriBukuController, UlasanBukuController, LaporanController};

Route::get('/', fn() => redirect('/login'));
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'index'])->name('dashboard');

    // BUKU
    Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
    Route::get('/buku/{id}', [BukuController::class, 'show'])->name('buku.show');

    // ULASAN
    Route::get('/ulasan', [UlasanBukuController::class, 'index'])->name('ulasan.index');
    Route::get('/ulasan/create/{id}', [UlasanBukuController::class, 'create'])->name('ulasan.create');
    Route::post('/ulasan/store', [UlasanBukuController::class, 'store'])->name('ulasan.store');

    // KOLEKSI
    Route::post('/koleksi/tambah', [PeminjamanController::class, 'tambahKoleksi'])->name('koleksi.store');
    Route::get('/koleksi-saya', [PeminjamanController::class, 'koleksiSaya'])->name('koleksi.index');
    Route::delete('/koleksi/{id}', [PeminjamanController::class, 'hapusKoleksi'])->name('koleksi.destroy');

    // PEMINJAMAN RESOURCE
    Route::resource('peminjaman', PeminjamanController::class)->except(['destroy']);

    // KHUSUS ADMIN & PETUGAS (Termasuk Fitur Pengembalian di Laporan)
    Route::middleware(['checkRole:administrator,petugas'])->group(function () {
        Route::get('/laporan', [LaporanController::class, 'generate'])->name('laporan.generate');
        Route::get('/laporan/cetak', [BukuController::class, 'cetak_pdf'])->name('buku.cetak');
        Route::resource('kategori', KategoriBukuController::class);
        Route::resource('petugas', PetugasController::class);

        // Fitur konfirmasi pengembalian (dipindah ke sini agar Admin bisa konfirmasi di halaman laporan)
        Route::put('/peminjaman/kembali/{id}', [PeminjamanController::class, 'kembalikan'])->name('peminjaman.kembali');

        // ADMIN BUKU
        Route::get('/buku-create', [BukuController::class, 'create'])->name('buku.create');
        Route::post('/buku-store', [BukuController::class, 'store'])->name('buku.store');
        Route::get('/buku-edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
        Route::put('/buku-update/{id}', [BukuController::class, 'update'])->name('buku.update');
        Route::delete('/buku-delete/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
    });

    // KHUSUS PEMINJAM
    Route::middleware(['checkRole:peminjam'])->group(function () {
        Route::post('/pinjam-buku/{id}', [PeminjamanController::class, 'store'])->name('peminjam.store');
    });
});