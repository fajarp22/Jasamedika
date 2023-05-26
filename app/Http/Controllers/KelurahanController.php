<?php
// app/Http/Controllers/KelurahanController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\KelurahanService;

class KelurahanController extends Controller
{
    private $kelurahanService;

    public function __construct(KelurahanService $kelurahanService)
    {
        $this->kelurahanService = $kelurahanService;
    }

    public function create(Request $request)
    {
        $namaKelurahan = $request->input('nama_kelurahan');
        $namaKecamatan = $request->input('nama_kecamatan');
        $namaKota = $request->input('nama_kota');

        $kelurahan = $this->kelurahanService->createKelurahan($namaKelurahan, $namaKecamatan, $namaKota);

        if ($kelurahan) {
            return response()->json([
                'message' => 'Data kelurahan berhasil disimpan',
                'data' => $kelurahan,
            ]);
        }

        return response()->json([
            'message' => 'Data kelurahan gagal disimpan',
        ], 500);
    }

    public function update(Request $request, $id)
    {
        $namaKelurahan = $request->input('nama_kelurahan');
        $namaKecamatan = $request->input('nama_kecamatan');
        $namaKota = $request->input('nama_kota');

        $kelurahan = $this->kelurahanService->updateKelurahan($id, $namaKelurahan, $namaKecamatan, $namaKota);

        if ($kelurahan) {
            return response()->json([
                'message' => 'Data kelurahan berhasil diperbarui',
                'data' => $kelurahan,
            ]);
        }

        return response()->json([
            'message' => 'Data kelurahan tidak ditemukan',
        ], 404);
    }

    public function delete($id)
    {
        $result = $this->kelurahanService->deleteKelurahan($id);

        if ($result) {
            return response()->json([
                'message' => 'Data kelurahan berhasil dihapus',
            ]);
        }

        return response()->json([
            'message' => 'Data kelurahan tidak ditemukan',
        ], 404);
    }

    public function getById($id)
    {
        $kelurahan = $this->kelurahanService->getKelurahanById($id);

        if ($kelurahan) {
            return response()->json([
                'message' => 'Data kelurahan ditemukan',
                'data' => $kelurahan,
            ]);
        }

        return response()->json([
            'message' => 'Data kelurahan tidak ditemukan',
        ], 404);
    }

    public function getAll()
    {
        $kelurahan = $this->kelurahanService->getAllKelurahan();

        return response()->json([
            'message' => 'Data kelurahan ditemukan',
            'data' => $kelurahan,
        ]);
    }
}

?>