<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks'; // Nama tabel di database
    protected $primaryKey = 'idproduk'; // Primary Key
    public $incrementing = false; // Jika idproduk bukan auto-increment
    protected $keyType = 'string'; // Pastikan idproduk bertipe string

    protected $fillable = [
        'idproduk',
        'namaperoduk',
        'harga',
        'stok',
    ];

    // Relasi ke detailpenjualan
    public function detailpenjualans()
    {
        return $this->hasMany(DetailPenjualan::class, 'idproduk', 'idproduk');
    }
}
