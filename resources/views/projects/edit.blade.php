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
        <form action="{{ route('projects.update', $project->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="py-3 border-b border-gray-500">
                <div class="mb-3">
                    <label class="form-label fs-5">Nama Proyek</label>
                    <input type="text" name="nama_proyek" class="form-control" value="{{ $project->nama_project }}" required>
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
                    <input type="date" name="tanggal_proyek" class="form-control" value="{{ $project->tanggal_project}}" required>
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
                    <input type="number" name="anggaran_produksi" class="form-control" value="{{ $project->rencana_anggaran_produksi }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fs-5">Rencana Anggaran Biaya</label>
                    <input type="number" name="anggaran_biaya" class="form-control" value="{{ $project->rencana_anggaran_biaya }}">
                </div>
            </div>

            <div class="py-3 border-b border-gray-500">
                <div class="mb-3">
                    <label class="form-label fs-5">Status Pengajuan Kebutuhan Material</label>
                    <select name="status_kebutuhan" class="form-select">
                        <option value="diterima" {{ $project->status_kebutuhan == 'diterima' ? 'selected' : '' }}>Diterima</option>
                        <option value="pending" {{ $project->status_kebutuhan == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="ditolak" {{ $project->status_kebutuhan == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fs-5">Status Inspeksi Logistik</label>
                    <select name="status_logistik" class="form-select">
                        <option value="diterima" {{ $project->status_logistik == 'diterima' ? 'selected' : '' }}>Diterima</option>
                        <option value="pending" {{ $project->status_logistik == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="ditolak" {{ $project->status_logistik == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fs-5">Status Ajuan Upahan</label>
                    <select name="status_upahan" class="form-select">
                        <option value="diterima" {{ $project->status_upahan == 'diterima' ? 'selected' : '' }}>Diterima</option>
                        <option value="pending" {{ $project->status_upahan == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="ditolak" {{ $project->status_upahan == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
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

            <div class="mt-4 d-flex gap-6 mb-6">
                 {{-- <a href="{{ route('invoice.show', $project['id']) }}" class="btn btn-outline-primary d-flex align-items-center">
                     <i class="bi bi-receipt-cutoff me-2"></i> Lihat Invoice
                 </a>
                 <a href="{{ route('documents.show', $project['id']) }}" class="btn btn-outline-success d-flex align-items-center">
                     <i class="bi bi-file-earmark-text me-2"></i> Lihat Surat-Surat
                 </a>
                 <a href="{{ route('photos.show', $project['id']) }}" class="btn btn-outline-secondary d-flex align-items-center">
                     <i class="bi bi-image me-2"></i> Lihat Foto Proyek
                 </a> --}}
                 <a href="/" class="btn btn-outline-primary d-flex align-items-center me-6">
                     <i class="bi bi-receipt-cutoff me-2"></i> Edit Invoice
                 </a>
                 <a href="/" class="btn btn-outline-success d-flex align-items-center me-6">
                     <i class="bi bi-file-earmark-text me-2"></i> Edit Surat-Surat
                 </a>
                 <a href="/" class="btn btn-outline-secondary d-flex align-items-center me-6">
                     <i class="bi bi-image me-2"></i> Edit Foto Proyek
                </a>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary px-5 py-2 rounded-pill fw-bold">
                    Update Proyek
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
