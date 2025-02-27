<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Jurusan;

class DashboardController extends Controller
{
    public function index(Request $request) {
        $totalMhs = Mahasiswa::count();
        $totalJurusan = Jurusan::count();

        return view('dashboard.index', compact(['totalMhs', 'totalJurusan']));
    }
}
