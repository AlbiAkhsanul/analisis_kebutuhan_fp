@extends('layouts.app')

@section('title', 'Edit Mitra')

@section('content')
{{-- {{ dd($partner->id) }} --}}
<div class="col-md-10 mt-4" style="min-height: 80vh;">
    <div class="px-4 d-flex justify-content-between align-items-center mb-3">
        <a href="/partners" class="btn btn-warning fw-bold px-4 py-2 rounded-pill text-white">
            <i class="bi bi-arrow-left"></i>&nbsp;&nbsp;Kembali Ke Daftar Mitra
        </a>
    </div>

    <div class="bg-white mx-4 p-4 rounded">
        <div class="pb-3 border-bottom mb-3">
            <h3 class="fw-bold mb-1">Mengubah Data Mitra</h3>
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

        <form action="{{ route('partners.update',$partner->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fs-5">Nama Mitra</label>
                <input type="text" name="nama_partner" class="form-control" value="{{ $partner->nama_partner }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fs-5">Email Mitra</label>
                <input type="email" name="email_partner" class="form-control" value="{{ $partner->email_partner }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fs-5">Nomor Telepon</label>
                <input type="text" name="no_telfon" class="form-control" placeholder="+62..." value="{{ $partner->no_telfon }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fs-5">Alamat</label>
                <input type="text" name="alamat" class="form-control" value="{{ $partner->alamat }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fs-5">Deskripsi Tentang Mitra</label>
                <textarea name="deskripsi" class="form-control" rows="4">{{ $partner->deskripsi }}</textarea>
            </div>

            <div class="mb-3 w-50">
                <label for="logo">Logo Mitra:</label>
                <img id="logoPreview" 
                    src="{{ $partner->logo ? asset('storage/' . $partner->logo) : '' }}" 
                    alt="Preview Logo" 
                    class="img-fluid mb-2 border rounded {{ $partner->logo ? '' : 'd-none' }}" 
                    style="max-height: 200px;">
                <input type="file" name="logo" id="logo" accept="image/*" class="form-control" onchange="previewLogo(this)">
            </div>

            <div class="text-start mt-4">
                <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill">
                    <i class="bi bi-plus-circle"></i> Ubah Data Mitra
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function previewLogo(input) {
    const preview = document.getElementById('logoPreview');
    const file = input.files[0];

    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.classList.remove('d-none');
        };
        reader.readAsDataURL(file);
    }
}
</script>

@endsection