@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header text-center bg-primary text-white">
                    <h5 class="mb-0">Tambah Detail Penjualan</h5>
                </div>

                <div class="card-body">
                    <!-- Menampilkan pesan error jika stok tidak mencukupi -->
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- Menampilkan pesan error dari validasi Laravel -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('detailpenjualans.store') }}" method="POST">
                        @csrf
                        
                        <!-- Input ID Detail -->
                        <div class="mb-3">
                            <label class="form-label">ID Detail</label>
                            <input type="text" name="iddetail" class="form-control" value="{{ $newIdDetail }}" readonly required>
                        </div>

                        <!-- Pilih ID Penjualan -->
                        <div class="mb-3">
                            <label class="form-label">ID Penjualan</label>
                            <select name="idpenjualan" class="form-select" required>
                                <option value="">-- Pilih ID Penjualan --</option>
                                @foreach($penjualans as $penjualan)
                                    <option value="{{ $penjualan->idpenjualan }}">{{ $penjualan->idpenjualan }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Pilih ID Produk -->
                        <div class="mb-3">
                            <label class="form-label">ID Produk</label>
                            <select name="idproduk" class="form-select" id="idproduk" required>
                                <option value="">-- Pilih ID Produk --</option>
                                @foreach($produks as $produk)
                                    <option value="{{ $produk->idproduk }}" 
                                            data-harga="{{ $produk->harga }}" 
                                            data-stok="{{ $produk->stok }}">
                                        {{ $produk->idproduk }} - {{ $produk->nama_produk }} (Rp {{ number_format($produk->harga, 0, ',', '.') }}) - Stok: {{ $produk->stok }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Menampilkan Harga Produk -->
                        <div class="mb-3">
                            <label class="form-label">Harga Produk</label>
                            <input type="text" id="hargaproduk" class="form-control" readonly>
                        </div>

                        <!-- Input Jumlah Produk -->
                        <div class="mb-3">
                            <label class="form-label">Jumlah Produk</label>
                            <input type="number" name="jumlahproduk" id="jumlahproduk" class="form-control" required min="1">
                            <small id="stok-warning" class="text-danger" style="display: none;">Stok tidak mencukupi!</small>
                        </div>

                        <!-- Input Subtotal -->
                        <div class="mb-3">
                            <label class="form-label">Subtotal</label>
                            <input type="text" name="subtotal" id="subtotal" class="form-control" readonly required>
                        </div>

                        <!-- Tombol Simpan & Kembali -->
                        <div class="d-grid gap-2">
                            <button type="submit" id="btn-submit" class="btn btn-success">Simpan</button>
                            <a href="{{ route('detailpenjualans.index') }}" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script untuk menghitung subtotal dan mengecek stok -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const idProduk = document.getElementById("idproduk");
    const jumlahProduk = document.getElementById("jumlahproduk");
    const subtotal = document.getElementById("subtotal");
    const hargaProduk = document.getElementById("hargaproduk");
    const stokWarning = document.getElementById("stok-warning");
    const btnSubmit = document.getElementById("btn-submit");

    function hitungSubtotal() {
        const selectedOption = idProduk.options[idProduk.selectedIndex];
        const harga = parseInt(selectedOption.getAttribute("data-harga")) || 0;
        const stok = parseInt(selectedOption.getAttribute("data-stok")) || 0;
        const jumlah = parseInt(jumlahProduk.value) || 0;

        hargaProduk.value = harga ? "Rp " + new Intl.NumberFormat('id-ID').format(harga) : "";
        subtotal.value = harga && jumlah ? "Rp " + new Intl.NumberFormat('id-ID').format(harga * jumlah) : "Rp 0";

        // Cek stok
        if (jumlah > stok) {
            stokWarning.style.display = "block";
            btnSubmit.disabled = true;
        } else {
            stokWarning.style.display = "none";
            btnSubmit.disabled = false;
        }
    }

    idProduk.addEventListener("change", hitungSubtotal);
    jumlahProduk.addEventListener("input", hitungSubtotal);
});
</script>

@endsection
