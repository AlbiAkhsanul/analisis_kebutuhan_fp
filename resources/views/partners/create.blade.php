@extends('layouts.app')

@section('title', 'Tambah Mitra')

@section('content')
<div class="col-md-10 mt-4" style="min-height: 80vh;">
    <div class="px-4 d-flex justify-content-between align-items-center mb-3">
        <a href="/partners" class="btn btn-warning fw-bold px-4 py-2 rounded-pill text-white">
            <i class="bi bi-arrow-left"></i>&nbsp;&nbsp;Kembali Ke Daftar Mitra
        </a>
    </div>

    <div class="bg-white mx-4 p-4 rounded shadow-sm">
        <div class="pb-3 border-bottom border-2 mb-3">
            <h3 class="fw-bold mb-1">Menambahkan Data Mitra Baru</h3>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('partners.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label fs-5">Nama Mitra</label>
                <input type="text" name="nama_partner" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label fs-5">Email Mitra</label>
                <input type="email" name="email_partner" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label fs-5">Nomor Telepon</label>
                <input type="text" name="no_telfon" class="form-control" placeholder="+62..." required>
            </div>

            <div class="mb-3">
                <label class="form-label fs-5">Alamat</label>
                <input type="text" name="alamat" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label fs-5">Deskripsi Tentang Mitra</label>
                <textarea name="deskripsi" class="form-control" rows="4"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fs-5">Logo Mitra:</label><br>
            </div>

             <div class="py-3 border-b border-gray-500">
                <div class="w-50">
                    <div class="mb-4 space-y-4">
                        <div id="logo"></div>
                        <button type="button" class="btn bi bi-file-earmark-image-fill btn-sm btn-primary mt-2 rounded-pill fw-bold" onclick="addFoto()"> Tambahkan Logo Mitra</button>
                    </div>
                </div>
            </div>

            <div class="text-end mt-4">
                <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill">
                    <i class="bi bi-plus-circle"></i> Tambah Data Mitra
                </button>
            </div>
        </form>
    </div>
</div>
@endsection