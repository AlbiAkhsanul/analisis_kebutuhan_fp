@extends('layouts.app')

@section('title', 'Mitra')

@section('content')
<!-- Main Content -->
<div class="col-md-10 mt-4" style="min-height: 80vh;">
    <!-- Tombol atas -->
    <div class="px-4 d-flex mb-3">
        <a href="/projects" class="btn btn-warning fw-bold px-4 py-2 rounded-pill">
            <i class="bi bi-arrow-left"></i>&nbsp;&nbsp;Kembali Ke Daftar Proyek
        </a>
    </div>
    {{-- Search Button --}}
    <div class="d-flex px-4 justify-content-between mb-3">
        <div class="d-flex w-25">
            <form class="d-flex flex-grow-1" role="search">
                <input class="form-control me-2" type="search" placeholder="Cari Mitra" aria-label="Search" name="search" value="{{ request('search') }}">
                <button class="btn btn-success" type="submit"><i class="bi bi-search"></i></button>
            </form>
        </div>

        @if(auth()->user() && auth()->user()->is_admin == 1)
            <a href="/partners/create" class="btn btn-primary fw-bold px-4 py-2 rounded-pill">
                + Tambah Data Mitra
            </a>
        @endif
    </div>
    <!-- Tabel Mitra -->
    <div class="bg-white mx-4 p-3 rounded shadow-sm">
        <table class="table align-middle">
            <thead>
                <tr class="text-start">
                    <th style="width: 3%;">No</th>
                    <th style="width: 45%;">Nama Mitra</th>
                    <th>Email</th>
                    <th>No Telefon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($partners as $index => $partner)
                <tr>
                    <td class="text-start">{{ ($partners->currentPage() - 1) * $partners->perPage() + $loop->iteration }}</td>
                    <td>
                        <strong>{{ $partner->nama_partner }}</strong>
                    </td>
                    <td>{{ $partner->email_partner }}</td>
                    <td>{{ $partner->no_telfon }}</td>
                    <td class="text-start">
                        <div class="d-flex gap-2">
                            <a href="/partners/{{ $partner->id }}" class="text-primary" title="Lihat">
                                <i class="bi bi-eye-fill fs-5"></i>
                            </a>&nbsp;
                            @if(auth()->user() && auth()->user()->is_admin == 1)
                                <a href="/partners/{{ $partner->id }}/edit" class="text-warning" title="Edit">
                                    <i class="bi bi-pencil-square fs-5"></i>
                                </a>&nbsp;
                                <form action="{{ route('partners.destroy', $partner['id']) }}" method="POST" onsubmit="return confirm('Apakah anda yakin ingin menghapus partner ini?')" class="m-0 p-0">
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
                @if($partners->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            @if(request('search'))
                                Tidak ada nama mitra dengan nama "<strong>{{ request('search') }}</strong>"
                            @else
                                Tidak ada data mitra.
                            @endif
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class="mx-4 mt-3">
        {{ $partners->appends(['search' => $keyword])->links() }}
    </div>
</div>
@endsection