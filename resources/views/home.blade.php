@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<!-- Main Content -->
<div class="col-md-9 mt-4" style="min-height: 80vh;">
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
                        <small>{{ $proyek->partner->nama_partner}}</small>
                    </td>
                    <td>{{ $proyek->lokasi }}</td>
                    <td class="text-start">
                        @if($proyek->status === 'Aktif')
                            <span class="badge bg-success fw-bold fs-6 rounded-pill">Aktif</span>
                        @elseif($proyek->status === 'Selesai')
                            <span class="badge bg-info text-dark fw-bold fs-6 rounded-pill">Selesai</span>
                        @else
                            <span class="badge bg-warning text-dark fw-bold fs-6 rounded-pill">Pending</span>
                        @endif
                    </td>
                    <td class="text-start">
                        <div class="d-flex gap-2">
                            <a href="/projects/{{ $proyek->id }}" class="text-primary" title="Lihat">
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
@endsection