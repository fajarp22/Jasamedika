<?php
// app/Services/KelurahanService.php

namespace App\Services;

use App\Models\Kelurahan;

class KelurahanService
{
    public function createKelurahan($namaKelurahan, $namaKecamatan, $namaKota)
    {
        $kelurahan = Kelurahan::create([
            'nama_kelurahan' => $namaKelurahan,
            'nama_kecamatan' => $namaKecamatan,
            'nama_kota' => $namaKota,
        ]);

        return $kelurahan;
    }

    public function updateKelurahan($kelurahanId, $namaKelurahan, $namaKecamatan, $namaKota)
    {
        $kelurahan = Kelurahan::find($kelurahanId);
        if ($kelurahan) {
            $kelurahan->nama_kelurahan = $namaKelurahan;
            $kelurahan->nama_kecamatan = $namaKecamatan;
            $kelurahan->nama_kota = $namaKota;
            $kelurahan->save();

            return $kelurahan;
        }

        return null;
    }

    public function deleteKelurahan($kelurahanId)
    {
        $kelurahan = Kelurahan::find($kelurahanId);
        if ($kelurahan) {
            $kelurahan->delete();
            return true;
        }

        return false;
    }

    public function getKelurahanById($kelurahanId)
    {
        return Kelurahan::find($kelurahanId);
    }

    public function getAllKelurahan()
    {
        return Kelurahan::all();
    }
}

?>