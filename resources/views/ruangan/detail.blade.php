<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Ruangan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header text-center bg-success text-white">
                        <h2>Detail Ruangan</h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <strong>Nomor Ruangan:</strong> {{ $detailRuangan->No_ruangan }}
                            </li>
                            <li class="list-group-item">
                                <strong>Nama Ruangan:</strong> {{ $detailRuangan->Nama_ruangan }}
                            </li>
                            <li class="list-group-item">
                                <strong>Kapasitas Orang:</strong> {{ $detailRuangan->Kapasitas_orang }}
                            </li>
                            <li class="list-group-item">
                                <strong>Status:</strong> 
                                <span class="badge {{ $detailRuangan->Status === 'Available' ? 'bg-success' : 'bg-danger' }}">
                                    {{ $detailRuangan->Status }}
                                </span>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer text-center">
                        <button class="btn btn-primary" onclick="window.location.href='{{ url('ruangan') }}'">Kembali</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
