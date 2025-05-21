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

        <div class="mb-3">
            <label class="form-label fs-5">Nama Mitra</label>
            <p class="form-control-plaintext">{{ $partner->nama_partner }}</p>
        </div>

        <div class="mb-3">
            <label class="form-label fs-5">Email Mitra</label>
            <p class="form-control-plaintext">{{ $partner->email_partner }}</p>
        </div>

        <div class="mb-3">
            <label class="form-label fs-5">Nomor Telepon</label>
            <p class="form-control-plaintext">{{ $partner->no_telfon }}</p>
        </div>

        <div class="mb-3">
            <label class="form-label fs-5">Alamat</label>
            <p class="form-control-plaintext">{{ $partner->alamat }}</p>
        </div>

        <div class="mb-3">
            <label class="form-label fs-5">Deskripsi Tentang Mitra</label>
            <p class="form-control-plaintext">{{ $partner->deskripsi }}</p>
        </div>

        <div class="mb-3">
            <label class="form-label fs-5">Logo Mitra:</label>
        </div>

        @if(!empty($partner->logos) && count($partner->logos))
            @foreach($partner->logos as $logo)
                <div class="border rounded p-3 position-relative bg-light mb-3">
                    <div class="mb-2">
                        <label class="form-label">Logo</label><br>
                        <img 
                            src="{{ asset('storage/' . $logo->file_dokumen) }}" 
                            alt="Logo Mitra" 
                            class="img-fluid rounded border"
                            style="max-height: 200px; object-fit: contain;"
                        >
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-muted">Belum ada logo yang diunggah.</p>
        @endif

    </div>
</div>

<script>
let logoAdded = false;

let logoIndex = 0;

function addLogo() {
    const container = document.getElementById('logoContainer');
    const div = document.createElement('div');
    const currentIndex = logoIndex;

    div.classList.add('mb-3');
    div.innerHTML = `
        <div class="border rounded p-3 position-relative bg-light">
            <div class="mb-2 text-start">
                <label class="form-label">Preview Logo</label><br>
                <img id="logoPreview-${currentIndex}" src="" alt="Preview Logo" class="img-fluid mb-2 d-none border rounded" style="max-height: 200px;">
            </div>
            <div class="mb-2">
                <label class="form-label">File Logo</label>
                <input type="file" name="logo[${currentIndex}][file]" accept="image/*" class="form-control" required onchange="previewLogo(this, ${currentIndex})">
            </div>
            <button type="button" class="btn-close position-absolute top-0 end-0 m-2" aria-label="Close" onclick="this.closest('.mb-3').remove()"></button>
        </div>
    `;
    container.appendChild(div);
    logoIndex++;
}

function previewLogo(input, index) {
    const preview = document.getElementById(`logoPreview-${index}`);
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

function hapusLogoLama(button) {
    const container = button.closest('.logo-lama');
    const input = container.querySelector('input[name*="[id]"]');
    if (input) {
        const id = input.value;
        const hiddenInput = document.getElementById('hapusLogoLamaIds');
        let existing = hiddenInput.value ? hiddenInput.value.split(',') : [];
        existing.push(id);
        hiddenInput.value = existing.join(',');
    }
    container.remove();
}

function removeLogo(button) {
    button.closest('.mb-3').remove();
    logoAdded = false;
}
</script>

@endsection