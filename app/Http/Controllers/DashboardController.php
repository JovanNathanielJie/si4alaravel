<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Mahasiswa; // <- tambahkan ini

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil jumlah mahasiswa per prodi
        $mahasiswaprodi = DB::select('
            SELECT prodi.nama, COUNT(mahasiswa.id) AS jumlah_mahasiswa
            FROM mahasiswa
            JOIN prodi ON mahasiswa.prodi_id = prodi.id
            GROUP BY prodi.nama
        ');

        // Ambil statistik jenis kelamin
        $jumlahLaki = Mahasiswa::where('jenis_kelamin', 'L')->count();
        $jumlahPerempuan = Mahasiswa::where('jenis_kelamin', 'P')->count();

        // Kirim semua data ke view
        return view('dashboard.index', compact('mahasiswaprodi', 'jumlahLaki', 'jumlahPerempuan'));
    }
}
