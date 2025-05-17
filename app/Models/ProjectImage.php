<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class ProjectImage extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = ['project_id', 'file_dokumen', 'tanggal_dokumen'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::deleting(function ($projectImage) {
    //         if ($projectImage->file_dokumen && Storage::exists($projectImage->file_dokumen)) {
    //             Storage::delete($projectImage->file_dokumen);
    //         }
    //     });
    // }
}
