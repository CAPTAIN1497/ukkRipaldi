
@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DATA PELANGGAN</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        body {
            background: url('{{ asset('images/toko.jpg') }}') no-repeat center center fixed;
            background-size: cover;
        }
        .card {
            background: rgba(104, 101, 101, 0.8);
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">DATA PELANGGAN</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('pelanggans.create') }}" class="btn btn-md btn-success mb-3">TAMBAH PELANGGAN</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">ID PELANGGAN</th>
                                <th scope="col">NAMA PELANGGAN</th>
                                <th scope="col">ALAMAT</th>
                                <th scope="col">NOMOR TELEPON</th>
                                <th scope="col">AKSI</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($pelanggans as $pelanggan)
                                <tr>
                                    <td>{{ $pelanggan->idpelanggan }}</td>
                                    <td>{{ $pelanggan->namapelanggan }}</td>
                                    <td>{{ $pelanggan->alamat }}</td>
                                    <td>{{ $pelanggan->nomortelpon }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pelanggans.destroy', $pelanggan->idpelanggan) }}" method="POST">
                                            <a href="{{ route('pelanggans.edit', $pelanggan->idpelanggan) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Pelanggan belum tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $pelanggans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 
        @elseif(session()->has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL!'); 
        @endif
    </script>
@endsection

</body>
</html>