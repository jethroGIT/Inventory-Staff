<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Peminjaman Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .form-container {
            margin-top: 50px;
            max-width: 900px;
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
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
        .btn-remove-row {
            color: red;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container mx-auto">
            <h1 class="form-title">Edit Peminjaman Barang</h1>
            <form action="{{ url('peminjaman-barang/dp/'.$noKop->No_kop.'/update') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="no_kop" class="form-label">No Kop:</label>
                    <input type="text" class="form-control" id="No_kop" name="No_kop" value="{{ $noKop->No_kop }}" readonly>
                </div>

                <!-- Tabel Dinamis -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No Barang</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Jam Awal</th>
                            <th>Jam Akhir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="details-table">
                        @forelse ($dpBarang as $barang)
                        <tr>
                            <td><input type="text" class="form-control" name="No_barang[]" value="{{ $barang->No_inventaris }}"></td>
                            <td><input type="date" class="form-control" name="Tanggal_pinjam[]" value="{{ $barang->Tanggal_pinjam }}"></td>
                            <td><input type="date" class="form-control" name="Tanggal_kembali[]" value="{{ $barang->Tanggal_kembali }}"></td>
                            <td><input type="time" class="form-control" name="Jam_awal[]" value="{{ $barang->Jam_awal }}"></td>
                            <td><input type="time" class="form-control" name="Jam_akhir[]" value="{{ $barang->Jam_akhir }}"></td>
                            <td><span class="btn-remove-row" onclick="removeRow(this)">&#10005;</span></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data barang.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <button type="button" class="btn btn-success" onclick="addRow()">Tambah Barang</button>
                <button type="submit" class="btn btn-primary">Update Surat</button>
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

    <script>
        // Function to add a new row
        function addRow() {
            const table = document.getElementById('details-table');
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td><input type="text" class="form-control" name="No_barang[]" required></td>
                <td><input type="date" class="form-control" name="Tanggal_pinjam[]" required></td>
                <td><input type="date" class="form-control" name="Tanggal_kembali[]" required></td>
                <td><input type="time" class="form-control" name="Jam_awal[]" required></td>
                <td><input type="time" class="form-control" name="Jam_akhir[]" required></td>
                <td><span class="btn-remove-row" onclick="removeRow(this)">&#10005;</span></td>
            `;
            table.appendChild(newRow);
        }

        // Function to remove a row
        function removeRow(element) {
            element.closest('tr').remove();
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
