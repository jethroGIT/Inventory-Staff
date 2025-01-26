@extends('layout') <!-- Extend layout utama -->

@section('content') <!-- Section untuk konten halaman -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>

    @include('sidebar') <!-- Menyisipkan sidebar -->

    <div class="container mx-auto p-6 mt-10">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md mx-auto">
            <h1 class="text-2xl font-bold mb-6 text-center">Form Peminjaman</h1>
            
            <form id="peminjamanForm" method="GET">
                <div class="mb-4">
                    <label for="jenisPeminjaman" class="block text-sm font-medium text-gray-700">Jenis Peminjaman</label>
                    <select id="jenisPeminjaman" name="jenisPeminjaman" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        <option value="">Pilih Jenis Peminjaman</option>
                        <option value="barang">Peminjaman Barang</option>
                        <option value="ruangan">Peminjaman Ruangan</option>
                    </select>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Lanjutkan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('peminjamanForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah pengiriman form secara default
            const jenisPeminjaman = document.getElementById('jenisPeminjaman').value;

            if (jenisPeminjaman === 'barang') {
                window.location.href = "{{ route('pb') }}"; // Rute untuk Peminjaman Barang
            } else if (jenisPeminjaman === 'ruangan') {
                window.location.href = "{{ route('pr') }}"; // Rute untuk Peminjaman Ruangan
            } else {
                alert("Silakan pilih jenis peminjaman terlebih dahulu.");
            }
        });
    </script>
</body>
</html>
@endsection
