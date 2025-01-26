<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Riwayat Kerusakan</title>
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
            <h1 class="form-title">Tambah Riwayat Kerusakan</h1>
            <form action="{{ url('riwayat-kerusakan/store') }}" method="POST">
                @csrf
                <table class="table table-bordered">
                    <tr>
                        <th>No Inventaris</th>
                        <td><input type="text" class="form-control" name="No_inventaris" maxlength="10" value="{{ old('No_inventaris') }}"></td>
                    </tr>
                    <tr>
                        <th>Tanggal Kerusakan</th>
                        <td><input type="date" class="form-control" name="Tanggal_kerusakan" value="{{ old('Tanggal_kerusakan') }}"></td>
                    </tr>
                    <tr>
                        <th>Tanggal Perbaikan</th>
                        <td><input type="date" class="form-control" name="Tanggal_perbaikan" value="{{ old('Tanggal_perbaikan') }}"></td>
                    </tr>
                    <tr>
                        <th>Detail Kerusakan</th>
                        <td><input type="text" class="form-control" name="Detail_kerusakan" maxlength="50" value="{{ old('Detail_kerusakan') }}"></td>
                    </tr>
                </table>
                <button type="submit" class="btn btn-primary w-100 mt-3">Tambah Riwayat</button>
                <a href="{{ url('riwayat-kerusakan') }}" class="btn btn-secondary w-100 mt-2">Kembali</a>
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
