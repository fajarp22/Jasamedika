<?php
namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = 'kelurahan';
    protected $primaryKey = 'id';
    public $timestamps = false;
    
    // Definisikan kolom-kolom yang dapat diisi
    protected $fillable = ['nama_kelurahan', 'nama_kecamatan', 'nama_kota'];
}
?>