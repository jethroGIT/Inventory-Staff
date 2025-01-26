<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
        table {
            width: 100%;
        }
        th {
            width: 35%;
            background-color: #f4f4f4;
            text-align: right;
            padding-right: 15px;
            border-bottom: none !important;
        }
        td {
            width: 65%;
            border-bottom: none !important;
        }
        button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
        }
        button:hover {
            background-color: #0056b3;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container mx-auto">
            <h1 class="form-title">Tambah Barang</h1>
            <form action="{{ url('detail-barang/store') }}" method="POST">
                @csrf
                <table class="table">
                    <tr>
                        <th><label for="id_barang">ID Barang:</label></th>
                        <td><input type="text" class="form-control" name="Id_barang" value="{{ old('Id_barang') }}"></td>
                    </tr>
                    <tr>
                        <th><label for="nama_barang">Nama Barang:</label></th>
                        <td><input type="text" class="form-control" name="Nama_barang" value="{{ old('Nama_barang') }}"></td>
                    </tr>
                    <tr>
                        <th><label for="merk_barang">Merk Barang:</label></th>
                        <td><input type="text" class="form-control" name="Merk_barang" value="{{ old('Merk_barang') }}"></td>
                    </tr>
                    <tr>
                        <th><label for="status">Status:</label></th>
                        <td>
                            <select name="Status" class="form-select">
                                <option value="Tersedia" {{ old('Status') == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                                <option value="Tidak Tersedia" {{ old('Status') == 'Tidak Tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <button type="submit" class="btn btn-primary mt-3">Tambah Barang</button>
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
