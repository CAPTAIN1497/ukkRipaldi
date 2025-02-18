<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Penjualan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: rgb(215, 211, 211)">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('penjualans.update', $penjualan->idpenjualan) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal Penjualan</label>
                                <input type="date" class="form-control @error('tanggalpenjualan') is-invalid @enderror" 
                                    name="tanggalpenjualan" 
                                    value="{{ old('tanggalpenjualan', $penjualan->tanggalpenjualan) }}">
                                @error('tanggalpenjualan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Total Harga</label>
                                <input type="number" class="form-control @error('totalharga') is-invalid @enderror" 
                                    name="totalharga" 
                                    value="{{ old('totalharga', $penjualan->totalharga) }}">
                                @error('totalharga')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">ID Pelanggan</label>
                                <input type="text" class="form-control @error('idpelanggan') is-invalid @enderror" 
                                    name="idpelanggan" 
                                    value="{{ old('idpelanggan', $penjualan->idpelanggan) }}">
                                @error('idpelanggan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
