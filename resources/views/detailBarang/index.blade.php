@extends('layout')

@section('title', 'Daftar Barang')

@section('content')
<div class="container mt-1">
    <h1 class="text-3xl text-center font-bold text-dark mb-2">Daftar Detail Barang</h1>

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

    <a href="{{ url('detail-barang/create') }}" class="btn btn-primary mb-1">Tambah Barang</a>

    <form method="GET">
        <div class="input-group mb-1">
            <input type="text" name="title" value="{{ $id }}" class="form-control" placeholder="Search title" aria-label="Search title" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>NO INVT</th>
                    <th>NAMA BARANG</th>
                    <th>MERK BARANG</th>
                    <th>STATUS</th>
                    <td>ACTION</td>
                </tr>
            </thead>
            <tbody>
                @if ($detailBarangs->count() == 0)
                <tr>
                    <td colspan="5" class="text-center">Data tidak ditemukan</td>
                </tr>
                @endif

                @foreach ($detailBarangs as $barang)
                <tr>
                    <td>{{ $barang->No_inventaris }}</td>
                    <td>{{ $barang->Nama_barang }}</td>
                    <td>{{ $barang->Merk_barang }}</td>
                    <td>{{ $barang->Status }}</td>
                    <td>
                        <a href="{{ url('detail-barang/'.$barang->No_inventaris.'/view') }}">view</a>
                        <a href="{{ url('detail-barang/'.$barang->No_inventaris.'/edit') }}"> | edit | </a>
                        <a href="{{ url('detail-barang/'.$barang->No_inventaris.'/destroy') }}">delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $detailBarangs->links() }}
</div>
<div class="mt-5"></div>
@endsection
