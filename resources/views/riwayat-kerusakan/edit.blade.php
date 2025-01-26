<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Riwayat Kerusakan</title>
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
            <h1 class="form-title">Edit Riwayat Kerusakan</h1>
            <form action="{{ url('riwayat-kerusakan/'.$editDetailRiwayat->Id_kerusakan).'/update' }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="Id_kerusakan" class="form-label">ID Kerusakan</label>
                    <input type="text" class="form-control" name="Id_kerusakan" value="{{ $editDetailRiwayat->Id_kerusakan }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="No_inventaris" class="form-label">No Inventaris</label>
                    <input type="text" class="form-control" name="No_inventaris" value="{{ $editDetailRiwayat->No_inventaris }}">
                </div>
                <div class="mb-3">
                    <label for="Tanggal_kerusakan" class="form-label">Tanggal Kerusakan</label>
                    <input type="date" class="form-control" name="Tanggal_kerusakan" value="{{ $editDetailRiwayat->Tanggal_kerusakan }}">
                </div>
                <div class="mb-3">
                    <label for="Tanggal_perbaikan" class="form-label">Tanggal Perbaikan</label>
                    <input type="date" class="form-control" name="Tanggal_perbaikan" value="{{ $editDetailRiwayat->Tanggal_perbaikan }}">
                </div>
                <div class="mb-3">
                    <label for="Detail_kerusakan" class="form-label">Detail Kerusakan</label>
                    <input type="text" class="form-control" name="Detail_kerusakan" value="{{ $editDetailRiwayat->Detail_kerusakan }}">
                </div>
                <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
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
