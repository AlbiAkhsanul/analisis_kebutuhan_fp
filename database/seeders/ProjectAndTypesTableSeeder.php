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
            'nama_project' => 'Gedung Baru XYZ',
            'partner_id' => 1,
            'tanggal_project' => '2025-05-14',
            'estimasi_lama' => 27,
            'rencana_anggaran_produksi' => 2000000000,
            'rencana_anggaran_biaya' => 180000000000,
            'status_penajuan_kebutuhan_material' => 1,
            'status_inspeksi_logistik' => 1,
            'status_ajuhan_upahan' => 1,
            'milestone_20' => 1,
            'milestone_50' => 1,
            'milestone_80' => 1,
            'milestone_100' => 0,
            'lokasi' => 'Wonokromo, Surabaya'
        ]);

        $projectTypes = ProjectType::whereIn('nama_project_type', ['Konstruksi', 'MEP'])->pluck('id')->toArray();
        $project->types()->sync($projectTypes);
    }
}
