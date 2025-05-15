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
                <h3 class="text-lg font-bold mb-2">Pembanguan Gate depan dan Kantin Apartmenet Westonview Wiyung</h3>
                @if ($project['partner'])
                    
                        <span class="text-red-600 text-xl">{{ $project['partner']['nama_partner'] }}</span>
                        <span class="badge bg-emerald-100 text-success fw-bold fs-6 mx-2 px-3 rounded-pill">Aktif</span>
                @else
                    <p>Tidak ada data partner.</p>
                @endif
            </div>
            <div class="py-3 border-b border-gray-500">
                <div>
                    {{-- <p>>Nama Proyek: <strong> {{ $project['nama_proyek'] }}</strong></p>
                    <p>Estimasi Lama Proyek: <strong> {{ $project['estimasi_lama_proyek'] }} Bulan</strong></p>
                    <p>Status Proyek: <strong> {{ ucfirst($project['status_proyek']) }}</strong></p>
                    <p>Progres Proyek: <strong> {{ $project['progres_proyek'] }}</strong></p> --}}
                    <p class="fs-5">Tanggal Proyek : <strong> 6 Oktober 2024</strong></p>
                    <p class="fs-5">Lokasi Proyek: <strong> Wonokromo, Surabaya</strong></p>
                    <p class="fs-5">Estimasi Lama Pengerjaan : <strong> 5 Bulan</strong></p>
                    <p class="fs-5">Jenis Proyek:</p>
                    {{-- <ul class="list-disc ml-6">
                        @foreach ($project['jenis_proyek'] as $jenis)
                            <li>{{ $jenis }}</li>
                        @endforeach
                    </ul> --}}
                    <p class="fs-5">Rencana Anggaran Produksi : <strong> Rp 500.000.000,00</strong></p>
                    <p class="fs-5">Rencana Anggaran Biaya : <strong> Rp 350.000.000,00</strong></p>
                    <p class="fs-5">Total Hutang : <strong> Rp 80.000.000,00</strong></p>
                    <p class="fs-5">Total Piutang : <strong> Rp 60.000.000,00</strong></p>
                    <p class="fs-5">Status Pengajuan Kebutuhan Material : <strong> Diterima</strong></p>
                    <p class="fs-5">Status Inpeksi Logistik : <strong> Diterima</strong></p>
                    <p class="fs-5">Status Ajuan Upahan : <strong> Diterima</strong></p>
                </div> 
            </div>
            {{-- <div class="p-6 rounded-2xl">
                <h3 class="text-lg font-bold mb-4">Detail Pengajuan</h3>
                <div class="space-y-2">
                    <p><strong>Pengajuan Kebutuhan Material:</strong> {{ ucfirst($project['pengajuan_kebutuhan_material']) }}</p>
                    <p><strong>Inspeksi Logistik:</strong> {{ ucfirst($project['inspeksi_logistik']) }}</p>
                    <p><strong>Ajuan Upahan:</strong> {{ ucfirst($project['ajuan_upahan']) }}</p>
                </div>
            </div> --}}
            {{-- <div class="p-6 rounded-2xl">
                <h3 class="text-lg font-bold mb-4">Jenis Proyek</h3>
                <div class="flex flex-wrap gap-4">
                    @forelse ($project['types'] as $type)
                        <span class="relative pl-6">
                            • {{ $type['nama_jenis_proyek'] }}
                        </span>
                    @empty
                        <span class="text-gray-500">Tidak ada jenis proyek</span>
                    @endforelse
                </div>                    
            </div> --}}
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
                                <td>20 Oktober 2023</td>
                                <td class="text-start">
                                    {{-- @if($proyek->status === 'Aktif') --}}
                                        <span class="px-3 bg-slate-200 text-blue-800 fw-bold fs-6 rounded-pill">Lunas</span>
                                    {{-- @elseif($proyek->status === 'Selesai')
                                        <span class="badge bg-info text-dark fw-bold fs-6 rounded-pill">Selesai</span>
                                    @else
                                        <span class="badge bg-warning text-dark fw-bold fs-6 rounded-pill">Pending</span>
                                    @endif --}}
                                </td>
                            </t>
                            <tr>
                                <td class="text-start">2</td>
                                <td>
                                    50 %
                                </td>
                                <td>20 Oktober 2023</td>
                                <td class="text-start">
                                    {{-- @if($proyek->status === 'Aktif') --}}
                                        <span class="px-3 bg-slate-200 text-blue-800 fw-bold fs-6 rounded-pill">Lunas</span>
                                    {{-- @elseif($proyek->status === 'Selesai')
                                        <span class="badge bg-info text-dark fw-bold fs-6 rounded-pill">Selesai</span>
                                    @else
                                        <span class="badge bg-warning text-dark fw-bold fs-6 rounded-pill">Pending</span>
                                    @endif --}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">3</td>
                                <td>
                                    80 %
                                </td>
                                <td>20 Oktober 2023</td>
                                <td class="text-start">
                                    {{-- @if($proyek->status === 'Aktif') --}}
                                        <span class="px-3 bg-slate-200 text-blue-800 fw-bold fs-6 rounded-pill">Lunas</span>
                                    {{-- @elseif($proyek->status === 'Selesai')
                                        <span class="badge bg-info text-dark fw-bold fs-6 rounded-pill">Selesai</span>
                                    @else
                                        <span class="badge bg-warning text-dark fw-bold fs-6 rounded-pill">Pending</span>
                                    @endif --}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">4</td>
                                <td>
                                    100 %
                                </td>
                                <td>20 Oktober 2023</td>
                                <td class="text-start">
                                    {{-- @if($proyek->status === 'Aktif')
                                        <span class="px-3 bg-slate-200 text-blue-800 fw-bold fs-6 rounded-pill">Lunas</span>
                                    @elseif($proyek->status === 'Selesai')
                                        <span class="badge bg-info text-dark fw-bold fs-6 rounded-pill">Selesai</span>
                                    @else --}}
                                        <span class="badge bg-warning text-dark fw-bold fs-6 rounded-pill">Pending</span>
                                    {{-- @endif --}}
                                </td>
                            </tr>
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
                     <i class="bi bi-receipt-cutoff me-2"></i> Lihat Invoice
                 </a>
                 <a href="/" class="btn btn-outline-success d-flex align-items-center me-6">
                     <i class="bi bi-file-earmark-text me-2"></i> Lihat Surat-Surat
                 </a>
                 <a href="/" class="btn btn-outline-secondary d-flex align-items-center me-6">
                     <i class="bi bi-image me-2"></i> Lihat Foto Proyek
                </a>
            </div>
        </div>
    </div>
</div>
@endsection