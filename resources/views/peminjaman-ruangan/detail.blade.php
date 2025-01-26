<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Peminjaman Ruangan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            border-radius: 15px 15px 0 0;
            background: linear-gradient(90deg, #007bff, #0056b3);
        }
        .table th {
            background-color: #e9ecef;
        }
        .btn-outline-primary {
            transition: all 0.3s ease;
        }
        .btn-outline-primary:hover {
            background-color: #007bff;
            color: #fff;
        }
        table {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-white">
                <h3 class="text-center">Detail Peminjaman Ruangan</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <tbody>
                        <tr>
                            <th scope="row">No Kop</th>
                            <td>{{ $detailPeminjamanRuangan->No_kop }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Nama Peminjam</th>
                            <td>{{ $detailPeminjamanRuangan->Nama_peminjam }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Jabatan Peminjam</th>
                            <td>{{ $detailPeminjamanRuangan->Jabatan_peminjam }}</td>
                        </tr>
                        <tr>
                            <th scope="row">No HP</th>
                            <td>{{ $detailPeminjamanRuangan->No_hp }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Email</th>
                            <td>{{ $detailPeminjamanRuangan->Email }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Keterangan</th>
                            <td>{{ $detailPeminjamanRuangan->Keterangan }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Nama Pengembali</th>
                            <td>{{ $detailPeminjamanRuangan->Nama_pengembali }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Nama Petugas Pengambilan</th>
                            <td>{{ $detailPeminjamanRuangan->Nama_petugas_pengambilan }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Nama Petugas Pengembalian</th>
                            <td>{{ $detailPeminjamanRuangan->Nama_petugas_pengembalian }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Status Peminjaman</th>
                            <td>{{ $detailPeminjamanRuangan->Status_peminjaman }}</td>
                        </tr>
                    </tbody>
                </table>

                <table class="table table-striped table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <th>No Ruangan</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Jam Awal</th>
                            <th>Jam Akhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detailRuangan as $ruangan)
                        <tr>
                            <td>{{ $ruangan->No_ruangan }}</td>
                            <td>{{ $ruangan->Tanggal_pinjam }}</td>
                            <td>{{ $ruangan->Tanggal_kembali }}</td>
                            <td>{{ $ruangan->Jam_awal }}</td>
                            <td>{{ $ruangan->Jam_akhir }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-center">
                <a href="{{ url('peminjaman-ruangan') }}" class="btn btn-outline-primary">Kembali</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
