<?php
// app/Services/PasienService.php

namespace App\Services;

use App\Models\Pasien;
use App\Models\Kelurahan;

class PasienService
{
    public function createPasien($namaPasien, $alamat, $noTelepon, $rtRw, $kelurahanId, $tanggalLahir, $jenisKelamin)
    {
        $kelurahan = Kelurahan::find($kelurahanId);
        if (!$kelurahan) {
            return null;
        }

        $idPasien = $this->generateIdPasien();
        $pasien = Pasien::create([
            'nama_pasien' => $namaPasien,
            'alamat' => $alamat,
            'no_telepon' => $noTelepon,
            'rt_rw' => $rtRw,
            'kelurahan' => $kelurahan->nama_kelurahan,
            'tanggal_lahir' => $tanggalLahir,
            'jenis_kelamin' => $jenisKelamin,
            'id_pasien' => $idPasien,
        ]);

        return $pasien;
    }

    public function updatePasien($pasienId, $namaPasien, $alamat, $noTelepon, $rtRw, $kelurahanId, $tanggalLahir, $jenisKelamin)
    {
        $pasien = Pasien::find($pasienId);
        if ($pasien) {
            $kelurahan = Kelurahan::find($kelurahanId);
            if (!$kelurahan) {
                return null;
            }

            $pasien->nama_pasien = $namaPasien;
            $pasien->alamat = $alamat;
            $pasien->no_telepon = $noTelepon;
            $pasien->rt_rw = $rtRw;
            $pasien->kelurahan = $kelurahan->nama_kelurahan;
            $pasien->tanggal_lahir = $tanggalLahir;
            $pasien->jenis_kelamin = $jenisKelamin;
            $pasien->save();

            return $pasien;
        }

        return null;
    }

    public function deletePasien($pasienId)
    {
        $pasien = Pasien::find($pasienId);
        if ($pasien) {
            $pasien->delete();
            return true;
        }

        return false;
    }

    public function getPasienById($pasienId)
    {
        return Pasien::find($pasienId);
    }

    public function getAllPasien()
    {
        return Pasien::all();
    }

    private function generateIdPasien()
    {
        // Mendapatkan ID Pasien terakhir yang ada dalam database
        $latestPasien = Pasien::latest()->first();

        // Jika tidak ada ID Pasien sebelumnya, mulai dari 1
        if (!$latestPasien) {
            return '1501000001';
        }

        // Mendapatkan nomor urut dari ID Pasien terakhir
        $latestId = intval(substr($latestPasien->id_pasien, -6));

        // Generate nomor urut baru dengan menambahkan 1
        $newId = $latestId + 1;

        // Format nomor urut dengan padding 0 di depan
        $formattedId = str_pad($newId, 6, '0', STR_PAD_LEFT);

        // Mendapatkan tahun dan bulan saat ini
        $currentYearMonth = date('ym');

        // Menggabungkan tahun bulan dan nomor urut untuk membentuk ID Pasien baru
        $idPasien = $currentYearMonth . $formattedId;

        return $idPasien;
    }
}

?>