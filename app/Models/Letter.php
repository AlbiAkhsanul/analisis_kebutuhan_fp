<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Letter extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = ['project_id', 'tanggal_dokumen', 'file_dokumen'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::deleting(function ($letter) {
    //         if ($letter->file_dokumen && Storage::exists($letter->file_dokumen)) {
    //             Storage::delete($letter->file_dokumen);
    //         }
    //     });
    // }
}
