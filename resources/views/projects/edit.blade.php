@extends('layouts.app')

@section('title', 'Edit Proyek')

@section('content')
<div class="col-md-9 mt-4" style="min-height: 80vh;">
    <div class="px-4 d-flex justify-content-between align-items-center mb-3">
        <a href="/projects" class="btn btn-primary fw-bold px-4 py-2 rounded-pill">
            <i class="bi bi-arrow-left"></i>&nbsp;&nbsp;Kembali Ke Daftar Proyek
        </a>
    </div>

    <div class="bg-white mx-4 p-4 rounded shadow-sm">
        <div class="pb-3 border-b border-gray-500 mb-2">
            <h3 class="text-lg font-bold mb-1">Edit Data Proyek</h3>
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
        <form id="projectForm" action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="py-3 border-b border-gray-500">
                <div class="mb-3">
                    <label class="form-label fs-5">Nama Proyek</label>
                    <input type="text" name="nama_proyek" class="form-control" value="{{ $project->nama_proyek }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fs-5">Status Proyek</label>
                    <select name="status_proyek" class="form-select">
                        <option value="pending" {{ $project->status_proyek == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="aktif" {{ $project->status_proyek == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="selesai" {{ $project->status_proyek == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        <option value="batal" {{ $project->status_proyek == 'batal' ? 'selected' : '' }}>Batal</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="partner" class="form-label fs-5">Partner</label>
                    <select name="partner_id" id="partner" class="form-select">
                        <option value="" disabled>Pilih Partner</option>
                        @foreach ($partners as $partner)
                            <option value="{{ $partner->id }}" {{ $project->partner_id == $partner->id ? 'selected' : '' }}>
                                {{ $partner->nama_partner }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 w-25">
                    <label class="form-label fs-5">Tanggal Proyek Dimulai</label>
                    <input type="date" name="tanggal_proyek" class="form-control" value="{{ $project->tanggal_proyek}}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fs-5">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control" value="{{ $project->lokasi }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fs-5">Estimasi Lama Pengerjaan</label>
                    <input type="text" name="estimasi_lama" class="form-control" value="{{ $project->estimasi_lama }}">
                </div>

                <div class="mb-1">
                    <label class="block mb-2 fs-5">Jenis Proyek</label>
                    <div class="flex flex-wrap gap-4 ps-1">
                        @foreach($projectTypes as $type)
                            @php
                                $selectedTypes = $project->types->pluck('id')->toArray();
                            @endphp
                            <label class="flex items-center space-x-2 text-lg">
                                <input
                                    type="checkbox"
                                    name="jenis_proyek[]"
                                    value="{{ $type['id'] }}"
                                    class="form-checkbox w-4 h-4"
                                    {{ in_array($type['id'], $selectedTypes) ? 'checked' : '' }}
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
                    <input type="number" name="rencana_anggaran_produksi" class="form-control" value="{{ $project->rencana_anggaran_produksi }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fs-5">Rencana Anggaran Biaya</label>
                    <input type="number" name="rencana_anggaran_biaya" class="form-control" value="{{ $project->rencana_anggaran_biaya }}">
                </div>
            </div>

            <div class="py-3 border-b border-gray-500">
                <div class="mb-3">
                    <label class="form-label fs-5">Status Pengajuan Kebutuhan Material</label>
                    <select name="status_pengajuan_kebutuhan_material" class="form-select">
                        <option value="pending" {{ $project->status_pengajuan_kebutuhan_material == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="diterima" {{ $project->status_pengajuan_kebutuhan_material == 'diterima' ? 'selected' : '' }}>Diterima</option>
                        <option value="ditolak" {{ $project->status_pengajuan_kebutuhan_material == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fs-5">Status Inspeksi Logistik</label>
                    <select name="status_inspeksi_logistik" class="form-select">
                        <option value="pending" {{ $project->status_inspeksi_logistik == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="diterima" {{ $project->status_inspeksi_logistik == 'diterima' ? 'selected' : '' }}>Diterima</option>
                        <option value="ditolak" {{ $project->status_inspeksi_logistik == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fs-5">Status Ajuhan Upahan</label>
                    <select name="status_ajuhan_upahan" class="form-select">
                        <option value="pending" {{ $project->status_ajuhan_upahan == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="diterima" {{ $project->status_ajuhan_upahan == 'diterima' ? 'selected' : '' }}>Diterima</option>
                        <option value="ditolak" {{ $project->status_ajuhan_upahan == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>
            </div>

            <div class="py-3 border-b border-gray-500">
                <div class="mb-4 w-50">
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
                                <td><input type="date" name="tanggal_milestone_20" class="form-control" value="{{ $project->tanggal_milestone_20 }}"></td>
                                <td>
                                    <select name="status_milestone_20" class="form-select">
                                        <option value="lunas" {{ $project->status_milestone_20 == 'lunas' ? 'selected' : '' }}>Lunas</option>
                                        <option value="pending" {{ $project->status_milestone_20 == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="hutang" {{ $project->status_milestone_20 == 'hutang' ? 'selected' : '' }}>Hutang</option>
                                        <option value="piutang" {{ $project->status_milestone_20 == 'piutang' ? 'selected' : '' }}>Piutang</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Milestone 50%</td>
                                <td><input type="date" name="tanggal_milestone_50" class="form-control" value="{{ $project->tanggal_milestone_50 }}"></td>
                                <td>
                                    <select name="status_milestone_50" class="form-select">
                                        <option value="lunas" {{ $project->status_milestone_50 == 'lunas' ? 'selected' : '' }}>Lunas</option>
                                        <option value="pending" {{ $project->status_milestone_50 == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="hutang" {{ $project->status_milestone_50 == 'hutang' ? 'selected' : '' }}>Hutang</option>
                                        <option value="piutang" {{ $project->status_milestone_50 == 'piutang' ? 'selected' : '' }}>Piutang</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Milestone 80%</td>
                                <td><input type="date" name="tanggal_milestone_80" class="form-control" value="{{ $project->tanggal_milestone_80 }}"></td>
                                <td>
                                    <select name="status_milestone_80" class="form-select">
                                        <option value="lunas" {{ $project->status_milestone_80 == 'lunas' ? 'selected' : '' }}>Lunas</option>
                                        <option value="pending" {{ $project->status_milestone_80 == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="hutang" {{ $project->status_milestone_80 == 'hutang' ? 'selected' : '' }}>Hutang</option>
                                        <option value="piutang" {{ $project->status_milestone_80 == 'piutang' ? 'selected' : '' }}>Piutang</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Milestone 100%</td>
                                <td><input type="date" name="tanggal_milestone_100" class="form-control" value="{{ $project->tanggal_milestone_100 }}"></td>
                                <td>
                                    <select name="status_milestone_100" class="form-select">
                                        <option value="lunas" {{ $project->status_milestone_100 == 'lunas' ? 'selected' : '' }}>Lunas</option>
                                        <option value="pending" {{ $project->status_milestone_100 == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="hutang" {{ $project->status_milestone_100 == 'hutang' ? 'selected' : '' }}>Hutang</option>
                                        <option value="piutang" {{ $project->status_milestone_100 == 'piutang' ? 'selected' : '' }}>Piutang</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="py-3 border-b border-gray-500">
                <div class="w-50 ">
                    {{-- ================= FOTO ================= --}}
                    <h5>Edit Gambar</h5>
                    @foreach($project->images as $index => $image)
                        <div class="foto-lama border rounded p-3 position-relative bg-light mb-3">
                            <div class="mb-2">
                                <label class="form-label">File Foto</label><br>
                                <img 
                                    src="{{ asset('storage/' . $image->file_dokumen) }}" 
                                    alt="Gambar Proyek" 
                                    class="img-fluid rounded border"
                                    style="max-height: 250px; object-fit: cover;"
                                >
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Tanggal Gambar</label>
                                <input type="date" name="foto_lama[{{ $image->id }}][date]" value="{{ $image->tanggal_dokumen }}" class="form-control">
                            </div>
                            <input type="hidden" name="foto_lama[{{ $image->id }}][id]" value="{{ $image->id }}">
                            {{-- <button type="button" class="btn btn-danger btn-sm mt-2" onclick="hapusFotoLama(this)">Hapus</button> --}}
                            <button type="button" class="btn-close position-absolute top-0 end-0 m-2" onclick="hapusFotoLama(this)"></button>
                        </div>
                    @endforeach
                    <input type="hidden" name="hapus_foto_lama[]" id="hapusFotoLamaIds">
                    <div class="mb-4">
                        <div id="fotoContainer"></div>
                        <button type="button" class="btn btn-sm btn-outline-primary mt-2" onclick="addFoto()">+ Tambah Gambar</button>
                    </div>

                    {{-- ================= INVOICE ================= --}}
                    <h5>Edit Invoice</h5>
                    @foreach($project->invoices as $index => $invoice)
                        <div class="invoice-lama border rounded p-3 position-relative bg-light mb-3">
                            <div class="mb-2">
                                <label class="form-label">File Invoice</label><br>
                                <embed 
                                    src="{{ asset('storage/' . $invoice->file_dokumen) }}" 
                                    type="application/pdf" 
                                    width="100%" 
                                    height="400px"
                                />
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Tanggal Invoice</label>
                                <input type="date" name="invoice_lama[{{ $invoice->id }}][date]" value="{{ $invoice->tanggal_dokumen }}" class="form-control">
                            </div>
                            <input type="hidden" name="invoice_lama[{{ $invoice->id }}][id]" value="{{ $invoice->id }}">
                            {{-- <button type="button" class="btn btn-danger btn-sm mt-2" onclick="hapusInvoiceLama(this)">Hapus</button> --}}
                            <button type="button" class="btn-close position-absolute top-0 end-0 m-2" onclick="hapusInvoiceLama(this)"></button>
                        </div>
                    @endforeach
                    <input type="hidden" name="hapus_invoice_lama[]" id="hapusInvoiceLamaIds">
                    <div class="mb-4">
                        <div id="invoiceContainer"></div>
                        <button type="button" class="btn btn-sm btn-outline-primary mt-2" onclick="addInvoice()">+ Tambah Invoice</button>
                    </div>

                    {{-- ================= SURAT ================= --}}
                    <h5>Edit Surat</h5>
                    @foreach($project->letters as $index => $letter)
                        <div class="surat-lama border rounded p-3 position-relative bg-light mb-3">
                            <div class="mb-2">
                                <label class="form-label">File Surat</label><br>
                                <embed 
                                    src="{{ asset('storage/' . $letter->file_dokumen) }}" 
                                    type="application/pdf" 
                                    width="100%" 
                                    height="400px"
                                />
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Tanggal Surat</label>
                                <input type="date" name="surat_lama[{{ $letter->id }}][date]" value="{{ $letter->tanggal_dokumen }}" class="form-control">
                            </div>
                            <input type="hidden" name="surat_lama[{{ $letter->id }}][id]" value="{{ $letter->id }}">
                            {{-- <button type="button" class="btn btn-danger btn-sm mt-2" onclick="hapusSuratLama(this)">Hapus</button> --}}
                            <button type="button" class="btn-close position-absolute top-0 end-0 m-2" onclick="hapusSuratLama(this)"></button>
                        </div>
                    @endforeach
                    <input type="hidden" name="hapus_surat_lama[]" id="hapusSuratLamaIds">
                    <div class="mb-4">
                        <div id="suratContainer"></div>
                        <button type="button" class="btn btn-sm btn-outline-primary mt-2" onclick="addSurat()">+ Tambah Surat</button>
                    </div>
                </div>
            </div>
                
            <div class="mt-4">
                <button type="submit" class="btn btn-primary px-5 py-2 rounded-pill fw-bold">
                    Update Proyek
                </button>
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

    let hapusFotoLamaIds = [];
    let hapusInvoiceLamaIds = [];
    let hapusSuratLamaIds = [];

    function hapusFotoLama(button) {
        const container = button.closest('.foto-lama');
        const id = container.querySelector('input[name^="foto_lama"][name$="[id]"]').value;
        hapusFotoLamaIds.push(id);
        container.remove();
        document.getElementById('hapusFotoLamaIds').value = hapusFotoLamaIds.join(',');
    }

    function hapusInvoiceLama(button) {
        const container = button.closest('.invoice-lama');
        const id = container.querySelector('input[name^="invoice_lama"][name$="[id]"]').value;
        hapusInvoiceLamaIds.push(id);
        container.remove();
        document.getElementById('hapusInvoiceLamaIds').value = hapusInvoiceLamaIds.join(',');
    }

    function hapusSuratLama(button) {
        const container = button.closest('.surat-lama');
        const id = container.querySelector('input[name^="surat_lama"][name$="[id]"]').value;
        hapusSuratLamaIds.push(id);
        container.remove();
        document.getElementById('hapusSuratLamaIds').value = hapusSuratLamaIds.join(',');
    }
</script>
@endsection
