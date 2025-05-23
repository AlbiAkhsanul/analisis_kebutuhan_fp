@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<!-- Main Content -->
<div class="col-md-10 mt-4" style="min-height: 80vh;">
    <!-- Tombol atas -->
    <div class="px-4 d-flex justify-content-between align-items-center mb-3 ">
        <a href="/projects/create" class="btn btn-primary fw-bold px-4 py-2 rounded-pill">
            + Tambah Data Proyek
        </a>
        <a href="/partners" class="btn btn-success fw-bold px-4 py-2 rounded-pill">
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
                    <th style="width: 20%;">Lokasi</th>
                    <th style="width: 15%;">Status</th>
                    <th style="width: 15%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $index => $proyek)
                <tr>
                    <td class="text-start">{{ $index + 1 }}</td>
                    <td>
                        <strong>{{ $proyek->nama_proyek }}</strong><br>
                        <small>{{ $proyek->partner->nama_partner}}</small>
                    </td>
                    <td>{{ $proyek->lokasi }}</td>
                    <td class="text-start">
                        @if($proyek->status_proyek === 'aktif')
                            <span class="badge bg-success fw-bold fs-6 rounded-pill">Aktif</span>
                        @elseif($proyek->status_proyek === 'selesai')
                            <span class="badge bg-info text-dark fw-bold fs-6 rounded-pill">Selesai</span>
                        @elseif($proyek->status_proyek === 'batal')
                            <span class="badge bg-info text-dark fw-bold fs-6 rounded-pill">Selesai</span>
                        @elseif($proyek->status_proyek === 'pending')
                            <span class="badge bg-info text-dark fw-bold fs-6 rounded-pill">Selesai</span>
                        @endif
                    </td>
                    <td class="text-start">
                        <div class="d-flex gap-2">
                            <a href="/projects/{{ $proyek->id }}" class="text-primary" title="Lihat">
                                <i class="bi bi-eye-fill fs-5"></i>
                            </a>&nbsp;
                            <a href="/projects/{{ $proyek->id }}/edit" class="text-warning" title="Edit">
                                <i class="bi bi-pencil-square fs-5"></i>
                            </a>&nbsp;
                            <form action="{{ route('projects.destroy', $proyek['id']) }}" method="POST" onsubmit="return confirm('Apakah anda yakin ingin menghapus proyek ini?')" class="m-0 p-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="border-0 bg-transparent p-0 text-danger align-self-center" title="Hapus">
                                    <i class="bi bi-trash-fill fs-5"></i>
                                </button>
                            </form>
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
@endsection