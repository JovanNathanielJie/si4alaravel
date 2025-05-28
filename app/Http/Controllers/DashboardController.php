<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Cara 1: sql query
        $mahasiswaprodi = DB::select('
            SELECT prodi.nama, COUNT(mahasiswa.id) AS jumlah_mahasiswa
            FROM mahasiswa JOIN prodi ON mahasiswa.prodi_id = prodi.id
            GROUP BY prodi.nama');
        return view('dashboard.index', compact('mahasiswaprodi'));
    }
}
