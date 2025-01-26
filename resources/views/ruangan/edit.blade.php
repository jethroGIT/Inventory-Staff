<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Ruangan</title>
    <!-- Menambahkan Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: white;
            font-size: 24px;
            text-align: center;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .form-control {
            border-radius: 10px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 25px;
            padding: 10px 20px;
            width: 100%;
            transition: background-color 0.3s, transform 0.3s;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }
        .btn-primary:focus {
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
        .card-body {
            background-color: #ffffff;
            padding: 30px;
        }
    </style>
</head>
<body>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-header">
                Edit Ruangan
            </div>
            <div class="card-body">
                <form action="{{ url('ruangan/'.$editruangan->No_ruangan.'/update') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="No_ruangan" class="form-label">No Ruangan</label>
                        <input type="text" class="form-control" id="No_ruangan" name="No_ruangan" value="{{ $editruangan->No_ruangan }}" placeholder="No Ruangan">
                    </div>
                    <div class="mb-3">
                        <label for="Nama_ruangan" class="form-label">Nama Ruangan</label>
                        <input type="text" class="form-control" id="Nama_ruangan" name="Nama_ruangan" value="{{ $editruangan->Nama_ruangan }}" placeholder="Nama Ruangan">
                    </div>
                    <div class="mb-3">
                        <label for="Kapasitas_orang" class="form-label">Kapasitas Orang</label>
                        <input type="text" class="form-control" id="Kapasitas_orang" name="Kapasitas_orang" value="{{ $editruangan->Kapasitas_orang }}" placeholder="Kapasitas Orang">
                    </div>
                    <div class="mb-3">
                        <label for="Status" class="form-label">Status</label>
                        <input type="text" class="form-control" id="Status" name="Status" value="{{ $editruangan->Status }}" placeholder="Status">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
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

    <!-- Menambahkan Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
