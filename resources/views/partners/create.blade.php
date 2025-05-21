@extends('layouts.app')

@section('title', 'Tambah Mitra')

@section('content')
<div class="col-md-10 mt-4" style="min-height: 80vh;">
    <div class="px-4 d-flex justify-content-between align-items-center mb-3">
        <a href="/partners" class="btn btn-warning fw-bold px-4 py-2 rounded-pill text-white">
            <i class="bi bi-arrow-left"></i>&nbsp;&nbsp;Kembali Ke Daftar Mitra
        </a>
    </div>

    <div class="bg-white mx-4 p-4">
        <div class="pb-3 border-bottom mb-3">
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

            <div class="border-b border-gray-500">
                <div class="w-50">
                    <div class="pb-10 mb-20">
                        <div id="logoContainer"></div>

                        <button type="button" 
                            class="btn bi bi-file-earmark-image-fill btn-sm btn-primary mt-2 rounded-pill fw-bold" 
                            onclick="addLogo()">
                            Tambahkan Logo Mitra
                        </button>
                    </div>
                </div>
            </div>

            <div class="text-start mt-4">
                <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill">
                    <i class="bi bi-plus-circle"></i> Tambah Data Mitra
                </button>
            </div>
        </form>
    </div>
</div>

<script>
let logoAdded = false;

function addLogo() {
    const container = document.getElementById('logoContainer');

    // Prevent multiple logos from being added
    if (logoAdded) return;

    const div = document.createElement('div');
    const currentIndex = logoAdded;
    div.classList.add('mb-3');
    div.innerHTML = `
        <div class="border rounded p-3 position-relative bg-light">
            <div class="mb-2 text-start">
                <label class="form-label">Preview Logo</label><br>
                <img id="logoPreview" src="" alt="Preview Logo" class="img-fluid mb-2 d-none border rounded" style="max-height: 200px;">
            </div>
            <div class="mb-2">
                <label class="form-label">File Logo</label>
                <input type="file" name="logo_file" accept="image/*" class="form-control" required onchange="previewLogo(this)">
            </div>
            <button type="button" class="btn-close position-absolute top-0 end-0 m-2" aria-label="Close" onclick="removeLogo(this)"></button>
        </div>
    `;
    container.appendChild(div);
    logoAdded = true;
}

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

function removeLogo(button) {
    button.closest('.mb-3').remove();
    logoAdded = false;
}
</script>

@endsection