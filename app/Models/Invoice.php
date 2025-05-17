<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Invoice extends Model
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

    //     static::deleting(function ($invoice) {
    //         if ($invoice->file_dokumen && Storage::exists($invoice->file_dokumen)) {
    //             Storage::delete($invoice->file_dokumen);
    //         }
    //     });
    // }
}
