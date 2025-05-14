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
        'nama_project',
        'tanggal_project',
        'estimasi_lama',
        'rencana_anggaran_produksi',
        'rencana_anggaran_biaya',
        'status_penajuan_kebutuhan_material',
        'status_inspeksi_logistik',
        'astatus_ajuhan_upahan',
        'milestone_20',
        'milestone_50',
        'milestone_80',
        'milestone_100'
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
