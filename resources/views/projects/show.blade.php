@extends('layouts.app')

@section('title', 'Detail Proyek')

@section('content')
<div class="col-md-10 mt-4" style="min-height: 80vh;">
    <!-- Tombol atas -->
    <div class="px-4 d-flex justify-content-between align-items-center mb-3 ">
        <a href="/projects" class="btn btn-primary fw-bold px-4 py-2 rounded-pill">
            Kembali Ke Daftar Proyek
        </a>
    </div>
    <div class="bg-white mx-4 p-3 rounded shadow-sm">
        <div class="px-6 space-y-5" >
            <div class="py-6 border-b border-gray-500">
                <h3 class="text-lg font-bold mb-4">Pembanguan Gate depan dan Kantin Apartmenet Westonview Wiyung</h3>
                @if ($project['partner'])
                    
                        <span class="text-red-600 text-xl">{{ $project['partner']['nama_partner'] }}</span>
                        <span class="badge bg-emerald-100 text-success fw-bold fs-6 mx-2 px-3 rounded-pill">Aktif</span>
                @else
                    <p>Tidak ada data partner.</p>
                @endif
            </div>
            <div class="py-6 border-b border-gray-500">
                <div>
                    {{-- <p>>Nama Proyek: <strong> {{ $project['nama_proyek'] }}</strong></p>
                    <p>Estimasi Lama Proyek: <strong> {{ $project['estimasi_lama_proyek'] }} Bulan</strong></p>
                    <p>Lokasi Proyek: <strong> {{ ucfirst($project['lokasi_proyek']) }}</strong></p>
                    <p>Status Proyek: <strong> {{ ucfirst($project['status_proyek']) }}</strong></p>
                    <p>Progres Proyek: <strong> {{ $project['progres_proyek'] }}</strong></p> --}}
                    <p>Tanggal Proyek : <strong> 6 Oktober 2024</strong></p>
                    <p>Estimasi Lama Pengerjaan : <strong> 5 Bulan</strong></p>
                    <p>Rencana Anggaran Produksi : <strong> Rp 500.000.000,00</strong></p>
                    <p>Rencana Anggaran Biaya : <strong> Rp 350.000.000,00</strong></p>
                    <p>Total Hutang : <strong> Rp 80.000.000,00</strong></p>
                    <p>Total Piutang : <strong> Rp 60.000.000,00</strong></p>
                    <p>Status Pengajuan Kebutuhan Material : <strong> Diterima</strong></p>
                    <p>Status Inpeksi Logistik : <strong> Diterima</strong></p>
                    <p>Status Ajuan Upahan : <strong> Diterima</strong></p>
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
            <div class="bg-white py-6 w-50">
                <table class="table align-middle">
                    <thead>
                        <tr class="text-start">
                            <th>No</th>
                            <th>Milestone</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach($projects as $index => $proyek) --}}
                        <tr>
                            {{-- <td class="text-start">{{ $index + 1 }}</td> --}}
                            <td class="text-start">1</td>
                            {{-- <td>
                                <strong>{{ $proyek->nama_project }}</strong><br>
                                <small>{{ $proyek->partner->nama_partner}}</small>
                            </td> --}}
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
                            {{-- <td class="text-start">
                                <div class="d-flex gap-2">
                                    <a href="/projects/{{ $proyek->id }}" class="text-primary" title="Lihat">
                                        <i class="bi bi-eye-fill fs-5"></i>
                                    </a>&nbsp;
                                    <a href="#" class="text-warning" title="Edit">
                                        <i class="bi bi-pencil-square fs-5"></i>
                                    </a>&nbsp;
                                    <a href="#" class="text-danger" title="Hapus">
                                        <i class="bi bi-trash-fill fs-5"></i>
                                    </a>
                                </div>
                            </td> --}}
                        </tr>
                        {{-- @endforeach --}}
                        {{-- @if($projects->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center text-muted">Tidak ada proyek.</td>
                        </tr>
                        @endif --}}
                    </tbody>
                </table>
            </div>
            <div class="mt-6">
                <a href="{{ route('projects.index') }}" class="inline-block font-semibold py-2 px-4 rounded text-white" style="background-color: #2563eb !important;">
                    Kembali ke Daftar Proyek
                </a>                    
            </div>
        </div>
    </div>
</div>
@endsection