@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header text-center bg-primary text-white">
                    <h5 class="mb-0">Edit Detail Penjualan</h5>
                </div>

                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form action="{{ route('detailpenjualans.update', $detailPenjualan->iddetail) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">ID Penjualan</label>
                            <select name="idpenjualan" class="form-select" required>
                                @foreach($penjualans as $penjualan)
                                    <option value="{{ $penjualan->idpenjualan }}" {{ $detailPenjualan->idpenjualan == $penjualan->idpenjualan ? 'selected' : '' }}>
                                        {{ $penjualan->idpenjualan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">ID Produk</label>
                            <select name="idproduk" class="form-select" id="idproduk" required>
                                @foreach($produks as $produk)
                                    <option value="{{ $produk->idproduk }}" data-harga="{{ $produk->harga }}" data-stok="{{ $produk->stok }}" {{ $detailPenjualan->idproduk == $produk->idproduk ? 'selected' : '' }}>
                                        {{ $produk->idproduk }} - {{ $produk->nama_produk }} (Rp {{ number_format($produk->harga, 0, ',', '.') }}) - Stok: {{ $produk->stok }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Harga Produk</label>
                            <input type="text" id="hargaproduk" class="form-control" readonly>
                            <input type="hidden" name="harga" id="harga_hidden">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jumlah Produk</label>
                            <input type="number" name="jumlahproduk" id="jumlahproduk" class="form-control" value="{{ $detailPenjualan->jumlahproduk }}" required min="1">
                            <small id="stok-warning" class="text-danger" style="display: none;">Stok tidak mencukupi!</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Subtotal</label>
                            <input type="text" id="subtotal" class="form-control" readonly>
                            <input type="hidden" name="subtotal" id="subtotal_hidden">
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" id="btn-submit" class="btn btn-success">Simpan Perubahan</button>
                            <a href="{{ route('detailpenjualans.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const idProduk = document.getElementById("idproduk");
    const jumlahProduk = document.getElementById("jumlahproduk");
    const subtotal = document.getElementById("subtotal");
    const subtotalHidden = document.getElementById("subtotal_hidden");
    const hargaProduk = document.getElementById("hargaproduk");
    const hargaHidden = document.getElementById("harga_hidden");
    const stokWarning = document.getElementById("stok-warning");
    const btnSubmit = document.getElementById("btn-submit");

    function hitungSubtotal() {
        const selectedOption = idProduk.options[idProduk.selectedIndex];
        const harga = parseInt(selectedOption.getAttribute("data-harga")) || 0;
        const stok = parseInt(selectedOption.getAttribute("data-stok")) || 0;
        const jumlah = parseInt(jumlahProduk.value) || 0;

        hargaProduk.value = harga ? "Rp " + new Intl.NumberFormat('id-ID').format(harga) : "";
        hargaHidden.value = harga;
        subtotal.value = harga && jumlah ? "Rp " + new Intl.NumberFormat('id-ID').format(harga * jumlah) : "Rp 0";
        subtotalHidden.value = harga * jumlah;

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

    hitungSubtotal();
});
</script>

@endsection