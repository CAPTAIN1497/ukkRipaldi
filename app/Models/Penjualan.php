<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualans'; // Nama tabel di database
    protected $primaryKey = 'idpenjualan'; // Primary Key
    public $incrementing = false; // Jika idpenjualan diisi manual
    protected $keyType = 'string'; // Jika ID berbentuk string

    protected $fillable = [
        'idpenjualan',
        'tanggalpenjualan',
        'totalharga',
        'idpelanggan',
    ];

    // Relasi ke detailpenjualan
    public function detailpenjualans()
    {
        return $this->hasMany(DetailPenjualan::class, 'idpenjualan', 'idpenjualan');
    }
}
