<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buat Surat Peminjaman Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .form-container {
            margin-top: 50px;
            max-width: 800px;
            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .form-title {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
        }
        table {
            width: 100%;
        }
        th {
            width: 30%;
            background-color: #f4f4f4;
            text-align: right;
            padding-right: 15px;
            border-bottom: none !important;
        }
        td {
            width: 70%;
            border-bottom: none !important;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container mx-auto">
            <h1 class="form-title">Buat Surat Peminjaman Barang</h1>
            <form action="{{ url('peminjaman-barang/store') }}" method="POST">
                @csrf
                <table class="table">
                    <tr>
                        <th><label for="no_kop">No Kop:</label></th>
                        <td><input type="text" class="form-control" name="No_kop" value="{{ old('No_kop') }}"></td>
                    </tr>
                    <tr>
                        <th><label for="nama_peminjam">Nama Peminjam:</label></th>
                        <td><input type="text" class="form-control" name="Nama_peminjam" value="{{ old('Nama_peminjam') }}"></td>
                    </tr>
                    <tr>
                        <th><label for="jabatan_peminjam">Jabatan Peminjam:</label></th>
                        <td><input type="text" class="form-control" name="Jabatan_peminjam" value="{{ old('Jabatan_peminjam') }}"></td>
                    </tr>
                    <tr>
                        <th><label for="no_hp">No HP:</label></th>
                        <td><input type="text" class="form-control" name="No_hp" value="{{ old('No_hp') }}"></td>
                    </tr>
                    <tr>
                        <th><label for="email">Email:</label></th>
                        <td><input type="email" class="form-control" name="Email" value="{{ old('Email') }}"></td>
                    </tr>
                    <tr>
                        <th><label for="keterangan">Keterangan:</label></th>
                        <td><textarea class="form-control" name="Keterangan" rows="3">{{ old('Keterangan') }}</textarea></td>
                    </tr>
                    <tr>
                        <th><label for="nama_pengembali">Nama Pengembali:</label></th>
                        <td><input type="text" class="form-control" name="Nama_pengembali" value="{{ old('Nama_pengembali') }}"></td>
                    </tr>
                    <tr>
                        <th><label for="nama_petugas_pengambilan">Nama Petugas Pengambilan:</label></th>
                        <td><input type="text" class="form-control" name="Nama_petugas_pengambilan" value="{{ old('Nama_petugas_pengambilan') }}"></td>
                    </tr>
                    <tr>
                        <th><label for="nama_petugas_pengembalian">Nama Petugas Pengembalian:</label></th>
                        <td><input type="text" class="form-control" name="Nama_petugas_pengembalian" value="{{ old('Nama_petugas_pengembalian') }}"></td>
                    </tr>
                </table>
                <a href="{{ url('peminjaman-barang') }}" class="btn btn-outline-primary">Kembali</a>
                <button type="submit" class="btn btn-primary">Buat Surat</button>
            </form>
        </div>
    </div>

    <!-- SweetAlert2 Notification -->
    @if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let errorMessages = `@foreach ($errors->all() as $error){{ $error }}<br>@endforeach`;
            Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan!',
                html: errorMessages,
                showConfirmButton: true
            });
        });
    </script>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
