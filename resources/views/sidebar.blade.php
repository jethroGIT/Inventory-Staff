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
