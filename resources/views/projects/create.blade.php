@extends('layouts.app')

@section('title', 'Tambah Proyek')

@section('content')
<div class="col-md-9 mt-4" style="min-height: 80vh;">
    <div class="px-4 d-flex justify-content-between align-items-center mb-3">
        <a href="/projects" class="btn btn-secondary fw-bold px-4 py-2 rounded-pill">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="bg-white mx-4 p-4 rounded shadow-sm">
        <form action="{{ route('projects.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-bold">Nama Proyek</label>
                <input type="text" name="nama_proyek" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Partner</label>
                <input type="text" name="partner" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Tanggal Proyek</label>
                <input type="date" name="tanggal_proyek" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Lokasi</label>
                <input type="text" name="lokasi" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Estimasi Lama Pengerjaan</label>
                <input type="text" name="estimasi_lama" class="form-control" placeholder="Contoh: 5 Bulan">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Rencana Anggaran Produksi</label>
                <input type="number" name="anggaran_produksi" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Rencana Anggaran Biaya</label>
                <input type="number" name="anggaran_biaya" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Total Hutang</label>
                <input type="number" name="hutang" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Total Piutang</label>
                <input type="number" name="piutang" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Status Pengajuan Kebutuhan Material</label>
                <select name="status_kebutuhan" class="form-select">
                    <option value="Diterima">Diterima</option>
                    <option value="Pending">Pending</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Status Inspeksi Logistik</label>
                <select name="status_logistik" class="form-select">
                    <option value="Diterima">Diterima</option>
                    <option value="Pending">Pending</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Status Ajuan Upahan</label>
                <select name="status_upahan" class="form-select">
                    <option value="Diterima">Diterima</option>
                    <option value="Pending">Pending</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Milestones</label>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Persentase</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < 4; $i++)
                        <tr>
                            <td><input type="text" name="milestones[{{ $i }}][persentase]" class="form-control" placeholder="Contoh: 20%"></td>
                            <td><input type="date" name="milestones[{{ $i }}][tanggal]" class="form-control"></td>
                            <td>
                                <select name="milestones[{{ $i }}][status]" class="form-select">
                                    <option value="Lunas">Lunas</option>
                                    <option value="Pending">Pending</option>
                                </select>
                            </td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary px-5 py-2 rounded-pill fw-bold">
                    Simpan Proyek
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
