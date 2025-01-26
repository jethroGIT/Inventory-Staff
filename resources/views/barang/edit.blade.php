<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .form-container {
            margin-top: 50px;
            max-width: 600px;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container mx-auto">
            <h1 class="form-title">Edit Barang</h1>
            <form action="{{ url('barang/'.$editBarang->Id_barang).'/update' }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="Id_barang" class="form-label">ID Barang</label>
                    <input type="text" class="form-control" name="Id_barang" value="{{ $editBarang->Id_barang }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="Tanggal_kedatangan" class="form-label">Tanggal Kedatangan</label>
                    <input type="date" class="form-control" name="Tanggal_kedatangan" value="{{ $editBarang->Tanggal_kedatangan }}">
                </div>
                <div class="mb-3">
                    <label for="Jenis_barang" class="form-label">Jenis Barang</label>
                    <input type="text" class="form-control" name="Jenis_barang" value="{{ $editBarang->Jenis_barang }}">
                </div>
                <div class="mb-3">
                    <label for="Jumlah_barang" class="form-label">Jumlah Barang</label>
                    <input type="number" class="form-control" name="Jumlah_barang" value="{{ $editBarang->Jumlah_barang }}">
                </div>
                <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
                <a href="{{ url('barang') }}" class="btn btn-secondary w-100 mt-2">Kembali</a>
            </form>
        </div>
    </div>

    <!-- SweetAlert2 Notification -->
    @if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let errorMessages = ` 
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            `;
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
