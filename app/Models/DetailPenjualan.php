<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    use HasFactory;

    protected $table = 'DetailPenjualans'; // Nama tabel di database
    protected $primaryKey = 'iddetail'; // Primary Key
    public $incrementing = false; // Karena menggunakan UUID, ini harus false
    protected $keyType = 'string'; // UUID harus diset ke string
    public $timestamps = false; // Jika tabel tidak memiliki created_at dan updated_at

    protected $fillable = [
        'iddetail', 
        'idpenjualan',
        'idproduk',
        'jumlahproduk',
        'subtotal',
    ];

    // Relasi ke tabel Penjualan
    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'idpenjualan', 'idpenjualan');
    }

    // Relasi ke tabel Produk
    public function Produk()
    {
        return $this->belongsTo(Produk::class, 'idproduk', 'idproduk');
    }
}
