<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function artefacts()
    {
        return $this->belongsToMany(Artefact::class, 'artefact_materials')
            ->withPivot(['created_by', 'updated_by', 'deleted_by'])
            ->withTimestamps();
    }
}
