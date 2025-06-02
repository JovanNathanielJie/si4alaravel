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

        // Ambil jumlah prodi per fakultas
        $prodiPerFakultas = DB::select('
            SELECT fakultas.nama AS fakultas, COUNT(prodi.id) AS jumlah_prodi
            FROM prodi
            JOIN fakultas ON prodi.fakultas_id = fakultas.id
            GROUP BY fakultas.nama
        ');

        //Jumlah mata kuliah per prodi
        $matkulPerProdi = DB::select('
            SELECT prodi.nama, COUNT(mata_kuliah.id) AS jumlah_matkul
            FROM mata_kuliah
            JOIN prodi ON mata_kuliah.prodi_id = prodi.id
            GROUP BY prodi.nama
        ');

         // Query jumlah jadwal per dosen
        $jadwalPerDosen = DB::select('
        SELECT users.name, COUNT(jadwal.id) AS jumlah_jadwal
        FROM users
        LEFT JOIN jadwal ON users.id = jadwal.dosen_id
        WHERE users.role = "dosen"
        GROUP BY users.name');

        // Kirim semua data ke view
        return view('dashboard.index', compact('mahasiswaprodi',
        'prodiPerFakultas',
        'jumlahLaki',
        'jumlahPerempuan',
        'matkulPerProdi', 'jadwalPerDosen'));
    }
}
