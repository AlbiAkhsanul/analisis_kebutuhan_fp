@extends('contoh(farel)_layout')

@section('title', 'Dashboard - Home')

@section('content')
<div class="row g-0 min-h-screen" style="background: linear-gradient(to bottom, #5CA3FF, #112A4A);">
    <!-- Sidebar -->
    <div class="col-md-3 my-5 text-white p-4 border-end" style="min-height: 100vh;">
        <div class="text-start mb-3">
            <img src="{{ asset('src/anomali.jpeg') }}" alt="User" class="rounded-circle" width="134" style="border-radius: 121px; border: 5px white solid" src="https://placehold.co/134x134">
        </div>
        <table class="text-white table-borderless mb-0" style="background-color: transparent;">
            <tbody>
                <tr>
                    <td><strong>Nama</strong></td>
                    <td>    : {{ $user->nama_pengguna }}</td>
                </tr>
                <tr>
                    <td><strong>Email</strong></td>
                    <td>    : {{ $user->email }}</td>
                </tr>
                <tr>
                    <td><strong>Jobdesk</strong></td>
                    <td>    : {{ $user->jobdesk }}</td>
                </tr>
            </tbody>
        </table>
        
        <a href="{{ route('logout') }}" class="btn btn-danger w-100 mt-4 fw-bold">
            Keluar <i class="bi bi-box-arrow-right ms-2"></i>
        </a>
    </div>



    <!-- Main Content -->
    <div class="col-md-9" style="min-height: 100vh;">

        <!-- Tombol atas -->
        <div class="px-4 d-flex justify-content-between align-items-center mb-3 mt-5">
            <a href="#" class="btn btn-primary fw-bold px-4 py-2 rounded-pill">
                + Tambah Data Proyek
            </a>
            <a href="#" class="btn btn-success fw-bold px-4 py-2 rounded-pill">
                <i class="bi bi-eye-fill me-1"></i> Lihat Daftar Mitra
            </a>
        </div>

        <!-- Tabel Proyek -->
        <div class="bg-white mx-4 p-3 rounded shadow-sm">
            <table class="table align-middle">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Proyek</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $index => $proyek)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>
                            <strong>{{ $proyek->judul }}</strong><br>
                            <small>{{ $proyek->perusahaan }}</small>
                        </td>
                        <td>{{ $proyek->lokasi }}</td>
                        <td class="text-center">
                            @if($proyek->status === 'Aktif')
                                <span class="badge bg-success">Aktif</span>
                            @elseif($proyek->status === 'Selesai')
                                <span class="badge bg-info text-dark">Selesai</span>
                            @else
                                <span class="badge bg-warning text-dark">Pending</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="#" class="text-primary me-2" title="Lihat">
                                <i class="bi bi-eye-fill fs-5"></i>
                            </a>
                            <a href="#" class="text-warning me-2" title="Edit">
                                <i class="bi bi-pencil-square fs-5"></i>
                            </a>
                            <a href="#" class="text-danger" title="Hapus">
                                <i class="bi bi-trash-fill fs-5"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach

                    @if($projects->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center text-muted">Tidak ada proyek.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <!-- Footer -->
    <footer class="text-center text-xs text-white w-full mt-8 absolute bottom-2">
        <small>©2025 PT Duta Reka Bumi. Seluruh hak cipta dilindungi.</small>
    </footer>
</div>
@endsection