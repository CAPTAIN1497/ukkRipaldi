@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg">
                <div class="card-body">
                    <style>
                        body {
                            background: url('{{ asset('images/toko.jpg') }}') no-repeat center center fixed;
                            background-size: cover;
                        }
                        .card {
                            background: rgba(77, 75, 75, 0.8);
                        }
                    </style>
                </head>
                <body>
                
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <a href="{{ route('detailpenjualans.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Tambah Detail Penjualan
                            </a>
                            <button onclick="printData()" class="btn btn-secondary ms-2">
                                <i class="fas fa-print"></i> Cetak
                            </button>
                        </div>
                    </div>

                    <div id="printTable">
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th>ID Detail</th>
                                    <th>ID Penjualan</th>
                                    <th>ID Produk</th> <!-- Kolom baru -->
                                    <th>Jumlah</th>
                                    <th>Subtotal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($detailPenjualans as $detail)
                                    <tr>
                                        <td class="text-center">{{ $detail->iddetail }}</td>
                                        <td class="text-center">{{ $detail->idpenjualan }}</td>
                                        <td class="text-center">{{ $detail->idproduk }}</td> <!-- Menampilkan ID Produk -->
                                        <td class="text-center">{{ $detail->jumlahproduk }}</td>
                                        <td class="text-end">Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('detailpenjualans.edit', $detail->iddetail) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('detailpenjualans.destroy', $detail->iddetail) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data detail penjualan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center">
                        {{ $detailPenjualans->links() }}
                    </div>

                    <div class="d-grid gap-2">
                        <a href="{{ url('/') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function printData() {
        var printContents = document.getElementById('printTable').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
@endsection
