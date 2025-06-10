@extends('layouts.app')

@section('title', 'Tambah Proyek')

@section('content')
<div class="col-md-10 mt-4" style="min-height: 80vh;">
    <div class="px-4 d-flex justify-content-between align-items-center mb-3 ">
        <a href="/projects" class="btn btn-primary fw-bold px-4 py-2 rounded-pill">
            <i class="bi bi-arrow-left"></i>&nbsp;&nbsp;Kembali Ke Daftar Proyek
        </a>
    </div>

    <div class="bg-white mx-4 p-4 rounded shadow-sm">
        <div class="pb-3 border-b border-gray-500 mb-2">
            <h3 class="text-lg font-bold mb-1">Menambahkan Data Proyek Baru</h3>
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
        <form id="projectForm" action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="py-3 border-b border-gray-500">
                <div class="mb-3">
                    <label class="form-label fs-5">Nama Proyek</label>
                    <input type="text" name="nama_proyek" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fs-5">Status Proyek</label>
                    <select name="status_proyek" class="form-select">
                        <option value="pending">Pending</option>
                        <option value="aktif">Aktif</option>
                        <option value="selesai">Selesai</option>
                        <option value="batal">Batal</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="partner" class="form-label fs-5">Partner</label>
                    <select name="partner_id" id="partner" class="form-select">
                        <option value="" disabled selected>Pilih Partner</option>
                        @foreach ($partners as $partner)
                            <option value="{{ $partner->id }}">{{ $partner->nama_partner }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 w-25">
                    <label class="form-label fs-5">Tanggal Proyek Dimulai</label>
                    <input type="date" name="tanggal_proyek" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fs-5">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fs-5">Estimasi Lama Pengerjaan (Bulan)</label>
                    <input type="number" name="estimasi_lama" class="form-control" placeholder="Contoh: 5">
                </div>

                <div class="mb-1">
                    <label class="block mb-2 fs-5">Jenis Proyek</label>
                    <div class="flex flex-wrap gap-4 ps-1">
                        @foreach($types as $type)
                            <label class="flex items-center space-x-2 text-lg"> <!-- text-lg here -->
                                <input
                                    type="checkbox"
                                    name="jenis_proyek[]"
                                    value="{{ $type['id'] }}"
                                    class="form-checkbox w-4 h-4"
                                />
                                <span>{{ $type['nama_project_type'] }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="py-3 border-b border-gray-500">
                <div class="mb-3">
                    <label class="form-label fs-5">Rencana Anggaran Produksi</label>
                    <input type="number" name="rencana_anggaran_produksi" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label fs-5">Rencana Anggaran Biaya</label>
                    <input type="number" name="rencana_anggaran_biaya" class="form-control">
                </div>
            </div>

            <div class="py-3 border-b border-gray-500">
                <div class="mb-3">
                    <label class="form-label fs-5">Status Pengajuan Kebutuhan Material</label>
                    <select name="status_pengajuan_kebutuhan_material" class="form-select">
                        <option value="pending">Pending</option>
                        <option value="diterima">Diterima</option>
                        <option value="ditolak">Ditolak</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fs-5">Status Inspeksi Logistik</label>
                    <select name="status_inspeksi_logistik" class="form-select">
                        <option value="pending">Pending</option>
                        <option value="diterima">Diterima</option>
                        <option value="ditolak">Ditolak</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fs-5">Status Ajuhan Upahan</label>
                    <select name="status_ajuhan_upahan" class="form-select">
                        <option value="pending">Pending</option>
                        <option value="diterima">Diterima</option>
                        <option value="ditolak">Ditolak</option>
                    </select>
                </div>
            </div>

            <div class="py-3 border-b border-gray-500">
                <div class="mb-4 w-50">
                    {{-- <label class="form-label fs-5 mb-2">Milestones</label> --}}
                    <table class="table table-borderless" style="background-color: transparent;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Persentase</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Milestone 20%</td>
                                <td><input type="date" name="tanggal_milestone_20" class="form-control"></td>
                                <td>
                                    <select name="status_milestone_20" class="form-select">
                                        <option value="pending">Pending</option>
                                        <option value="lunas">Lunas</option>
                                        <option value="hutang">Hutang</option>
                                        <option value="piutang">Piutang</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Milestone 50%</td>
                                <td><input type="date" name="tanggal_milestone_50" class="form-control"></td>
                                <td>
                                    <select name="status_milestone_50" class="form-select">
                                        <option value="pending">Pending</option>
                                        <option value="lunas">Lunas</option>
                                        <option value="hutang">Hutang</option>
                                        <option value="piutang">Piutang</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Milestone 80%</td>
                                <td><input type="date" name="tanggal_milestone_80" class="form-control"></td>
                                <td>
                                    <select name="status_milestone_80" class="form-select">
                                        <option value="pending">Pending</option>
                                        <option value="lunas">Lunas</option>
                                        <option value="hutang">Hutang</option>
                                        <option value="piutang">Piutang</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Milestone 100%</td>
                                <td><input type="date" name="tanggal_milestone_100" class="form-control"></td>
                                <td>
                                    <select name="status_milestone_100" class="form-select">
                                        <option value="pending">Pending</option>
                                        <option value="lunas">Lunas</option>
                                        <option value="hutang">Hutang</option>
                                        <option value="piutang">Piutang</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="py-3 border-b border-gray-500">
                <div class="w-50">
                    <div class="mb-4 space-y-4">
                        {{-- ================= CONTAINER ================= --}}
                        <div id="fotoContainer"></div>
                        <div id="invoiceContainer"></div>
                        <div id="suratContainer"></div>
                        {{-- ================= TOMBOL ================= --}}
                        <button type="button" class="btn bi bi-file-earmark-image-fill btn-sm btn-primary me-4 mt-2 rounded-pill fw-bold" onclick="addFoto()"> Tambah Gambar</button>
                        <button type="button" class="btn bi bi-calculator-fill btn-sm btn-primary me-4 mt-2 rounded-pill fw-bold" onclick="addInvoice()"> Tambah Invoice</button>
                        <button type="button" class="btn bi-file-earmark-text-fill btn-sm btn-primary me-4 mt-2 rounded-pill fw-bold" onclick="addSurat()"> Tambah Surat</button>
                    </div>
                </div>
            </div>
              
            <div class="mt-5">
                <button id="submitProjectBtn" type="submit" class="btn btn-primary px-4 py-2 rounded-pill fw-bold bi bi-plus-lg"> Tambah Data Proyek</button>
            </div>
        </form>
    </div>
</div>
<script>
  function validateForm() {
  const fotoInputs = document.querySelectorAll('[name^="foto["]');
  const invoiceInputs = document.querySelectorAll('[name^="invoice["]');
  const suratInputs = document.querySelectorAll('[name^="surat["]');

  let isValid = true;
  const requiredFields = [...fotoInputs, ...invoiceInputs, ...suratInputs];

  requiredFields.forEach(input => {
    input.classList.remove('is-invalid'); // reset dulu
    if (!input.value) {
      input.classList.add('is-invalid');
      isValid = false;
    }
  });

  if (!isValid) {
    alert('Semua file dan tanggal harus diisi.');
  }

  return isValid; // kalau false, form tidak akan dikirim
  }

  function checkInput(input) {
    if (!input.value) {
      input.classList.add('is-invalid');
    } else {
      input.classList.remove('is-invalid');
    }
  }


  let fotoIndex = 0, invoiceIndex = 0, suratIndex = 0;

  function addFoto() {
    const container = document.getElementById('fotoContainer');
    const div = document.createElement('div');
    div.classList.add('mb-3');
    const currentIndex = fotoIndex;
    div.innerHTML = `
        <div class="border rounded p-3 position-relative bg-light">
            <div class="mb-2">
                <label class="form-label">Preview Gambar</label><br>
                <img id="preview-${currentIndex}" src="" alt="Preview Gambar" class="img-fluid mb-2 d-none border rounded" style="max-height: 200px; object-fit: cover;">
            </div>
            <div class="mb-2">
                <label class="form-label">File Gambar</label>
                <input type="file" name="foto[${currentIndex}][file]" accept="image/*" class="form-control" required onblur="checkInput(this)" onchange="previewImage(this, ${currentIndex})">
                <div class="invalid-feedback">File gambar wajib diisi.</div>
            </div>
            <div class="mb-2">
                <label class="form-label">Tanggal Gambar</label>
                <input type="date" name="foto[${currentIndex}][date]" class="form-control" required onblur="checkInput(this)">
                <div class="invalid-feedback">Tanggal gambar wajib diisi.</div>
            </div>
            <button type="button" class="btn-close position-absolute top-0 end-0 m-2" aria-label="Close" onclick="this.closest('.mb-3').remove()"></button>
        </div>
    `;
    container.appendChild(div);
    fotoIndex++;
  }

  function previewImage(input, index) {
    const preview = document.getElementById(`preview-${index}`);
    const file = input.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('d-none');
        };
        reader.readAsDataURL(file);
    }
  }

  function addInvoice() {
    const container = document.getElementById('invoiceContainer');
    const div = document.createElement('div');
    div.classList.add('mb-3');
    const currentIndex = invoiceIndex;
    div.innerHTML = `
      <div class="border rounded p-3 position-relative bg-light">
        <div class="mb-2">
          <label class="form-label">Preview Invoice</label><br>
          <embed id="preview-invoice-${currentIndex}" type="application/pdf" class="d-none border rounded" width="100%" height="300px" />
        </div>
        <div class="mb-2">
          <label class="form-label">File Invoice (PDF)</label>
          <input type="file" name="invoice[${currentIndex}][file]" accept="application/pdf" class="form-control" required onblur="checkInput(this)" onchange="previewPDF(this, 'invoice', ${currentIndex})">
          <div class="invalid-feedback">File invoice wajib diisi.</div>
        </div>
        <div class="mb-2">
          <label class="form-label">Tanggal Invoice</label>
          <input type="date" name="invoice[${currentIndex}][date]" class="form-control" required onblur="checkInput(this)">
          <div class="invalid-feedback">Tanggal invoice wajib diisi.</div>
        </div>
        <button type="button" class="btn-close position-absolute top-0 end-0 m-2" aria-label="Close" onclick="this.closest('.mb-3').remove()"></button>
      </div>
    `;
    container.appendChild(div);
    invoiceIndex++;
  }

  function addSurat() {
    const container = document.getElementById('suratContainer');
    const div = document.createElement('div');
    div.classList.add('mb-3');
    const currentIndex = suratIndex;
    div.innerHTML = `
      <div class="border rounded p-3 position-relative bg-light">
        <div class="mb-2">
          <label class="form-label">Preview Surat</label><br>
          <embed id="preview-surat-${currentIndex}" type="application/pdf" class="d-none border rounded" width="100%" height="300px" />
        </div>
        <div class="mb-2">
          <label class="form-label">File surat (PDF)</label>
          <input type="file" name="surat[${currentIndex}][file]" accept="application/pdf" class="form-control" required onblur="checkInput(this)" onchange="previewPDF(this, 'surat', ${currentIndex})">
          <div class="invalid-feedback">File surat wajib diisi.</div>
        </div>
        <div class="mb-2">
          <label class="form-label">Tanggal surat</label>
          <input type="date" name="surat[${currentIndex}][date]" class="form-control" required onblur="checkInput(this)">
          <div class="invalid-feedback">Tanggal surat wajib diisi.</div>
        </div>
        <button type="button" class="btn-close position-absolute top-0 end-0 m-2" aria-label="Close" onclick="this.closest('.mb-3').remove()"></button>
      </div>
    `;
    container.appendChild(div);
    suratIndex++;
  }

  function previewPDF(input, prefix, index) {
    const file = input.files[0];
    const preview = document.getElementById(`preview-${prefix}-${index}`);

    if (file && file.type === 'application/pdf') {
      const reader = new FileReader();
      reader.onload = function (e) {
        preview.src = e.target.result;
        preview.classList.remove('d-none');
      };
      reader.readAsDataURL(file);
    } else {
      preview.classList.add('d-none');
    }
  }
</script>
@endsection
