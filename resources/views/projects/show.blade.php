@extends('layouts.app')

@section('title', 'Detail Proyek')

@section('content')
<div class="col-md-9 mt-4" style="min-height: 80vh;">
    <!-- Tombol atas -->
    <div class="px-4 d-flex justify-content-between align-items-center mb-3 ">
        <a href="/projects" class="btn btn-primary fw-bold px-4 py-2 rounded-pill">
            <i class="bi bi-arrow-left"></i>&nbsp;&nbsp;Kembali Ke Daftar Proyek
        </a>
    </div>
    <div class="bg-white mx-4 p-3 rounded shadow-sm">
        <div class="px-6 space-y-5" >
            <div class="py-3 border-b border-gray-500">
                <h3 class="text-lg font-bold mb-2">{{ $project->nama_proyek }}</h3>
                @if ($project->partner)
                        <span class="text-red-600 text-xl">{{ $project->partner->nama_partner }}</span>
                        <span class="badge bg-emerald-100 text-success fw-bold fs-6 mx-2 px-3 rounded-pill">{{ $project->status_proyek }}</span>
                @else
                    <p>Tidak ada data partner.</p>
                @endif
            </div>
            <div class="py-3 border-b border-gray-500">
                <div>

                    <p class="fs-5">Tanggal Proyek : <strong>{{ $project->tanggal_proyek }}</strong></p>
                    <p class="fs-5">Lokasi Proyek: <strong> Wonokromo, Surabaya</strong></p>
                    <p class="fs-5">Estimasi Pengerjaan : <strong> 5 Bulan</strong></p>
                    <p class="fs-5">Jenis Proyek:</p>
                    <ul class="list-unstyled d-flex flex-wrap gap-2">
                        @foreach ($project->types as $jenis)
                            <li>
                                <span class="badge bg-primary rounded-pill px-3 py-2">
                                    {{ $jenis['nama_project_type'] }}
                                </span>
                            </li>
                        @endforeach
                    </ul>
                    <p class="fs-5">Rencana Anggaran Produksi : <strong> Rp&nbsp;{{ $project->rencana_anggaran_produksi }}</strong></p>
                    <p class="fs-5">Rencana Anggaran Biaya : <strong> Rp&nbsp;{{ $project->rencana_anggaran_biaya }}</strong></p>
                    <p class="fs-5">Total Hutang : <strong> Rp&nbsp;80.000.000,00</strong></p>
                    <p class="fs-5">Total Piutang : <strong> Rp&nbsp;60.000.000,00</strong></p>
                    <p class="fs-5">Status Pengajuan Kebutuhan Material : <strong> {{ ucfirst($project->status_pengajuan_kebutuhan_material) }}</strong></p>
                    <p class="fs-5">Status Inpeksi Logistik : <strong> {{ ucfirst($project->status_inspeksi_logistik) }}</strong></p>
                    <p class="fs-5">Status Ajuhan Upahan : <strong> {{ ucfirst($project->status_ajuhan_upahan) }}</strong></p>
                </div> 
            </div>
            <div class="border-b border-gray-500">
                <div class="bg-white py-6 w-50 ">
                    <table class="fs-5 table align-middle">
                        <thead>
                            <tr class="text-start">
                                <th>No</th>
                                <th>Milestone</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <t>
                                <td class="text-start">1</td>
                                <td>
                                    20 %
                                </td>
                                <td>{{ $project->tanggal_milestone_20 ? $project->tanggal_milestone_20 : '----' }}</td>
                                <td class="text-start">
                                    @if($project->status_milestone_20 === 'lunas')
                                        <span class="px-3 bg-slate-200 text-blue-800 fw-bold fs-6 rounded-pill">Lunas</span>
                                    @elseif($project->status_milestone_20 === 'pending')
                                        <span class="badge bg-info text-dark fw-bold fs-6 rounded-pill">Pending</span>
                                    @elseif($project->status_milestone_20 === 'hutang')
                                        <span class="badge bg-warning text-dark fw-bold fs-6 rounded-pill">Hutang</span>
                                    @elseif($project->status_milestone_20 === 'piutang')
                                        <span class="badge bg-warning text-dark fw-bold fs-6 rounded-pill">Piutang</span>
                                    @endif
                                </td>
                            </t>
                            <tr>
                                <td class="text-start">2</td>
                                <td>
                                    50 %
                                </td>
                                <td>{{ $project->tanggal_milestone_50 ? $project->tanggal_milestone_50 : '----' }}</td>
                                <td class="text-start">
                                    @if($project->status_milestone_50 === 'lunas')
                                        <span class="px-3 bg-slate-200 text-blue-800 fw-bold fs-6 rounded-pill">Lunas</span>
                                    @elseif($project->status_milestone_50 === 'pending')
                                        <span class="badge bg-info text-dark fw-bold fs-6 rounded-pill">Pending</span>
                                    @elseif($project->status_milestone_50 === 'hutang')
                                        <span class="badge bg-warning text-dark fw-bold fs-6 rounded-pill">Hutang</span>
                                    @elseif($project->status_milestone_50 === 'piutang')
                                        <span class="badge bg-warning text-dark fw-bold fs-6 rounded-pill">Piutang</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">3</td>
                                <td>
                                    80 %
                                </td>
                                <td>{{ $project->tanggal_milestone_80 ? $project->tanggal_milestone_80 : '----' }}</td>
                                <td class="text-start">
                                    @if($project->status_milestone_80 === 'lunas')
                                        <span class="px-3 bg-slate-200 text-blue-800 fw-bold fs-6 rounded-pill">Lunas</span>
                                    @elseif($project->status_milestone_80 === 'pending')
                                        <span class="badge bg-info text-dark fw-bold fs-6 rounded-pill">Pending</span>
                                    @elseif($project->status_milestone_80 === 'hutang')
                                        <span class="badge bg-warning text-dark fw-bold fs-6 rounded-pill">Hutang</span>
                                    @elseif($project->status_milestone_80 === 'piutang')
                                        <span class="badge bg-warning text-dark fw-bold fs-6 rounded-pill">Piutang</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">4</td>
                                <td>
                                    100 %
                                </td>
                                <td>{{ $project->tanggal_milestone_100 ? $project->tanggal_milestone_100 : '----' }}</td>
                                <td class="text-start">
                                    @if($project->status_milestone_100 === 'lunas')
                                        <span class="px-3 bg-slate-200 text-blue-800 fw-bold fs-6 rounded-pill">Lunas</span>
                                    @elseif($project->status_milestone_100 === 'pending')
                                        <span class="badge bg-info text-dark fw-bold fs-6 rounded-pill">Pending</span>
                                    @elseif($project->status_milestone_100 === 'hutang')
                                        <span class="badge bg-warning text-dark fw-bold fs-6 rounded-pill">Hutang</span>
                                    @elseif($project->status_milestone_100 === 'piutang')
                                        <span class="badge bg-warning text-dark fw-bold fs-6 rounded-pill">Piutang</span>
                                    @endif
                                </td>
                            </tr>
                    </table>
                </div>
            </div>

            <div class="py-3">
                {{-- ================= FOTO ================= --}}
                <h5>Foto</h5>
                @foreach($project->images as $index => $image)
                    <div class="foto border rounded p-3 position-relative bg-light mb-3">
                        <div class="mb-2">
                            <label class="form-label">File Gambar</label><br>
                            <a href="{{ asset('storage/' . $image->file_dokumen) }}" target="_blank">Lihat Gambar</a>
                        </div>
                        <div class="mb-2">
                            <p class="fs-5">Tanggal Foto:{{ $image->tanggal_dokumen }}</p>
                        </div>
                    </div>
                @endforeach

                {{-- ================= INVOICE ================= --}}
                <h5>Invoice</h5>
                @foreach($project->invoices as $index => $invoice)
                    <div class="invoice border rounded p-3 position-relative bg-light mb-3">
                        <div class="mb-2">
                            <label class="form-label">File Invoice</label><br>
                            <a href="{{ asset('storage/' . $invoice->file_dokumen) }}" target="_blank">Lihat Invoice</a>
                        </div>
                        <div class="mb-2">
                            <p class="fs-5">Tanggal Invoice: {{ $invoice->tanggal_dokumen }}</p>
                        </div>
                    </div>
                @endforeach

                {{-- ================= SURAT ================= --}}
                <h5>Surat</h5>
                @foreach($project->letters as $index => $letter)
                    <div class="surat border rounded p-3 position-relative bg-light mb-3">
                        <div class="mb-2">
                            <label class="form-label">File Surat</label><br>
                            <a href="{{ asset('storage/' . $letter->file_dokumen) }}" target="_blank">Lihat Surat</a>
                        </div>
                        <div class="mb-2">
                            <p class="fs-5">Tanggal Surat: {{ $letter->tanggal_dokumen }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection