<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = ['email_partner', 'no_telfon', 'alamat', 'deksripsi', 'logo'];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
