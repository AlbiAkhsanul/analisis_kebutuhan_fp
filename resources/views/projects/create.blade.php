@extends('layouts.app')

@section('title', 'Tambah Proyek')

@section('content')
<div class="col-md-9 mt-4" style="min-height: 80vh;">
    <div class="px-4 d-flex justify-content-between align-items-center mb-3 ">
        <a href="/projects" class="btn btn-primary fw-bold px-4 py-2 rounded-pill">
            <i class="bi bi-arrow-left"></i>&nbsp;&nbsp;Kembali Ke Daftar Proyek
        </a>
    </div>

    <div class="bg-white mx-4 p-4 rounded shadow-sm">
        <div class="pb-3 border-b border-gray-500 mb-2">
            <h3 class="text-lg font-bold mb-1">Menambahkan Data Proyek Baru</h3>
        </div>
        <form id="projectForm" action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="py-3 border-b border-gray-500">
                <div class="mb-3">
                    <label class="form-label fs-5">Nama Proyek</label>
                    <input type="text" name="nama_proyek" class="form-control" required>
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
                    <label class="form-label fs-5">Estimasi Lama Pengerjaan</label>
                    <input type="text" name="estimasi_lama" class="form-control" placeholder="Contoh: 5 Bulan">
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
                    <input type="number" name="anggaran_produksi" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label fs-5">Rencana Anggaran Biaya</label>
                    <input type="number" name="anggaran_biaya" class="form-control">
                </div>
            </div>

            <div class="py-3 border-b border-gray-500">
                <div class="mb-3">
                    <label class="form-label fs-5">Status Pengajuan Kebutuhan Material</label>
                    <select name="status_kebutuhan" class="form-select">
                        <option value="pending">Pending</option>
                        <option value="diterima">Diterima</option>
                        <option value="ditolak">Ditolak</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fs-5">Status Inspeksi Logistik</label>
                    <select name="status_logistik" class="form-select">
                        <option value="pending">Pending</option>
                        <option value="diterima">Diterima</option>
                        <option value="ditolak">Ditolak</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fs-5">Status Ajuan Upahan</label>
                    <select name="status_upahan" class="form-select">
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
                                        <option value="lunas">Lunas</option>
                                        <option value="pending">Pending</option>
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
                                        <option value="lunas">Lunas</option>
                                        <option value="pending">Pending</option>
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
                                        <option value="lunas">Lunas</option>
                                        <option value="pending">Pending</option>
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
                                        <option value="lunas">Lunas</option>
                                        <option value="pending">Pending</option>
                                        <option value="hutang">Hutang</option>
                                        <option value="piutang">Piutang</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal Upload Dokumen Serbaguna -->
            <div class="modal fade" id="uploadDocumentModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content p-3">
                <div class="modal-header">
                    <h5 class="modal-title" id="documentModalTitle">Upload Dokumen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div id="documentList">
                    <!-- Baris dokumen akan ditambahkan di sini -->
                    </div>

                    <button type="button" class="btn btn-secondary my-2" id="addDocumentRowBtn">+ Tambah Dokumen</button>

                    <div class="text-end">
                    <button type="button" class="btn btn-primary" id="saveDocumentsBtn">Simpan</button>
                    </div>
                </div>
                </div>
            </div>
            </div>

            <div class="mt-4 d-flex gap-6 mb-6">
                <button type="button" class="btn btn-outline-primary d-flex align-items-center me-6"
                    onclick="openDocumentModal('invoice', 'Upload Invoice')">
                    <i class="bi bi-receipt-cutoff me-2"></i> Tambah Invoice
                </button>

                <button type="button" class="btn btn-outline-success d-flex align-items-center me-6"
                    onclick="openDocumentModal('surat', 'Upload Surat-Surat')">
                    <i class="bi bi-file-earmark-text me-2"></i> Tambah Surat-Surat
                </button>

                <button type="button" class="btn btn-outline-info d-flex align-items-center me-6" 
                    onclick="openDocumentModal('foto', 'Upload Gambar Proyek')">
                    <i class="bi bi-image me-2"></i> Tambah Gambar Proyek
                </button>
            </div>
            
            <!-- Ringkasan dokumen -->
            <div id="invoiceSummary" class="mt-3"></div>
            <div id="suratSummary" class="mt-3"></div>
            <div id="fotoSummary" class="mt-3"></div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary px-5 py-2 rounded-pill fw-bold">
                    Tambah Data Proyek
                </button>
            </div>
        </form>
    </div>
</div>

<script>
let documentCount = 0;
let currentDocumentType = ''; // "invoice", "surat", atau "foto"

function openDocumentModal(type, title) {
  currentDocumentType = type;
  documentCount = 0;
  document.getElementById('documentModalTitle').textContent = title;
  document.getElementById('documentList').innerHTML = '';
  addDocumentRow(); // otomatis tambah satu baris awal
  const modalEl = document.getElementById('uploadDocumentModal');
  const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
  modal.show();
}

function addDocumentRow() {
  documentCount++;
  const container = document.getElementById('documentList');
  const row = document.createElement('div');
  row.className = 'row mb-3 align-items-center';

  // Tentukan tipe file yang diizinkan sesuai tipe dokumen
  let acceptType = '';
  if (currentDocumentType === 'invoice' || currentDocumentType === 'surat') {
    acceptType = 'application/pdf';
  } else if (currentDocumentType === 'foto') {
    acceptType = 'image/*';
  }

  row.innerHTML = `
    <div class="col-7">
      <input type="file" class="form-control document-file" accept="${acceptType}" required>
    </div>
    <div class="col-4">
      <input type="date" class="form-control document-date" required>
    </div>
    <div class="col-1">
      <button type="button" class="btn btn-danger btn-sm remove-row-btn">×</button>
    </div>
  `;

  container.appendChild(row);

  // Event untuk tombol hapus baris
  row.querySelector('.remove-row-btn').addEventListener('click', () => {
    row.remove();
    documentCount--;
  });
}

// Event untuk tombol tambah baris dokumen
document.getElementById('addDocumentRowBtn').addEventListener('click', () => {
  addDocumentRow();
});

// Event tombol simpan (contoh: validasi sederhana dan tampilkan data ke console)
document.getElementById('saveDocumentsBtn').addEventListener('click', () => {
  const files = document.querySelectorAll('#documentList .document-file');
  const dates = document.querySelectorAll('#documentList .document-date');

  let valid = true;
  let dataToUpload = [];

  for (let i = 0; i < files.length; i++) {
    const fileInput = files[i];
    const dateInput = dates[i];

    if (!fileInput.files.length) {
      alert(`File pada baris ke-${i + 1} belum dipilih.`);
      valid = false;
      break;
    }
    if (!dateInput.value) {
      alert(`Tanggal pada baris ke-${i + 1} belum diisi.`);
      valid = false;
      break;
    }

    dataToUpload.push({
      file: fileInput.files[0],
      date: dateInput.value
    });
  }

  if (!valid) return;

  // Contoh: tampilkan data yang akan diupload (ganti dengan proses upload sebenarnya)
  console.log(`Upload ${currentDocumentType}:`, dataToUpload);

  // Tutup modal setelah simpan
  const modalEl = document.getElementById('uploadDocumentModal');
  const modal = bootstrap.Modal.getInstance(modalEl);
  modal.hide();

  // Reset form jika perlu
  document.getElementById('documentList').innerHTML = '';
  documentCount = 0;
});
</script>
@endsection
