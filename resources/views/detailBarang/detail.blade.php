<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Barang</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <strong>Nomor Inventaris:</strong> {{ $detailBarang->No_inventaris }}
                            </li>
                            <li class="list-group-item">
                                <strong>ID Barang:</strong> {{ $detailBarang->Id_barang }}
                            </li>
                            <li class="list-group-item">
                                <strong>Nama Barang:</strong> {{ $detailBarang->Nama_barang }}
                            </li>
                            <li class="list-group-item">
                                <strong>Merk Barang:</strong> {{ $detailBarang->Merk_barang }}
                            </li>
                            <li class="list-group-item">
                                <strong>Status:</strong> 
                                <span class="badge {{ $detailBarang->Status === 'Available' ? 'bg-success' : 'bg-danger' }}">
                                    {{ $detailBarang->Status }}
                                </span>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer text-center">
                        <button class="btn btn-secondary" onclick="window.location.href='{{ url('detail-barang') }}'">Kembali</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
