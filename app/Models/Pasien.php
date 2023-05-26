<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasien';
    protected $primaryKey = 'id';
    public $timestamps = false;
    
    // Definisikan kolom-kolom yang dapat diisi
    protected $fillable = ['nama_pasien', 'alamat', 'no_telepon', 'rt_rw', 'kelurahan', 'tanggal_lahir', 'jenis_kelamin', 'id_pasien'];
}
?>