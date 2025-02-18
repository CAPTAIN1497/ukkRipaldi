<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggans';  // Nama tabel dalam database
    protected $primaryKey = 'idpelanggan';  // Primary key yang benar
    public $incrementing = false;  // Jika primary key bukan auto-increment, set ke false
    protected $keyType = 'string'; // Jika idpelanggan adalah string, gunakan 'string'

    protected $fillable = [
        'idpelanggan', 'namapelanggan', 'alamat', 'nomortelpon'
    ];
}