<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;


class JurusanController extends Controller
{
    public function all(Request $request) {
        $jurusan = Jurusan::all();
        $totalJurusan = Jurusan::count();
        
        return response()->json([
            'status' => 'success',
            'total' => $totalJurusan,
            'data' => $jurusan
        ]);
    }

    public function index(Request $request) {
        $jurusan = Jurusan::all();

        return view('jurusan.index', compact(['jurusan']));

    }
}
