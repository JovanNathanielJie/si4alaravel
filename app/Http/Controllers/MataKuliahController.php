<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //panggil model mata kuliah dmenggunakan eloquent
        $mataKuliah = MataKuliah ::all(); // perintah sql select * from mata_kuliah
        // dd($mataKuliah); // dump and die\
        return view('mata_kuliah.index')->with('mataKuliah', $mataKuliah);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = Prodi::all(); // ambil semua data prodi
        return view('mata_kuliah.create', compact('prodi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // cek apakah user memiliki izin untuk membuat mata kuliah
        if ($request->user()->cannot('create', MataKuliah::class)) {
            abort(403, 'Unauthorized action.');
        }
        // validasi input
        $input = $request->validate([
            'kode_mk' => 'required|unique:mata_kuliah',
            'nama' => 'required',
            'prodi_id' => 'required'
        ]);

        // simpan data ke tabel mata_kuliah
        MataKuliah::create($input);

        // redirect ke route mataKuliah.index
        return redirect()->route('mata_kuliah.index')->with('success', 'Mata Kuliah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MataKuliah $mataKuliah)
    {
        //dd($mataKuliah);
        return view('mata_kuliah.show', compact('mataKuliah'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MataKuliah $mataKuliah)
    {
        //dd($mataKuliah);
        $prodi = Prodi::all(); // ambil semua data prodi
        return view('mata_kuliah.edit', compact('mataKuliah', 'prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MataKuliah $mataKuliah)
    {
        // cek apakah user memiliki izin untuk mengupdate mata kuliah
        if ($request->user()->cannot('update', $mataKuliah)) {
            abort(403, 'Unauthorized action.');
        }
        //validasi input
        $input = $request->validate([
            'kode_mk' => 'required',
            'nama' => 'required',
            'prodi_id' => 'required'
        ]);
        // update data mata kuliah
        $mataKuliah->update($input);
        // redirect ke route mataKuliah.index
        return redirect()->route('mata_kuliah.index')->with('success', 'Mata Kuliah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, MataKuliah $mataKuliah)
    {
        // Temukan data prodi berdasarkan ID
        $mataKuliah = MataKuliah::findOrFail($mataKuliah->id);
        // dd($mataKuliah);
        // cek apakah user memiliki izin untuk menghapus mata kuliah
        if ($request->user()->cannot('delete', $mataKuliah)) {
            abort(403, 'Unauthorized action.');
        }
        // hapus data mata kuliah
        $mataKuliah->delete();
        // redirect ke route mataKuliah.index
        return redirect()->route('mata_kuliah.index')->with('success', 'Mata Kuliah berhasil dihapus.');
    }
}
