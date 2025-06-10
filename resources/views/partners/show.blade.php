@extends('layouts.app')

@section('title', 'Detail Mitra')

@section('content')
<div class="col-md-10 mt-4" style="min-height: 80vh;">
    <div class="px-4 d-flex justify-content-between align-items-center mb-3">
        <a href="/partners" class="btn btn-warning fw-bold px-4 py-2 rounded-pill text-white">
            <i class="bi bi-arrow-left"></i>&nbsp;&nbsp;Kembali Ke Daftar Mitra
        </a>
    </div>

    <div class="bg-white mx-4 p-4 rounded py-3">
        <div class="pb-3 border-b border-gray-500">
            <h3 class="fw-bold mb-1">Detail Mitra</h3>
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

        <div class="">

        </div>
        <div class="mb-3">
            {{-- <label class="form-label fs-5">Nama Mitra</label> --}}
            <p class="fs-5">Nama Mitra : <strong>{{ $partner->nama_partner }}</strong></p>
        </div>

        <div class="mb-3">
            {{-- <label class="form-label fs-5">Email Mitra</label> --}}
            <p class="fs-5">Email Mitra : <strong>{{ $partner->email_partner }}</strong></p>
        </div>

        <div class="mb-3">
            {{-- <label class="form-label fs-5">Nomor Telepon</label> --}}
            <p class="fs-5">Nomor Telepon : <strong>{{ $partner->no_telfon }}</strong></p>
        </div>

        <div class="mb-3">
            {{-- <label class="form-label fs-5">Alamat</label> --}}
            <p class="form-control-plaintext">{{ $partner->alamat }}</p>
        </div>

        <div class="mb-3">
            <label class="form-label fs-5">Deskripsi Tentang Mitra</label>
            <p class="form-control-plaintext">{{ $partner->deskripsi }}</p>
        </div>

        <div class="mb-3">
            <label class="form-label fs-5">Logo Mitra:</label>
        </div>

        <div class="mb-3 w-50">
            @if(!$partner->logo)
                <p class="text-muted">Belum ada logo yang diunggah.</p>
                
            @else
                <img id="logoPreview" 
                        src="{{asset('storage/' . $partner->logo)}}" 
                        alt="Preview Logo" 
                        class="img-fluid mb-2 border rounded" 
                        style="max-height: 200px;">
            @endif
        </div>
    </div>
</div>


@endsection