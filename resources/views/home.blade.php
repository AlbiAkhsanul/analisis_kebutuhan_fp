@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<!-- Main Content -->
<div class="col-md-10 mt-4" style="min-height: 80vh;">
    <!-- Tombol atas -->
    <div class="px-4 d-flex mb-3">
        <a href="/partners" class="btn btn-success fw-bold px-4 py-2 rounded-pill">
            <i class="bi bi-eye-fill me-1"></i> Lihat Daftar Mitra
        </a>
    </div>
    {{-- Search Button --}}
    <div class="d-flex px-4 justify-content-between mb-3 gap-5">
        <div class="d-flex gap-4 w-50">
            <form class="d-flex flex-grow-1" role="search" method="GET" action="{{ route('projects.index') }}">
                <input class="form-control me-2" type="search" placeholder="Cari Proyek" aria-label="Search" name="search" value="{{ request('search') }}">
                <button class="btn btn-success" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </form>

            <a href="{{ route('projects.exportPdf') }}" class="btn btn-danger">
                <i class="bi bi-file-earmark-pdf-fill"></i> Download Laporan PDF
            </a>
        </div>

        @if(auth()->user() && auth()->user()->is_admin == 1)
            <a href="/projects/create" class="btn btn-primary fw-bold px-4 py-2 rounded-pill">
                + Tambah Data Proyek
            </a>
        @endif
    </div>

    <!-- Tabel Proyek -->
    <div class="bg-white mx-4 p-3 rounded shadow-sm">
        <table class="table align-middle">
            <thead>
                <tr class="text-start">
                    <th style="width: 3%;">No</th>
                    <th style="width: 45%;">Nama Proyek</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $index => $proyek)
                <tr>
                    <td class="text-start">{{ ($projects->currentPage() - 1) * $projects->perPage() + $loop->iteration }}</td>
                    <td>
                        <strong>{{ $proyek->nama_proyek }}</strong><br>
                        <small>{{ $proyek->partner->nama_partner}}</small>
                    </td>
                    <td>{{ $proyek->lokasi }}</td>
                    <td class="text-start">
                        @if($proyek->status_proyek === 'aktif')
                            <span class="px-3 bg-primary text-light fw-bold fs-6 rounded-pill">Aktif</span>
                        @elseif($proyek->status_proyek === 'selesai')
                            <span class="px-3 bg-green-700 text-light fw-bold fs-6 rounded-pill">Selesai</span>
                        @elseif($proyek->status_proyek === 'batal')
                            <span class="badge bg-red-600 text-light fw-bold fs-6 rounded-pill">Batal</span>
                        @elseif($proyek->status_proyek === 'pending')
                            <span class="badge bg-orange-300 text-dark fw-bold fs-6 rounded-pill">Pending</span>
                        @endif
                    </td>
                    <td class="text-start">
                        <div class="d-flex gap-2">
                            <a href="/projects/{{ $proyek->id }}" class="text-primary" title="Lihat">
                                <i class="bi bi-eye-fill fs-5"></i>
                            </a>&nbsp;

                            @if(auth()->user() && auth()->user()->is_admin == 1)
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
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
                @if($projects->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            @if(request('search'))
                                Tidak ada nama proyek dengan nama "<strong>{{ request('search') }}</strong>"
                            @else
                                Tidak ada data proyek.
                            @endif
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class="mx-4 mt-3">
        {{ $projects->appends(['search' => $keyword])->links() }}
    </div>
</div>
@endsection