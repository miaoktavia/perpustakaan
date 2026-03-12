<?php
namespace App\Http\Controllers;
use App\Models\Buku;
use App\Models\UlasanBuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UlasanBukuController extends Controller {
    public function index()
{
    // Hapus 'with', ambil data polosan biar nggak white screen
    $ulasan = \App\Models\UlasanBuku::latest()->get();
    return view('ulasan.index', compact('ulasan'));
}
    public function create($id) {
        $buku = Buku::where('BukuID', $id)->firstOrFail();
        return view('ulasan.create', compact('buku'));
    }
    public function store(Request $request) {
        $request->validate(['BukuID' => 'required', 'Ulasan' => 'required', 'Rating' => 'required|integer|min:1|max:5']);
        UlasanBuku::create([
            'UserID' => Auth::id(),
            'BukuID' => $request->BukuID,
            'Ulasan' => $request->Ulasan,
            'Rating' => $request->Rating,
        ]);
        return redirect()->route('buku.index')->with('success', 'Ulasan Terkirim!');
    }
}