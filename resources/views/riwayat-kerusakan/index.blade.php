@extends('layout')

@section('title', 'Riwayat Kerusakan')

@section('content')
<div class="container mt-0">
    <h1 class="text-3xl text-center font-bold text-dark mb-2">Riwayat Kerusakan</h1>

    @if (session('success'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 3000
        });
    </script>
    @endif

    <a href="{{ url('riwayat-kerusakan/create') }}" class="btn btn-primary mb-1">Tambah Kerusakan</a>

    <form method="GET">
        <div class="input-group mb-1">
            <input type="text" name="title" value="{{ $id }}" class="form-control" placeholder="Search kerusakan" aria-label="Search kerusakan" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Id Kerusakan</th>
                    <th>No Inventaris</th>
                    <th>Tanggal Kerusakan</th>
                    <th>Tanggal Perbaikan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($detailRiwayats->count() == 0)
                <tr>
                    <td colspan="5" class="text-center">Data tidak ditemukan</td>
                </tr>
                @endif

                @foreach ($detailRiwayats as $kerusakan)
                <tr>
                    <td>{{ $kerusakan->Id_kerusakan }}</td>
                    <td>{{ $kerusakan->No_inventaris }}</td>
                    <td>{{ $kerusakan->Tanggal_kerusakan }}</td>
                    <td>{{ $kerusakan->Tanggal_perbaikan }}</td>
                    <td>
                        <a href="{{ url('riwayat-kerusakan/'.$kerusakan->Id_kerusakan.'/view') }}">view</a>
                        <a href="{{ url('riwayat-kerusakan/'.$kerusakan->Id_kerusakan.'/edit') }}"> | edit | </a>
                        <a href="{{ url('riwayat-kerusakan/'.$kerusakan->Id_kerusakan.'/destroy') }}">delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $detailRiwayats->links() }}
</div>
@endsection
