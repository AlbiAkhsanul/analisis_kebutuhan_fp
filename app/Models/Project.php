<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'partner_id',
        'nama_proyek',
        'tanggal_proyek',
        'lokasi',
        'status_proyek',
        'estimasi_lama',
        'rencana_anggaran_produksi',
        'rencana_anggaran_biaya',
        'status_pengajuan_kebutuhan_material',
        'status_inspeksi_logistik',
        'status_ajuhan_upahan',
        'status_milestone_20',
        'status_milestone_50',
        'status_milestone_80',
        'status_milestone_100',
        'tanggal_milestone_20',
        'tanggal_milestone_50',
        'tanggal_milestone_80',
        'tanggal_milestone_100'
    ];

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function letters()
    {
        return $this->hasMany(Letter::class);
    }

    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }

    public function types()
    {
        return $this->belongsToMany(ProjectType::class, 'project_project_types');
    }
}
