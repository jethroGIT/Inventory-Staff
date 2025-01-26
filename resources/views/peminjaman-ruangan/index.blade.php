@extends('layout')

@section('title', 'Daftar Peminjaman Barang')

@section('content')
    <h1 class="text-center mb-1">List Surat Peminjaman Ruangan</h1>

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

    <a href="{{ url('peminjaman-ruangan/create') }}" class="btn btn-primary mb-1">Tambah Item</a>

    <form method="GET">
        <div class="input-group mb-1">
            <input type="text" name="title" value="{{ $id }}" class="form-control" placeholder="Search No Kop Surat" aria-label="Search title" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
        </div>
    </form>
    
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>NO KOP SURAT</th>
                    <th>Nama Peminjam</th>
                    <th>Nama Petugas Pengambilan</th>
                    <th>Nama Petugas Pengembalian</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                
                @if ($peminjamans->count() == 0)
                <tr>
                    <td colspan="6" class="text-center">Data tidak ditemukan</td>
                </tr>
                @endif

                @foreach ($peminjamans as $peminjaman)
                <tr>
                    <td>{{ $peminjaman->No_kop }}</td>
                    <td>{{ $peminjaman->Nama_peminjam }}</td>
                    <td>{{ $peminjaman->Nama_petugas_pengambilan }}</td>
                    <td>{{ $peminjaman->Nama_petugas_pengembalian }}</td>
                    <td>{{ $peminjaman->Status_peminjaman}}</td>
                    <td>
                        <a href="{{ url('peminjaman-ruangan/'.$peminjaman->No_kop.'/view') }}">view</a>
                        <a href="{{ url('peminjaman-ruangan/'.$peminjaman->No_kop.'/edit') }}"> | edit | </a>
                        <a href="{{ url('peminjaman-ruangan/'.$peminjaman->No_kop.'/destroy') }}">delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $peminjamans->links() }}
    <div class="mt-5"></div>
@endsection