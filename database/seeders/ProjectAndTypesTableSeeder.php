<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\ProjectType;

class ProjectAndTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['nama' => 'Konstruksi', 'deskripsi' => 'Proyek pembangunan fisik seperti gedung, jalan, dan jembatan.'],
            ['nama' => 'Arsitek dan Desain', 'deskripsi' => 'Perencanaan visual dan fungsional dari bangunan atau ruang.'],
            ['nama' => 'MEP', 'deskripsi' => 'Mekanikal, Elektrikal, dan Plumbing dalam sistem bangunan.'],
        ];

        foreach ($types as $type) {
            ProjectType::firstOrCreate(
                ['nama_project_type' => $type['nama']],
                ['deskripsi_project_type' => $type['deskripsi']]
            );
        }

        $project = Project::create([
            'nama_proyek' => 'Gedung Baru XYZ',
            'partner_id' => 1,
            'tanggal_proyek' => '2023-05-14',
            'estimasi_lama' => 27,
            'rencana_anggaran_produksi' => 2000000000,
            'rencana_anggaran_biaya' => 180000000000,
            'status_penajuan_kebutuhan_material' => 'diterima',
            'status_inspeksi_logistik' => 'diterima',
            'status_ajuhan_upahan' => 'diterima',
            'status_milestone_20' => 'lunas',
            'status_milestone_50' => 'lunas',
            'status_milestone_80' => 'lunas',
            'status_milestone_100' => 'pending',
            'tanggal_milestone_20' => '2023-12-16',
            'tanggal_milestone_50' => '2024-06-28',
            'tanggal_milestone_80' => '2024-11-08',
            'tanggal_milestone_100' => null,
            'status_proyek' => 'aktif',
            'lokasi' => 'Wonokromo, Surabaya'
        ]);

        $projectTypes = ProjectType::whereIn('nama_project_type', ['Konstruksi', 'MEP'])->pluck('id')->toArray();
        $project->types()->sync($projectTypes);
    }
}
