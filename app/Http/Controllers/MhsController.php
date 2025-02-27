<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Jurusan;
use Carbon\Carbon;

class MhsController extends Controller
{

    public function index(Request $request) {
        $jurusan = Jurusan::all();

        return view('mahasiswa.index', compact(['jurusan']));

    }

    public function all(Request $request) {
        $query = Mahasiswa::with('jurusan');

        if ($request->has('filter')) {
            if($request->filter === 'over21') {
                $minBirthDate = Carbon::now()->subYears(21)->format('Y-m-d');
                $query->where('tanggal_lahir', '<=', $minBirthDate);
            } else if($request->filter === 'under21') {
                $minBirthDate = Carbon::now()->subYears(21)->format('Y-m-d');
                $query->where('tanggal_lahir', '>=', $minBirthDate);
            }
        }

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('nama_lengkap', 'LIKE', "%$search%");
        }

        $mhs = $query->get();
        $totalMhs = $mhs->count();

        return response()->json([
            'status' => 'success',
            'total' => $totalMhs,
            'data' => $mhs
        ]);
    }

    public function store(Request $request) {
        $validator = $request->validate([
            'nim' => 'required|string',
            'nama_lengkap' => 'required|string',
            'jurusan' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'id_provinsi' => 'required|integer',
            'id_kota' => 'required|integer',
            'id_kecamatan' => 'required|integer',
            'id_kelurahan' => 'required|integer',
            'alamat' => 'required|string',
        ]);

        try {
            Mahasiswa::create([
                'nim' => $request->nim,
                'nama_lengkap' => $request->nama_lengkap,
                'kode_jurusan' => $request->jurusan,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'id_provinsi' => $request->id_provinsi,
                'id_kota' => $request->id_kota,
                'id_kecamatan' => $request->id_kecamatan,
                'id_kelurahan' => $request->id_kelurahan,
                'alamat' => $request->alamat,
            ]);
    
            return response()->json([
                'success' => true,
                'message' => 'Mahasiswa berhasil ditambahkan!',
            ], 201);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan data mahasiswa!',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function edit(Request $request, $nim) {

        $validator = $request->validate([
            'nama_lengkap' => 'required',
            'jurusan' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'id_provinsi' => 'required',
            'id_kota' => 'required',
            'id_kecamatan' => 'required',
            'id_kelurahan' => 'required',
            'alamat' => 'required',
        ]);

        try {
            $mahasiswa = Mahasiswa::where('nim', $nim)->first();
            
            if (!$mahasiswa) {
                return response()->json([
                    'success' => false,
                    'message' => 'Mahasiswa tidak ditemukan!',
                ], 404);
            }
        
            $mahasiswa->update([
                'nama_lengkap' => $request->nama_lengkap,
                'kode_jurusan' => $request->jurusan,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'id_provinsi' => $request->id_provinsi,
                'id_kota' => $request->id_kota,
                'id_kecamatan' => $request->id_kecamatan,
                'id_kelurahan' => $request->id_kelurahan,
                'alamat' => $request->alamat,
            ]);


            return response()->json([
                'success' => true,
                'message' => 'Mahasiswa berhasil diperbarui!',
            ], 200);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengubah data mahasiswa!',
                'error' => $e->getMessage(),
            ], 500);
        }

    }

    public function delete(Request $request, $nim) {
        try {
            $mahasiswa = Mahasiswa::where('nim', $nim)->first();
            
            if (!$mahasiswa) {
                return response()->json([
                    'success' => false,
                    'message' => 'Mahasiswa tidak ditemukan!',
                ], 404);
            }
    
            $mahasiswa->delete();
    
            return response()->json([
                'success' => true,
                'message' => 'Mahasiswa berhasil dihapus!',
            ], 200);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus data mahasiswa!',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
