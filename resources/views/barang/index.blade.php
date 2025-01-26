@extends('layout')

@section('title', 'Daftar Barang')

@section('content')
<div class="container mt-1">
    <h1 class="text-center mb-1">Daftar Barang</h1>

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

    <a href="{{ url('barang/create') }}" class="btn btn-primary mb-1">Tambah Barang</a>

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
                    <th>ID BARANG</th>
                    <th>Tanggal Kedatangan</th>
                    <th>Jenis Barang</th>
                    <th>Jumlah Barang</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($barangs->count() == 0)
                <tr>
                    <td colspan="5" class="text-center">Data tidak ditemukan</td>
                </tr>
                @endif

                @foreach ($barangs as $barang)
                <tr>
                    <td>{{ $barang->Id_barang }}</td>
                    <td>{{ $barang->Tanggal_kedatangan }}</td>
                    <td>{{ $barang->Jenis_barang }}</td>
                    <td>{{ $barang->Jumlah_barang }}</td>
                    <td>
                        <a href="{{ url('barang/'.$barang->Id_barang.'/view') }}">view</a>
                        <a href="{{ url('barang/'.$barang->Id_barang.'/edit') }}"> | edit | </a>
                        <a href="{{ url('barang/'.$barang->Id_barang.'/destroy') }}">delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $barangs->links() }}
</div>
@endsection
