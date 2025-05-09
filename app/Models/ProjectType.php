<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectType extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = ['nama_project_', 'deskripsi_project_type'];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_project_type');
    }
}
