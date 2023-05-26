<?php
// app/Http/Controllers/PasienController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PasienService;

class PasienController extends Controller
{
    private $pasienService;

    public function __construct(PasienService $pasienService)
    {
        $this->pasienService = $pasienService;
    }

    public function create(Request $request)
    {
        $namaPasien = $request->input('nama_pasien');
        $alamat = $request->input('alamat');
        $noTelepon = $request->input('no_telepon');
        $rtRw = $request->input('rt_rw');
        $kelurahanId = $request->input('kelurahan_id');
        $tanggalLahir = $request->input('tanggal_lahir');
        $jenisKelamin = $request->input('jenis_kelamin');

        $pasien = $this->pasienService->createPasien($namaPasien, $alamat, $noTelepon, $rtRw, $kelurahanId, $tanggalLahir, $jenisKelamin);

        if ($pasien) {
            return response()->json([
                'message' => 'Registrasi pasien berhasil',
                'data' => $pasien,
            ]);
        }

        return response()->json([
            'message' => 'Registrasi pasien gagal',
        ], 500);
    }

    public function update(Request $request, $id)
    {
        $namaPasien = $request->input('nama_pasien');
        $alamat = $request->input('alamat');
        $noTelepon = $request->input('no_telepon');
        $rtRw = $request->input('rt_rw');
        $kelurahanId = $request->input('kelurahan_id');
        $tanggalLahir = $request->input('tanggal_lahir');
        $jenisKelamin = $request->input('jenis_kelamin');

        $pasien = $this->pasienService->updatePasien($id, $namaPasien, $alamat, $noTelepon, $rtRw, $kelurahanId, $tanggalLahir, $jenisKelamin);

        if ($pasien) {
            return response()->json([
                'message' => 'Data pasien berhasil diperbarui',
                'data' => $pasien,
            ]);
        }

        return response()->json([
            'message' => 'Data pasien tidak ditemukan',
        ], 404);
    }

    public function delete($id)
    {
        $result = $this->pasienService->deletePasien($id);

        if ($result) {
            return response()->json([
                'message' => 'Data pasien berhasil dihapus',
            ]);
        }

        return response()->json([
            'message' => 'Data pasien tidak ditemukan',
        ], 404);
    }

    public function getById($id)
    {
        $pasien = $this->pasienService->getPasienById($id);

        if ($pasien) {
            return response()->json([
                'message' => 'Data pasien ditemukan',
                'data' => $pasien,
            ]);
        }

        return response()->json([
            'message' => 'Data pasien tidak ditemukan',
        ], 404);
    }

    public function getAll()
    {
        $pasien = $this->pasienService->getAllPasien();

        return response()->json([
            'message' => 'Data pasien ditemukan',
            'data' => $pasien,
        ]);
    }
}

?>
