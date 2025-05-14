@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row g-0 min-h-screen" style="background: linear-gradient(to bottom, #5CA3FF, #112A4A);">
    <!-- Sidebar -->
    <div class="col-md-3 mt-4 text-white p-2 border-end" style="min-height: 80vh;">
        <div class="text-start ms-3 mb-3">
            <img src="{{ asset('src/anomali.jpeg') }}" alt="User" class="rounded-circle" width="100" style="border-radius: 121px; border: 5px white solid" src="https://placehold.co/100x100">
        </div>
        <table class="text-white table-borderless mb-0 ms-3" style="background-color: transparent;">
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
        
        <a href="{{ route('logout') }}" class="btn btn-danger w-75 mt-5 fw-bold ms-3">
            Keluar <i class="bi bi-box-arrow-right ms-2"></i>
        </a>
    </div>



    <!-- Main Content -->
    <div class="col-md-9 mt-4" style="min-height: 80vh;">

        <!-- Tombol atas -->
        <div class="px-4 d-flex justify-content-between align-items-center mb-3 ">
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
                    <tr class="text-start">
                        <th>No</th>
                        <th style="width: 45%;">Nama Proyek</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $index => $proyek)
                    <tr>
                        <td class="text-start">{{ $index + 1 }}</td>
                        <td>
                            <strong>{{ $proyek->nama_project }}</strong><br>
                            <small>{{ $proyek->perusahaan }}</small>
                        </td>
                        <td>{{ $proyek->lokasi }}</td>
                        <td class="text-start">
                            @if($proyek->status === 'Aktif')
                                <span class="badge bg-success">Aktif</span>
                            @elseif($proyek->status === 'Selesai')
                                <span class="badge bg-info text-dark">Selesai</span>
                            @else
                                <span class="badge bg-warning text-dark">Pending</span>
                            @endif
                        </td>
                        <td class="text-start">
                            <div class="d-flex gap-2">
                                <a href="#" class="text-primary" title="Lihat">
                                    <i class="bi bi-eye-fill fs-5"></i>
                                </a>&nbsp;
                                <a href="#" class="text-warning" title="Edit">
                                    <i class="bi bi-pencil-square fs-5"></i>
                                </a>&nbsp;
                                <a href="#" class="text-danger" title="Hapus">
                                    <i class="bi bi-trash-fill fs-5"></i>
                                </a>
                            </div>
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