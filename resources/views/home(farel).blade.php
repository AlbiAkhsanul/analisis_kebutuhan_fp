@extends('contoh(farel)_layout')

@section('title', 'Dashboard - Home')

@section('content')
<div class="row g-0">
    <!-- Sidebar -->
    <div class="col-md-3 text-white p-4" style="background: linear-gradient(to bottom, #0d47a1, #1565c0); min-height: 100vh;">
        <div class="text-center mb-3">
            <img src="{{ asset('logo.png') }}" alt="Logo" class="img-fluid" style="width: 130px;">
        </div>
        <h5 class="text-white fw-bold text-center">PT DUTA REKA BUMI</h5>
        <p class="text-center small mb-4">EXPORT - IMPORT - STRATEGIC TRADING</p>
        <hr style="border-color: white;">
        <div class="text-center mb-3">
            <img src="{{ asset('user.jpg') }}" alt="User" class="rounded-circle" width="100">
        </div>
        <p><strong>Nama</strong> : {{ $user->nama }}</p>
        <p><strong>Email</strong> : {{ $user->email }}</p>
        <p><strong>Jobdesk</strong> : {{ $user->jobdesk }}</p>
        <a href="{{ route('logout') }}" class="btn btn-danger w-100 mt-4 fw-bold">
            Keluar <i class="bi bi-box-arrow-right ms-2"></i>
        </a>
    </div>

    <!-- Main Content -->
    <div class="col-md-9" style="background: linear-gradient(to bottom, #1976d2, #42a5f5); min-height: 100vh;">
        <!-- Header tanggal -->
        <div class="d-flex justify-content-end p-3">
            <small class="text-white fw-bold">
                {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y | H:i:s') }} WIB
            </small>
        </div>

        <!-- Tombol atas -->
        <div class="px-4 d-flex justify-content-between align-items-center mb-3">
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
                    {{-- <tr>
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
                    </tr> --}}
                    @endforeach

                    @if($projects->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center text-muted">Tidak ada proyek.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Footer -->
        <footer class="text-center text-white mt-4">
            <small>©2025 PT Duta Reka Bumi. Seluruh hak cipta dilindungi.</small>
        </footer>
    </div>
</div>
@endsection