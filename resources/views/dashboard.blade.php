<x-app-layout>
    <style>
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #2274c7;
            padding-top: 20px;
            overflow-y: auto;
        }

        .sidebar h4 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .sidebar .nav-link {
            font-size: 1rem;
            padding: 10px 20px;
            color: white;
            text-decoration: none;
            display: block;
        }

        .sidebar .nav-link:hover {
            background-color: #c5cfd86c;
            border-radius: 4px;
        }
    </style>

    <div class="flex">
        <!-- Sidebar -->
        <!-- resources/views/sidebar.blade.php -->
        <div class="sidebar">
            <div class="text-center py-0">
                <h4 class="text-white">Menu</h4>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ url('/dashboard') }}" class="nav-link text-white">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('peminjaman') }}" class="nav-link text-white">Form Peminjaman</a>
                </li>
                <li class="nav-item">
                    <a href="ruangan" class="nav-link text-white">Detail Ruangan</a>
                </li>
                <li class="nav-item">
                    <a href="barang" class="nav-link text-white">Jenis Barang</a>
                </li>
                <li class="nav-item">
                    <a href="detail-barang" class="nav-link text-white">Detail Barang</a>
                </li>
                <li class="nav-item">
                    <a href="riwayat-kerusakan" class="nav-link text-white">Form Kerusakan Barang</a>
                </li>
            </ul>
        </div>


        <!-- Konten Utama -->
        <div class="flex-1 bg-gradient-to-r from-blue-50 to-indigo-100 p-8 ml-[250px]">
            <h1 class="text-3xl font-bold text-gray-800 mb-8">Dashboard</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card untuk Peminjaman Ruangan -->
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <h2 class="text-xl font-semibold text-blue-600 mb-2">Peminjaman Ruangan</h2>
                    <p class="text-gray-700">Menunggu Persetujuan: <span class="font-bold text-blue-800">{{ $pRuangan
                            }}</span></p>
                </div>

                <!-- Card untuk Peminjaman Barang -->
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <h2 class="text-xl font-semibold text-green-600 mb-2">Peminjaman Barang</h2>
                    <p class="text-gray-700">Menunggu Persetujuan: <span class="font-bold text-green-800">{{ $pBarang
                            }}</span></p>
                </div>

                <!-- Card untuk Ruangan Tersedia -->
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <h2 class="text-xl font-semibold text-purple-600 mb-2">Ruangan Tersedia</h2>
                    <p class="text-gray-700">Tersedia: <span class="font-bold text-purple-800">{{ $availableRooms
                            }}</span></p>
                    <p class="text-gray-700">Dipinjam: <span class="font-bold text-purple-800">{{ $occupiedRooms
                            }}</span></p>
                </div>

                <!-- Card untuk Barang Tersedia -->
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <h2 class="text-xl font-semibold text-orange-600 mb-2">Barang Tersedia</h2>
                    <p class="text-gray-700">Tersedia: <span class="font-bold text-orange-800">{{ $availableItems
                            }}</span></p>
                    <p class="text-gray-700">Dipinjam: <span class="font-bold text-orange-800">{{ $borrowedItems
                            }}</span></p>
                </div>

                <!-- Card untuk Barang dalam Perbaikan -->
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <h2 class="text-xl font-semibold text-red-600 mb-2">Barang dalam Perbaikan</h2>
                    <p class="text-gray-700">Jumlah: <span class="font-bold text-red-800">{{ $itemsUnderRepair }}</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>