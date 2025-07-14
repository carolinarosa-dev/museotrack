<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artefact extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'photos',
        'reference',
        'denomination',
        'dating',
        'description',
        'origin',
        'bibliography',
        'incorporation_date',
        'incorporation_mode_id',
        'conservation_records_id',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $casts = [
        'photos' => 'array',
        'incorporation_date' => 'date',
    ];

    public function incorporationMode()
    {
        return $this->belongsTo(IncorporationMode::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }

    public function superCategories()
    {
        return $this->belongsToMany(SuperCategory::class, 'artefact_super_categories')
        ->withTimestamps()
        ->withPivot(['created_by', 'updated_by', 'deleted_by']);
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class,'artefact_authors')
            ->withTimestamps()
            ->withPivot(['created_by', 'updated_by', 'deleted_by']);
    }

    // Relação ManyToMany para workshops

    public function workshops()
    {
        return $this->belongsToMany(Workshop::class,'artefact_workshops')
            ->withTimestamps()
            ->withPivot(['created_by', 'updated_by', 'deleted_by'])
            ->withTrashed();
    }

    public function materials()
    {
        return $this->belongsToMany(Material::class, 'artefact_materials')
            ->withPivot(['created_by', 'updated_by', 'deleted_by'])
            ->withTimestamps();
    }
    public function techniques()
    {
        return $this->belongsToMany(Technique::class, 'artefact_techniques')
            ->withPivot(['created_by', 'updated_by', 'deleted_by'])
            ->withTimestamps();
    }






}
