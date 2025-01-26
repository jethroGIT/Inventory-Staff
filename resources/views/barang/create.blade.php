<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
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
            <h1 class="form-title">Tambah Barang</h1>
            <form action="{{ url('barang/store') }}" method="POST">
                @csrf
                <table class="table table-bordered">
                    <tr>
                        <th>Tanggal Kedatangan</th>
                        <td><input type="date" class="form-control" name="Tanggal_kedatangan" value="{{ old('Tanggal_kedatangan') }}"></td>
                    </tr>
                    <tr>
                        <th>Jenis Barang</th>
                        <td><input type="text" class="form-control" name="Jenis_barang" value="{{ old('Jenis_barang') }}"></td>
                    </tr>
                    <tr>
                        <th>Jumlah Barang</th>
                        <td><input type="number" class="form-control" name="Jumlah_barang" value="{{ old('Jumlah_barang') }}"></td>
                    </tr>
                </table>
                <button type="submit" class="btn btn-primary w-100 mt-3">Tambah Barang</button>
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
