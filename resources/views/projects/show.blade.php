@extends('layouts.app')

@section('title', 'Detail Proyek')

@section('content')
<div class="col-md-9 mt-4" style="min-height: 80vh;">
    <!-- Tombol atas -->
    <div class="px-4 d-flex justify-content-between align-items-center mb-3 ">
        <a href="/projects" class="btn btn-primary fw-bold px-4 py-2 rounded-pill">
            Kembali Ke Daftar Proyek
        </a>
    </div>
    <div class="bg-white mx-4 p-3 rounded shadow-sm">
        <div class="max-w-4xl mx-auto px-6 space-y-6">
            <div class="p-6 rounded-2xl">
                <h3 class="text-lg font-bold mb-4">Mitra Proyek</h3>
                @if ($project['partner'])
                    <p><strong>Nama Mitra:</strong> {{ $project['partner']['nama_partner'] }}</p>
                @else
                    <p>Tidak ada data partner.</p>
                @endif
            </div>
            <div class="p-6 rounded-2xl">
                <h3 class="text-lg font-bold mb-4">Informasi Umum</h3>
                <div class="space-y-2">
                    <p><strong>Nama Proyek:</strong> {{ $project['nama_proyek'] }}</p>
                    <p><strong>Estimasi Lama Proyek:</strong> {{ $project['estimasi_lama_proyek'] }} Bulan</p>
                    {{-- <p><strong>Lokasi Proyek:</strong> {{ ucfirst($project['lokasi_proyek']) }}</p>
                    <p><strong>Status Proyek:</strong> {{ ucfirst($project['status_proyek']) }}</p>
                    <p><strong>Progres Proyek:</strong> {{ $project['progres_proyek'] }}</p> --}}
                </div> 
            </div>
            {{-- <div class="p-6 rounded-2xl">
                <h3 class="text-lg font-bold mb-4">Detail Pengajuan</h3>
                <div class="space-y-2">
                    <p><strong>Pengajuan Kebutuhan Material:</strong> {{ ucfirst($project['pengajuan_kebutuhan_material']) }}</p>
                    <p><strong>Inspeksi Logistik:</strong> {{ ucfirst($project['inspeksi_logistik']) }}</p>
                    <p><strong>Ajuan Upahan:</strong> {{ ucfirst($project['ajuan_upahan']) }}</p>
                </div>
            </div>
            <div class="p-6 rounded-2xl">
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
            <div class="mt-6">
                <a href="{{ route('projects.index') }}" class="inline-block font-semibold py-2 px-4 rounded text-white" style="background-color: #2563eb !important;">
                    Kembali ke Daftar Proyek
                </a>                    
            </div>
        </div>
    </div>
</div>
@endsection