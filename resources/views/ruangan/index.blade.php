@extends('layout')

@section('title', 'Daftar Ruangan')

@section('content')
<div class="container mt-1">
    <h1 class="text-center mb-1">Daftar Ruangan</h1>

    @if (session('success'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top-end', // Tidak memengaruhi tata letak halaman
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 3000
        });
    </script>
    @endif

    <a href="{{ url('ruangan/create') }}" class="btn btn-primary mb-1">Tambah Item</a>

    <form method="GET">
        <div class="input-group mb-1">
            <input type="text" name="title" value="{{ $id }}" class="form-control" placeholder="Search title" aria-label="Search title" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
        </div>
    </form>

    {{-- <div class="row mb-3">
        <div class="col-md-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Ruangan Tersedia</h5>
                    <p class="card-text fs-4">{{ $tersedia }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <h5 class="card-title">Ruangan Tidak Tersedia</h5>
                    <p class="card-text fs-4">{{ $tidaktersedia }}</p>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>NO RUANGAN</th>
                    <th>NAMA RUANGAN</th>
                    <th>KAPASITAS ORANG</th>
                    <th>STATUS</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($ruangans->count() == 0)
                <tr>
                    <td colspan="5" class="text-center">Data tidak ditemukan</td>
                </tr>
                @endif

                @foreach ($ruangans as $ruangan)
                <tr>
                    <td>{{ $ruangan->No_ruangan }}</td>
                    <td>{{ $ruangan->Nama_ruangan }}</td>
                    <td>{{ $ruangan->Kapasitas_orang }}</td>
                    <td>{{ $ruangan->Status }}</td>
                    <td>
                        <a href="{{ url('ruangan/'.$ruangan->No_ruangan.'/view') }}">view</a>
                        <a href="{{ url('ruangan/'.$ruangan->No_ruangan.'/edit') }}"> | edit | </a>
                        <a href="{{ url('ruangan/'.$ruangan->No_ruangan.'/destroy') }}">delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $ruangans->links() }}
</div>
<div class="mt-5"></div>
@endsection
