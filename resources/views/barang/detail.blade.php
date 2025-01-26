<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Barang</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header text-center bg-primary text-white">
                        <h2>Detail Barang</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>ID Barang</th>
                                <td>{{ $detailBarang->Id_barang }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Kedatangan</th>
                                <td>{{ $detailBarang->Tanggal_kedatangan }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Barang</th>
                                <td>{{ $detailBarang->Jenis_barang }}</td>
                            </tr>
                            <tr>
                                <th>Jumlah Barang</th>
                                <td>{{ $detailBarang->Jumlah_barang }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer text-center">
                        <button class="btn btn-secondary" onclick="window.location.href='{{ url('barang') }}'">Kembali</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
