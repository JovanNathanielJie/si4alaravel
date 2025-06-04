<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // panggil model prodi menggunakan eloquent
        $prodi = Prodi::all(); // perintah sql select * from prodi
        // dd($prodi); // dump and die
        return view('prodi.index')->with('prodi', $prodi);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fakultas = Fakultas::all(); // ambil semua data fakultas
        return view('prodi.create', compact('fakultas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // cek apakah user memiliki izin untuk membuat prodi
        if ($request->user()->cannot('create', Prodi::class)) {
            abort(403, 'Unauthorized action.');
        }
        // validasi input
        $input = $request->validate([
            'nama' => 'required|unique:prodi',
            'singkatan' => 'required|max:5',
            'kaprodi' => 'required',
            'sekretaris' => 'required',
            'fakultas_id' => 'required',
        ]);

        // simpan data ke tabel prodi
        Prodi::create($input);

        // redirect ke route prodi.index
        return redirect()->route('prodi.index')->with('success', 'Program Studi berhasil ditambahkan.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Prodi $prodi)
    {
        //dd($prodi);
        return view('prodi.show', compact('prodi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodi $prodi)
    {
        //dd($prodi);
        $fakultas = Fakultas::all(); // ambil semua data fakultas
        return view('prodi.edit', compact('prodi', 'fakultas')); // mengirim data prodi dan fakultas ke view edit
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prodi $prodi)
    {
        // cek apakah user memiliki izin untuk mengupdate prodi
        if ($request->user()->cannot('update', $prodi)) {
            abort(403, 'Unauthorized action.');
        }
        // validasi input
        $input = $request->validate([
            'nama' => 'required',
            'singkatan' => 'required|max:5',
            'kaprodi' => 'required',
            'sekretaris' => 'required',
            'fakultas_id' => 'required',
        ]);

        // update data ke tabel prodi
        $prodi->update($input);

        // redirect ke route prodi.index
        return redirect()->route('prodi.index')->with('success', 'Program Studi berhasil ditambahkan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Prodi $prodi)
    {
        // Temukan data prodi berdasarkan ID
        $prodi = Prodi::findOrFail($prodi->id);
         // cek apakah user memiliki izin untuk menghapus prodi
        if ($request->user()->cannot('delete', $prodi)) {
            abort(403, 'Unauthorized action.');
        }
        // dd($prodi);
        // Hapus data prodi
        $prodi->delete();
        // Redirect ke route prodi.index
        return redirect()->route('prodi.index')->with('success', 'Program Studi berhasil dihapus.');
    }

}
