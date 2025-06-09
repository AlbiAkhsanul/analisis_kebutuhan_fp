@extends('layouts.app')

@section('title', 'Tambah Mitra')

@section('content')
{{-- {{ dd($partner->id) }} --}}
<div class="col-md-10 mt-4" style="min-height: 80vh;">
    <div class="px-4 d-flex justify-content-between align-items-center mb-3">
        <a href="/partners" class="btn btn-warning fw-bold px-4 py-2 rounded-pill text-white">
            <i class="bi bi-arrow-left"></i>&nbsp;&nbsp;Kembali Ke Daftar Mitra
        </a>
    </div>

    <div class="bg-white mx-4 p-4">
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

            {{-- <div class="mb-3">
                <label class="form-label fs-5">Logo Mitra:</label><br>
            </div>

            <div class="border-b border-gray-500">
                <div class="w-50">
                    <div class="pb-10 mb-20">

                        @if(!empty($partner->logos) && count($partner->logos))
                            @foreach($partner->logos as $index => $logo)
                                <div class="logo-lama border rounded p-3 position-relative bg-light mb-3">
                                    <div class="mb-2">
                                        <label class="form-label">Logo Saat Ini</label><br>
                                        <img 
                                            src="{{ asset('storage/' . $logo->file_dokumen) }}" 
                                            alt="Logo Mitra" 
                                            class="img-fluid rounded border"
                                            style="max-height: 200px; object-fit: contain;"
                                        >
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">Ganti Logo</label>
                                        <input type="file" name="logo_lama[{{ $logo->id }}][file]" accept="image/*" class="form-control">
                                    </div>
                                    <input type="hidden" name="logo_lama[{{ $logo->id }}][id]" value="{{ $logo->id }}">
                                    <button type="button" class="btn-close position-absolute top-0 end-0 m-2" onclick="hapusLogoLama(this)"></button>
                                </div>
                            @endforeach
                        @endif

                        <input type="hidden" name="hapus_logo_lama[]" id="hapusLogoLamaIds">

                        <div id="logoContainer"></div>

                        <button type="button" 
                            class="btn bi bi-file-earmark-image-fill btn-sm btn-primary mt-2 rounded-pill fw-bold" 
                            onclick="addLogo()">
                            Perbarui Logo Mitra
                        </button>
                    </div>
                </div>
            </div> --}}

            <div class="mb-3">
    <label for="logo">Logo Mitra:</label>
    <input type="file" name="logo" id="logo" accept="image/*" class="form-control">

    @if ($partner->logo)
        <div class="mt-2">
            <p>Logo Saat Ini:</p>
            <img src="{{ asset('storage/' . $partner->logo) }}" alt="Logo Mitra" style="max-height: 150px;">
        </div>
    @endif
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